<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;
use DataTables;

class EmployeeController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:employee-list|employee-create|employee-edit|employee-delete', ['only' => ['index','store']]);
         $this->middleware('permission:employee-create', ['only' => ['create','store']]);
         $this->middleware('permission:employee-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:employee-delete', ['only' => ['destroy']]);
         $this->middleware('permission:employee-getEmployees', ['only' => ['getEmployees']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Funcionario::where('status', 'Active');
            return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('acção', function(Funcionario $employee){

                        return $this->getActionColumn($employee);

                    })->addColumn('created_at', function(Funcionario $employee){

                        return $employee->created_at->format('d-m-Y');
                })->addColumn('name', function(Funcionario $employee){

                    return $employee->name.' '.$employee->surname ;
            })
                    ->rawColumns(['acção'])
                    ->make(true);
        }
        return view('employees.index');
    }

    protected function getActionColumn($data): string
    {

        return "<div class='dropdown mt-sm-0'>
        <a href='' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
            Acção<i class='mdi mdi-chevron-down'></i>
        </a>

        <div class='dropdown-menu' style=''>
            <a class='dropdown-item'  href='jobs/show/".$data->id."'>Ver</a>
            <a class='dropdown-item'  href=''>Editar</a>
            <a class='dropdown-item item-delete'  onclick='itemDelete($data->id)' href='javascript:void(0)'>Apagar</a>
        </div>
    </div>";

    }

    public function getEmployees(Request $request){

        $search = $request->search;

        if($search == ''){
           $employees = Funcionario::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
           $employees = Funcionario::orderby('name','asc')->select('id','name')->where('matricula', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($employees as $employee){
           $response[] = array(
                "id"=>$employee->id,
                "text"=>$employee->name.' '.$employee->surname
           );
        }

        echo json_encode($response);
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'email' => 'required|unique:funcionarios,email',
            'phoneNumber' => 'required|unique:funcionarios,phoneNumber',
            'name' => 'required',
            'surname' => 'required'
        ],$messages);

        Funcionario::create([
             'name' => $request->input('name'),
             'surname' => $request->input('surname'),
             'phoneNumber' => $request->input('phoneNumber'),
             'email' => $request->input('email')
        ]);

        return response()->json([ 'success'=> 'Funcionario adicionado com sucesso!']);
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

        $funcionario = Funcionario::find($id);
        $funcionario->status = 'Deleted';
        $funcionario->save();

        return response()->json([ 'success'=> 'Funcionario apagado com sucesso!']);
    }
}
