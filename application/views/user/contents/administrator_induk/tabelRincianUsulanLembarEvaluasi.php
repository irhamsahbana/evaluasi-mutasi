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
                                <!-- Button Edit Data Surat dan Keterangan Pegawai -->
                                <button style="float: left;" type="button" class="btn mb-1 mr-1 btn-info" data-toggle="modal" data-target=".modal-surat">Sunting Data Surat<span class="btn-icon-right"><i class="fa fa-file-text"></i></span></button>
                                <button style="float: left;" type="button" class="btn mb-1 mr-1 btn-info" data-toggle="modal" data-target=".modal-keterangan">Sunting Keterangan Pegawai<span class="btn-icon-right"><i class="fa fa-address-card"></i></span></button>
                                <br><br><br>
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
                                                        <button style="float: left;" type="button" data-toggle="modal" data-target=".modal-keterangan<?= $f->id_usulan.$f->nip_usulan ?>" class="btn btn-info mt-2">Sunting Keterangan<span class="btn-icon-right"><i class="fa fa-address-card"></i></span></button>
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
Begin : Modal for Update Surat
***********************************-->
<?php foreach($data_surat as $f): ?>
    <div class="modal fade modal-surat" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Sunting Data Surat Mutasi</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-validation">
                        <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdateDataSurat/'.$f->id_usulan) ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nomor Surat</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" name="no_surat" class="form-control" value="<?= $f->no_surat ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Lokasi Surat</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" name="lokasi_surat" class="form-control" value="<?= $f->lokasi_surat ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tanggal Keluar Surat</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="date" name="tgl_surat" class="form-control" value="<?= $f->tgl_surat ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tim Approval Committee</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="text" name="tim_approval" class="form-control" value="<?= $f->tim_approval ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">(Tahun) 3 Semester Terakhir</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="number" min="1945" max="2100" name="thn_1" class="form-control" value="<?= $f->tahun_1 ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">(Semester) 3 Semester Terakhir</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <select class="form-control" name="smstr_1" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="I" <?php if($f->semester_1 == 'I'){echo 'selected';} ?>>I</option>
                                            <option value="II" <?php if($f->semester_1 == 'II'){echo 'selected';} ?>>II</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">(Tahun) 2 Semester Terakhir</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="number" min="1945" max="2100" name="thn_2" class="form-control" value="<?= $f->tahun_2 ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">(Semester) 2 Semester Terakhir</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group mb-3">
                                        <select class="form-control" name="smstr_2" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="I" <?php if($f->semester_2 == 'I'){echo 'selected';} ?>>I</option>
                                            <option value="II" <?php if($f->semester_2 == 'II'){echo 'selected';} ?>>II</option>
                                        </select>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">(Tahun) Semester Terakhir</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <input type="number" min="1945" max="2100" name="thn_3" class="form-control" value="<?= $f->tahun_3 ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">(Semester) Semester Terakhir</label>
                                <div class="col-sm-9">
                                    <div class="input-group mb-3">
                                        <div class="input-group mb-3">
                                        <select class="form-control" name="smstr_3" required>
                                            <option value="">Pilih Salah Satu</option>
                                            <option value="I" <?php if($f->semester_3 == 'I'){echo 'selected';} ?>>I</option>
                                            <option value="II" <?php if($f->semester_3 == 'II'){echo 'selected';} ?>>II</option>
                                        </select>
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
    End : Modal for Update Surat
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