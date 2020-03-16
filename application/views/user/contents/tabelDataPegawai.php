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
                                <h4 class="card-title">Data Pegawai</h4>
                                <div class="table-responsive">
                                    <div id="dataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <button style="float: right;" type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target=".modal-create">
                                            Tambah<span class="btn-icon-right"><i class="fa fa-user-plus"></i></span>
                                        </button>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pers. No.</th>
                                                <th>Nipeg</th>
                                                <th>Personnel Number</th>
                                                <th>Business Area</th>
                                                <th>Personnel Subarea</th>
                                                <th>Org.unit</th>
                                                <th>Organizational Unit</th>
                                                <th>Position</th>
                                                <th>Nama Panjang Posisi</th>
                                                <th>Jenjang - Main Grp Text</th>
                                                <th>Jenjang - Sub Grp Text</th>
                                                <th>PS group</th>
                                                <th>Tanggal Grade Terakhir</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Nilai Talenta (I)</th>
                                                <th>Nilai Talenta (II)</th>
                                                <th>Nilai Talenta (III)</th>
                                                <th>Birth date</th>
                                                <th>Tanggal CAPEG</th>
                                                <th>Tanggal Pegawai Tetap</th>
                                                <th>Gender Key</th>
                                                <th>E-mail</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Religious Denomination Key</th>
                                                <th>Telephone no.</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Pers. No.</td>
                                                <td>Nipeg</td>
                                                <td>Personnel Number</td>
                                                <td>Business Area</td>
                                                <td>Personnel Subarea</td>
                                                <td>Org.unit</td>
                                                <td>Organizational Unit</td>
                                                <td>Position</td>
                                                <td>Nama Panjang Posisi</td>
                                                <td>Jenjang - Main Grp Text</td>
                                                <td>Jenjang - Sub Grp Text</td>
                                                <td>PS group</td>
                                                <td>Tanggal Grade Terakhir</td>
                                                <td>Pendidikan Terakhir</td>
                                                <td>Nilai Talenta (I)</td>
                                                <td>Nilai Talenta (II)</td>
                                                <td>Nilai Talenta (III)</td>
                                                <td>Birth date</td>
                                                <td>Tanggal CAPEG</td>
                                                <td>Tanggal Pegawai Tetap</td>
                                                <td>Gender Key</td>
                                                <td>E-mail</td>
                                                <td>Tanggal Masuk</td>
                                                <td>Religious Denomination Key</td>
                                                <td>Telephone no.</td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-info" data-toggle="modal" data-target=".modal-update">Sunting<span class="btn-icon-right" ><i class="fa fa-edit"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pers. No.</th>
                                                <th>Nipeg</th>
                                                <th>Personnel Number</th>
                                                <th>Business Area</th>
                                                <th>Personnel Subarea</th>
                                                <th>Org. Unit</th>
                                                <th>Organizational Unit</th>
                                                <th>Position</th>
                                                <th>Nama Panjang Posisi</th>
                                                <th>Jenjang - Main Grp Text</th>
                                                <th>Jenjang - Sub Grp Text</th>
                                                <th>PS Group</th>
                                                <th>Tanggal Grade Terakhir</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Nilai Talenta (I)</th>
                                                <th>Nilai Talenta (II)</th>
                                                <th>Nilai Talenta (III)</th>
                                                <th>Birth Date</th>
                                                <th>Tanggal CAPEG</th>
                                                <th>Tanggal Pegawai Tetap</th>
                                                <th>Gender Key</th>
                                                <th>E-mail</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Religious Denomination Key</th>
                                                <th>Telephone No.</th>
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
                <h5 class="modal-title">Tambah Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-validation">
                    <form class="form-valide" action="#" method="post">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pers. No.</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nipeg</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
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
                            <label class="col-sm-3 col-form-label">Jenjang - Main Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenjang - Sub Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PS Group</label>
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
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Birth Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal CAPEG</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Pegawai Tetap</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender Key</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Religious Denomination Key</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telephone No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
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
                <h5 class="modal-title">Sunting Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-validation">
                    <form class="form-valide" action="#" method="post">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pers. No.</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nipeg</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
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
                            <label class="col-sm-3 col-form-label">Jenjang - Main Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenjang - Sub Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PS Group</label>
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
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Birth Date</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal CAPEG</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Pegawai Tetap</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender Key</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Religious Denomination Key</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telephone No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="" required>
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
                <h5 class="modal-title">Hapus data pegawai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin menghapus data (nama pegawai)?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Delete Data
***********************************-->