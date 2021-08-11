<div class="card-body d-none">
    <div class="row mb-2">
        <div class="col-12">
            <div class="float-right" style="display: inline;">
                <form method="POST" action="" style="display: inline;">
                    <input type="hidden" name="document-name" value="">
                    <button type="submit" class="btn btn-danger">Remover</button>
                </form>
                <button class="btn btn-success" style="display: inline;">Actualizar</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <embed allowfullscreen webkitallowfullscreen src="" scrolling="auto" height="700px" width="100%"></embed>
        </div>
    </div>
</div>
<div class="card-body">
    <div class="row mb-2">
        @if($jobCard->cotacao)
        <div class="col-12 col-md-6 col-lg-6 my-2">
            <div class="dropdown">
                <button class="btn btn-outline-secondary flex-row btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="row">
                        <div class="col-2">
                            <i class="far fa-file-pdf" style="font-size:33px;display:inline"></i>
                        </div>
                        <div class="col-6 pl-3">
                            <span style="margin-top:-33px">Cotação</span>
                        </div>

                        <div class="col-4">
                            <i class="mdi mdi-arrow-down-drop-circle-outline " style="font-size:25px;"></i>
                        </div>
                    </div>

                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="border:#00000030 solid 1px">
                    <a class="dropdown-item" target="blank" href="{{ url($jobCard->cotacao) }}">Abrir</a>
                    <a class="dropdown-item" id="remove-cotacao" onclick="documentDelete('cotacao')"  href="javascript:void(0)">Apagar</a>
                </div>
            </div>
        </div>
        @endif

        @if($jobCard->fatura)
        <div class="col-12 col-md-6 col-lg-6 my-2">
            <div class="dropdown">
                <button class="btn btn-outline-secondary flex-row btn-lg dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="row">
                        <div class="col-2">
                            <i class="far fa-file-pdf" style="font-size:33px;display:inline"></i>
                        </div>
                        <div class="col-6 pl-3">
                            <span style="margin-top:-33px">Fatura</span>
                        </div>

                        <div class="col-4">
                            <i class="mdi mdi-arrow-down-drop-circle-outline " style="font-size:25px;"></i>
                        </div>
                    </div>

                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="border:#00000030 solid 1px">
                    <a class="dropdown-item" target="blank" href="{{ url($jobCard->fatura) }}">Abrir</a>
                    <a class="dropdown-item" id="remove-fatura" onclick="documentDelete('fatura')" href="javascript:void(0)">Apagar</a>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

<script>
    function documentDelete(element) {
        Swal.fire({
            title: 'Tem a certeza?',
            text: "Não será possível recuperar depois!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Sim, apagar!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url: `/jobs/file/remove/{{$jobCard->id}}`,
                    type: "POST",
                    data: {
                        tipo: element
                    },
                    success: function(response) {
                        if (response) {
                            location.reload()
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