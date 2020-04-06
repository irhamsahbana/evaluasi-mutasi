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
                                <h4 class="card-title">Daftar Personnel Subarea</h4>
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
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Business Area</th>
                                                <th>ID Personnel Subarea</th>
                                                <th>Personnel Subarea</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php  
                                            $no = 1;
                                            foreach ($data_subarea as $subarea) {
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $subarea->nama_business_area ?></td>
                                                <td><?= $subarea->personnel_subarea ?></td>
                                                <td><?= $subarea->nama_personnel_subarea ?></td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-info" data-toggle="modal" data-target=".modal-update<?=$subarea->target?>">Sunting<span class="btn-icon-right"><i class="fa fa-edit"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete<?=$subarea->target?>">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Business Area</th>
                                                <th>ID Personnel Subarea</th>
                                                <th>Personnel Subarea</th>
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
                <form class="form-valide" action="<?= site_url('AdministratorInduk/doAddSubarea') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Unit</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Business Area</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="business_area">
                                    <option>Pilih Salah Satu</option>
                                    <?php
                                        $no = 1; 
                                        foreach ($data_area as $area) {
                                    ?>
                                    <option value="<?=$area->business_area?>"><?=$area->nama_business_area?></option>
                                    <?php $no++; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID Personnel Subarea</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_personnel_subarea" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                            <div class="col-sm-9">
                                <input type="text" name="personnel_subarea" class="form-control" placeholder="" required>
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
    Begin : Modal for Update Data
***********************************-->
<?php  
    foreach ($data_subarea as $subarea) {
        $id = $subarea->personnel_subarea;
        $target = $subarea->target;
        $business_area_selected = $subarea->business_area;
?>
<div class="modal fade modal-update<?=$target?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="form-validation">
                <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdateSubarea/'.$id) ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Sunting Daftar Unit</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Business Area</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="business_area">
                                    <option>Pilih Salah Satu</option>
                                    <?php foreach ($data_area as $area) { ?>
                                    <option value="<?=$area->business_area?>" <?php if($business_area_selected == $area->business_area){echo "selected";} ?>><?=$area->nama_business_area?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">ID Personnel Subarea</label>
                            <div class="col-sm-9">
                                <input type="text" name="id_personnel_subarea" class="form-control" placeholder="" required value="<?=$subarea->personnel_subarea?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                            <div class="col-sm-9">
                                <input type="text" name="personnel_subarea" class="form-control" placeholder="" required value="<?=$subarea->nama_personnel_subarea?>">
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
</div>
<?php } ?>
<!--**********************************
    End : Modal for Update Data
***********************************-->


<!--**********************************
    Begin : Modal for Delete Data
***********************************-->
<?php  
    foreach ($data_subarea as $subarea) {
        $id = $subarea->personnel_subarea;
        $target = $subarea->target;
?>
<div class="modal fade modal-delete<?=$target?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="POST" action="<?= site_url('AdministratorInduk/doDeleteSubarea/'.$id) ?>">
            <div class="modal-header">
                <h5 class="modal-title">Hapus data unit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin menghapus data (<?=$subarea->nama_personnel_subarea?>) ?</div>
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