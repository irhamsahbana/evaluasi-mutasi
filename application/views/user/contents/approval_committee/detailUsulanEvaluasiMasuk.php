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
                                <h4 class="card-title">Usulan Evaluasi Mutasi (
                                <?php foreach($data_surat as $f){
                                    echo $f->id_usulan;
                                } ?> )
                                </h4>
                                <br>
                                <!-- Flashdata -->
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

                                <!-- Tim Apprasial -->
                                <?php foreach($data_surat as $f): ?>
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Nomor Surat : <?= $f->no_surat ?></h5>
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Lokasi dikeluarkan Surat : <?= $f->lokasi_surat ?></h5>
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Tanggal Surat Keluar : <?= date("d/m/Y", strtotime($f->tgl_surat)); ?></h5>
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Tim Approval Committee : <?= $f->tim_approval ?></h5>
                                <?php endforeach ?>
                                <br>
                                <!-- Tabel Header Nilai Talenta -->
                                <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Header Nilai Talenta</h5>
                                    <div class="table-responsive">
                                        <table class="table table-bordered verticle-middle" id="tbl_header_talenta">
                                            <thead>
                                                <tr>
                                                    <th scope="col" style="width: 16%">Judul</th>
                                                    <th scope="col" style="width: 16%">3 Semester Terakhir</th>
                                                    <th scope="col" style="width: 16%">2 Semester Terakhir</th>
                                                    <th scope="col" style="width: 16%">Semester Terakhir</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($data_surat as $f): ?>
                                                <tr>
                                                    <td>Tahun</td>
                                                    <td><?= $f->tahun_1 ?></td>
                                                    <td><?= $f->tahun_2 ?></td>
                                                    <td><?= $f->tahun_3 ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Semester</td>
                                                    <td><?= $f->semester_1 ?></td>
                                                    <td><?= $f->semester_2 ?></td>
                                                    <td><?= $f->semester_3 ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                <!-- Tabel Pegawai yang diusulkan -->
                                <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Pegawai yang Diusulkan</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered verticle-middle" id="tbl_pegawai_usulan">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No.</th>
                                                    <th scope="col">NIP</th>
                                                    <th scope="col">Nama Pegawai</th>
                                                    <th scope="col">Jabatan Saat Ini</th>
                                                    <th scope="col">Grade Saat Ini</th>
                                                    <th scope="col">Tanggal Mulai Grade Saat Ini</th>
                                                    <th scope="col">Pendidikan Terakhir</th>
                                                    <th scope="col">Nilai Talenta 3 semester lalu</th>
                                                    <th scope="col">Nilai Talenta 2 semester lalu</th>
                                                    <th scope="col">Nilai Talenta 1 semester lalu</th>
                                                    <th scope="col">Lama Menjabat</th>
                                                    <th scope="col">Usulan Jabatan Baru</th>
                                                    <th scope="col">Keterangan</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $no_peg = 1; foreach($usulan_pegawai as $f): ?>
                                                <tr>
                                                    <td><?= $no_peg++ ?></td>
                                                    <td><?= $f->nip_usulan ?></td>
                                                    <td><?= $f->nama_usulan ?></td>
                                                    <td><?= $f->jabatan_skg ?></td>
                                                    <td><?= $f->grade_skg ?></td>
                                                    <td><?= date("d/m/Y", strtotime($f->tgl_grade_skg)); ?></td>
                                                    <td><?= $f->pendidikan_terakhir ?></td>
                                                    <td><?= $f->n_talenta_1 ?></td>
                                                    <td><?= $f->n_talenta_2 ?></td>
                                                    <td><?= $f->n_talenta_3 ?></td>
                                                    <td><?= $f->lama_jabatan_skg ?></td>
                                                    <td><?= $f->jabatan_usulan ?></td>
                                                    <td><?= $f->keterangan ?></td>
                                                    <td>
                                                        <?php 
                                                            $status = $this->Crud->gw('tb_approvement', array('nip_usulan' => $f->nip_usulan, 'id_approval' => $this->session->userdata('id_administrator'), 'id_usulan' => $f->id_usulan));

                                                            foreach ($status as $s){
                                                                if($s->approvement == 'under_review'){
                                                        ?>
                                                                    <!-- dua tombol di sini -->
                                                                    <form method="POST" action="<?= site_url('ApprovalCommittee/doSetujuiPegawai/'.$f->id_usulan.'/'.$this->session->userdata('id_administrator').'/'.$f->nip_usulan) ?>">
                                                                        <button type="submit" class="btn btn-success mt-2">Setujui<span class="btn-icon-right"><i class="fa fa-check"></i></span></button>
                                                                    </form>
                                                                    <form method="POST" action="<?= site_url('ApprovalCommittee/doTolakPegawai/'.$f->id_usulan.'/'.$this->session->userdata('id_administrator').'/'.$f->nip_usulan) ?>">
                                                                        <button type="submit" class="btn btn-danger mt-2">Tolak<span class="btn-icon-right"><i class="fa fa-times"></i></span></button>
                                                                    </form>
                                                        <?php 
                                                                }
                                                                if($s->approvement != 'under_review'){
                                                        ?>
                                                                    <!-- satu tombol di sini -->
                                                                    <form method="POST" action="<?= site_url('ApprovalCommittee/doTinjauKembalipegawai/'.$f->id_usulan.'/'.$this->session->userdata('id_administrator').'/'.$f->nip_usulan) ?>">
                                                                        <button type="submit" class="btn btn-info mt-2">Tinjau Kembali<span class="btn-icon-right"><i class="fa fa-exchange"></i></span></button>
                                                                    </form>
                                                        <?php
                                                                }
                                                            }
                                                        ?>

                                                            </td>
                                                </tr>
                                            <?php endforeach ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br>
                                    <!-- Tabel Approval Committee yang diusukan -->
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Approval Committee yang Diusulkan</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered verticle-middle" id="tbl_approval_usulan">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">No.</th>
                                                        <th scope="col">NIP</th>
                                                        <th scope="col">Nama</th>
                                                        <th scope="col">Posisi</th>
                                                        <th scope="col">Sedang Meninjau</th>
                                                        <th scope="col">Menyetujui</th>
                                                        <th scope="col">Menolak</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $no_app = 1; foreach($usulan_approval as $f): ?>
                                                        <?php
                                                            $query_under_review = 
                                                            "
                                                                SELECT nip_usulan
                                                                FROM tb_approvement
                                                                WHERE approvement = 'under_review' AND id_approval = '$f->id_approval' AND id_usulan = '$f->id_usulan'
                                                            ";
                                                            $under_review = $this->db->query($query_under_review)->result();

                                                            $query_approved =
                                                            "
                                                                SELECT nip_usulan
                                                                FROM tb_approvement
                                                                WHERE approvement = 'approved' AND id_approval = '$f->id_approval' AND id_usulan = '$f->id_usulan'
                                                            ";
                                                            $approved = $this->db->query($query_approved)->result();

                                                            $query_not_approved =
                                                            "
                                                                SELECT nip_usulan
                                                                FROM tb_approvement
                                                                WHERE approvement = 'not_approved' AND id_approval = '$f->id_approval' AND id_usulan = '$f->id_usulan'
                                                            ";
                                                            $not_approved = $this->db->query($query_not_approved)->result();
                                                        ?>
                                                    <tr>
                                                        <td><?= $no_app++ ?></td>
                                                        <td><?= $f->nip ?></td>
                                                        <td><?= $f->nama_pegawai ?></td>
                                                        <td><?= $f->posisi ?></td>
                                                        <td>
                                                            <?php foreach($under_review as $ur): ?>
                                                                <?= $ur->nip_usulan ?>
                                                                <br>
                                                            <?php endforeach ?>
                                                        </td>
                                                        <td>
                                                            <?php foreach($approved as $ap): ?>
                                                                <?= $ap->nip_usulan ?>
                                                                <br>
                                                            <?php endforeach ?>
                                                        </td>
                                                        <td>
                                                            <?php foreach($not_approved as $na): ?>
                                                                <?= $na->nip_usulan ?>
                                                                <br>
                                                            <?php endforeach ?>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
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
Begin : Modal for Update Keterangan
***********************************-->
<?php foreach($usulan_pegawai as $f): ?>
    <div class="modal fade modal-keterangan<?= $f->id_usulan.$f->nip_usulan ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sunting Data Keterangan Pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-validation">
                        <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdateKeterangan/'.$f->id_usulan.'/'.$f->nip_usulan) ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Keterangan <?= $f->nip_usulan." ( ".$f->nama_usulan." )" ?></label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <textarea name="keterangan_pegawai" class="form-control" rows="4"><?= $f->keterangan ?></textarea>
                                        <div class ="input-group-append">
                                        </div>
                                    </div>
                                </div>
                            </div>                       
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Sunting Data</button>
                </div></form>
            </div>
        </div>
    </div>
<?php endforeach ?>
<!--**********************************
    End : Modal for Update Keterangan
***********************************-->

<!--**********************************
Begin : Modal for Delete Usulan Pegawai
***********************************-->
<?php foreach($usulan_pegawai as $f): ?>
        <div class="modal fade modal-delete-pegawai<?= $f->id_usulan.$f->nip_usulan ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus data talenta</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?= site_url('AdministratorInduk/doDeletePegawaiUsulan/'.$f->id_usulan.'/'.$f->nip_usulan) ?>">
                        Yakin ingin menghapus data pegawai usulan evaluasi mutasi?
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
End : Modal for Usulan Pegawai
***********************************-->



