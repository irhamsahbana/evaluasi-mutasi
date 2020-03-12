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
                                <h4 class="card-title">Approval Committee</h4>
                                <div class="table-responsive">
                                    <div id="dataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                                        <button style="float: right;" type="button" class="btn mb-1 btn-success" data-toggle="modal" data-target=".modal-create">Tambah<span class="btn-icon-right"><i class="fa fa-user-plus"></i></span>
                                        </button>
                                    </div>
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIP</th>
                                                <th>Nama Lengkap</th>
                                                <th>Posisi</th>
                                                <th>Tanda Tangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>NIP</td>
                                                <td>Nama Lengkap</td>
                                                <td>Posisi</td>
                                                <td>Tanda Tangan</td>
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
                                                <th>NIP</th>
                                                <th>Nama Lengkap</th>
                                                <th>Posisi</th>
                                                <th>Tanda Tangan</th>
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
                <h5 class="modal-title">Tambah Data Approval</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Tambah data approval.</div>
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
                <h5 class="modal-title">Sunting Data Approval</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Sunting data approval</div>
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
                <h5 class="modal-title">Hapus data approval</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Yakin ingin Menghapus data (approval)?</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Hapus</button>
            </div>
        </div>
    </div>
</div>
<!--**********************************
    End : Modal for Delete Data
***********************************-->