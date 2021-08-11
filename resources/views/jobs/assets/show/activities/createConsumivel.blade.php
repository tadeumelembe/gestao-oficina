<div class="modal fade create-consumivel-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-consumivel-modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Nova Consumível</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="createConsumivel" class="needs-validation" novalidate method="post" action="{{url('parentes/create')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="valor">Nome</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="name" id="c_name" class="form-control" placeholder="Farol, óleo, etc">
                                    <span class="text-danger" id="c_name-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="valor">Quantidade</label>
                                <div class="input-group mb-3">
                                    <input type="text" name="quantidade" id="c_quantidade" class="form-control" placeholder="3l, 3kg, 3 un, etc">
                                    <span class="text-danger" id="c_quantidade-error"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="valor">Custo</label>
                                <div class="input-group mb-3">
                                    <input type="number" name="valor" id="c_valor" class="form-control" placeholder="Valor">
                                    <span class="text-danger" id="c_valor-error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button id="create-parente" class="btn btn-secondary float-right">Submeter</button>
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

    $('#createConsumivel').on('submit', function(event){
        event.preventDefault();
        $('#c_name-error').text('');
        $('#c_quantidade-error').text('');
        $('#c_valor-error').text('');

        c_name = $('#c_name').val();
        c_quantidade = $('#c_quantidade').val();
        c_valor = $('#c_valor').val();
        actividadeId = $('#activity_id').val();


        $.ajax({
          url: "/consumivel/store",
          type: "POST",
          data:{
            c_name:c_name,
            c_quantidade:c_quantidade,
            c_valor:c_valor,
            actividadeId:actividadeId
          },
          success:function(response){
            console.log(response);
            if (response) {

                AddRows(response.consumivel);
                $('#ac_consumiveis').empty();

                $('#ac_consumiveis').html((response.consumiveis).length);
                $('#ac_custo').html(response.actividade.preco+'MT');
                $('.create-consumivel-modal').modal('toggle');
                // alert((response.consumiveis).length);

            }
          },
          error: function(response) {
              $('#c_name-error').text(response.responseJSON.errors.c_name);
              $('#c_quantidade-error').text(response.responseJSON.errors.c_quantidade);
              $('#c_valor-error').text(response.responseJSON.errors.c_valor);
          }
         });
        });
      </script>
