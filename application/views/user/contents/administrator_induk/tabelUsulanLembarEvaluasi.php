<?php  $modul = $this->uri->segment(2);   ?>
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

                                        <button style="float: right;" type="button" class="btn mb-1 btn-success" onclick='window.open("<?= site_url('AdministratorInduk/tampilanAddUsulanLembarEvaluasi'); ?>","_blank")'>Kirim Usulan Baru<span class="btn-icon-right"><i class="fa fa-paper-plane"></i></span>
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
                                                <th>
                                                    <?php if($modul == 'tampilanUsulanLembarEvaluasiUnitDitolak')
                                                    {
                                                        echo 'Alasan Ditolak';
                                                    } else {
                                                        echo 'Status';
                                                    }
                                                    ?>
                                                </th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no =1; foreach($lembar_evaluasi_diterima as $f): ?>
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
                                                    } else {
                                                        echo $f->alasan_ditolak;
                                                    }
                                                    ?>        
                                                </td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-secondary" onclick='window.open("<?= site_url('AdministratorInduk/tampilanRincianLembarEvaluasi/'.$f->id_usulan); ?>","_blank")'>Rincian<span class="btn-icon-right"><i class="fa fa-file"></i></span></button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete<?= $f->id_usulan ?>">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                    </button>
                                                    <?php if($modul == 'tampilanUsulanLembarEvaluasiUnit') { ?>
                                                        <button type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target=".modal-accept<?= $f->id_usulan ?>">Terima<span class="btn-icon-right"><i class="fa fa-user-plus"></i></span>
                                                        </button>
                                                        <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-reject<?= $f->id_usulan ?>">Tolak<span class="btn-icon-right"><i class="fa fa-user-times"></i></span>
                                                        </button>
                                                    <?php } ?>
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
                                                <th>
                                                    <?php if($modul == 'tampilanUsulanLembarEvaluasiUnitDitolak')
                                                    {
                                                        echo 'Alasan Ditolak';
                                                    } else {
                                                        echo 'Status';
                                                    }
                                                    ?>
                                                </th>
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
<?php foreach($lembar_evaluasi_diterima as $f): ?>
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
                    <h5 class="modal-title">Hapus Usulan Evaluasi Mutasi</h5>
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

<!--**********************************
Begin : Modal for Accept Data
***********************************-->
<?php foreach($lembar_evaluasi_diterima as $f): ?>
    <?php 
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $f->tgl_usulan);
        $tanggal = $myDateTime->format('d/m/Y');
        $jam = $myDateTime->format('H:i:s');
        $waktu = $tanggal." Pukul ".$jam." WITA";
     ?>
        <div class="modal fade modal-accept<?= $f->id_usulan ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terima Usulan Evaluasi Mutasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('AdministratorInduk/terimaUsulan/'.$f->id_usulan) ?>">
                        Yakin ingin menerima data usulan evaluasi mutasi bertanggal <?= $waktu ?> dari <?= $f->nama_personnel_subarea ?>?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Terima</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!--**********************************
End : Modal for Accept Data
***********************************-->

<!--**********************************
Begin : Modal for Reject Data
***********************************-->
<?php foreach($lembar_evaluasi_diterima as $f): ?>
    <?php 
        $myDateTime = DateTime::createFromFormat('Y-m-d H:i:s', $f->tgl_usulan);
        $tanggal = $myDateTime->format('d/m/Y');
        $jam = $myDateTime->format('H:i:s');
        $waktu = $tanggal." Pukul ".$jam." WITA";
     ?>

    <div class="modal fade modal-reject<?= $f->id_usulan ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Yakin ingin menolak data usulan evaluasi mutasi bertanggal <?= $waktu ?> dari <?= $f->nama_personnel_subarea ?>?</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-validation">
                        <form class="form-valide" action="<?= site_url('AdministratorInduk/tolakUsulan/'.$f->id_usulan) ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alasan ditolak</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <textarea name="alasan_ditolak" class="form-control" rows="4" required><?= $f->alasan_ditolak ?></textarea>
                                        <div class ="input-group-append">
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Tolak</button>
                </div></form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!--**********************************
    End : Modal for Reject Data
***********************************-->