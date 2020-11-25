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
                                    if ($this->session->flashdata('alert_success') == TRUE) : ?>
                                        <div class="alert alert-success alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button><strong><?= $alert_success ?></strong></div>
                                    <?php endif; ?>
                                    <!-- Alert Update -->
                                    <?php
                                    $alert_primary = $this->session->flashdata('alert_primary');
                                    if ($this->session->flashdata('alert_primary') == TRUE) : ?>
                                        <div class="alert alert-primary alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button><strong><?= $alert_primary ?></strong></div>
                                    <?php endif; ?>
                                    <!-- Alert Delete -->
                                    <?php
                                    $alert_danger = $this->session->flashdata('alert_danger');
                                    if ($this->session->flashdata('alert_danger') == TRUE) : ?>
                                        <div class="alert alert-danger alert-dismissible fade show">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                            </button><strong><?= $alert_danger ?></strong></div>
                                    <?php endif; ?>

                                </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Pers. No.</th>
                                                <th>NIP</th>
                                                <th>Nama Pegawai</th>
                                                <th>Business Area</th>
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
                                                    <td><?= $pegawai->nama_business_area ?></td>
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
                                                <th>Business Area</th>
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
