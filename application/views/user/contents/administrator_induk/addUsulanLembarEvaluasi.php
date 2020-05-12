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
                                <!-- Tabel Pegawai yang diusulkan -->
                                <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Pegawai yang Diusulkan</h4>
                                   <!--  <form class="form-valide" action="<?= site_url('AdministratorInduk/doAddUsulan') ?>" method="POST" enctype="multipart/form-data"> -->
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle" id="tbl_pegawai_usulan">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="width: 16%">NIP</th>
                                                <th scope="col" style="width: 16%">Nama Pegawai</th>
                                                <th scope="col" style="width: 16%">Jabatan saat ini</th>
                                                <th scope="col" style="width: 16%">Usulan Bussiness Area Baru</th>
                                                <th scope="col" style="width: 16%">Usulan Personnel Subarea Baru</th>
                                                <th scope="col" style="width: 22%">Usulan Jabatan Baru</th>
                                                <th scope="col" style="width: 10%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="nip_usulan" class="form-control nip_usulan" id="nip_usulan" required>
                                                </td>
                                                <td>
                                                    <input type="text" name="nama_usulan" class="form-control nama_usulan" id="nama_usulan" readonly="readonly">
                                                </td>
                                                <td>
                                                    <input type="text" name="jabatan_skg" class="form-control jabatan_skg" id="jabatan_skg" readonly="readonly">
                                                </td>
                                                <td>
                                                    <select class="form-control business_area" name="business_area" id="add_area" required>
                                                        <option value="">Pilih Salah Satu</option>
                                                        <?php foreach($area as $row):?>
                                                        <option value="<?= $row->business_area ?>"><?= $row->nama_business_area ?></option>
                                                        <?php endforeach?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control personnel_subarea" name="personnel_subarea" id="add_subarea" required>
                                                        <option value="">Pilih Business Area dahulu</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <div class="select-reverse-div">
                                                        <select class="form-control jabatan select-reverse" name="jabatan" id="add_jabatan" data-live-search="true" required>
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
                                                    <select class="form-control nama_usulan_approval" name="nama_usulan_approval" id="nama_usulan_approval" required>
                                                        <option value="">Pilih Salah Satu</option>
                                                        <?php foreach($approval as $row):?>
                                                        <option value="<?= $row->id_approval ?>">(<?= $row->nip ?>) <?= $row->nama_pegawai ?></option>
                                                        <?php endforeach?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control posisi" name="posisi" id="posisi" required>
                                                        <option>Pilih Salah Satu</option>
                                                        <?php foreach ($posisi as $pos): ?>
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
                                <button style="float: right;" type="button" class="btn btn-success" name="tombol_tambah_data" id="tombol_tambah_data">Tambah Data</button>
                        <!--     </form> -->

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
