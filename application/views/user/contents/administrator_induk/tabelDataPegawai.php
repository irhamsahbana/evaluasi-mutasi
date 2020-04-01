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
                                                <th>NIP</th>
                                                <th>Nama Pegawai</th>
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
                                                <td><?= $pegawai->org_unit ?></td>
                                                <td><?= $pegawai->organizational_unit ?></td>
                                                <td><?= $pegawai->position ?></td>
                                                <td><?= $pegawai->nama_panjang_posisi ?></td>
                                                <td><?= $pegawai->jenjang_main_grp ?></td>
                                                <td><?= $pegawai->jenjang_sub_grp ?></td>
                                                <td><?= $pegawai->grade ?></td>
                                                <td><?= $pegawai->tgl_grade ?></td>
                                                <td><?= $pegawai->pendidikan_terakhir ?></td>
                                                <td><?= $pegawai->talenta_semester_lalu ?></td>
                                                <td><?= $pegawai->talenta_dua_semester_lalu ?></td>
                                                <td><?= $pegawai->talenta_tiga_semester_lalu ?></td>
                                                <td><?= $pegawai->gender ?></td>
                                                <td><?= $pegawai->email ?></td>
                                                <td><?= $pegawai->tgl_masuk ?></td>
                                                <td><?= $pegawai->agama ?></td>
                                                <td><?= $pegawai->no_telp ?></td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-info" data-toggle="modal" data-target=".modal-update<?=$pegawai->nip?>">Sunting<span class="btn-icon-right" ><i class="fa fa-edit"></i></span>
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
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-validation">
                    <form class="form-valide" action="<?= site_url('AdministratorInduk/doAddPegawai') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pers. No.</label>
                            <div class="col-sm-9">
                                <input type="number" name="pers_no" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nipeg" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pegawai" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Business Area</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="business_area" id="area">
                                    <option value="">Pilih Business Area</option>
                                    <?php 
                                        if (!empty($area)) {
                                            foreach ($area as $row) {
                                                echo '<option value="'.$row['business_area'].'">'.$row['nama_business_area'].'</option>';
                                            }
                                        }else {
                                            echo '<option value="">Business Area tidak tersedia</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="personnel_subarea" id="subarea">
                                    <option value="">Pilih Business Area dahulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Org. Unit</label>
                            <div class="col-sm-9">
                                <input type="number" name="org_unit" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Organizational Unit</label>
                            <div class="col-sm-9">
                                <input type="text" name="organizational_unit" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <input type="number" name="position" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Panjang Posisi</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_panjang_posisi" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenjang - Main Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenjang_main_grp" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenjang - Sub Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenjang_sub_grp" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PS Group</label>
                            <div class="col-sm-9">
                                <input type="text" name="grade" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Grade Terakhir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_grade" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-9">
                                <input type="text" name="pendidikan_terakhir" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nilai Talenta</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="nilai_talenta_i">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option value="LBS">LBS</option>
                                            <option value="SOP">SOP</option>
                                            <option value="SPO">SPO</option>
                                            <option value="OPT">OPT</option>
                                            <option value="POT">POT</option>
                                            <option value="KPO">KPO</option>
                                            <option value="PPS">PPS</option>
                                            <option value="PPE">PPE</option>
                                            <option value="SPP">SPP</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="nilai_talenta_ii">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option value="LBS">LBS</option>
                                            <option value="SOP">SOP</option>
                                            <option value="SPO">SPO</option>
                                            <option value="OPT">OPT</option>
                                            <option value="POT">POT</option>
                                            <option value="KPO">KPO</option>
                                            <option value="PPS">PPS</option>
                                            <option value="PPE">PPE</option>
                                            <option value="SPP">SPP</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="nilai_talenta_iii">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option value="LBS">LBS</option>
                                            <option value="SOP">SOP</option>
                                            <option value="SPO">SPO</option>
                                            <option value="OPT">OPT</option>
                                            <option value="POT">POT</option>
                                            <option value="KPO">KPO</option>
                                            <option value="PPS">PPS</option>
                                            <option value="PPE">PPE</option>
                                            <option value="SPP">SPP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="gender">
                                    <option>Pilih Salah Satu</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_masuk" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Religious</label>
                            <div class="col-sm-9">
                                <input type="text" name="religious" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telephone No.</label>
                            <div class="col-sm-9">
                                <input type="text" name="telephone_no" class="form-control" placeholder="" required>
                            </div>
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
<!--**********************************
    End : Modal for Add Data
***********************************-->

<!--**********************************
    Begin : Modal for Update Data
***********************************-->
<?php 
    foreach ($data_pegawai as $pegawai) {
        $id = $pegawai->nip;
        $area_selected = $pegawai->business_area;
        $subarea_selected = $pegawai->personnel_subarea;
        $talenta_i_selected = $pegawai->talenta_semester_lalu;
        $talenta_ii_selected = $pegawai->talenta_dua_semester_lalu;
        $talenta_iii_selected = $pegawai->talenta_tiga_semester_lalu;
        $gender_selected = $pegawai->gender;
?>
<div class="modal fade modal-update<?=$id?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sunting Data Pegawai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-validation">
                    <form class="form-valide" action="<?= site_url('AdministratorInduk/doUpdatePegawai/'.$id) ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pers. No.</label>
                            <div class="col-sm-9">
                                <input type="number" name="pers_no" class="form-control" placeholder="" required value="<?=$pegawai->pers_no?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" name="nipeg" class="form-control" placeholder="" required value="<?=$pegawai->nip?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Pegawai</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_pegawai" class="form-control" placeholder="" required value="<?=$pegawai->nama_pegawai?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Business Area</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="business_area" id="area">
                                    <?php 
                                        $no = 1;
                                        foreach ($area as $row) {
                                    ?>
                                    <option value="<?=$row['business_area']?>" <?php if($area_selected == $row['business_area']){echo 'selected';} ?>><?=$row['nama_business_area']?></option>
                                    <?php $no++; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Personnel Subarea</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="personnel_subarea" id="subarea">
                                    <option value="">Pilih Personnel Subarea</option>
                                    <?php 
                                        $no = 1;
                                        foreach ($subarea as $row) {
                                    ?>
                                    <option value="<?=$row['personnel_subarea']?>" <?php if($subarea_selected == $row['personnel_subarea']){echo 'selected';} ?>><?=$row['nama_personnel_subarea']?></option>
                                    <?php $no++; } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Org. Unit</label>
                            <div class="col-sm-9">
                                <input type="number" name="org_unit" class="form-control" placeholder="" required value="<?=$pegawai->org_unit?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Organizational Unit</label>
                            <div class="col-sm-9">
                                <input type="text" name="organizational_unit" class="form-control" placeholder="" required value="<?=$pegawai->organizational_unit?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Position</label>
                            <div class="col-sm-9">
                                <input type="number" name="position" class="form-control" placeholder="" required value="<?=$pegawai->position?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nama Panjang Posisi</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_panjang_posisi" class="form-control" placeholder="" required value="<?=$pegawai->nama_panjang_posisi?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenjang - Main Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenjang_main_grp" class="form-control" placeholder="" required value="<?=$pegawai->jenjang_main_grp?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Jenjang - Sub Grp Text</label>
                            <div class="col-sm-9">
                                <input type="text" name="jenjang_sub_grp" class="form-control" placeholder="" required value="<?=$pegawai->jenjang_sub_grp?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">PS Group</label>
                            <div class="col-sm-9">
                                <input type="text" name="grade" class="form-control" placeholder="" required value="<?=$pegawai->grade?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Grade Terakhir</label>
                            <div class="col-sm-9">
                                <input type="date" name="tgl_grade" class="form-control" placeholder="" required value="<?=$pegawai->tgl_grade?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                            <div class="col-sm-9">
                                <input type="text" name="pendidikan_terakhir" class="form-control" placeholder="" required value="<?=$pegawai->pendidikan_terakhir?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nilai Talenta</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col">
                                        <select class="form-control" name="nilai_talenta_i">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option value="LBS" <?php if($talenta_i_selected == "LBS"){echo "selected";} ?>>LBS</option>
                                            <option value="SOP" <?php if($talenta_i_selected == "SOP"){echo "selected";} ?>>SOP</option>
                                            <option value="SPO" <?php if($talenta_i_selected == "SPO"){echo "selected";} ?>>SPO</option>
                                            <option value="OPT" <?php if($talenta_i_selected == "OPT"){echo "selected";} ?>>OPT</option>
                                            <option value="POT" <?php if($talenta_i_selected == "POT"){echo "selected";} ?>>POT</option>
                                            <option value="KPO" <?php if($talenta_i_selected == "KPO"){echo "selected";} ?>>KPO</option>
                                            <option value="PPS" <?php if($talenta_i_selected == "PPS"){echo "selected";} ?>>PPS</option>
                                            <option value="PPE" <?php if($talenta_i_selected == "PPE"){echo "selected";} ?>>PPE</option>
                                            <option value="SPP" <?php if($talenta_i_selected == "SPP"){echo "selected";} ?>>SPP</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="nilai_talenta_ii">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option value="LBS" <?php if($talenta_ii_selected == "LBS"){echo "selected";} ?>>LBS</option>
                                            <option value="SOP" <?php if($talenta_ii_selected == "SOP"){echo "selected";} ?>>SOP</option>
                                            <option value="SPO" <?php if($talenta_ii_selected == "SPO"){echo "selected";} ?>>SPO</option>
                                            <option value="OPT" <?php if($talenta_ii_selected == "OPT"){echo "selected";} ?>>OPT</option>
                                            <option value="POT" <?php if($talenta_ii_selected == "POT"){echo "selected";} ?>>POT</option>
                                            <option value="KPO" <?php if($talenta_ii_selected == "KPO"){echo "selected";} ?>>KPO</option>
                                            <option value="PPS" <?php if($talenta_ii_selected == "PPS"){echo "selected";} ?>>PPS</option>
                                            <option value="PPE" <?php if($talenta_ii_selected == "PPE"){echo "selected";} ?>>PPE</option>
                                            <option value="SPP" <?php if($talenta_ii_selected == "SPP"){echo "selected";} ?>>SPP</option>
                                        </select>
                                    </div>
                                    <div class="col">
                                        <select class="form-control" name="nilai_talenta_iii">
                                            <option>--Nilai Talenta (I)--</option>
                                            <option value="LBS" <?php if($talenta_iii_selected == "LBS"){echo "selected";} ?>>LBS</option>
                                            <option value="SOP" <?php if($talenta_iii_selected == "SOP"){echo "selected";} ?>>SOP</option>
                                            <option value="SPO" <?php if($talenta_iii_selected == "SPO"){echo "selected";} ?>>SPO</option>
                                            <option value="OPT" <?php if($talenta_iii_selected == "OPT"){echo "selected";} ?>>OPT</option>
                                            <option value="POT" <?php if($talenta_iii_selected == "POT"){echo "selected";} ?>>POT</option>
                                            <option value="KPO" <?php if($talenta_iii_selected == "KPO"){echo "selected";} ?>>KPO</option>
                                            <option value="PPS" <?php if($talenta_iii_selected == "PPS"){echo "selected";} ?>>PPS</option>
                                            <option value="PPE" <?php if($talenta_iii_selected == "PPE"){echo "selected";} ?>>PPE</option>
                                            <option value="SPP" <?php if($talenta_iii_selected == "SPP"){echo "selected";} ?>>SPP</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="gender">
                                    <option>Pilih Salah Satu</option>
                                    <option value="Laki-Laki" <?php if($gender_selected == "Laki-Laki"){echo "selected";} ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?php if($gender_selected == "Perempuan"){echo "selected";} ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">E-mail</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" placeholder="" required value="<?=$pegawai->email?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_masuk" class="form-control" placeholder="" required value="<?=$pegawai->tgl_masuk?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Religious</label>
                            <div class="col-sm-9">
                                <input type="text" name="religious" class="form-control" placeholder="" required value="<?=$pegawai->agama?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Telephone No.</label>
                            <div class="col-sm-9">
                                <input type="text" name="telephone_no" class="form-control" placeholder="" required value="<?=$pegawai->no_telp?>">
                            </div>
                        </div>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Sunting Data</button>
            </div>
                    </form>
        </div>
    </div>
</div>
<?php } ?>
<!--**********************************
    End : Modal for Update Data
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
            <div class="modal-header">
                <h5 class="modal-title">Hapus data pegawai</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= site_url('AdministratorInduk/doDeletePegawai/'.$id) ?>">
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