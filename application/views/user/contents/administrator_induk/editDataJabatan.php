        <!--**********************************
            Content body start
        ***********************************-->

        <?php
        foreach ($data_jabatan as $get) {
            $id = $get->id_sebutan_jabatan;
        }
        ?>

        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Sunting Data Sebutan Jabatan</h4>

                                <div class="form-validation">
                                    <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdateJabatan'.'/'.$ps) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Business Area</label>
                                            <div class="col-sm-9">
                                                <select class="form-control edit-area" name="business_area" required>
                                                    <option value="">Pilih Salah Satu</option>
                                                    <?php foreach ($area as $row) : ?>
                                                        <option value="<?= $row->business_area; ?>"><?= $row->nama_business_area; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                                            <div class="col-sm-9">
                                                <select class="form-control edit-subarea" name="personnel_subarea" required>
                                                    <option value="">Pilih Business Area dahulu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Urutan dalam Organisasi</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="urutan" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Sebutan Jabatan</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jabatan" class="form-control" required>
                                            </div>
                                        </div>
                                        <input type="hidden" raedonly name="id_sebutan_jabatan" value="<?= $id ?>">
                                        <button style="float: right;" type="submit" class="btn btn-primary">Sunting Data</button>
                                    </form>
                                </div>
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