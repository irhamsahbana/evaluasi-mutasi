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
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="#" method="post">
                                        <h4 class="card-title">Riwayat Jabatan</h4>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">No. Induk Pegawai</label>
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Masukkan No. Induk Pegawai..." required>
                                                    <div class ="input-group-append">
                                                        <button class="btn btn-outline-success" type="button"><i class="icon-magnifier menu-icon"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Nama Pegawai</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Masukkan nama lengkap pegawai...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-password">Unit Saat Ini</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-password" name="val-password" placeholder="Unit pegawai saat ini...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Jabatan Saat Ini</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Jabatan pegawai saat ini...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Grade</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Grade pegawai...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Pendidikan Terakhir</label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Pendidikan terakhir pegawai...">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Tanggal Jabatan</label>
                                            <div class="col-lg-6">
                                                <input type="date" class="form-control" placeholder="mm/dd/yyyy">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-confirm-password">Lama di Jabatan Terakhir</label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" name="lama-jabatan" placeholder="0 tahun 0 bulan">
                                            </div>
                                        </div>
                                        <hr>
                                        <h4 class="card-title">Usulan Mutasi</h4>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Usulan Unit</label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="val-skill">
                                                    <option value="">Pilih salah satu</option>
                                                    <option value="html">HTML</option>
                                                    <option value="css">CSS</option>
                                                    <option value="javascript">JavaScript</option>
                                                    <option value="angular">Angular</option>
                                                    <option value="angular">React</option>
                                                    <option value="vuejs">Vue.js</option>
                                                    <option value="ruby">Ruby</option>
                                                    <option value="php">PHP</option>
                                                    <option value="asp">ASP.NET</option>
                                                    <option value="python">Python</option>
                                                    <option value="mysql">MySQL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Usulan Jabatan</label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-skill" name="val-skill">
                                                    <option value="">Pilih salah satu</option>
                                                    <option value="html">HTML</option>
                                                    <option value="css">CSS</option>
                                                    <option value="javascript">JavaScript</option>
                                                    <option value="angular">Angular</option>
                                                    <option value="angular">React</option>
                                                    <option value="vuejs">Vue.js</option>
                                                    <option value="ruby">Ruby</option>
                                                    <option value="php">PHP</option>
                                                    <option value="asp">ASP.NET</option>
                                                    <option value="python">Python</option>
                                                    <option value="mysql">MySQL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-suggestions">Keterangan</label>
                                            <div class="col-lg-6">
                                                <textarea class="form-control" id="val-suggestions" name="val-suggestions" rows="5" placeholder="Silahkan diisi..."></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8">
                                                <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                                    <input type="checkbox" class="css-control-input" id="val-terms" name="val-terms" value="1" required> <span class="css-control-indicator"></span> Saya setuju </label>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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