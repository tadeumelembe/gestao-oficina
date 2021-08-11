<div class="modal fade create-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-modal" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 55%!important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Adicionar Carros</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="create_form" class="needs-validation" novalidate method="post" action="{{route('cars.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="matricula">Matricula</label>
                                <input type="text" class="form-control input-mask" id="matricula" name="matricula" placeholder="ABX 123 MC" required data-inputmask="'mask': 'aaa 999 aa'">
                                <span class="text-danger" id="matricula-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modelo">Marca</label>
                                <select class="form-control select2" required id="marca" name="marca">

                                </select>
                                <span class="text-danger" id="marca-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modelo">Modelo</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Vitz, Land cruiser, etc" required>
                                <span class="text-danger" id="modelo-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ano-fabrico">Ano de Fabríco</label>
                                <select class="form-control" id="anoFabrico" name="anoFabrico" required>
                                    <option disabled selected>Selecione ano</option>
                                </select>
                                <span class="text-danger" id="anoFabrico-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ano-fabrico">Tipo</label>
                                <select class="form-control" id="tipo" name="tipo" required>
                                    <option disabled selected>Selecione tipo</option>
                                    <option value="Ligeiro">Ligeiro</option>
                                    <option value="Pesado">Pesado</option>
                                </select>
                                <span class="text-danger" id="tipo-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ano-fabrico">Combustivél</label>
                                <select class="form-control" id="combustivel" required name="combustivel">
                                    <option disabled selected>Selecione tipo</option>
                                    <option value="Diesel">Diesel</option>
                                    <option value="Galosina">Galosina</option>
                                    <option value="Gás">Gás</option>
                                    <option value="Electrico">Electrico</option>
                                </select>
                                <span class="text-danger" id="combustivel-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="proprietario">Cliente</label>
                                <select class="form-control select2" required id="proprietario" name="proprietario">
                                </select>
                                <span class="text-danger" id="proprietario-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="ano-fabrico">Foto (Opcional)</label>
                                <input type="file" class="form-control" id="photo_car" name="photo_car" placeholder="">
                                <span class="text-danger" id="photo_car-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modelo">Nome Propriteário</label>
                                <input type="text" class="form-control" id="proprietario_nome" name="proprietario_nome" placeholder="Nome do Proprietário" required>
                                <span class="text-danger" id="modelo-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modelo">BI Proprietário</label>
                                <input type="text" class="form-control" id="proprietario_bi" name="proprietario_bi" placeholder="BI do Proprietário" required>
                                <span class="text-danger" id="modelo-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modelo">Telefone Proprietário</label>
                                <input type="text" class="form-control" id="proprietario_telefone" name="proprietario_telefone" placeholder="Telefone do  Proprietário" required>
                                <span class="text-danger" id="modelo-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modelo">Email Proprietário</label>
                                <input type="text" class="form-control" id="proprietario_email" name="proprietario_email" placeholder="Email do Proprietário" required>
                                <span class="text-danger" id="modelo-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="create-submit" type="submit" class="btn btn-secondary float-right">Submeter</button>
                        <button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
