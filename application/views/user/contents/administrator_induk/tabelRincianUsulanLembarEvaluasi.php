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
                                    echo " / No Surat : ";
                                    echo $f->no_surat;
                                } ?> )
                                </h4>
                                <br>
                                <!-- Tim Apprasial -->
                                <?php foreach($data_surat as $f): ?>
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Tim Approval Committee : <?= $f->tim_approval ?></h5>
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Tanggal Surat : <?= $f->lokasi_surat.", ".date("d/m/Y", strtotime($f->tgl_surat)); ?></h5>
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