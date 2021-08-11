@extends('template.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-6">
                <div class="page-title-box d-flex align-items-center row">
                    <div class="col-12">
                        <h4 class="mb-0">Clientes Institucionais</h4>
                    </div>

                    <div class="page-title-right col-12 pt-2">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{url('/home')}}">Início</a></li>
                            <li class="breadcrumb-item active">instituições</li>
                        </ol>
                    </div>

                </div>
            </div>
            <div class="col-6">
                <div class="float-right pr-2 mb-2">
                    <a href="javascript:void(0);" class="btn btn-success mb-2" data-toggle="modal" data-target="#createModal"><i class="mdi mdi-plus mr-2"></i>Adicionar Cliente</a>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('customers.companies.assets.create')
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
            <div  id="divSuccess">

            </div>
                <div class="card">

                    <div class="card-body">

                        <h4 class="card-title"></h4>
                        <p class="card-title-desc">
                        </p>

                        <table id="companyDatatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Email</th>
                                    <th>Acção</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>

    <!-- container-fluid -->
</div>

@include('customers.companies.assets.js')

@endsection
