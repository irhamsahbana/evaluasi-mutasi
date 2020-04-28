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
                                <div id="dataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
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

                                    <button style="float: right;" type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target=".modal-create">Tambah<span class="btn-icon-right"><i class="fa fa-user-plus"></i></span>
                                    </button>
                                    <button style="float: right;" type="button" class="btn mb-1 mr-3 btn-rounded btn-success" data-toggle="modal" data-target=".modal-import"><span class="btn-icon-left"><i class="fa fa-upload color-success"></i> </span>Unggah Data Pegawai</button>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pers. No.</th>
                                                <th>NIP</th>
                                                <th>Nama Pegawai</th>
                                                <th>Personnel Subarea</th>
                                                <th>Jabatan Saat Ini</th>
                                                <th>Org.unit</th>
                                                <th>Organizational Unit</th>
                                                <th>Position</th>
                                                <th>Nama Panjang Posisi</th>
                                                <th>Jenjang - Main Grp Text</th>
                                                <th>Jenjang - Sub Grp Text</th>
                                                <th>PS group</th>
                                                <th>Tanggal Grade Terakhir</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Tanggal Capeg</th>
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
                                            <?php 
                                                $no = 1;
                                                foreach ($data_pegawai as $pegawai) {
                                            ?>
                                            <tr>
                                                <td><?= $no++ ?></td>
                                                <td><?= $pegawai->pers_no ?></td>
                                                <td><?= $pegawai->nip ?></td>
                                                <td><?= $pegawai->nama_pegawai ?></td>
                                                <td><?= $pegawai->nama_personnel_subarea ?></td>
                                                <td><?= $pegawai->sebutan_jabatan ?></td>
                                                <td><?= $pegawai->org_unit ?></td>
                                                <td><?= $pegawai->organizational_unit ?></td>
                                                <td><?= $pegawai->position ?></td>
                                                <td><?= $pegawai->nama_panjang_posisi ?></td>
                                                <td><?= $pegawai->jenjang_main_grp ?></td>
                                                <td><?= $pegawai->jenjang_sub_grp ?></td>
                                                <td><?= $pegawai->grade ?></td>
                                                <td><?= $pegawai->tgl_grade ?></td>
                                                <td><?= $pegawai->pendidikan_terakhir ?></td>
                                                <td><?= $pegawai->tgl_lahir ?></td>
                                                <td><?= $pegawai->tgl_capeg ?></td>
                                                <td><?= $pegawai->tgl_pegawai_tetap ?></td>
                                                <td><?= $pegawai->gender ?></td>
                                                <td><?= $pegawai->email ?></td>
                                                <td><?= $pegawai->tgl_masuk ?></td>
                                                <td><?= $pegawai->agama ?></td>
                                                <td><?= $pegawai->no_telp ?></td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-info" onclick='window.open("<?=site_url('AdministratorInduk/getEditPegawai/'.$pegawai->nip);?>","_blank")'>Sunting<span class="btn-icon-right"><i class="fa fa-edit"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-delete<?=$pegawai->nip?>">Hapus<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <?php 
                                                }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pers. No.</th>
                                                <th>NIP</th>
                                                <th>Nama Pegawai</th>
                                                <th>Personnel Subarea</th>
                                                <th>Jabatan Saat Ini</th>
                                                <th>Org.unit</th>
                                                <th>Organizational Unit</th>
                                                <th>Position</th>
                                                <th>Nama Panjang Posisi</th>
                                                <th>Jenjang - Main Grp Text</th>
                                                <th>Jenjang - Sub Grp Text</th>
                                                <th>PS group</th>
                                                <th>Tanggal Grade Terakhir</th>
                                                <th>Pendidikan Terakhir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Tanggal Capeg</th>
                                                <th>Tanggal Pegawai Tetap</th>
                                                <th>Gender Key</th>
                                                <th>E-mail</th>
                                                <th>Tanggal Masuk</th>
                                                <th>Religious Denomination Key</th>
                                                <th>Telephone no.</th>
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
            <div class="form-validation">
                <form class="form-valide" action="<?= site_url('AdministratorInduk/doAddPegawai') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pers. No.</label>
                            <div class="col-sm-9">
                                <input type="number" name="pers_no" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nipeg" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pegawai" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Business Area</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="business_area" id="add_area" required>
                                    <option value="">Pilih Salah Satu</option>
                                    <?php foreach($area as $row):?>
                                    <option value="<?php echo $row->business_area;?>"><?php echo $row->nama_business_area;?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="personnel_subarea" id="add_subarea" required>
                                    <option >Pilih Business Area dahulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Sebutan Jabatan</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="sebutan_jabatan" id="add_jabatan" required>
                                    <option >Pilih Personnel Subarea dahulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Org. Unit</label>
                            <div class="col-sm-9">
                                <input type="number" name="org_unit" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Organizational Unit</label>
                            <div class="col-sm-9">
                                <input type="text" name="organizational_unit" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <input type="number" name="position" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Panjang Posisi</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_panjang_posisi" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenjang - Main Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenjang_main_grp" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenjang - Sub Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenjang_sub_grp" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PS Group</label>
                            <div class="col-sm-9">
                                <input type="text" name="grade" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Grade Terakhir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_grade" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-9">
                                <input type="text" name="pendidikan_terakhir" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_lahir" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Capeg</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_capeg" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Pegawai Tetap</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_pegawai_tetap" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="gender" required>
                                    <option>Pilih Salah Satu</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_masuk" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Religious</label>
                            <div class="col-sm-9">
                                <input type="text" name="religious" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telephone No.</label>
                            <div class="col-sm-9">
                                <input type="text" name="telephone_no" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Add Data
***********************************-->


<!--**********************************
    Begin : Modal for Delete Data
***********************************-->
<?php
    foreach ($data_pegawai as $pegawai) {
        $id = $pegawai->nip;
?>
<div class="modal fade modal-delete<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form method="POST" action="<?= site_url('AdministratorInduk/doDeletePegawai/'.$id) ?>">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus data pegawai</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Yakin ingin menghapus data (<?=$pegawai->nama_pegawai?>) ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
<!--**********************************
    End : Modal for Delete Data
***********************************-->

<!--**********************************
    Begin : Modal for import excel/csv
***********************************-->
<div class="modal fade modal-import" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="form-validation">
                <form class="form-valide" action="<?= site_url('AdministratorInduk/doImportPegawai') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title">Unggah File Excel Data Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col sm-12">
                                Silahkan download dan gunakan <strong><u><a href="#">Template Spreadsheet ini</a></u></strong> untuk mengunggah data pegawai! 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Unggah File Excel</label>
                            <div class="col-sm-9">
                                <input type="file" name="file_data_pegawai" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Tambahkan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for import excel/csv
***********************************-->