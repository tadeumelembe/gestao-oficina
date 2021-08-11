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
                            <li class="breadcrumb-item active">abx 312 mp</li>
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
                                <img class="mr-0" src="https://image-cdn.beforward.jp/large/201907/1354476/BG365224_0fea21.jpg" style="width: 100%;" alt="">
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12 col-md-6 pb-3">
                                        <small class="text-muted">Matrícula</small>
                                        <h6>ABX 459 MP</h6>

                                    </div>
                                    <div class="col-12 col-md-6 pb-3">
                                        <small class="text-muted">Proprietário</small>
                                        <h6><a href="#">Elton José Cumbe</a></h6>
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <small class="text-muted">Marca</small>
                                        <h6>Toyota</h6>

                                    </div>
                                    <div class="col-12 col-md-6">
                                        <small class="text-muted">Modelo</small>
                                        <h6>Land Cruiser - 2006</h6>
                                    </div>

                                    <div class="col-12 mt-4">
                                        <h6 class="text-muted">Notas</h6>
                                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here'.</p>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div> <!-- end col -->

        </div>

        <!--<div class="row">
            <div class="col-4">
                <div class="card bg-success">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="mb-2 text-white" style="font-size:20px">3</p>
                            <h6 class="mb-0 text-white">Job Cards Realizados</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-danger">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="mb-2 text-white" style="font-size:20px">6</p>
                            <h6 class="mb-0 text-white">Actividades Realizadas</h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-primary">
                    <div class="card-body">
                        <div class="text-center">
                            <p class="mb-2 text-white" style="font-size:20px">9</p>
                            <h6 class="mb-0 text-white">Funcionários</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

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
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Data Início</th>
                                        <th>Data Fim</th>
                                        <th>Estado</th>
                                        <th>Responsável</th>
                                        <th>Actividades</th>
                                        <th>Acção</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>20-06-2021</td>
                                        <td>-</td>
                                        <td>
                                            <h6 style="color: green;">Aberto</h6>
                                        </td>
                                        <td>Joaquim Jaime</td>
                                        <td>3</td>
                                        <td>
                                            <div class='mt-sm-0'>
                                                <a href='javascript:void(0)' class='btn btn-secondary'>
                                                    Ver
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
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
@include('cars.assets.show.createPrestacao')

@endsection