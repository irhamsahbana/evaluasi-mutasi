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
                                <h4 class="card-title">Daftar Jabatan <?php foreach ($nama_ps as $f){ echo $f->nama_personnel_subarea;} ?></h4>
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
                                        <button style="float: right;" type="button" class="btn mb-1 mr-3 btn-rounded btn-success" data-toggle="modal" data-target=".modal-import"><span class="btn-icon-left"><i class="fa fa-upload color-success"></i> </span>Unggah Data Jabatan</button>

                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Personnel Subarea</th>
                                                <th>Urutan dalam Organisasi</th>
                                                <th>Jabatan</th>
                                                <th>ID Jabatan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($data_jabatan as $field) {
                                            ?>
                                                <tr>
                                                    <td><?= $no++ ?></td>
                                                    <td><?= $field->personnel_subarea ?></td>
                                                    <td><?= $field->urutan_dalam_org ?></td>
                                                    <td><?= $field->sebutan_jabatan ?></td>
                                                    <td><?= $field->id_sebutan_jabatan ?></td>
                                                    <td>
                                                        <button type="button" class="btn mb-1 btn-info" onclick='window.open("<?= site_url('AdministratorInduk/getEditJabatan/'.$field->id_sebutan_jabatan.'/'.$ps); ?>","_blank")'>Sunting<span class="btn-icon-right"><i class="fa fa-edit"></i></span>
                                                        </button>
                                                        <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete<?= $field->id_sebutan_jabatan ?>">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
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
                                                <th>Personnel Subarea</th>
                                                <th>Urutan dalam Organisasi</th>
                                                <th>Jabatan</th>
                                                <th>ID Jabatan</th>
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
                    <div class="form-validation">
                        <form method="post" class="form-valide" action="<?= site_url('AdministratorInduk/doAddJabatan'.'/'.$ps) ?>" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Jabatan</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Business Area</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="business_area" id="add_area" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <?php foreach ($area as $row) : ?>
                                                <option value="<?php echo $row->business_area; ?>"><?php echo $row->nama_business_area; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" name="personnel_subarea" id="add_subarea" required>
                                            <option>Pilih Business Area dahulu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Urutan dalam Organisasi</label>
                                    <div class="col-sm-9">
                                        <input type="number" name='urutan' class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jabatan" class="form-control" required>
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
    End : Modal for Add Data
***********************************-->

        <!--**********************************
    Begin : Modal for Delete Data
***********************************-->
        <?php
        foreach ($data_jabatan as $field) {
            $id = $field->id_sebutan_jabatan;
        ?>

            <div class="modal fade modal-delete<?= $id ?>" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Hapus jabatan</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?= site_url('AdministratorInduk/doDeleteJabatan/' . $id.'/'.$ps) ?>">
                                Yakin ingin Menghapus data (<?= $field->sebutan_jabatan ?>)?
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
                        <form class="form-valide" action="<?= site_url('AdministratorInduk/doImportJabatanNew'.'/'.$ps) ?>" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title">Unggah File Excel Daftar Jabatan</h5>
                                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group row">
                                    <div class="col sm-12">
                                        Silahkan download dan gunakan <strong><u><a href="#">Template Spreadsheet ini</a></u></strong> untuk mengunggah daftar jabatan!
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Unggah File Excel</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="file_jabatan" class="form-control" required>
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