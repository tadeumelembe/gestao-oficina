@include('template.js')
<!-- jquery.vectormap map -->
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{ asset('assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-us-merc-en.js')}}"></script>

<script src="{{ asset('assets/libs/dropzone/min/dropzone.min.js')}}"></script>

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

<script>$("#valor").keyup(function() {
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


