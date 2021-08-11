<div class="row">
    <div class="col-lg-12">

        <div class="table-responsive mt-3">
            <table class="table table-centered datatable dt-responsive nowrap" id="tableConsumiveis" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="thead-light">
                    <tr>
                        <th style="width: 25%;">Nome</th>
                        <th style="width: 25%;">Quantidade</th>
                        <th style="width: 25%;">Custo</th>
                        <th style="width: 25%;">
                            <div>
                                <a href="javascript:void(0);" class="btn btn-success mb-2" data-toggle="modal" data-target=".create-consumivel-modal"><i class="mdi mdi-plus"></i>Add Consumível</a>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function consumivelDelete(element) {
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
                    url: `/consumivel/delete/${element}`,
                    type: "PUT",
                    success: function(response) {
                        console.log(response.success);
                        if (response) {

                            $("#tableConsumiveis tbody").empty();

                            $(response.consumiveis).each(function(index, elemento) {

                                $("#tableConsumiveis tbody").append(
                                    "<tr>" +
                                    "<td>" + elemento.name + "</td>" +
                                    "<td>" + elemento.quantidade + "</td>" +
                                    "<td>" + elemento.custo + "</td>" +
                                    "<td>" +
                                    "<a href='javascript:void(0);' class='mr-3 text-primary' data-toggle='tooltip' data-placement='top' title='' data-original-title='Edit'><i class='mdi mdi-pencil font-size-18'></i></a>" +
                                    "<a href='javascript:void(0);' class='text-danger' data-toggle='tooltip ' onclick='consumivelDelete(" + elemento.id + ")' dataId ='" + elemento.id + "' data-placement='top' title='' data-original-title='Delete'><i class='mdi mdi-trash-can font-size-18' ></i></a>" +
                                    "</td>" +
                                    "</tr>");

                            });
                            Swal.fire(
                                'Deleted!',
                                `${response.success}`,
                                'success'
                            )
                            location.reload()
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
