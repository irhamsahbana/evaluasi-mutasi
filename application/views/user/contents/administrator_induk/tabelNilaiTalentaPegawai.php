        <!--**********************************
            Content body start
        ***********************************-->
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
                                <h4 class="card-title">Nilai Talenta Pegawai Tahun <?= $judul_tahun ?> Semester <?= $judul_semester ?></h4>
                                <div class="table-responsive">
                                    <div id="dataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <!-- Alert Add -->
                                        <?php
                                        $alert_success = $this->session->flashdata('alert_success');
                                        if ($this->session->flashdata('alert_success') == TRUE) : ?>
                                            <div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button><strong><?= $alert_success ?></strong></div>
                                        <?php endif; ?>
                                        <!-- Alert Update -->
                                        <?php
                                        $alert_primary = $this->session->flashdata('alert_primary');
                                        if ($this->session->flashdata('alert_primary') == TRUE) : ?>
                                            <div class="alert alert-primary alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button><strong><?= $alert_primary ?></strong></div>
                                        <?php endif; ?>
                                        <!-- Alert Delete -->
                                        <?php
                                        $alert_danger = $this->session->flashdata('alert_danger');
                                        if ($this->session->flashdata('alert_danger') == TRUE) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                                </button><strong><?= $alert_danger ?></strong></div>
                                        <?php endif; ?>

                                        <button style="float: right;" type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target=".modal-create">Tambah<span class="btn-icon-right"><i class="fa fa-user-plus"></i></span>
                                        </button>
                                        <button style="float: right;" type="button" class="btn mb-1 mr-3 btn-rounded btn-success" data-toggle="modal" data-target=".modal-import"><span class="btn-icon-left"><i class="fa fa-upload color-success"></i> </span>Unggah Nilai Talenta Pegawai</button>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Semester</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Business Area</th>
                                                <th>Personnel Subarea</th>
                                                <th>Nilai Talenta</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($tb_talenta as $talenta) {
                                                $target = $talenta->tahun_talenta . $talenta->semester_talenta . $talenta->nip;
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $talenta->tahun_talenta ?></td>
                                                    <td><?= $talenta->semester_talenta ?></td>
                                                    <td><?= $talenta->nip ?></td>
                                                    <td><?= $talenta->nama_pegawai ?></td>
                                                    <td><?= $talenta->nama_business_area ?></td>
                                                    <td><?= $talenta->nama_personnel_subarea ?></td>
                                                    <td><?= $talenta->nilai_talenta ?></td>
                                                    <td>
                                                        <button type="button" class="btn mb-1 btn-info" data-toggle="modal" data-target=".modal-update<?= $target ?>">Sunting<span class="btn-icon-right"><i class="fa fa-edit"></i></span>
                                                        </button>
                                                        <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete<?= $target ?>">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Semester</th>
                                                <th>NIP</th>
                                                <th>Nama</th>
                                                <th>Business Area</th>
                                                <th>Personnel Subarea</th>
                                                <th>Nilai Talenta</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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

        <!--**********************************
    Begin : Modal for Add Data
***********************************-->
        <div class="modal fade modal-create" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Nilai Talenta Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-validation">
                            <form class="form-valide" action="<?= site_url('AdministratorInduk/doAddTalentaPegawai') ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="tahun" class="form-control" value="<?= $judul_tahun ?>" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Semester</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="semester" class="form-control" value="<?= $judul_semester ?>" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">NIP</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nip" class="form-control" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nilai</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="nilai_talenta">
                                            <option value="">Pilih Nilai Talenta</option>
                                            <option value="LBS">LBS</option>
                                            <option value="SOP">SOP</option>
                                            <option value="SPO">SPO</option>
                                            <option value="OPT">OPT</option>
                                            <option value="POT">POT</option>
                                            <option value="KPO">KPO</option>
                                            <option value="PPS">PPS</option>
                                            <option value="PPE">PPE</option>
                                            <option value="SPP">SPP</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambahkan Data</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!--**********************************
    End : Modal for Add Data
***********************************-->

        <!--**********************************
    Begin : Modal for Update Data
***********************************-->
        <?php
        foreach ($tb_talenta as $talenta) {
            $tahun = $talenta->tahun_talenta;
            $semester = $talenta->semester_talenta;
            $nip = $talenta->nip;
            $target = $tahun . $semester . $nip;
            $talenta_selected = $talenta->nilai_talenta;

        ?>
            <div class="modal fade modal-update<?= $target ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sunting Data Talenta</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-validation">
                                <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdateTalentaPegawai/' . $tahun . '/' . $semester . '/' . $nip) ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tahun</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="tahun" class="form-control" value="<?= $tahun ?>" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Semester</label>
                                        <div class="col-sm-9">
                                            <input type="number" name="semester" class="form-control" value="<?= $semester ?>" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">NIP</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nip" class="form-control" value="<?= $nip ?>" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nilai</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="nilai_talenta">
                                                <option value="">Pilih Nilai Talenta</option>
                                                <option value="LBS" <?php if ($talenta_selected == "LBS") {
                                                                        echo "selected";
                                                                    } ?>>LBS</option>
                                                <option value="SOP" <?php if ($talenta_selected == "SOP") {
                                                                        echo "selected";
                                                                    } ?>>SOP</option>
                                                <option value="SPO" <?php if ($talenta_selected == "SPO") {
                                                                        echo "selected";
                                                                    } ?>>SPO</option>
                                                <option value="OPT" <?php if ($talenta_selected == "OPT") {
                                                                        echo "selected";
                                                                    } ?>>OPT</option>
                                                <option value="POT" <?php if ($talenta_selected == "POT") {
                                                                        echo "selected";
                                                                    } ?>>POT</option>
                                                <option value="KPO" <?php if ($talenta_selected == "KPO") {
                                                                        echo "selected";
                                                                    } ?>>KPO</option>
                                                <option value="PPS" <?php if ($talenta_selected == "PPS") {
                                                                        echo "selected";
                                                                    } ?>>PPS</option>
                                                <option value="PPE" <?php if ($talenta_selected == "PPE") {
                                                                        echo "selected";
                                                                    } ?>>PPE</option>
                                                <option value="SPP" <?php if ($talenta_selected == "SPP") {
                                                                        echo "selected";
                                                                    } ?>>SPP</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Sunting Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--**********************************
    End : Modal for Update Data
***********************************-->


        <!--**********************************
    Begin : Modal for Delete Data
***********************************-->
        <?php
        foreach ($tb_talenta as $talenta) {
            $tahun = $talenta->tahun_talenta;
            $semester = $talenta->semester_talenta;
            $nip = $talenta->nip;
            $target = $tahun . $semester . $nip;
        ?>
            <div class="modal fade modal-delete<?= $target ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus data talenta</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= site_url('AdministratorInduk/doDeleteTalentaPegawai/' . $tahun . '/' . $semester . '/' . $nip) ?>">
                                Yakin ingin menghapus data (<?= $tahun . '-' . $semester . '-' . $nip ?>) ?
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
        <!--**********************************
    End : Modal for Delete Data
***********************************-->

        <!--**********************************
    Begin : Modal for import excel/csv
***********************************-->
        <div class="modal fade modal-import" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="form-validation">
                        <form class="form-valide" action="<?= site_url('AdministratorInduk/doImportTalentaPegawaiNew') ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Unggah File Excel Nilai Talenta Pegawai</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col sm-12">
                                        Silahkan download dan gunakan <strong><u><a href="#">Template Spreadsheet ini</a></u></strong> untuk mengunggah nilai talenta pegawai!
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Unggah File Excel</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="file_nilai_talenta_pegawai" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Tambahkan Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
    End : Modal for import excel/csv
***********************************-->