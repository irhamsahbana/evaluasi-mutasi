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
                                <h4 class="card-title">Usulan Evaluasi Masuk</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Usulan</th>
                                                <th>NIP</th>
                                                <th>Nama Pegawai</th>
                                                <th>Jabatan Saat Ini</th>
                                                <th>Jabatan yang Diusulkan</th>
                                                <th>Persetujuan</th>
                                                <th>Ubah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php
                                            $no = 1;
                                            foreach ($detail as $get) {
                                            ?>
                                                <td><?= $no++ ?></td>
                                                <td><?= $get->tgl_usulan ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target=".modal-terima">Terima<span class="btn-icon-right"><i class="fa fa-check"></i></span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-danger"data-toggle="modal" data-target=".modal-tolak">Tolak<span class="btn-icon-right"><i class="fa fa-times"></i></span>
                                                    </button>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Usulan</th>
                                                <th>NIP</th>
                                                <th>Nama Pegawai</th>
                                                <th>Jabatan Saat Ini</th>
                                                <th>Jabatan yang Diusulkan</th>
                                                <th>Persetujuan</th>
                                                <th>Ubah</th>
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
    Begin : Modal for Update Data
***********************************-->
<div class="modal fade modal-terima" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Terima Usulan Evaluasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin menerima usulan ini?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Terima Usulan</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Update Data
***********************************-->

<!--**********************************
    Begin : Modal for Update Data
***********************************-->
<div class="modal fade modal-tolak" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tolak Usulan Evaluasi</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin menolak usulan ini?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Tolak Usulan</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Update Data
***********************************-->


