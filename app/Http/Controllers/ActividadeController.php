<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actividade;
use App\Models\ActividadeFuncionario;
use Carbon\Carbon;

class ActividadeController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:actividade-list|actividade-create|actividade-edit|actividade-delete', ['only' => ['index','store']]);
         $this->middleware('permission:actividade-create', ['only' => ['create','store']]);
         $this->middleware('permission:actividade-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:actividade-delete', ['only' => ['destroy']]);
         $this->middleware('permission:actividade-addFuncionario', ['only' => ['addFuncionario']]);
         $this->middleware('permission:actividade-iniciarActividade', ['only' => ['iniciarActividade']]);
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
            'unique'    => ':attribute já foi usado',
            'after' => 'A data de fim não pode ser antes da data de inicio'
        ];

        $this->validate($request, [
            'a_nome' => 'required',
            'a_area' => 'required',
            'jobId' => 'required'
        ], $messages);

        $actividade = Actividade::create([
            'nome' => $request->input('a_nome'),
            'descricao' => $request->input('a_descricao'),
            'area' => $request->input('a_area'),
            'jobCard_id' => $request->input('jobId'),
            'funcionario_id' => $request->input('funcionario_id')
        ]);

        return response()->json(['success' => 'Actividade actualizado!', 'actividade' => $actividade]);
    }

    public function addFuncionario(Request $request)
    {
        $messages = [
            'same' => 'O :attribute e :other devem ser iguais.',
            'size' => 'O :attribute deve ser exactamente :size.',
            'between' => 'O :attribute valor de :input não esta entre :min - :max.',
            'in' => 'O :attribute deve ser um dos seguintes tipos: :values',
            'required' => 'O campo :attribute é obrigatório.',
            'unique'    => ':attribute já foi usado',
            'after' => 'A data de fim não pode ser antes da data de inicio'
        ];

        $this->validate($request, [
            'actividade_id' => 'required',
            'funcionario_id' => 'required',
            'tarefa' => 'required'
        ], $messages);

        $actividade_funcionario = ActividadeFuncionario::create([

            'actividade_id' => $request->input('actividade_id'),
            'funcionario_id' => $request->input('funcionario_id'),
            'tarefa' => $request->input('tarefa')
        ]);

        $funcionario = $actividade_funcionario->funcionario;

        $response = array(
            'name' => $funcionario->name,
            'surname' => $funcionario->surname,
            'tarefa' => $actividade_funcionario->tarefa
        );

        return response()->json(['success' => 'Actividade actualizada!', 'funcionario' => $response]);
    }

    public function getActividade($id)
    {

        $actividade = Actividade::where('id', $id)->first();

        $consumiveis = $actividade->consumiveis;
        $response = array();
        foreach (ActividadeFuncionario::where('actividade_id', $id)->get() as $actividadeF) {
            $response[] = array(
                'name' => $actividadeF->funcionario->name,
                'surname' => $actividadeF->funcionario->surname,
                'tarefa' => $actividadeF->tarefa
            );
        }

        return response()->json(['actividade' => $actividade, 'consumiveis' => $consumiveis, 'funcionarios' => $response]);
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
        return view('cars.show');
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

    public function iniciarActividade(Request $request)
    {
        $actividade = Actividade::where('id', $request->input('Actividade_id'))->first();

        if (!empty($actividade)) {
            $imageName = null;

            if ($request->photo_car_actividade != null) {
                $imageName = time() . '.' . $request->photo_car_actividade->extension();

                $request->photo_car_actividade->move(public_path('uploads/actividades'), $imageName);
            }

            if ($actividade->status == "Pendente") {
                $moment = Carbon::now();
                $actividade->status = "Em curso";
                $actividade->dataInicio = $moment;
                $actividade->dataFim = null;
                $actividade->antesPhoto = $imageName;
                $actividade->update();
                return response()->json(['actividade' => $actividade]);
            } else {

                if ($actividade->status == "Em curso") {

                    $moment = Carbon::now();
                    $actividade->status = "Completo";
                    $actividade->dataFim = $moment;
                    $actividade->depoisPhoto = $imageName;
                    $actividade->save();

                    return response()->json(['actividade' => $actividade]);
                }
            }
        } else

            return response()->json(['Erro' => 'Actividade não encontrada']);
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
    }

    public function imageUpload(Request $request, $id)
    {

        $request->validate([
            'file' => 'required',
            'tipo' => 'required'
        ]);

        $path = 'uploads' . '/' . 'images/';

        $file = $request->file('file');

        $fileName = time() . '.' . $file->extension();

        if ($file->move(public_path($path), $fileName)) {
            if ($request->input('tipo') == 'antes') {
                $actividade = Actividade::find($id);
                $actividade->antes = $path . $fileName;
                $actividade->save();
            } else {
                $actividade = Actividade::find($id);
                $actividade->depois = $path . $fileName;
                $actividade->save();
            }
        }

        return redirect()->back()
            ->with('success', 'Ficheiro adicionado com sucesso');
    }
}
