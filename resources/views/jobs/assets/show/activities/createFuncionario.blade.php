<div class="modal fade create-funcionario-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-funcionario-modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Alocar funcionário</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="createFuncionario">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="funcionario_id">Funcionário</label>
                                <select class="form-control select2" required id="funcionario_idADD" name="funcionario_idADD">
                                    <option selected disabled>Selecione um funcionário</option>
                                    @forelse ($funcionarios as $funcionario)

                                    <option value="{{$funcionario->id}}">{{$funcionario->name.' '.$funcionario->surname}}</option>

                                    @empty
                                    <option>Sem funcionários</option>
                                    @endforelse
                                </select>
                                <span class="text-danger" id="funcionario_idADD-error"></span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="funcionario_id">Tarefa</label>
                                <input type="text" class="form-control" id="tarefa">
                                <span class="text-danger" id="tarefa-error"></span>
                            </div>
                        </div>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary float-right">Submeter</button>
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

    $('#createFuncionario').on('submit', function(event) {
        event.preventDefault();

        $('#funcionario_idADD-error').text('');
        $('#tarefa-error').text('');

        funcionario_id = $('#funcionario_idADD').val();
        tarefa = $('#tarefa').val();

        var activity = $('#activity_id').val();
        console.log(activity)

        $.ajax({
            url: "/actividade/addFuncionario",
            type: "POST",
            data: {
                funcionario_id: funcionario_id,
                actividade_id: activity,
                tarefa: tarefa
            },
            success: function(response) {
                console.log(response);
                if (response) {


                    $('.create-funcionario-modal').modal('toggle');

                    AddFuncRows(response.funcionario)
                }
            },
            error: function(response) {
                console.log(response)

                $('#funcionario_idADD-error').text(response.responseJSON.errors.funcionario_id);
                $('#tarefa-error').text(response.responseJSON.errors.tarefa);
            }
        });
    });
</script>