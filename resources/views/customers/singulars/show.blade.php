@extends('template.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Job Card</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inícios</a></li>
                            <li class="breadcrumb-item active">jobcard</li>
                            <li class="breadcrumb-item active">job</li>
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
                                        <h6>Detalhes do Job Card</h6>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="float-right pr-2 ">
                                        <a href="javascript:void(0);" status="Em Progresso" class="btn btn-success mb-2 job_status" ><i class="mdi mdi-play mr-2"></i>Iniciar</a>
                                        <a href="javascript:void(0);" status="Fechado" class="btn btn-danger mb-2 job_status" ><i class="mdi mdi-stop mr-2"></i>Fechar</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row pt-2">
                                <div class="col-6 col-sm-4">
                                    <small class="text-muted">Estado</small>
                                    <h6 id="job_status" style="color: green;">{{$jobCard->status}}</h6>

                                </div>

                                <div class="col-6 col-sm-4">
                                    <small class="text-muted">Data de Início</small>
                                    <h6>20-06-2021</h6>

                                </div>
                                <div class="col-6 col-sm-4">
                                    <small class="text-muted">Data de Fim</small>
                                    <h6>----</h6>

                                </div>

                                <div class="col-6 col-sm-4 pt-2">
                                    <small class="text-muted">Técnico Responsável</small>
                                    <h6>{{$jobCard->funcionario->name.' '.$jobCard->funcionario->surname}}</h6>

                                </div>
                                <div class="col-6 col-sm-4 pt-2">
                                    <small class="text-muted">Kilometragem do veículo</small>
                                    <h6>{{$jobCard->kilometragem}} km</h6>
                                </div>

                                <div class="col-4 pt-2">
                                    <small class="text-muted">Duração do Job Card</small>
                                    <h6>4 dias</h6>
                                </div>

                                <div class="col-12 pt-2">
                                    <small class="text-muted">Notas</small>
                                    <h6>{{$jobCard->notas}}</h6>

                                </div>
                            </div>
                        </div>

                        <div>
                            <h5>Carro em manutenção</h5>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-8 my-auto">
                                    <div class="row">
                                        <div class="col-6">
                                            <small class="text-muted">Matrícula</small>
                                            <h6><a href="#">{{$jobCard->car->matricula}}</a></h6>

                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Proprietário</small>
                                            <h6><a href="#">{{$jobCard->car->customer->name.' '.$jobCard->car->customer->surname}}</a></h6>
                                        </div>
                                        <div class="col-6 pt-2">
                                            <small class="text-muted">Marca</small>
                                            <h6>{{$jobCard->car->marca}}</h6>

                                        </div>
                                        <div class="col-6 pt-2">
                                            <small class="text-muted">Modelo</small>
                                            <h6>{{$jobCard->car->modelo}}</h6>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12 col-sm-8 col-md-4 float-right">
                                    <img class="mr-0" src="https://image-cdn.beforward.jp/large/201907/1354476/BG365224_0fea21.jpg" style="width: 100%;" alt="">
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
                                <h4 class="card-title">Resumo do Job Card</h4>
                                <div class="text-center pb-3" style="border-bottom: #ededed solid 1px;">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <i class="ri-arrow-down-line" style="color: green;font-size:large"></i>
                                            <p class="text-muted mb-2" style="color:green;">Receita</p>
                                            <h6 class="mb-0">32,312 MT</h6>
                                        </div>
                                        <div class="col-sm-6">
                                            <i class="ri-arrow-up-line" style="color: red;font-size:large"></i>

                                            <p class="text-muted mb-2">Despesas</p>
                                            <h6 class="mb-0">13,312 MT</h6>
                                        </div>
                                    </div>

                                </div>
                                <h4 class="card-title mt-3">Resumo Actividades</h4>
                                <div class="text-center">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <i class=" ri-record-circle-fill" style="color: #00000090;font-size:large"></i>
                                            <p class="text-muted mb-2" style="color:green;">Total</p>
                                            <h6 id="activity_count" class="mb-0">{{count($jobCard->actividades)}}</h6>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <i class="mdi mdi-progress-wrench" style="color: green;font-size:large"></i>

                                            <p class="text-muted mb-2">Em progresso</p>
                                            <h6 class="mb-0">0</h6>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-4">
                                            <i class="mdi-window-closed-variant" style="color: red;font-size:large"></i>

                                            <p class="text-muted mb-2">Concluídas</p>
                                            <h6 class="mb-0">0</h6>
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
                                    <h4 class="card-title">Actividades</h4>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="float-right pr-2 mb-2">
                                    <a href="javascript:void(0);" class="btn btn-success mb-2" data-toggle="modal" data-target=".create-modal"><i class="mdi mdi-plus mr-2"></i>Nova Actividade</a>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                                <select id="activity_id" class="form-control">
                                </select>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#geral" role="tab">
                                    <span class="d-block d-sm-none"><i class="ri-record-circle-fill"></i></span>
                                    <span class="d-none d-sm-block">Geral</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#consumiveis" role="tab">
                                    <span class="d-block d-sm-none"><i class="ri-tools-line"></i></span>
                                    <span class="d-none d-sm-block">Consumíveis</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#funcionarios" role="tab">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-account-group"></i></span>
                                    <span class="d-none d-sm-block">Funcionários</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#photos" role="tab">
                                    <span class="d-block d-sm-none"><i class="mdi mdi-toy-brick-search"></i></span>
                                    <span class="d-none d-sm-block">Imagens</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="geral" role="tabpanel">
                            @include('jobs.assets.show.activities.geral')

                            </div>
                            <div class="tab-pane " id="consumiveis" role="tabpanel">

                                @include('jobs.assets.show.activities.consumiveis')

                            </div>
                            <div class="tab-pane" id="funcionarios" role="tabpanel">
                                @include('jobs.assets.show.activities.funcionarios')

                            </div>
                            <div class="tab-pane" id="photos" role="tabpanel">
                                @include('jobs.assets.show.activities.photos')

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@include('jobs.customers.show.js')

@endsection