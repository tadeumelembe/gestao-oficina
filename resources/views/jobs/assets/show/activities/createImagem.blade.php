<div class="modal fade create-imagem-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-imagem-modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Nova Imagem</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="create-image-form" class="needs-validation" novalidate method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="matricula">Tipo</label>
                                <select class="form-control" required id="image-tipo" name="tipo" required>
                                    <option disabled selected>Selecione tipo</option>
                                    <option value="antes">Antes</option>
                                    <option value="depois">Depois</option>
                                </select>
                                <span class="text-danger" id="d-nome-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="funcionario_id">Funcionário</label>
                                <div class="input-group">
                                    <input type="file" name="file" id="image-file" class="form-control" placeholder="imagem">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button  onclick="uploadImage(this)" class="btn btn-secondary float-right">Submeter</button>
                <button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function uploadImage(e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //$('#create-image-form').on('submit', function(event) {
        //event.preventDefault();


        i_tipo = $('#image-tipo').val();
        i_file = $('#image-file').val();
        actividadeId = $('#activity_id').val();


        $.ajax({
            url: "/actividade/image/upload/"+actividadeId,
            type: "POST",
            data: {
                tipo: i_tipo,
                file: i_file,
            },
            success: function(response) {
                console.log(response);
                if (response) {

                    //AddRows(response.consumivel);
                    $('.create-imagem-modal').modal('toggle');

                }
            },
            error: function(response) {
               // $('#i_tipo-error').text(response.responseJSON.errors.c_name);
                //$('#i_file-error').text(response.responseJSON.errors.c_quantidade);
            }
        });
        //});
    }
</script>
