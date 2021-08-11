<div class="modal fade create-modal" id="activityModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Nova actividade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="createForm"  method="post" >
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="modelo">Área</label>
                                <select class="form-control " required id="a_area">
                                        <option selected disabled value=""></option>
                                        <option value="Mecanica Geral">Mecanica Geral</option>
                                        <option value="Bate chapa & Pintura">Bate chapa</option>
                                        <option value="Electrica">Pintura</option>
                                </select>
                                <span class="text-danger" id="a_area-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="matricula">Nome</label>
                                <input type="text" class="form-control" id="a_nome" >
                                <span class="text-danger" id="a_nome-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="matricula">Descrição(Opcional)</label>
                                <textarea class="form-control" id="a_descricao" id="" cols="30" rows="1"></textarea>
                                <span class="text-danger" id="a_descricao-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="matricula">Custo</label>
                                <input type="number" class="form-control" id="a_preco" >
                                <span class="text-danger" id="a_preco-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="matricula">Data de inico</label>
                                <input type="date" class="form-control" id="a_dataInicio" >
                                <span class="text-danger" id="a_dataInicio-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="matricula">Data da final</label>
                                <input type="date" class="form-control" id="a_dataFim" >
                                <span class="text-danger" id="a_dataFim-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="proprietario">Funcionário responsavel</label>
                                <select class="form-control select2" required id="funcionarioId" >
                                </select>
                                <span class="text-danger" id="funcionarioId-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="modal-footer">
                        <button id="create-submit" type="submit" class="btn btn-secondary float-right">Submeter</button>
                        <button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createForm').on('submit', function(event){
        event.preventDefault();
        $('#a_area-error').text('');
        $('#a_nome-error').text('');
        $('#a_dataInicio-error').text('');
        $('#a_dataFim-error').text('');
        $('#a_preco-error').text('');

        a_area = $('#a_area').val();
        a_preco = $('#a_preco').val();
        a_nome = $('#a_nome').val();
        a_descricao = $('#a_descricao').val();
        a_dataInicio = $('#a_dataInicio').val();
        a_dataFim = $('#a_dataFim').val();
        jobId = {{$jobCard->id}};
        $.ajax({
          url: "/jobs/addActividade",
          type: "POST",
          data:{
            a_area:a_area,
            a_nome:a_nome,
            a_descricao:a_descricao,
            a_dataInicio:a_dataInicio,
            a_dataFim:a_dataFim,
            jobId:jobId,
            a_preco:a_preco
          },
          success:function(response){
            console.log(response);
            if (response) {

                // $("#divSuccess").addClass("alert alert-success");
                // $("#divSuccess").html('<p id ="success-message"></p>');

                // $("#companyDatatable").DataTable().ajax.reload(null, false );
                 $('#activity_count').empty();
                $('#activity_count').html(response.actividadesNo);

                $('#activityModal').modal('toggle');

                getActivity();

            }
          },
          error: function(response) {
              $('#a_area-error').text(response.responseJSON.errors.name);
              $('#a_preco-error').text(response.responseJSON.errors.email);
              $('#a_dataInicio-error').text(response.responseJSON.errors.phoneNumber);
              $('#a_dataFim-error').text(response.responseJSON.errors.surname);
          }
         });
        });
      </script>

      <script>
          function getActivity(){
           var activity = $('#activity_id');
           var activitys = activity.html();


            $.ajax({
          url: "/jobs/getActivity/"+{{$jobCard->id}},
          type: "get",
          success:function(response){
            activity.empty();
            $(response.data).each(function(index, element) {

        activitys +='<option value="'+element.id+'" >'+element.nome+'</option>';

        });

        activity.html(activitys);

          },
          error: function(response) {
            console.log(response);
          }
         });
          }

          $( document ).ready(function() {
            getActivity();
            });
      </script>

    <script>
    $('#activity_id').on('change', function() {



    $(this).value;



    });
    </script>
