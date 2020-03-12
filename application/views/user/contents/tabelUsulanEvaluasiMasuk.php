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
                                                <th>Tanggal usalan</th>
                                                <th>Usulan dari Unit</th>
                                                <th>Pegawai yang diusulkan</th>
                                                <th>Persetujuan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>11 Maret 2020</td>
                                                <td>UIW Sulselrabar</td>
                                                <td>
                                                    <a href="#">Irham Sahbana, </a>
                                                    <a href="#">Okti Asrianawati, </a>
                                                    <a href="#">Ghina syukria Rania</a>
                                                <td>
                                                     <button type="button" class="btn mb-1 btn-success"data-toggle="modal" data-target=".modal-accept">Setujui<span class="btn-icon-right"><i class="fa fa-check"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger" data-toggle="modal" data-target=".modal-reject">Tolak<span class="btn-icon-right"><i class="fa fa-close"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal usalan</th>
                                                <th>Usulan dari Unit</th>
                                                <th>Pegawai yang diusulkan</th>
                                                <th>Persetujuan</th>
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
    Begin : Modal for Terima Data
***********************************-->
<div class="modal fade modal-accept" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Persetujuan Evaluasi Masuk</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin menyetujui evaluasi ini?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Setujui</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Terima Data
***********************************-->

<!--**********************************
    Begin : Modal for Tolak Data
***********************************-->
<div class="modal fade modal-reject" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Evaluasi Masuk</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin Menolak data evaluasi ini?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Tolak</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Tolak Data
***********************************-->