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
                                                <th>Administrator Pengusul</th>
                                                <th>Personnel Subarea</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            <?php
                                            $no = 1;
                                            foreach ($usulan as $get) {
                                            ?>
                                                <td><?= $no++ ?></td>
                                                <td><?= $get->tgl_usulan ?></td>
                                                <td><?= $get->nama_pegawai ?></td>
                                                <td><?= $get->nama_personnel_subarea ?></td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-info" onclick='window.open("<?=site_url('ApprovalCommittee/getDetailUsulanSelesai/'.$get->id_usulan);?>","_blank")'>Detail<span class="btn-icon-right"><i class="fa fa-paperclip"></i></span>
                                                    </button>
                                                </td>
                                            <?php } ?>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Usulan</th>
                                                <th>Administrator Pengusul</th>
                                                <th>Personnel Subarea</th>
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


        