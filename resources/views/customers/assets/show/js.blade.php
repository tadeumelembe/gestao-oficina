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
<script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>

<script src="{{ asset('assets/js/app.js')}}"></script>


<script>
    $('#datatable-pr').DataTable({
        "pageLength": 3,
        "lengthChange": true,
        "lengthMenu": [
            [3, 5, 10, -1],
            [3, 5, 10, 'Todos']
        ]
    });
</script>

<script>
    $("#valor").keyup(function() {
        //var valor = $('#valor-concedido').val();

    });

    //form submit
    $("#create-submit").click(function() {

        $('#create-form').submit()
    });

    $("#edit-submit").click(function() {

        $('#edit-form').submit()
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
<script type="text/javascript">
    $(function() {
        var table = $('#jobCardDatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/customers/jobs/{{$customers->id}}",
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
                    "data": 'valor',
                    render: $.fn.dataTable.render.number(',', '.', 2, 'MT ')
                },
                {
                    data: 'status',
                    name: 'status'
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
    $(function() {
        var table = $('#carDatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/customers/cars/{{$customers->id}}",
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
                    data: 'acção',
                    name: 'acção',
                    orderable: true,
                    searchable: true
                },
            ]
        });

    });
</script>

<script>
    $('.counts-section').hide();
    $('.sums-section').hide();
    $(document).ready(function() {

        $.ajax({
            url: '/customers/counts/{{$customers->id}}',
            async: true
        }).done(function(data, status) {

            $('#jobs-running-count').html(data.data.jobs['emCurso']);
            $('#jobs-complete-count').html(data.data.jobs['fechado']);
            $('#cars-count').html(data.data.cars);
            $('.spinner-counts').hide();
            $('.counts-section').fadeIn(500);
        });

        $.ajax({
            url: '/customers/sums/{{$customers->id}}',
            async: true
        }).done(function(data, status) {

            let profit = Number(data.data.income) - Number(data.data.outcome);

            $('#income-sum').html((data.data.income).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');
            $('#outcome-sum').html((data.data.outcome).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');
            $('#profit-sum').html(profit.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,') + ' MT');
            $('.spinner-sums').hide();
            $('.sums-section').fadeIn(500);
        });
    });
</script>