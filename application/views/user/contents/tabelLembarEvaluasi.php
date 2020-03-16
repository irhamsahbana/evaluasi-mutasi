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
                                <h4 class="card-title">Lembar Evaluasi</h4>
                                <div class="table-responsive">
                                    <div id="dataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <button style="float: right;" type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target=".modal-create">Tambah<span class="btn-icon-right"><i class="fa fa-user-plus"></i></span>
                                        </button>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Induk</th>
                                                <th>Nama</th>
                                                <th>Sebutan Jabatan / Kelas Unit</th>
                                                <th>Grade</th>
                                                <th>Tanggal Grade Terakhir</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Nilai Talenta</th>
                                                <th>Jabatan Baru / Kelas Unit</th>
                                                <th>Lama di Jabatan Terakhir</th>
                                                <th>Keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>No. Induk</td>
                                                <td>Nama</td>
                                                <td>Sebutan Jabatan / Kelas Unit</td>
                                                <td>Grade</td>
                                                <td>Tanggal Grade Terakhir</td>
                                                <td>Pendidikan Terakhir</td>
                                                <td>Nilai Talenta</td>
                                                <td>Jabatan Baru / Kelas Unit</td>
                                                <td>Lama di Jabatan Terakhir</td>
                                                <td>Keterangan</td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-info" data-toggle="modal" data-target=".modal-update">Sunting<span class="btn-icon-right"><i class="fa fa-edit"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>No. Induk</th>
                                                <th>Nama</th>
                                                <th>Sebutan Jabatan / Kelas Unit</th>
                                                <th>Grade</th>
                                                <th>Tanggal Grade Terakhir</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Nilai Talenta</th>
                                                <th>Jabatan Baru / Kelas Unit</th>
                                                <th>Lama di Jabatan Terakhir</th>
                                                <th>Keterangan</th>
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
    Begin : Modal for Add Data
***********************************-->
<div class="modal fade modal-create" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Lembar Evaluasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-validation">
                    <form class="form-valide" action="#" method="post">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No. Induk</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan No. Induk Pegawai..." required>
                                    <div class ="input-group-append">
                                        <button class="btn btn-outline-success" type="button"><i class="icon-magnifier menu-icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sebutan Jabatan / Kelas Unit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Grade</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Grade Terakhir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nilai Talenta</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option>LBS</option>
                                            <option>SOP</option>
                                            <option>SPO</option>
                                            <option>OPT</option>
                                            <option>POT</option>
                                            <option>KPO</option>
                                            <option>PPS</option>
                                            <option>PPE</option>
                                            <option>SPP</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option>LBS</option>
                                            <option>SOP</option>
                                            <option>SPO</option>
                                            <option>OPT</option>
                                            <option>POT</option>
                                            <option>KPO</option>
                                            <option>PPS</option>
                                            <option>PPE</option>
                                            <option>SPP</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option>LBS</option>
                                            <option>SOP</option>
                                            <option>SPO</option>
                                            <option>OPT</option>
                                            <option>POT</option>
                                            <option>KPO</option>
                                            <option>PPS</option>
                                            <option>PPE</option>
                                            <option>SPP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Jabatan yang Diusulkan</h5>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Business Area</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option>Pilih Salah Satu</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option>Pilih Salah Satu</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Org. Unit</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Organizational Unit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Panjang Posisi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" placeholder="Silahkan diisi..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Tambahkan Data</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Add Data
***********************************-->


<!--**********************************
    Begin : Modal for Update Data
***********************************-->
<div class="modal fade modal-update" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sunting Daftar Usulan Evaluasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-validation">
                    <form class="form-valide" action="#" method="post">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">No. Induk</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Masukkan No. Induk Pegawai..." required>
                                    <div class ="input-group-append">
                                        <button class="btn btn-outline-primary" type="button"><i class="icon-magnifier menu-icon"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sebutan Jabatan / Kelas Unit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Grade</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Grade Terakhir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nilai Talenta</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option>LBS</option>
                                            <option>SOP</option>
                                            <option>SPO</option>
                                            <option>OPT</option>
                                            <option>POT</option>
                                            <option>KPO</option>
                                            <option>PPS</option>
                                            <option>PPE</option>
                                            <option>SPP</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option>LBS</option>
                                            <option>SOP</option>
                                            <option>SPO</option>
                                            <option>OPT</option>
                                            <option>POT</option>
                                            <option>KPO</option>
                                            <option>PPS</option>
                                            <option>PPE</option>
                                            <option>SPP</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option>LBS</option>
                                            <option>SOP</option>
                                            <option>SPO</option>
                                            <option>OPT</option>
                                            <option>POT</option>
                                            <option>KPO</option>
                                            <option>PPS</option>
                                            <option>PPE</option>
                                            <option>SPP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>Jabatan yang Diusulkan</h5>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Business Area</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option>Pilih Salah Satu</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                            <div class="col-sm-9">
                                <select class="form-control">
                                    <option>Pilih Salah Satu</option>
                                    <option>A</option>
                                    <option>B</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Org. Unit</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Organizational Unit</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Panjang Posisi</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Keterangan</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="5" placeholder="Silahkan diisi..."></textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Sunting Data</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Update Data
***********************************-->


<!--**********************************
    Begin : Modal for Delete Data
***********************************-->
<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus data lembar evaluasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin Menghapus data (lembar evaluasi)?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Delete Data