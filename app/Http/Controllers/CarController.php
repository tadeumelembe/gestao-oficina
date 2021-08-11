<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\JobCard;
use DB;
use DataTables;

class CarController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:car-list|car-create|car-edit|car-delete', ['only' => ['index','store']]);
         $this->middleware('permission:car-create', ['only' => ['create','store']]);
         $this->middleware('permission:car-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:car-delete', ['only' => ['destroy']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Car::where('status', 'Activo');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (Car $car) {

                    return $this->getActionColumn($car);
                })->addColumn('created_at', function (Car $car) {

                    return $car->created_at->format('d-m-Y');
                })->addColumn('proprietario', function (Car $car) {

                    return $car->customer->name . ' ' . $car->customer->surname;
                })
                ->rawColumns(['acção'])
                ->make(true);
        }
        return view('cars.index');
    }

    protected function getActionColumn($data): string
    {

        return "     <div class='dropdown mt-sm-0'>
        <a href='' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Acção<i class='mdi mdi-chevron-down'></i>
        </a>

        <div class='dropdown-menu' style=''>
            <a class='dropdown-item' href='cars/show/" . $data->id . "'>Ver</a>
            <a class='dropdown-item' href=''>Editar</a>
            <a class='dropdown-item item-delete' onclick='itemDelete($data->id)' href='javascript:void(0)'>Apagar</a>
        </div>
    </div>";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'same' => 'O :attribute e :other devem ser iguais.',
            'size' => 'O :attribute deve ser exactamente :size.',
            'between' => 'O :attribute valor de :input não esta entre :min - :max.',
            'in' => 'O :attribute deve ser um dos seguintes tipos: :values',
            'required' => 'O campo :attribute é obrigatório.',
            'unique'    => ':attribute já foi usado'
        ];


        $this->validate($request, [
            'matricula' => 'required|unique:cars,matricula',
            'marca' => 'required',
            'modelo' => 'required',
            'anoFabrico' => 'required',
            'tipo' => 'required',
            'proprietario' => 'required',
            'combustivel' => 'required'
        ], $messages);

        $imageName = null;

        if($request->photo_car !== 'undefined'){
            $imageName = time() . '.' . $request->photo_car->extension();

            $request->photo_car->move(public_path('uploads/photo_car'), $imageName);
        }


        Car::create([
            'matricula' => $request->input('matricula'),
            'marca' => $request->input('marca'),
            'modelo' => $request->input('modelo'),
            'anoFabrico' => $request->input('anoFabrico'),
            'notas' => $request->input('notas'),
            'tipo' => $request->input('tipo'),
            'customer_id' => $request->input('proprietario'),
            'combustivel' => $request->input('combustivel'),
            'photo' => $imageName,
            'proprietario_nome' => $request->input('proprietario_nome'),
            'proprietario_telefone' => $request->input('proprietario_telefone'),
            'proprietario_bi' => $request->input('proprietario_bi'),
            'proprietario_email'=>$request->input('proprietario_email'),
            'proprietario_sexo' =>$request->input('proprietario_sexo'),

        ]);

        return response()->json(['success' => 'Car adicionado com sucesso!']);
    }

    public function getCars(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $cars = Car::orderby('matricula', 'asc')->select('id', 'matricula')->limit(5)->get();
        } else {
            $cars = Car::orderby('matricula', 'asc')->select('id', 'matricula')->where('matricula', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($cars as $car) {
            $response[] = array(
                "id" => $car->id,
                "text" => $car->matricula
            );
        }

        echo json_encode($response);
        exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $car = Car::where('id', $id)->first();

       // $car->photo = 'uploads/photo_car/' . $car->photo;

        return view('cars.show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $funcionario = Car::find($id);
        $funcionario->status = 'Deleted';
        $funcionario->save();

        return response()->json(['success' => 'Veículo apagado com sucesso!']);
    }

    public function jobs(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = JobCard::leftjoin('cars', function ($join) {
                $join->on('jobcards.car_id', '=', 'cars.id');
            })->where('cars.id', '=', $id);

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (JobCard $jobCard) {

                    return $this->getJobsAction($jobCard);
                })->addColumn('dataInicio', function (JobCard $jobCard) {
                    if ($jobCard->dataInicio) {
                        return $jobCard->dataInicio;
                    } else {
                        return '-';
                    }
                })->addColumn('dataFim', function (JobCard $jobCard) {

                    if ($jobCard->dataFim) {
                        return $jobCard->dataFim;
                    } else {
                        return '-';
                    }
                })->addColumn('car', function (JobCard $jobCard) {

                    return $jobCard->car->matricula;
                })->addColumn('funcionario', function (JobCard $jobCard) {

                    return $jobCard->funcionario->name . ' ' . $jobCard->funcionario->surname;
                })->addColumn('actividades', function (JobCard $jobCard) {

                    return count($jobCard->actividades);
                })->addColumn('status', function (JobCard $jobCard) {

                    return $jobCard->status;
                })
                ->rawColumns(['acção'])
                ->make(true);
        }
        return view('jobs.index');
    }

    protected function getJobsAction($data): string
    {

        return "     <div class='dropdown mt-sm-0'>
        <a href='' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Acção<i class='mdi mdi-chevron-down'></i>
        </a>

        <div class='dropdown-menu' style=''>
            <a class='dropdown-item' href='../../jobs/show/" . $data->id . "'>Ver</a>
            </div>
    </div>";
    }
}
