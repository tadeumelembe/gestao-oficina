@extends('template.app')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">

                <form id="create-form" class="needs-validation" novalidate method="post" action="{{route('jobs.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Carro</label>
                                <select class="form-control select2" required id="car_id" name="car_id">
                                    <option selected value="{{$jobCard->car->id}}">{{$jobCard->car->matricula}}</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="surname">Funcionário Responsável</label>
                                <select class="form-control select2" required id="funcionario_id" name="funcionario_id">
                                    <option selected value="{{$jobCard->funcionario->id}}">{{$jobCard->funcionario->name.' '.$jobCard->funcionario->surname}}</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-6">
                            <div class="form-group">
                                <label for="surname">Kit Number</label>
                                <input type="text" class="form-control" id="kitNumber" name="kitNumber" value="" placeholder="Kit NUmber" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Valor Cobrado</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-group-prepend">
                                        <span class="input-group-text">MT</span>
                                    </span>
                                    <input type="number" class="form-control" id="valor" name="valor" value="{{$jobCard->valor}}" placeholder="Valor cobrado" required>
                                    <input type="hidden"  name="jobCard_id" value="{{$jobCard->id}}" >
                                </div>


                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Kilometragem</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-group-prepend">
                                        <span class="input-group-text">Km</span>
                                    </span>
                                    <input type="number" class="form-control" id="kilometragem" name="kilometragem" value="{{$jobCard->kilometragem}}" placeholder="Kilometragem do Carro" required>
                                </div>

                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="gender">Notas (Opcional)</label>
                                <textarea class="form-control" name="notas" id="notas" cols="30" rows="10">{{$jobCard->notas}}</textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-secondary float-right">Submeter</button>
                        <button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@include('jobs.assets.js')

@endsection
