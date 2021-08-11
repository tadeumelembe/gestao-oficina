@extends('template.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Cliente</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inícios</a></li>
                            <li class="breadcrumb-item active">cliente</li>
                            <li class="breadcrumb-item active">{{$customers->name}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                <div class="card">

                    <div class="card-body" style="display: inline">

                        <div class="pb-3 mb-3" style="border-bottom: #dedede solid 1px;">
                            <div class="row">
                                <div class="col-6">
                                    <div class="float-left pr-2 mt-2 page-title-box d-flex align-items-center">
                                        <h6>Detalhes Cliente</h6>
                                    </div>
                                </div>

                            </div>

                            <div class="row pt-2">
                                <div class="col-6 col-sm-4">
                                    <small class="text-muted">Nome</small>
                                    <h6 id="job_status" style="color: green;">{{$customers->name}} {{$customers->surname}}</h6>

                                </div>

                                <div class="col-6 col-sm-4">
                                    <small class="text-muted">Telefone</small>
                                    <h6>{{$customers->phoneNumber}}</h6>

                                </div>
                                <div class="col-6 col-sm-4">
                                    <small class="text-muted">Email</small>
                                    <h6>{{$customers->email}}</h6>

                                </div>

                                <div class="col-6 col-sm-4 pt-2">
                                    <small class="text-muted">Tipo</small>
                                    <h6>{{$customers->type}}</h6>

                                </div>
                                <div class="col-6 col-sm-4 pt-2">
                                    <small class="text-muted">Nacionalidade</small>
                                    <h6>{{$customers->country}}</h6>
                                </div>

                                <div class="col-4 pt-2">
                                    <small class="text-muted">Cidade</small>
                                    <h6>{{$customers->city}}</h6>
                                </div>

                                <div class="col-4 pt-2">
                                    <small class="text-muted">Av.</small>
                                    <h6>{{$customers->neighborhood}}</h6>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div> <!-- end col -->

            <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Estatísticas</h4>
                                <div class="text-center pb-3" style="border-bottom: #ededed solid 1px;">
                                <div class="spinner-border text-danger spinner-sums" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="row sums-section">
                                        <div class="col-sm-4">
                                            <i class="ri-arrow-down-line" style="color: green;font-size:large"></i>
                                            <p class="text-muted mb-2" style="color:green;">Receita</p>
                                            <h6 style="font-size: 13px;" class="mb-0" id="income-sum">-</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <i class="ri-arrow-up-line" style="color: red;font-size:large"></i>

                                            <p class="text-muted mb-2">Despesa</p>
                                            <h6 style="font-size: 13px;" class="mb-0" id="outcome-sum">-</h6>
                                        </div>
                                        <div class="col-sm-4">
                                            <i class="ri-subtract-fill" style="color: blue;font-size:large"></i>

                                            <p class="text-muted mb-2">Lucro</p>
                                            <h6 style="font-size: 13px;" class="mb-0" id="profit-sum">-</h6>
                                        </div>
                                    </div>

                                </div>
                                <h4 class="card-title mt-3"></h4>
                                <div class="text-center">
                                    <div class="spinner-border text-danger spinner-counts" role="status">
                                        <span class="sr-only">Loading...</span>
                                    </div>
                                    <div class="row counts-section">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <i class=" ri-record-circle-fill" style="color: #00000090;font-size:large"></i>
                                            <p class="text-muted mb-2"  style="color:green;">Carros</p>
                                            <h6 id="cars-count" class="mb-0">-</h6>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <i class="mdi mdi-progress-wrench" style="color: green;font-size:large"></i>

                                            <p class="text-muted mb-2">Jobs Concluídos</p>
                                            <h6 class="mb-0" id="jobs-complete-count">-</h6>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <i class="mdi mdi-progress-wrench" style="color: red;font-size:large"></i>

                                            <p class="text-muted mb-2">Jobs Em curso</p>
                                            <h6 class="mb-0" id="jobs-running-count">-</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- Activity Option 2 -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6 ">
                                <div class="float-left pr-2 mb-2 page-title-box d-flex align-items-center">
                                    <h4 class="card-title">Histórico</h4>
                                </div>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#geral" role="tab">
                                    <span class="d-block d-sm-none"><i class="ri-record-circle-fill"></i></span>
                                    <span class="d-none d-sm-block">Job cards</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#consumiveis" role="tab">
                                    <span class="d-block d-sm-none"><i class="ri-tools-line"></i></span>
                                    <span class="d-none d-sm-block">Carros</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="geral" role="tabpanel">
                                @include('customers.assets.show.jobs')

                            </div>
                            <div class="tab-pane " id="consumiveis" role="tabpanel">

                                @include('customers.assets.show.cars')

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('customers.assets.show.js')

@endsection