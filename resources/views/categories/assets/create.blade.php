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
                <form id="create_form"  class="needs-validation" novalidate method="post" action="{{route('cars.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="matricula">Nome</label>
                                <input type="text" class="form-control input-mask" id="matricula" name="matricula" placeholder="Nome da Categoria" required >
                                <span class="text-danger" id="matricula-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modelo">Descrição</label>
                                <input type="text" class="form-control input-mask" id="matricula" name="descrição" placeholder="Descrição da Categoria" required>

                                <span class="text-danger" id="marca-error"></span>
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
