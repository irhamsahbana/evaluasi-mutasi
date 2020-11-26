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
                                <h4 class="card-title">Pencarian Data Pegawai</h4>
                                <div class="form-validation">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">NIP</label>
                                        <div class="input-group col-7">
                                            <input type="input" id="nip" name="nip" class="form-control col-md-6" value="" placeholder="NIP" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><i class="mdi mdi-magnify"></i></span>
                                            </div>
                                        </div>                                            
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pers. No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="pers_no" name="pers_no" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="nama_pegawai" name="nama_pegawai" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Business Area</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="business_area" name="business_area" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="personnel_subarea" name="personnel_subarea" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Sebutan Jabatan</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control h-150px" rows="4" id="sebutan_jabatan" name="sebutan_jabatan" readonly="readonly" required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Org. Unit</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="org_unit" name="org_unit" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Organizational Unit</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="organizational_unit" name="organizational_unit" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Position</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="position" name="position" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Nama Panjang Posisi</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="nama_panjang_posisi" name="nama_panjang_posisi" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenjang - Main Grp Text</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="jenjang_main_grp" name="jenjang_main_grp" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Jenjang - Sub Grp Text</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="jenjang_sub_grp" name="jenjang_sub_grp" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">PS Group</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="grade" name="grade" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Grade Terakhir</label>
                                        <div class="col-sm-9">
                                            <input type="tgl_grade" id="tgl_grade" name="tgl_grade" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="pendidikan_terakhir" name="pendidikan_terakhir" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tanggal_lahir" name="tanggal_lahir" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Capeg</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tanggal_capeg" name="tanggal_capeg" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Pegawai Tetap</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tanggal_pegawai_tetap" name="tanggal_pegawai_tetap" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="gender" name="gender" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">E-mail</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="email" name="email" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tanggal_masuk" name="tanggal_masuk" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Religious</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="religious" name="religious" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Telephone No.</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="telp_no" name="telp_no" class="form-control" readonly="readonly" required>
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="tbl_nilai_talenta">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tahun</th>
                                                    <th>Semester</th>
                                                    <th>Nilai Talenta</th>
                                                </tr>
                                            </thead>
                                            <tbody id="show_nilai_talenta">
                                            </tbody>
                                        </table>
                                    </div>
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