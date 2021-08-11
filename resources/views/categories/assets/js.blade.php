@include('template.js')



<!-- jquery.vectormap map -->
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

<!-- Required datatable js -->
<script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>

<script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

<script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>


<!-- Responsive examples -->
<script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<script src="{{ asset('assets/js/pages/datatables.init.js')}}"></script>

<!-- form mask -->
<script src="{{ asset('assets/libs/inputmask/jquery.inputmask.min.js')}}"></script>

<!-- form mask init -->
<script src="{{ asset('assets/js/pages/form-mask.init.js')}}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>

<script src="{{ asset('assets/js/app.js')}}"></script>

<script type="text/javascript">
    $(function() {
        var table = $('#carDatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('cars') }}",
            oLanguage: {
                "sEmptyTable": "Não foi encontrado nenhum registo",
                "sLengthMenu": "Mostrar _MENU_ registos",
                "sZeroRecords": "Não foram encontrados resultados",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registos",
                "sInfoEmpty": "Mostrando de 0 até 0 de 0 registos",
                "sInfoFiltered": "(filtrado de _MAX_ registos no total)",
                "sInfoPostFix": "",
                "sSearch": "Procurar:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Primeiro",
                    "sPrevious": "Anterior",
                    "sNext": "Seguinte",
                    "sLast": "Último"
                },
                "oAria": {
                    "sSortAscending": ": Ordenar colunas de forma ascendente",
                    "sSortDescending": ": Ordenar colunas de forma descendente"
                }
            },
            columns: [{
                    data: 'matricula',
                    name: 'matricula'
                },
                {
                    data: 'marca',
                    name: 'marca'
                },
                {
                    data: 'modelo',
                    name: 'modelo'

                },
                {
                    data: 'anoFabrico',
                    name: 'anoFabrico'

                },
                {
                    data: 'proprietario',
                    name: 'proprietario'
                },

                {
                    data: 'acção',
                    name: 'acção',
                    orderable: true,
                    searchable: true
                },
            ]
        });

    });
</script>
<script type="text/javascript">
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    $("#proprietario").select2({
        ajax: {
            url: "{{route('getCustomers')}}",
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


<script>
    $(document).ready(function() {
        var min = new Date().getFullYear(),
        max = min - 35,
        select = document.getElementById('anoFabrico');
    for (var i = min; i >= max; i--) {
        var opt = document.createElement('option');
        opt.value = i;
        opt.innerHTML = i;
        select.appendChild(opt);
    }
        $.getJSON("{{ asset('assets/js/car-brands.json')}}", function(data) {
            console.log(data);
            var carBrand = '<option>Selecione a marca</option>';
            data.forEach(element => {
                carBrand += '<option value=' + element.name + '>' + element.name + '</option>';
            });
            $('#marca').html(carBrand);
            //$('#marca').html(carBrand);

        }).fail(function() {
            console.log("An error has occurred.");
        });
    });
</script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#create_form').on('submit', function(event) {

        event.preventDefault();
        $('#matricula-error').text('');
        $('#marca-error').text('');
        $('#modelo-error').text('');
        $('#anoFabrico-error').text('');
        $('#proprietario-error').text('');
        $('#notas-error').text('');
        $('#tipo-error').text('');
        $('#combustivel-error').text('');


        matricula = $('#matricula').val();
        marca = $('#marca').val();
        modelo = $('#modelo').val();
        anoFabrico = $('#anoFabrico').val();
        proprietario = $('#proprietario').val();
        notas = $('#notas').val();
        tipo = $('#tipo').val();
        combustivel = $('#combustivel').val();

        //  alert(combustivel);

        $.ajax({
            url: "/cars/create",
            type: "POST",
            data: {
                matricula: matricula,
                marca: marca,
                modelo: modelo,
                anoFabrico: anoFabrico,
                notas: notas,
                proprietario: proprietario,
                tipo: tipo,
                combustivel: combustivel
            },
            success: function(response) {
                console.log(response);
                if (response) {

                    $("#divSuccess").addClass("alert alert-success");
                    $("#divSuccess").html('<p id ="success-message"></p>');
                    $('.create-modal').modal('toggle');
                    $("#carDatatable").DataTable().ajax.reload(null, false);

                    $('#success-message').text(response.success);
                    $("#create_form")[0].reset();

                }
            },
            error: function(response) {
                console.log(response);
                $('#matricula-error').text(response.responseJSON.errors.matricula);
                $('#marca-error').text(response.responseJSON.errors.marca);
                $('#modelo-error').text(response.responseJSON.errors.modelo);
                $('#anoFabrico-error').text(response.responseJSON.errors.anoFabrico);
                $('#proprietario-error').text(response.responseJSON.errors.proprietario);
                $('#tipo-error').text(response.responseJSON.errors.tipo);
                $('#combustivel-error').text(response.responseJSON.errors.combustivel);
            }
        });
    });
</script>