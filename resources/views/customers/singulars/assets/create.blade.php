<div id="modal_create" class="modal fade create-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
    aria-labelledby="create-modal" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 55%!important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Adicionar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="create-form" class="needs-validation" novalidate method="post"
                    action="{{ route('customers.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Primeiro nome" id="name" required>
                                    <span class="text-danger" id="name-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="surname">Apelido</label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                    placeholder="Último nome" required>
                                    <span class="text-danger" id="surname-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone-number">Telefone</label>
                                <input type="text" class="form-control input-mask" data-inputmask="'mask': '999999999'" name="phoneNumber" id="phoneNumber" placeholder="Número de Telefone" required>
                                    <span class="text-danger" id="phoneNumber-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control input-mask" data-inputmask="'alias': 'email'"
                                    inputmode="email" id="email" name="email" placeholder="Email">
                                    <span class="text-danger" id="email-error"></span>
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
