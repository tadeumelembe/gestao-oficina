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

var rota = $('#filter').value;

    $('#filter').on('change', function() {

        rota = $(this).value;
        // $("#jobCardDatatable").fnReloadAjax(rota);
    $("#jobCardDatatable").DataTable().ajax.reload(null,false);

});



    $(function() {
        var table = $('#jobCardDatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: rota,
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
            columns: [
                {
                    data: 'referencia',
                    name: 'referencia'
                },
                {
                    data: 'dataInicio',
                    name: 'dataInicio'
                },
                {
                    data: 'dataFim',
                    name: 'dataFim'
                },
                {
                    data: 'car',
                    name: 'car'
                },
                {
                    data: 'actividades',
                    name: 'actividades'
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
    $("#car_id").select2({
        ajax: {
            url: "{{route('getCars')}}",
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
    $("#funcionario_id").select2({
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

<script>
        $("#funcionarioId").select2({
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



<script>
    function itemDelete(element) {
        Swal.fire({
            title: 'Tem a certeza?',
            text: "Não será possível recuperar!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sim, apagar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/jobs/delete/${element}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "PUT",
                    success: function(response) {
                        console.log(response.success);
                        if (response) {
                            Swal.fire(
                                'Deleted!',
                                `${response.success}`,
                                'success'
                            )
                            $("#jobCardDatatable").DataTable().ajax.reload(null, false);

                        }
                    },
                    error: function(response) {
                        console.log('error')
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                        })
                    }
                });

            }
        })
    }
</script>
