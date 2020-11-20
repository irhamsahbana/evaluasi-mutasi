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
                                <h4 class="card-title">Usulan Lembar Evaluasi</h4>
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

                                        <button style="float: right;" type="button" class="btn mb-1 btn-success" onclick='window.open("<?= site_url('AdministratorUnit/tampilanAddUsulanLembarEvaluasi'); ?>","_blank")'>Kirim Usulan Baru<span class="btn-icon-right"><i class="fa fa-paper-plane"></i></span>
                                        </button>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Pengusulan</th>
                                                <th>Nomor Surat</th>
                                                <th>Administrator yang mengusulkan</th>
                                                <th>Business Area</th>
                                                <th>Personnel Subarea</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no =1; foreach($lembar_evaluasi_PS as $f): ?>
                                                <?php 
                                                    $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $f->tgl_usulan);
                                                    $tanggal = $myDateTime->format('d/m/Y');
                                                    $jam = $myDateTime->format('H:i:s');
                                                    $waktu = $tanggal." Pukul ".$jam." WITA";
                                                 ?>
                                                <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $waktu ?></td>
                                                <td><?= $f->no_surat ?></td>
                                                <td>
                                                    <a href="#"><?= $f->nip.' ( '.$f->nama_pegawai.' )' ?></a>
                                                </td>
                                                <td><?= $f->nama_business_area ?></td>
                                                <td><?= $f->nama_personnel_subarea ?></td>
                                                <td>
                                                    <?php
                                                    if($f->status_usulan == 'diterima'){
                                                        echo 'Diterima oleh Administrator UIW';
                                                    } elseif ($f->status_usulan == 'dipending'){
                                                        echo 'Menunggu persetujuan Administrator UIW';
                                                    }
                                                    ?>        
                                                </td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-secondary" onclick='window.open("<?= site_url('AdministratorInduk/tampilanRincianLembarEvaluasi/'.$f->id_usulan); ?>","_blank")'>Rincian<span class="btn-icon-right"><i class="fa fa-file"></i></span></button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete<?= $f->id_usulan ?>">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Pengusulan</th>
                                                <th>Nomor Surat</th>
                                                <th>Administrator yang mengusulkan</th>
                                                <th>Business Area</th>
                                                <th>Personnel Subarea</th>
                                                <th>Status</th>
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
Begin : Modal for Delete Data
***********************************-->
<?php foreach($lembar_evaluasi_PS as $f): ?>
    <?php 
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $f->tgl_usulan);
        $tanggal = $myDateTime->format('d/m/Y');
        $jam = $myDateTime->format('H:i:s');
        $waktu = $tanggal." Pukul ".$jam." WITA";
     ?>
        <div class="modal fade modal-delete<?= $f->id_usulan ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus data talenta</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('AdministratorInduk/doDeleteUsulanMutasi/'.$f->id_usulan) ?>">
                        Yakin ingin menghapus data usulan evaluasi mutasi bertanggal <?= $waktu ?> dari <?= $f->nama_personnel_subarea ?>?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!--**********************************
End : Modal for Delete Data
***********************************-->