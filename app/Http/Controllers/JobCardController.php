<?php

namespace App\Http\Controllers;

use App\Models\Actividade;
use Illuminate\Http\Request;
use App\Models\JobCard;
use App\Models\Funcionario;
use App\Models\Consumivel;
use DataTables;
use DateTime;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\MailController;
use Carbon\Carbon;
use Illuminate\Queue\Jobs\Job;
use Illuminate\Support\Facades\DB;

class JobCardController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:jobCard-list|jobCard-create|jobCard-edit|jobCard-delete', ['only' => ['index','store','pendente','emCurso','fechado']]);
         $this->middleware('permission:jobCard-create', ['only' => ['create','store']]);
         $this->middleware('permission:jobCard-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:jobCard-delete', ['only' => ['destroy']]);
         $this->middleware('permission:jobCard-start', ['only' => ['start']]);
         $this->middleware('permission:jobCard-close', ['only' => ['close']]);
         $this->middleware('permission:jobCard-getActivity', ['only' => ['getActivity']]);
         $this->middleware('permission:jobCard-changeStatus', ['only' => ['changeStatus']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = JobCard::select('*');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (JobCard $jobCard) {

                    return $this->getActionColumn($jobCard);
                })->addColumn('dataInicio', function (JobCard $jobCard) {

                    return $jobCard->created_at->format('d-m-Y');
                })->addColumn('dataFim', function (JobCard $jobCard) {

                    return $jobCard->created_at->format('d-m-Y');
                })->addColumn('car', function (JobCard $jobCard) {

                    return $jobCard->car->matricula;
                })->addColumn('funcionario', function (JobCard $jobCard) {

                    return $jobCard->funcionario->name . ' ' . $jobCard->funcionario->surname;
                })->addColumn('actividades', function (JobCard $jobCard) {

                    return count($jobCard->actividades);
                })
                ->rawColumns(['acção'])
                ->make(true);
        }
        return view('jobs.index');
    }



    public function pendente(Request $request)
    {
        if ($request->ajax()) {
            $data = JobCard::where('status', 'Pendente');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (JobCard $jobCard) {

                    return $this->getActionColumn($jobCard);
                })->addColumn('dataInicio', function (JobCard $jobCard) {

                    return $jobCard->created_at->format('d-m-Y');
                })->addColumn('dataFim', function (JobCard $jobCard) {

                    return $jobCard->created_at->format('d-m-Y');
                })->addColumn('car', function (JobCard $jobCard) {

                    return $jobCard->car->matricula;
                })->addColumn('funcionario', function (JobCard $jobCard) {

                    return $jobCard->funcionario->name . ' ' . $jobCard->funcionario->surname;
                })->addColumn('actividades', function (JobCard $jobCard) {

                    return count($jobCard->actividades);
                })
                ->rawColumns(['acção'])
                ->make(true);
        }
        // return view('jobs.index');
    }


    public function emCurso(Request $request)
    {
        if ($request->ajax()) {
            $data = JobCard::where('status', 'Em curso');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (JobCard $jobCard) {

                    return $this->getActionColumn($jobCard);
                })->addColumn('dataInicio', function (JobCard $jobCard) {

                    return $jobCard->created_at->format('d-m-Y');
                })->addColumn('dataFim', function (JobCard $jobCard) {

                    return $jobCard->created_at->format('d-m-Y');
                })->addColumn('car', function (JobCard $jobCard) {

                    return $jobCard->car->matricula;
                })->addColumn('funcionario', function (JobCard $jobCard) {

                    return $jobCard->funcionario->name . ' ' . $jobCard->funcionario->surname;
                })->addColumn('actividades', function (JobCard $jobCard) {

                    return count($jobCard->actividades);
                })
                ->rawColumns(['acção'])
                ->make(true);
        }
        // return view('jobs.index');
    }

    public function fechado(Request $request)
    {
        if ($request->ajax()) {
            $data = JobCard::where('status', 'Completo');
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('acção', function (JobCard $jobCard) {

                    return $this->getActionColumn($jobCard);
                })->addColumn('dataInicio', function (JobCard $jobCard) {

                    return $jobCard->created_at->format('d-m-Y');
                })->addColumn('dataFim', function (JobCard $jobCard) {

                    return $jobCard->created_at->format('d-m-Y');
                })->addColumn('car', function (JobCard $jobCard) {

                    return $jobCard->car->matricula;
                })->addColumn('funcionario', function (JobCard $jobCard) {

                    return $jobCard->funcionario->name . ' ' . $jobCard->funcionario->surname;
                })->addColumn('actividades', function (JobCard $jobCard) {

                    return count($jobCard->actividades);
                })
                ->rawColumns(['acção'])
                ->make(true);
        }
        // return view('jobs.index');
    }
    protected function getActionColumn($data): string
    {

        return "     <div class='dropdown mt-sm-0'>
        <a href='' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Acção<i class='mdi mdi-chevron-down'></i>
        </a>

        <div class='dropdown-menu' style=''>
            <a class='dropdown-item' href='jobs/show/" . $data->id . "'>Ver</a>
            <a class='dropdown-item' href='jobs/edit/" . $data->id . "'>Editar</a>
            <a class='dropdown-item item-delete'  onclick='itemDelete($data->id)' href='javascript:void(0)'>Apagar</a>
        </div>
    </div>";
    }

    public function getActivity($id)
    {

        $activitys = JobCard::where('id', $id)->first()->actividades;

        return response()->json(['data' => $activitys]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
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
            'car_id' => 'required',
            'funcionario_id' => 'required',
            'kilometragem' => 'required',
            'valor' => 'required'
        ], $messages);

        // $fileName = 'cotacao_'.time().'.'.$request->cotacao->extension();
        //  $cotacao = $request->cotacao->move(public_path('uploads/cotacoes'), $fileName);

        $job = JobCard::create([
            'car_id' => $request->input('car_id'),
            'funcionario_id' => $request->input('funcionario_id'),
            'kilometragem' => $request->input('kilometragem'),
            'notas' => $request->input('notas'),
            'valor' => $request->input('valor'),
            'referencia' => "job-" . time() . "/" . date('Y')
        ]);

        return redirect()->route('jobs.show', ['id' => $job->id])->with('success', 'Actividade adicionada! adicione as actividades e as datas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobCard = JobCard::where('id', $id)->first();

        $d1 = new DateTime($jobCard->dataInicio);
        $d2 = new DateTime($jobCard->dataFim);
        $duration = $d2->diff($d1);
        $duration = $duration->format('%d d, %H h, %I min, %S seg');

        //$activityProgress = count((array)Actividade::where(['jobCard_id' => $id,'status'=>'Em curso'])->get());
        //$activityComplete = count((array)Actividade::where(['jobCard_id' => $id,'status'=>'Completo'])->get());

        $despesas = Consumivel::leftjoin('actividades', function ($join) {
            $join->on('consumiveis.actividade_id', '=', 'actividades.id');
        })->leftjoin('jobcards', function ($join) {
            $join->on('actividades.jobCard_id', '=', 'jobcards.id');
        })->where(['actividades.jobCard_id' => $id])->sum('consumiveis.custo');


        $activityComplete = Actividade::where(['jobCard_id' => $id,'status'=>'Completo'])->count();
        $activityProgress = Actividade::where(['jobCard_id' => $id,'status'=>'Em curso'])->count();

        $funcionarios = Funcionario::all();

        return view('jobs.show', compact('jobCard', 'duration','activityProgress','activityComplete', 'despesas','funcionarios'));
    }

    public function start($id)
    {
        $jobCard = JobCard::find($id);
        $jobCard->dataInicio = date('Y-m-d H:i:s', strtotime("+2 hour"));
        $jobCard->status = 'Em curso';
        $jobCard->save();


        $message['intro'] =  'Lembrete emissão de fatura. O Job Card ' . $jobCard->referencia . ' terminou';
        $message['customer'] =  $jobCard->car->customer['name'] . $jobCard->car->customer['surname'];
        $message['matricula'] =  $jobCard->car['matricula'];
        $message['marca'] =  $jobCard->car['marca'];
        $message['modelo'] =  $jobCard->car['modelo'];

        MailController::basic_email('celen@celeninvestimentos.com', 'Celen', 'Inicio de Jobcard - '.$jobCard->referencia, $message);

        return redirect()->back();
    }


    public function close($id)
    {
        $jobCard = JobCard::find($id);
        
        $jobCard->dataFim = date('Y-m-d H:i:s', strtotime("+2 hour"));
        $jobCard->status = 'Fechado';
        $jobCard->save();

        $message['intro'] =  'Lembrete! Emissão cotacão. O Job Card '. $jobCard->referencia . ' Iniciou';
        $message['customer'] =  $jobCard->car->customer['name'] . $jobCard->car->customer['surname'];
        $message['matricula'] =  $jobCard->car['matricula'];
        $message['marca'] =  $jobCard->car['marca'];
        $message['modelo'] =  $jobCard->car['modelo'];
        
        MailController::basic_email('celen@celeninvestimentos.com', 'Celen', 'Fim do Job - '. $jobCard->referencia, $message);

        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $id = $request->input('job_id');

        $status = $request->input('job_status');

        $jobCard = JobCard::where('id', $id)->first();


        if ($status == "Em Progresso" && $jobCard->status != "Em Progresso") {

            $jobCard->dataInicio = date('d-m-Y H:i:s', strtotime("+2 hour"));
        } else {

            if ($status != "Fechado") {
                $jobCard->dataFim = date('d-m-Y H:i:s', strtotime("+2 hour"));
            }
        }

        $jobCard->status = $status;
        $jobCard->update();

        return response()->json(['success' => 'Job card actualizado!', 'job' => ['status' => $jobCard->status, 'dataInicio' => $jobCard->dataInicio, 'dataFim' => $jobCard->dataFim]]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobCard = JobCard::where('id', $id)->first();
        return view('jobs.edit',compact('jobCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
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
            'jobCard_id' => 'required'
        ], $messages);

        $jobCard = JobCard::where('id', $request->input('jobCard_id'))->first();
        $jobCard->car_id = $request->input('car_id');
        $jobCard->funcionario_id = $request->input('funcionario_id');
        $jobCard->valor = $request->input('valor');
        $jobCard->kilometragem = $request->input('kilometragem');
        $jobCard->notas = $request->input('notas');
        $jobCard->save();


        return redirect()->route('jobs.show', ['id' => $jobCard->id])->with('success', 'JobCard actualizado com sucesso! adicione as actividades e as datas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = JobCard::find($id);
        $customer->deleted_at = Carbon::now();
        $customer->save();

        return response()->json(['success' => 'Job Card apagado com sucesso!']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileUpload(Request $request, $id)
    {

        $request->validate([
            'd-file' => 'required|mimes:pdf,xlx,csv|max:2048',
            'tipo' => 'required'
        ]);

        $path = 'uploads' . '/' . 'pdf/';

        $file = $request->file('d-file');

        $fileName = time() . '.' . $file->extension();

        if ($file->move(public_path($path), $fileName)) {
            if ($request->input('tipo') == 'Cotacao') {
                $jobCard = JobCard::find($id);
                $jobCard->cotacao = $path . $fileName;
                $jobCard->save();
            } else {
                $jobCard = JobCard::find($id);
                $jobCard->fatura = $path . $fileName;
                $jobCard->save();
            }
        }


        return redirect()->back()
            ->with('success', 'Ficheiro adicionado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function fileRemove(Request $request, $id)
    {
        //

        $request->validate([
            'tipo' => 'required'
        ]);

        $path = 'uploads' . '/' . 'pdf/';

        $jobCard = JobCard::find($id);
        if ($request->input('tipo') == 'cotacao') {

            unlink(public_path($jobCard->cotacao));

            $jobCard->cotacao = null;
            $jobCard->save();
        } else {
            unlink(public_path($jobCard->fatura));
            $jobCard->fatura = null;
            $jobCard->save();
        }

        return response()->json(['success' => 'Removido com sucesso']);
    }
}
