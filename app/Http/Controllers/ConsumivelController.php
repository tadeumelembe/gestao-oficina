<?php

namespace App\Http\Controllers;

use App\Models\Actividade;
use Illuminate\Http\Request;
use App\Models\Consumivel;
use Carbon\Carbon;
use DB;
use DataTables;

class ConsumivelController extends Controller
{


    function __construct()
    {
         $this->middleware('permission:consumivel-list|consumivel-create|consumivel-edit|consumivel-delete', ['only' => ['index','store']]);
         $this->middleware('permission:consumivel-create', ['only' => ['create','store']]);
         $this->middleware('permission:consumivel-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:consumivel-delete', ['only' => ['destroy']]);
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
            'c_name' => 'required',
            'c_quantidade' => 'required',
            'c_valor' => 'required',
            'actividadeId' => 'required'
        ], $messages);

        $consumivel = Consumivel::create([
            'name' => $request->input('c_name'),
            'quantidade' => $request->input('c_quantidade'),
            'custo' => $request->input('c_valor'),
            'actividade_id' => $request->input('actividadeId')
        ]);
        $actividade = Actividade::where('id',$request->input('actividadeId'))->first();
        $actividade->preco += $consumivel->custo;
        $actividade->save();
        $consumiveis = Consumivel::where('actividade_id',$request->input('actividadeId'))->get();
        return response()->json(['success' => 'Actividade actualizada!', 'consumivel' =>$consumivel,'consumiveis' =>$consumiveis,'actividade' =>$actividade]);
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
    public function delete($id)
    {
        $consumivel = Consumivel::where('id',$id)->first();

        if(!empty($consumivel)){

            $actividade_id = $consumivel->actividade_id;
            $actividade = Actividade::where('id',$actividade_id)->first();
            if(!empty($actividade)){

                $actividade->preco -= $consumivel->custo;
                $actividade->save();

            }
            $consumiveis = Consumivel::where('actividade_id',$actividade_id)->get();

            $consumivel->delete();

            return response()->json(['success' => 'Consumivel eliminado!', 'consumiveis' =>$consumiveis, 'actividade'=>$actividade]);}

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


}
