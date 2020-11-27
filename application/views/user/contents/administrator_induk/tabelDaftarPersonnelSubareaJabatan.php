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
                                <h4 class="card-title">Daftar Sebutan Jabatan Per Unit</h4>
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
                                                $id = $subarea->personnel_subarea;
                                        ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $subarea->nama_business_area ?></td>
                                                <td><?= $subarea->personnel_subarea ?></td>
                                                <td><?= $subarea->nama_personnel_subarea ?></td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-secondary" onclick='window.open("<?= site_url('AdministratorInduk/tampilanJabatan/'.$subarea->personnel_subarea); ?>","_blank")'>Daftar Sebutan Jabatan<span class="btn-icon-right"><i class="fa fa-users"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-empty<?= $id ?>">Kosongkan<span class="btn-icon-right"><i class="fa fa-trash"></i></span>
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
    Begin : Modal for Empty Data
***********************************-->
<?php  
    foreach ($data_subarea as $subarea) {
        $id = $subarea->personnel_subarea;
?>
<div class="modal fade modal-empty<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="POST" action="<?= site_url('AdministratorInduk/doEmptyJabatan/'.$subarea->personnel_subarea) ?>">
            <div class="modal-header">
                <h5 class="modal-title">Hapus data unit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin mengosongkan data jabatan (<?=$subarea->nama_personnel_subarea?>) ?</div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<!--**********************************
    End : Modal for Empty Data
***********************************-->