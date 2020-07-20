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
                                <h4 class="card-title">Ubah Password Approval</h4>
                                     <!-- Alert Success -->
                                <?php 
                                $alert_success = $this->session->flashdata('alert_success');
                                if($this->session->flashdata('alert_success') == TRUE) : ?>
                                    <div class="alert alert-success alert-dismissible fade show">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
                                    </button><strong><?= $alert_success ?></strong></div>
                                <?php endif; ?>
                                <div class="form-validation">
                                    <?php 
                                    foreach ($data_penerima as $penerima) {
                                    ?>
                                    <form class="form-valide" action="<?= site_url('ApprovalCommittee/doUpdatePassword/') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Password Baru</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="password" class="form-control" required>
                                            </div>
                                        </div>
                                        <input type="hidden" readonly name="nip" value="<?= $penerima->nip ?>">
                                        <input type="hidden" readonly name="password_lama" value="<?= $penerima->password ?>">
                                        <button type="submit" class="btn btn-primary">Sunting Data</button>
                                    </form>
                                    <?php } ?>
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
