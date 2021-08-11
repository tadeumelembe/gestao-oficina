<div class="modal fade create-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-modal" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 55%!important">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Novo Job Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form class="needs-validation" novalidate method="post" action="{{url('createCustomers')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Carro</label>
                                <select class="form-control select2" required id="carro" name="carro">
                                    <option>Elton - 820896638</option>
                                    <option>Tadeu - 820896638</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="surname">Funcionário Responsável</label>
                                <select class="form-control select2" required id="carro" name="carro">

                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Kilometragem</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-group-prepend">
                                        <span class="input-group-text">Km</span>
                                    </span>
                                    <input type="number" class="form-control" id="kilometragem" name="kilometragem" placeholder="Kilometragem do Carro" required>
                                </div>

                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="birthdate">Valor Cobrado</label>
                                <div class="input-group">
                                    <span class="input-group-addon input-group-prepend">
                                        <span class="input-group-text">MT</span>
                                    </span>
                                    <input type="number" class="form-control" id="valor" name="valor" placeholder="Valor cobrado para manutenção" required>
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
                                <textarea class="form-control" name="notas" id="notas" cols="30" rows="10"></textarea>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
