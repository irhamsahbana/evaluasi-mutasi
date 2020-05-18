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
                                <h4 class="card-title">Posisi Approval Committee</h4>
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
                                                <th>No.</th>
                                                <th>Posisi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_approval as $approval) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $approval->posisi ?></td>
                                                    <td>
                                                        <button type="button" class="btn mb-1 btn-info" data-toggle="modal" data-target=".modal-update<?= $approval->id_posisi ?>">Sunting<span class="btn-icon-right"><i class="fa fa-edit"></i></span>
                                                        </button>
                                                        <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete<?= $approval->id_posisi ?>">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Posisi</th>
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
                        <h5 class="modal-title">Tambah Data Posisi</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-validation">
                            <form class="form-valide" action="<?= site_url('AdministratorInduk/doAddApproval') ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Posisi</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="posisi" class="form-control" placeholder="" required>
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
        foreach ($data_approval as $approval) {
            $id = $approval->id_posisi;
        ?>
            <div class="modal fade modal-update<?= $id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sunting Data Posisi Approval</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-validation">
                                <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdateApproval/' . $id) ?>" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="posisi" class="form-control" pplaceholder="" required value="<?= $approval->posisi ?>">
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
        foreach ($data_approval as $approval) {
            $id = $approval->id_posisi;
        ?>
            <div class="modal fade modal-delete<?= $id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus data posisi</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= site_url('AdministratorInduk/doDeleteApproval/' . $id) ?>">
                                Yakin ingin menghapus data (<?= $approval->id_posisi ?>) ?
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