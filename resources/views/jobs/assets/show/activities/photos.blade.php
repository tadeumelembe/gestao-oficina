<div class="row my-3">
    <div class="col-12 col-sm-6 ">
        <div class="float-left pr-2 mb-2 page-title-box d-flex align-items-center">

        </div>
    </div>
    {{-- <div class="col-6">
        <div class="float-right pr-2 mb-2">
            <a href="javascript:void(0);" class="btn btn-success mb-2" data-toggle="modal" data-target=".create-imagem-modal"><i class="mdi mdi-plus mr-2"></i>Inserir Imagem</a>
        </div>
    </div> --}}
</div>
<div class="row" id="photos">
    <div class="col-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="product-1-tab" data-toggle="pill" href="#product-1" role="tab">
                <img id="afterPhoto" src="" alt="" class="img-fluid mx-auto d-block tab-img rounded">
            </a>
            <a class="nav-link" id="product-2-tab" data-toggle="pill" href="#product-2" role="tab">
                <img id="beforePhoto"  src="" alt="" class="img-fluid mx-auto d-block tab-img rounded">
            </a>
        </div>
    </div>
    <div class="col-md-8 col-9">
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="product-1" role="tabpanel">
                <div id="" class="product-img">
                    <img id="afterPhoto_zoom" src="" alt="" class="img-fluid mx-auto d-block" >
                </div>
            </div>
            <div class="tab-pane fade" id="product-2" role="tabpanel">
                <div class="product-img">
                    <img id="beforePhoto_zoom" src="" alt="" class="img-fluid mx-auto d-block">
                </div>
            </div>
        </div>

    </div>
</div>
