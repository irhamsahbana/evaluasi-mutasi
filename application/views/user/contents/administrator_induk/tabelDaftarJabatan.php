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
                                <h4 class="card-title">Daftar Jabatan</h4>
                                <div class="table-responsive">
                                    <div id="dataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                         <!-- Alert Add -->
                                    <?php 
                                    $alert_success = $this->session->flashdata('alert_success');
                                    if($this->session->flashdata('alert_success') == TRUE) : ?>
                                        <div class="alert alert-success alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button><strong><?= $alert_success ?></strong></div>
                                    <?php endif; ?>
                                        <!-- Alert Update -->
                                    <?php 
                                    $alert_primary = $this->session->flashdata('alert_primary');
                                    if($this->session->flashdata('alert_primary') == TRUE) : ?>
                                        <div class="alert alert-primary alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button><strong><?= $alert_primary ?></strong></div>
                                    <?php endif; ?>
                                    <!-- Alert Delete -->
                                    <?php 
                                    $alert_danger = $this->session->flashdata('alert_danger');
                                    if($this->session->flashdata('alert_danger') == TRUE) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                        </button><strong><?= $alert_danger ?></strong></div>
                                    <?php endif; ?>

                                        <button style="float: right;" type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target=".modal-create">Tambah<span class="btn-icon-right"><i class="fa fa-user-plus"></i></span>
                                        </button>
                                        <button style="float: right;" type="button" class="btn mb-1 mr-3 btn-rounded btn-success" data-toggle="modal" data-target=".modal-import"><span class="btn-icon-left"><i class="fa fa-upload color-success"></i> </span>Import Jabatan</button>

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
                                                    <button type="button" class="btn mb-1 btn-info" data-toggle="modal" data-target=".modal-update<?=$field->id_sebutan_jabatan?>">Sunting<span class="btn-icon-right"><i class="fa fa-edit"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete<?=$field->id_sebutan_jabatan?>">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
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
    Begin : Modal for import excel/csv
***********************************-->
<div class="modal fade modal-import" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="form-validation">
                <form class="form-valide" action="<?= site_url('AdministratorInduk/doImportJabatan') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Import file Excel/Csv Daftar Jabatan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col sm-12">
                                Silahkan download dan gunakan <strong><u><a href="#">Template Spreadsheet ini</a></u></strong> untuk mengupload sebutan jabatan! 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Import File Excel/Csv</label>
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