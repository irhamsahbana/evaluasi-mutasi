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
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle" id="tbl_pegawai_usulan">
                                        <thead>
                                            <tr>
                                                <th scope="col">NIP</th>
                                                <th scope="col">Usulan Bussiness Area Baru</th>
                                                <th scope="col">Usulan Personnel Subarea Baru</th>
                                                <th scope="col">Usulan Jabatan Baru</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="nip_usulan" class="form-control" required></td>
                                                <td>
                                                     <select class="form-control" name="business_area" required>
                                                        <option value="">Pilih Salah Satu</option>
                                                        <option value="">-</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="personnel_subarea" required>
                                                        <option value="">Pilih Salah Satu</option>
                                                        <option value="">-</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select class="form-control" name="jabatan" required>
                                                        <option value="">Pilih Salah Satu</option>
                                                        <option value="">-</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button style="float: right;" type="button" class="btn btn-success" name="add_pegawai" id="add_pegawai"><strong>+</strong></button>
                                <!-- Tabel Approval Committee yang diusukan -->
                                <h5 class="card-title" style="font-size: 15px; margin-top: 0.75rem">Approval Committee yang Diusulkan</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle" id="tbl_approval_usulan">
                                        <thead>
                                            <tr>
                                                <th scope="col">NIP</th>
                                                <th scope="col">Posisi</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <input type="text" name="nip_usulan_approval" class="form-control" required></td>
                                                <td>
                                                     <select class="form-control" name="posisi" required>
                                                        <option value="">Pilih Salah Satu</option>
                                                        <option value="">-</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <span><a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus"><i class="fa fa-close color-danger"></i></a></span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button style="float: right;" type="button" class="btn btn-success" name="add_approval" id="add_approval"><strong>+</strong></button>
                                <!-- Tombol Kirim Data -->
                                <br><br><br>
                                <button style="float: right;" type="button" class="btn btn-success" name="tombol_tambah_data" id="tombol_tambah_data">Tambah Data</button>

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
