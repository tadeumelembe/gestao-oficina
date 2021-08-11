<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\JobCard;
use App\Models\Car;
use App\Models\Consumivel;
use Carbon\Carbon;
use DB;
use DataTables;

class CustomerController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:customer-list|customer-create|customer-edit|customer-delete', ['only' => ['singulars','companies','jobs','cars','store']]);
         $this->middleware('permission:customer-create', ['only' => ['create','store']]);
         $this->middleware('permission:customer-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:customer-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singulars(Request $request)
    {

        if ($request->ajax()) {
            $data = Customer::where('type', 'Singular');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (Customer $customer) {

                    return $this->getActionColumn($customer);
                })->addColumn('created_at', function (Customer $customer) {

                    return $customer->created_at->format('d-m-Y');
                })->addColumn('name', function (Customer $customer) {

                    return $customer->name . ' ' . $customer->surname;
                })
                ->rawColumns(['acção'])
                ->make(true);
        }

        return view('customers.singulars.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function companies(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::where('type', 'Company');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (Customer $customer) {

                    return $this->getActionColumn($customer);
                })->addColumn('created_at', function (Customer $customer) {

                    return $customer->created_at->format('d-m-Y');
                })->addColumn('name', function (Customer $customer) {

                    return $customer->name . ' ' . $customer->surname;
                })
                ->rawColumns(['acção'])
                ->make(true);
        }
        return view('customers.companies.index');
        //
    }

    public function jobs(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = JobCard::leftjoin('cars', function ($join) {
                $join->on('jobcards.car_id', '=', 'cars.id');
            })->where('cars.customer_id', '=', $id);

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
                })->addColumn('status', function (JobCard $jobCard) {

                    return $jobCard->status;
                })->addColumn('actividades', function (JobCard $jobCard) {

                    return count($jobCard->actividades);
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
            <a class='dropdown-item' href='../../jobs/show/".$data->id."'>Ver</a>
            </div>
    </div>";

    }

    protected function getCarsAction($data): string
    {

        return "     <div class='dropdown mt-sm-0'>
        <a href='' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Acção<i class='mdi mdi-chevron-down'></i>
        </a>

        <div class='dropdown-menu' style=''>
            <a class='dropdown-item' href='../../cars/show/".$data->id."'>Ver</a>
            </div>
    </div>";

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cars(Request $request, $id)
    {
        if ($request->ajax()) {
            $data = Car::where(['status' => 'Activo', 'customer_id' => $id]);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (Car $car) {

                    return $this->getCarsAction($car);
                })->addColumn('created_at', function (Car $car) {

                    return $car->created_at->format('d-m-Y');
                })->addColumn('proprietario', function (Car $car) {

                    return $car->customer->name . ' ' . $car->customer->surname;
                })
                ->rawColumns(['acção'])
                ->make(true);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function counts(Request $request, $id)
    {
        //if ($request->ajax()) {
        $data = array();

        $data['cars'] = Car::where(['status' => 'Activo', 'customer_id' => $id])->count();

        $data['jobs']['pendente'] = JobCard::leftjoin('cars', function ($join) {
            $join->on('jobcards.car_id', '=', 'cars.id');
        })->where(['cars.customer_id' => $id, 'jobcards.status' => 'Pendente'])->count();

        $data['jobs']['emCurso'] = JobCard::leftjoin('cars', function ($join) {
            $join->on('jobcards.car_id', '=', 'cars.id');
        })->where(['cars.customer_id' => $id, 'jobcards.status' => 'Em curso'])->count();

        $data['jobs']['fechado'] = JobCard::leftjoin('cars', function ($join) {
            $join->on('jobcards.car_id', '=', 'cars.id');
        })->where(['cars.customer_id' => $id, 'jobcards.status' => 'Fechado'])->count();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sums(Request $request, $id)
    {
        $data = array();

        $data['income'] = JobCard::leftjoin('cars', function ($join) {
            $join->on('jobcards.car_id', '=', 'cars.id');
        })->where(['cars.customer_id' => $id])->sum('jobcards.valor');

        $data['outcome'] = Consumivel::leftjoin('actividades', function ($join) {
            $join->on('consumiveis.actividade_id', '=', 'actividades.id');
        })->leftjoin('jobcards', function ($join) {
            $join->on('actividades.jobCard_id', '=', 'jobcards.id');
        })->leftjoin('cars', function ($join) {
            $join->on('jobcards.car_id', '=', 'cars.id');
        })->where(['cars.customer_id' => $id])->sum('consumiveis.custo');


        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }


    protected function getActionColumn($data): string
    {

        return "     <div class='dropdown mt-sm-0'>
        <a href='' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Acção<i class='mdi mdi-chevron-down'></i>
        </a>

        <div class='dropdown-menu' style=''>
            <a class='dropdown-item' href='show/" . $data->id . "'>Ver</a>
            <a class='dropdown-item' href=''>Editar</a>
            <a class='dropdown-item item-delete'  onclick='itemDelete($data->id)' href='javascript:void(0)'>Apagar</a>
        </div>
    </div>";
    }

    public function getCustomers(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            $customers = Customer::orderby('name', 'asc')->select('id', 'name')->limit(5)->get();
        } else {
            $customers = Customer::orderby('name', 'asc')->select('id', 'name')->where('name', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($customers as $customer) {
            $response[] = array(
                "id" => $customer->id,
                "text" => $customer->name . ' ' . $customer->surname
            );
        }

        echo json_encode($response);
        exit;
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
            'email' => 'required|unique:customers,email',
            'phoneNumber' => 'required|unique:customers,phoneNumber',
            'name' => 'required',
            'type' => 'required',
        ], $messages);

        Customer::create([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'phoneNumber' => $request->input('phoneNumber'),
            'email' => $request->input('email'),
            'type' => $request->input('type'),
            'nuit' => $request->input('nuit'),
            'city' => $request->input('city'),
            'bi' => $request->input('bi'),
            'neighborhood' => $request->input('neighborhood'),
        ]);

        return response()->json(['success' => 'Cliente adicionado com sucesso!']);
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
        $customers = Customer::where('id', $id)->first();

        // dd($jobCard);
        return view('customers.show', compact('customers'));
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
        $customer = Customer::find($id);
        //$customer->status = 'Deleted';
        $customer->deleted_at = Carbon::now();
        $customer->save();

        return response()->json(['success' => 'Cliente apagado com sucesso!']);
    }

}
