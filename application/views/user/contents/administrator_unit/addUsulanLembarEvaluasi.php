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
                                <h4 class="card-title">Tambah Usulan Evaluasi Mutasi</h4>
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
                                            <form id="target">
                                                <tr>
                                                    <td>
                                                        Tahun
                                                    </td>
                                                    <td>
                                                        <input type="number" name="thn_1" class="form-control required" min="1945" max="2100" required>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="thn_2" class="form-control required" min="1945" max="2100" required>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="thn_3" class="form-control required" min="1945" max="2100" required>
                                                    </td>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Semester
                                                    </td>
                                                    <td>
                                                        <select class="form-control required" name="smstr_1" required>
                                                            <option value="">Pilih Salah Satu</option>
                                                            <option value="I">I</option>
                                                            <option value="II">II</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control required" name="smstr_2" required>
                                                            <option value="">Pilih Salah Satu</option>
                                                            <option value="I">I</option>
                                                            <option value="II">II</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control required" name="smstr_3" required>
                                                            <option value="">Pilih Salah Satu</option>
                                                            <option value="I">I</option>
                                                            <option value="II">II</option>
                                                        </select>
                                                    </td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                <!-- Tabel Pegawai yang diusulkan -->
                                <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Pegawai yang Diusulkan</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered verticle-middle" id="tbl_pegawai_usulan">
                                            <thead>
                                                <tr>
                                                    <th scope="col">NIP</th>
                                                    <th scope="col">Nama Pegawai</th>
                                                    <th scope="col">Jabatan Saat Ini</th>
                                                    <th scope="col">Grade Saat Ini</th>
                                                    <th scope="col">Tanggal Mulai Grade Saat Ini</th>
                                                    <th scope="col">Pendidikan Terakhir</th>
                                                    <th scope="col">Nilai Talenta 3 semester lalu</th>
                                                    <th scope="col">Nilai Talenta 2 semester lalu</th>
                                                    <th scope="col">Nilai Talenta 1 semester lalu</th>
                                                    <th scope="col">Tanggal mulai Jabatan saat Ini</th>
                                                    <th scope="col">Lama Menjabat</th>
                                                    <th scope="col">Usulan Bussiness Area Baru</th>
                                                    <th scope="col">Usulan Personnel Subarea Baru</th>
                                                    <th scope="col">Usulan Jabatan Baru</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <input type="text" name="nip_usulan" class="form-control nip_usulan req_peg" id="nip_usulan" style="min-width: 120px;" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="nama_usulan" class="form-control nama_usulan req_peg" id="nama_usulan" style="min-width: 200px;" readonly="readonly" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="jabatan_skg" class="form-control jabatan_skg req_peg" id="jabatan_skg" style="min-width: 300px;" readonly="readonly" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="grade_skg" class="form-control req_peg" id="grade_skg" style="min-width: 120px;" readonly="readonly" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="tgl_grade_terakhir" class="form-control req_peg" id="tgl_grade_terakhir" style="min-width: 120px;" readonly="readonly" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="pendidikan_terakhir" class="form-control req_peg" id="pendidikan_terakhir" style="min-width: 120px;"readonly="readonly" required>
                                                    </td>
                                                     <td>
                                                        <input type="text" name="n_smstr_1_" class="form-control req_peg" id="n_smstr_1_" readonly="readonly" style="min-width: 120px;" required>
                                                    </td>
                                                     <td>
                                                        <input type="text" name="n_smstr_2_" class="form-control req_peg" id="n_smstr_2_" readonly="readonly" style="min-width: 120px;" required>
                                                    </td>
                                                     <td>
                                                        <input type="text" name="n_smstr_3_" class="form-control req_peg" id="n_smstr_3_" readonly="readonly" style="min-width: 120px;" required>
                                                    </td>
                                                    <td>
                                                        <input type="date" name="tgl_mulai_jabatan_skg" class="form-control req_peg" id="tgl_mulai_jabatan_skg" style="min-width: 120px;" required>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="lama_jabatan" class="form-control req_peg" id="lama_jabatan" readonly="readonly" style="min-width: 150px;" required>
                                                    </td>
                                                    <td>
                                                        <select class="form-control business_area req_peg" name="business_area" id="add_area" required style="min-width: 120px;">
                                                            <option value="">Pilih Salah Satu</option>
                                                            <?php foreach ($area as $row) : ?>
                                                                <option value="<?= $row->business_area ?>"><?= $row->nama_business_area ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="form-control personnel_subarea req_peg" name="personnel_subarea" id="add_subarea" required style="min-width: 120px;">
                                                            <option value="">Pilih Business Area dahulu</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <div class="select-reverse-div">
                                                            <select class="form-control jabatan req_peg" name="jabatan" id="add_jabatan" required style="min-width: 120px;">
                                                                <option value="">Pilih Personnel Subarea dahulu</option>
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <button style="float: right;" type="button" class="btn btn-success" name="add_pegawai" id="add_pegawai"><strong>+</strong></button>
                                    <br><br>
                                    <!-- Tim Apprasial -->
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Tim Approval Committee</h5>
                                        <input type="text" name="tim_approval" class="form-control required" required>
                                    <br>
                                    <!-- Tabel Approval Committee yang diusukan -->
                                    <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Approval Committee yang Diusulkan</h4>
                                        <div class="table-responsive">
                                            <table class="table table-bordered verticle-middle" id="tbl_approval_usulan">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Nama Approval</th>
                                                        <th scope="col">Posisi</th>
                                                        <th scope="col">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <select class="form-control nama_usulan_approval required" name="nama_usulan_approval" id="nama_usulan_approval" required>
                                                                <option value="">Pilih Salah Satu</option>
                                                                <?php foreach ($approval as $row) : ?>
                                                                    <option value="<?= $row->id_approval ?>">(<?= $row->nip ?>) <?= $row->nama_pegawai ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control posisi required" name="posisi" id="posisi" required>
                                                                <option value="">Pilih Salah Satu</option>
                                                                <?php foreach ($posisi as $pos) : ?>
                                                                    <option value="<?= $pos->id_posisi ?>"><?= $pos->posisi ?></option>
                                                                <?php endforeach ?>
                                                            </select>
                                                        </td>
                                                        <td>

                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button style="float: right;" type="button" class="btn btn-success" name="add_approval" id="add_approval"><strong>+</strong></button>
                                        <!-- Tombol Kirim Data -->
                                        <br><br><br>
                                        <button style="float: right;" type="submit" class="btn btn-success" name="tombol_tambah_data" id="tombol_tambah_data">Tambah Data</button>
                                    </form>
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