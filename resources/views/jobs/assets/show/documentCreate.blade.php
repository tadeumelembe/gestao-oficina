<div class="modal fade document-create-modal" id="activityModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Nova actividade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="createDocForm" enctype="multipart/form-data" action="/jobs/file/upload/{{$jobCard->id}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="matricula">Tipo de Documento</label>
                                <select class="form-control" required id="tipo" name="tipo" required>
                                    <option disabled selected value="">Selecione tipo</option>
                                    <option value="Cotacao">Cotação</option>
                                    <option value="Fatura">Fatura</option>
                                </select>
                                <span class="text-danger" id="d-nome-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="matricula">Ficheiro</label>
                                <input type="file" required name="d-file" class="form-control" id="d-file">
                                <span class="text-danger" id="d-nome-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button id="create-submit-doc" type="submit" class="btn btn-secondary float-right">Submeter</button>
                        <button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
