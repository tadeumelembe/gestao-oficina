@extends('template.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Carro</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Inícios</a></li>
                            <li class="breadcrumb-item active">carro</li>
                            <li class="breadcrumb-item active">{{$car->matricula}}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body" style="display: inline">
                        <div class="row">
                            <div class="col-12 col-md-4 pb-2 float-right">
                                <img class="mr-0" src="{{asset('uploads/photo_car/'.$car->photo)}}" style="width: 100%;" alt="">
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12 col-md-6 pb-3">
                                        <small class="text-muted">Matrícula</small>
                                        <h6 style="text-transform: uppercase;">{{$car->matricula}}</h6>

                                    </div>
                                    <div class="col-12 col-md-6 pb-3">
                                        <small class="text-muted">Cliente</small>
                                        <h6><a href="#">{{$car->customer->name}} {{$car->customer->surname}}</a></h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <small class="text-muted">Marca</small>
                                        <h6>{{$car->marca}}</h6>

                                    </div>
                                    <div class="col-12 col-md-6">
                                        <small class="text-muted">Modelo</small>
                                        <h6>{{$car->modelo}} - {{$car->anoFabrico}}</h6>
                                    </div>

                                    <div class="col-12 col-md-6 mt-3">
                                        <small class="text-muted">Nome Proprietário</small>
                                        <h6>{{$car->proprietario_nome}}</h6>
                                    </div>

                                    <div class="col-12 col-md-6 mt-3">
                                        <small class="text-muted">Telefone do Proprietário</small>
                                        <h6>{{$car->proprietario_telefone}}</h6>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <small class="text-muted">BI do Proprietário</small>
                                        <h6>{{$car->proprietario_bi}}</h6>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <small class="text-muted">Email do Proprietário</small>
                                        <h6>{{$car->proprietario_email}}</h6>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->

        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <div class="row">
                            <div class="col-6">
                                <div class="float-left pr-2 pt-2 page-title-box d-flex align-items-center">

                                    <h4 class="card-title">Job Cards</h4>

                                </div>
                            </div>

                            <!--<div class="col-6">
                                <div class="float-right pr-2 mb-2">
                                    <a href="javascript:void(0);" class="btn btn-success mb-2" data-toggle="modal" data-target=".create-modal"><i class="mdi mdi-plus mr-2"></i>Nova Actividade</a>
                                </div>
                            </div>-->
                        </div>

                        <div class="table-responsive">
                            <table id="jobCardDatatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Refência</th>
                                        <th>Data Início</th>
                                        <th>Data Fim</th>
                                        <th>Valor Cobrado</th>
                                        <th>Actividades</th>
                                        <th>Estado</th>
                                        <th>Acção</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div> <!-- end col -->
        </div>
    </div>
</div>

@include('cars.assets.show.js')

@endsection
