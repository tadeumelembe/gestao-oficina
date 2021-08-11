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

<script src="{{ asset('assets/js/app.js')}}"></script>


<script type="text/javascript">
    $(function() {
        var table = $('#companyDatatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('customers.companies') }}",
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'phoneNumber',
                    name: 'phoneNumber'
                },
                {
                    data: 'email',
                    name: 'email'
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#createForm').on('submit', function(event) {
        event.preventDefault();
        $('#name-error').text('');
        $('#email-error').text('');
        $('#phoneNumber-error').text('');
        $('#surname-error').text('');

        name = $('#name').val();
        email = $('#email').val();
        phoneNumber = $('#phoneNumber').val();
        surname = $('#surname').val();
        nuit = $('#nuit').val();
        city = $('#city').val();
        neighborhood = $('#neighborhood').val();
        type = "Company";
        $.ajax({
            url: "/customers/create",
            type: "POST",
            data: {
                name: name,
                email: email,
                phoneNumber: phoneNumber,
                surname: surname,
                type: type,
                nuit: nuit,
                city:city,
                neighborhood:neighborhood
            },
            success: function(response) {
                console.log(response);
                if (response) {

                    $("#divSuccess").addClass("alert alert-success");
                    $("#divSuccess").html('<p id ="success-message"></p>');
                    $('#createModal').modal('toggle');
                    $("#companyDatatable").DataTable().ajax.reload(null, false);

                    $('#success-message').text(response.success);
                    $("#create-form")[0].reset();

                }
            },
            error: function(response) {
                console.log(response)
                $('#name-error').text(response.responseJSON.errors.name);
                $('#email-error').text(response.responseJSON.errors.email);
                $('#phoneNumber-error').text(response.responseJSON.errors.phoneNumber);
                $('#surname-error').text(response.responseJSON.errors.surname);
            }
        });
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
                    url: `/customers/delete/${element}`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: "PUT",
                    success: function(response) {
                        console.log(response.success);
                        if (response) {
                            $("#companyDatatable").DataTable().ajax.reload(null, false);
                            Swal.fire(
                                'Deleted!',
                                `${response.success}`,
                                'success'
                            )
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