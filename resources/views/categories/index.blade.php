@extends('template.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-6">
                <div class="page-title-box d-flex align-items-center row">
                    <div class="col-12">
                        <h4 class="mb-0">Categorias</h4>
                    </div>

                    <div class="page-title-right col-12 pt-2">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Início</a></li>
                            <li class="breadcrumb-item active">categorias</li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="float-right pr-2 mb-2">
                    <a href="javascript:void(0);" class="btn btn-success mb-2" data-toggle="modal" data-target=".create-modal"><i class="mdi mdi-plus mr-2"></i>Adicionar Categoria</a>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @include('categories.assets.create')
        @include('categories.assets.edit')


        <div class="row">
            <div class="col-12">
                <!--    @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Problemas com os campos de texto.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif-->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"></h4>
                        <p class="card-title-desc">
                        </p>
                        <table id="categoryDatatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Data Criação</th>
                                    <th>Funcionarios</th>
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Mecânico</td>
                                    <td>20-05-2021</td>
                                    <td>3</td>
                                    <td>
                                        <div class='dropdown mt-sm-0'>
                                            <a href='' class='btn btn-secondary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                Acção<i class='mdi mdi-chevron-down'></i>
                                            </a>

                                            <div class='dropdown-menu'>
                                                <a class='dropdown-item' href='jobs/show'>Ver</a>
                                                <a class='dropdown-item' href='' data-toggle='modal' data-target='.create-modal'>Editar</a>
                                                <a class='dropdown-item' href=''>Apagar</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <!-- container-fluid -->
</div>
@include('employees.assets.js')

@endsection