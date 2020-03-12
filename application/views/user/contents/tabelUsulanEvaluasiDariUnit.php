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
                                <h4 class="card-title">Usulan Evaluasi dari Unit</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Pengusulan</th>
                                                <th>Unit yang Mengusulkan</th>
                                                <th>Evaluasi Mutasi (?)</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>11 Maret 2020</td>
                                                <td>Sulsel</td>
                                                <td></td>
                                                <td>
                                                    <button type="button" class="btn mb-1 btn-success"data-toggle="modal" data-target=".modal-accept">Terima<span class="btn-icon-right"><i class="fa fa-check"></i></span>
                                                    </button>
                                                    <button type="button" class="btn mb-1 btn-danger"data-toggle="modal" data-target=".modal-reject">Tolak<span class="btn-icon-right" ><i class="fa fa-close"></i></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>12 Maret 2020</td>
                                                <td>Sulbar</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>13 Maret 2020</td>
                                                <td>Sulteng</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No.</th>
                                                <th>Tanggal Pengusulan</th>
                                                <th>Unit yang Mengusulkan</th>
                                                <th>Evaluasi Mutasi (?)</th>
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
    Begin : Modal for Terima Data
***********************************-->
<div class="modal fade modal-accept" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Persetujuan Usulan Evaluasi dari Unit</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin Menyetujui usulan ini?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success">Yakin</button>
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
                <h5 class="modal-title">Evaluasi Penolakan</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin Menolak data usulan evaluasi dari unit?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Tolak</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Tolak Data
***********************************-->