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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="modelo">Área</label>
                                <select class="form-control " required id="a_area">
                                        <option selected disabled value=""></option>
                                        <option value="Mecanica Geral">Mecanica Geral</option>
                                        <option value="Bate chapa">Bate chapa</option>
                                        <option value="Pintura">Pintura</option>
                                </select>
                                <span class="text-danger" id="a_area-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="matricula">Nome</label>
                                <input type="text" class="form-control" id="a_nome" >
                                <span class="text-danger" id="a_nome-error"></span>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="matricula">Descrição(Opcional)</label>
                                <textarea class="form-control" id="a_descricao" id="" cols="60" rows="4"></textarea>
                                <span class="text-danger" id="a_descricao-error"></span>
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

<div class="modal fade create-modal" id="StartactivityModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="create-modal" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titleAct"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-4">
                <form id="formStartactive"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="matricula">Foto (Opcional)</label>
                                <input type="file" class="form-control" id="photo_car_actividade" name="photo_car_actividade">
                                <span class="text-danger" id="photo_car_actividade-error"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button  type="submit" class="btn btn-secondary float-right">Submeter</button>
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

        var activity = $('#activity_id');
        $("#activity_id option[value='X']").remove();
        var activitys = activity.html();

        $.ajax({
          url: "/actividade/store",
          type: "POST",
          data:{
            a_area:a_area,
            a_nome:a_nome,
            a_descricao:a_descricao,
            jobId:jobId
          },
          success:function(response){
            console.log(response);
            if (response) {

                 $('#activity_count').empty();
                $('#activity_count').html(response.actividadesNo);

                $('#activityModal').modal('toggle');
                activity.empty();
                activitys +='<option value="'+response.actividade.id+'" >'+response.actividade.nome+'</option>';
                activity.html(activitys);
            }
          },
          error: function(response) {
              $('#a_area-error').text(response.responseJSON.errors.a_area);
              $('#a_preco-error').text(response.responseJSON.errors.a_preco);
              $('#a_dataInicio-error').text(response.responseJSON.errors.a_dataInicio);
              $('#a_dataFim-error').text(response.responseJSON.errors.a_dataFim);
              $('#a_nome-error').text(response.responseJSON.errors.a_nome);
          }
         });
        });
      </script>

    <script>
    $('#activity_id').on('change', function() {

    var Actividade_id = $(this).val();

        var ac_funcionarios = $('#ac_funcionarios');
         var ac_consumiveis = $('#ac_consumiveis');
         var ac_dataFim = $('#ac_dataFim');
         var ac_dataInicio = $('#ac_dataInicio');
          var ac_estado = $('#ac_estado');


          $.ajax({
          url: "/actividade/getActivity/"+Actividade_id,
          type: "get",
          success:function(response){

            getStatus(response.actividade)

            console.log(response.actividade);

            ac_funcionarios.empty();
            ac_consumiveis.empty();
            ac_dataFim.empty();
            ac_dataInicio.empty();
            ac_estado.empty();
            $('#ac_custo').html(response.actividade.preco+'MT');
            ac_dataFim.html(response.actividade.dataFim);
            ac_dataInicio.html(response.actividade.dataInicio);
            ac_estado.html(response.actividade.status);
            ac_consumiveis.html((response.consumiveis).length);

            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host ;
            console.log("base url:::: "+baseUrl);
            $("#afterPhoto").attr("src",baseUrl+'/uploads/actividades/'+response.actividade.depoisPhoto);
            $("#afterPhoto_zoom").attr("src",baseUrl+'/uploads/actividades/'+response.actividade.depoisPhoto);
            $("#beforePhoto").attr("src",baseUrl+'/uploads/actividades/'+response.actividade.antesPhoto);
            $("#beforePhoto_zoom").attr("src",baseUrl+'/uploads/actividades/'+response.actividade.antesPhoto);

            $("#tableConsumiveis tbody").empty();
            $(response.consumiveis).each(function(index, element) {

                AddRows(element);

                 });

                 $("#tableFuncionarios tbody").empty();
            $(response.funcionarios).each(function(index, element) {

                AddFuncRows(element);

                 });


          },
          error: function(response) {
            console.log(response);
          }
         });
    });

    function AddRows(cons){
    $("#tableConsumiveis tbody").append(
        "<tr>"+
        "<td>"+cons.name+"</td>"+
        "<td>"+cons.quantidade+"</td>"+
        "<td>"+cons.custo+"</td>"+
        "<td>"+
         "<a href='javascript:void(0);' class='mr-3 text-primary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit'><i class='mdi mdi-pencil font-size-18'></i></a>"+
         "<a href='javascript:void(0);' class='text-danger' data-toggle='tooltip ' onclick='consumivelDelete("+cons.id+")' dataId ='"+cons.id+"' data-placement='top' title='' data-original-title='Delete'><i class='mdi mdi-trash-can font-size-18' ></i></a>"+
        "</td>"+
        "</tr>");
        };

 function AddFuncRows(cons){
    $("#tableFuncionarios tbody").append(
        "<tr>"+
        "<td>"+cons.name+" "+cons.surname+"</td>"+
        "<td>"+cons.tarefa+"</td>"+
        "<td>"+
         "<a href='javascript:void(0);' class='mr-3 text-primary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit'><i class='mdi mdi-pencil font-size-18'></i></a>"+
         "<a href='javascript:void(0);' class='text-danger' data-toggle='tooltip' data-placement='top' title='' data-original-title='Delete'><i class='mdi mdi-trash-can font-size-18'></i></a>"+
        "</td>"+
        "</tr>");
        };

  //   $( document ).ready(function() {
        //     getActivity();
        //     });

        function getStatus(element){

           $('#btn_status').empty();
            var btn = '';
            if(element.status=="Pendente"){
                btn += '<a href="javascript:void(0);" msg="Iniciar Actividade" id="btn_status" status="Em Progresso" class="btn btn-success btn-sm"><i class="mdi mdi-play"></i>Iniciar</a>';
            }

            if(element.status=="Em curso"){
                btn += '<a href="javascript:void(0);" msg="Fechar Actividade" id="btn_status" status="Fechado" class="btn btn-danger btn-sm"><i class="mdi mdi-stop"></i>Fechar</a>';
            }
            $('#btn_status').html(btn);

        }

        $( "#btn_status" ).click(function() {

            $('#titleAct').html($( "#btn_status" ).attr("msg"));
            $('#StartactivityModal').modal('show');


        });

    </script>


<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#formStartactive').on('submit', function(event) {
        event.preventDefault();

        var ac_funcionarios = $('#ac_funcionarios');
         var ac_consumiveis = $('#ac_consumiveis');
         var ac_dataFim = $('#ac_dataFim');
         var ac_dataInicio = $('#ac_dataInicio');
          var ac_estado = $('#ac_estado');
          Actividade_id = $('#activity_id').val();

          var fdata = new FormData();
        // alert(fd);
        var files = $('#photo_car_actividade')[0].files;
        fdata.append('photo_car_actividade',files[0]);
        fdata.append('Actividade_id',Actividade_id);
            $.ajax({
             url: "/actividade/changeStatus",
            type: "Post",
            data: fdata,
            contentType: false,
            processData: false,
            success:function(response){
            // alert((response.consumiveis).length);

            console.log(response.actividade);
            $('#StartactivityModal').modal('toggle');
            ac_funcionarios.empty();
            ac_consumiveis.empty();
            ac_dataFim.empty();
            ac_dataInicio.empty();
            ac_estado.empty();

            document.getElementById("photo_car_actividade").value = "";
            // ac_funcionarios.html(response.actividade.atributo);
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host ;
            $("#afterPhoto").attr("src",baseUrl+'/uploads/actividades/'+response.actividade.depoisPhoto);
            $("#afterPhoto_zoom").attr("src",baseUrl+'/uploads/actividades/'+response.actividade.depoisPhoto);
            $("#beforePhoto").attr("src",baseUrl+'/uploads/actividades/'+response.actividade.antesPhoto);
            $("#beforePhoto_zoom").attr("src",baseUrl+'/uploads/actividades/'+response.actividade.antesPhoto);

            ac_dataFim.html(response.actividade.dataFim);
            getStatus(response.actividade)
            ac_dataInicio.html(response.actividade.dataInicio);
            ac_estado.html(response.actividade.status);
            ac_consumiveis.html((response.contagem).length);

            $("#tableConsumiveis tbody").empty();
            $(response.consumiveis).each(function(index, element) {

                AddRows(element);

                 });
          },
          error: function(response) {
            console.log(response);
          }
         });
    });
</script>

<script>
    $("#funcionario_idADD").select2({
    ajax: {
        url: "{{route('getEmployees')}}",
        type: "post",
        dataType: 'json',
        delay: 250,
        data: function(params) {
            return {
                _token: CSRF_TOKEN,
                search: params.term // search term
            };
        },
        processResults: function(response) {
            return {
                results: response
            };
        },
        formatNoMatches: function() {
            return "Pesquisa não encontrada";
        },
        formatInputTooShort: function(input, min) {
            return "Digite " + (min - input.length) + " caracteres para pesquisar";
        },
        formatSelectionTooBig: function(limit) {
            return "Seleciona apenas uma opção " + limit + " item" + (limit == 1 ? "" : "s");
        },
        formatLoadMore: function(pageNumber) {
            return "Carregando mais dados...";
        },
        formatSearching: function() {
            return "Pesquisando...";
        },
        cache: true
    }
});
</script>
