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
                                <h4 class="card-title">Daftar Semester</h4>
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
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tahun</th>
                                                <th>Semester</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($daftar_talenta as $field) {
                                                $target = $field->tahun_talenta . $field->semester_talenta;
                                                $tahun = $field->tahun_talenta;
                                                $semester = $field->semester_talenta;
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $field->tahun_talenta ?></td>
                                                    <td><?= $field->semester_talenta ?></td>
                                                    <td>
                                                        <button type="button" class="btn mb-1 btn-secondary" onclick='window.open("<?= site_url('AdministratorInduk/tampilanNilaiTalentaPegawai/' . $tahun . '/' . $semester); ?>","_blank")'>Nilai Talenta Pegawai<span class="btn-icon-right"><i class="fa fa-users"></i></span>
                                                        </button>
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
                        <h5 class="modal-title">Tambah Data Semester</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-validation">
                            <form class="form-valide" action="<?= site_url('AdministratorInduk/doAddDaftarTalenta') ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Tahun</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="tahun" class="form-control" placeholder="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Semester</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="semester" class="form-control" placeholder="" required>
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
        foreach ($daftar_talenta as $field) {
            $tahun = $field->tahun_talenta;
            $semester = $field->semester_talenta;
            $target = $tahun . $semester;

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
                                <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdateDaftarTalenta/' . $tahun . '/' . $semester) ?>" method="POST" enctype="multipart/form-data">
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
        foreach ($daftar_talenta as $field) {
            $tahun = $field->tahun_talenta;
            $semester = $field->semester_talenta;
            $target = $tahun . $semester;
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
                            <form method="POST" action="<?= site_url('AdministratorInduk/doDeleteDaftarTalenta/' . $tahun . '/' . $semester) ?>">
                                Yakin ingin menghapus data nilai talenta pegawai semester <?= $semester ?> tahun <?= $tahun ?> ?
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