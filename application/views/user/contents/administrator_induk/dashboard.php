        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <!-- <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div> -->
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-7">
                            <div class="card-body">
                                <h3 class="card-title text-white">Pegawai</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?= $jml_pegawai ?></h2>
                                    <p class="text-white mb-0">Orang</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-users"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-2">
                            <div class="card-body">
                                <h3 class="card-title text-white">Administrator</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?= $jml_admin ?></h2>
                                    <p class="text-white mb-0">Orang</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-gear"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-3">
                            <div class="card-body">
                                <h3 class="card-title text-white">Approval Committee</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"> <?= $jml_approval ?> </h2>
                                    <p class="text-white mb-0">Orang</p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-pencil"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-8">
                            <div class="card-body">
                                <h3 class="card-title text-white">Tambah Massal Data Pegawai Terakhir</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"></h2>
                                    <p class="text-white mb-0"><?php foreach ($terakhir_tambah as $f) {
                                                                    echo mediumdate_indo(date('Y-m-d', strtotime($f->terakhir)));
                                                                } ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-user-plus"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-4">
                            <div class="card-body">
                                <h3 class="card-title text-white">Sunting Massal Data Pegawai Terakhir</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"></h2>
                                    <p class="text-white mb-0"><?php foreach ($terakhir_sunting as $f) {
                                                                    echo mediumdate_indo(date('Y-m-d', strtotime($f->terakhir)));
                                                                } ?></p>
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-pencil-square-o"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card gradient-8">
                            <div class="card-body">
                                <h3 class="card-title text-white">Usulan Evaluasi dari Unit yang Masuk</h3>
                                <div class="d-inline-block">
                                    <h2 class="text-white"><?= $jml_usulan_unit_pending ?></h2>
                                    <!-- <p class="text-white mb-0">Jan - March 2019</p> -->
                                </div>
                                <span class="float-right display-5 opacity-5"><i class="fa fa-envelope-o"></i></span>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->