        <!--**********************************
            Content body start
        ***********************************-->

        <?php
        foreach ($data_pegawai as $pegawai) {
            $id = $pegawai->nip;
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
                                <h4 class="card-title">Sunting Data Administrator</h4>
                                <div class="form-validation">
                                    <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdatePegawai/' . $id) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Pers. No.</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="pers_no" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NIP</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nipeg" class="form-control" required value="<?= $id ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_pegawai" class="form-control" required>
                                            </div>
                                        </div>
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
                                            <label class="col-sm-3 col-form-label">Sebutan Jabatan</label>
                                            <div class="col-sm-9">
                                                <select class="form-control edit-jabatan" name="sebutan_jabatan" data-live-search="true" required>
                                                    <option>Pilih Personnel Subarea dahulu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Org. Unit</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="org_unit" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Organizational Unit</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="organizational_unit" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Position</label>
                                            <div class="col-sm-9">
                                                <input type="number" name="position" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Nama Panjang Posisi</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nama_panjang_posisi" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jenjang - Main Grp Text</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jenjang_main_grp" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Jenjang - Sub Grp Text</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="jenjang_sub_grp" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">PS Group</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="grade" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal Grade Terakhir</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tgl_grade" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="pendidikan_terakhir" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tanggal_lahir" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal Capeg</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tanggal_capeg" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal Pegawai Tetap</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tanggal_pegawai_tetap" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-9">
                                                <select class="form-control" name="gender">
                                                    <option>Pilih Salah Satu</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">E-mail</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="email" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                            <div class="col-sm-9">
                                                <input type="date" name="tanggal_masuk" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Religious</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="religious" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Telephone No.</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="telephone_no" class="form-control" required>
                                            </div>
                                        </div>
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