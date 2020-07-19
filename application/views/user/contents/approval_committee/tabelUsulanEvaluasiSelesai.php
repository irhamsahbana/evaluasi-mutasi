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
                        <h4 class="card-title">Usulan Lembar Evaluasi Telah Ditanggapi</h4>
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
                                     <?php $no =1; foreach($usulan_masuk as $f): ?>
                                        <?php 
                                            $where_count_under_review = array(
                                                'id_usulan'     => $f->id_usulan,
                                                'id_approval'   => $this->session->userdata('id_administrator'),
                                                'approvement'   => 'under_review'
                                            );

                                            $jumlah_under_review = $this->Crud->cw('tb_approvement', $where_count_under_review);

                                            if($jumlah_under_review == 0) {
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
                                                    <td><?php if($f->status_usulan == 'diterima'){echo 'Diterima oleh Administrator UIW';} ?></td>
                                                    <td>
                                                        <button type="button" class="btn mb-1 btn-secondary" onclick='window.open("<?= site_url('ApprovalCommittee/tampilanRincianUsulanEvaluasiMasuk/'.$f->id_usulan); ?>","_blank")'>Rincian<span class="btn-icon-right"><i class="fa fa-file"></i></span></button>
                                                    </td>
                                                </tr>
                                        <?php } ?>
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