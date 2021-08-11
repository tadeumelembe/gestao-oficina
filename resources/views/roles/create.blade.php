<div class="modal fade create-modal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="create-modal">Adicionar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="create-form" method ="post" action ="{{route('roles.store')}}" class="needs-validation" novalidate method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="contact-name">
                                <label for="r-roleName">Nome</label>
                                <input type="text" id="r-roleName" name="name" class="form-control" placeholder="Nome">
                                <span class="validation-text"></span>
                            </div>
                        </div>
                    </div>
                    <label class="mb-2" for="r-roleName">Permissões</label>
                    <div class="row mx-auto" style="max-height: 400px;overflow-y: scroll;">

                        <br />
                        @foreach($permission as $value)
                        <div class="col-md-4 mb-3">
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br />
                        </div>
                        @endforeach
                    </div>
                      <div class="modal-footer">
                <button id="create-submit" class="btn btn-secondary float-right">Submeter</button>
                <button data-dismiss="modal" class="btn btn-danger">Cancelar</button>
            </div>

                </form>
            </div>
          
        </div>
    </div>
</div>