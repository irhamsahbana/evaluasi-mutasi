<?php $modul = $this->uri->segment(2);   ?>

<!--**********************************
            Sidebar start
        ***********************************-->
<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <?php if ($this->uri->segment(1) == 'AdministratorInduk') { ?>
                <li>
                    <a href="<?= site_url('AdministratorInduk/') ?>" class="<?= ($modul == '') ? 'active' : '' ?>">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanPencarian') ?>" class="<?= ($modul == 'tampilanPencarian') ? 'active' : '' ?>">
                        <i class="icon-magnifier menu-icon"></i><span class="nav-text">Pencarian Data Pegawai</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanDataPegawai') ?>" class="<?= ($modul == 'tampilanDataPegawai') ? 'active' : '' ?>">
                        <i class="icon-people menu-icon"></i><span class="nav-text">Data Pegawai</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanDaftarTalenta') ?>" class="<?= ($modul == 'tampilanNilaiTalentaPegawai' || $modul == 'tampilanDaftarTalenta') ? 'active' : '' ?>">
                        <i class="icon-star menu-icon"></i><span class="nav-text">Nilai Talenta Pegawai</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanApprovalCommittee') ?>" class="<?= ($modul == 'tampilanApprovalCommittee') ? 'active' : '' ?>">
                        <i class="icon-pencil menu-icon"></i> <span class="nav-text">Approval Committee</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanDataApproval') ?>" class="<?= ($modul == 'tampilanDataApproval') ? 'active' : '' ?>">
                        <i class="icon-layers menu-icon"></i><span class="nav-text">Posisi Approval Committee</span>
                    </a>
                </li>
                <li class="mega-menu mega-menu-sm">
                    <a href="<?= site_url('AdministratorInduk/tampilanJabatanPerUnit') ?>" class="<?= ($modul == 'tampilanJabatan' || $modul == 'tampilanJabatanPerUnit' || $modul == 'getEditJabatan') ? 'active' : '' ?>">
                        <i class="icon-list menu-icon"></i><span class="nav-text">Daftar Jabatan</span>
                    </a>
                </li>
                <li class="mega-menu mega-menu-sm">
                    <a href="<?= site_url('AdministratorInduk/tampilanDaftarBusinessArea') ?>" class="<?= ($modul == 'tampilanDaftarBusinessArea') ? 'active' : '' ?>">
                        <i class="icon-list menu-icon"></i><span class="nav-text">Daftar Business Area</span>
                    </a>
                </li>
                <li class="mega-menu mega-menu-sm">
                    <a href="<?= site_url('AdministratorInduk/tampilanDaftarPersonnelSubarea') ?>" class="<?= ($modul == 'tampilanDaftarPersonnelSubarea') ? 'active' : '' ?>">
                        <i class="icon-list menu-icon"></i><span class="nav-text">Daftar Personnel Subarea</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanUsulanLembarEvaluasiUnit') ?>" class="<?= ($modul == 'tampilanUsulanLembarEvaluasiUnit') ? 'active' : '' ?>">
                        <i class="icon-note menu-icon"></i><span class="nav-text">Usulan Evaluasi dari Unit</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanUsulanLembarEvaluasiUnitDitolak') ?>" class="<?= ($modul == 'tampilanUsulanLembarEvaluasiUnitDitolak') ? 'active' : '' ?>">
                        <i class="icon-user-unfollow menu-icon"></i><span class="nav-text">Usulan Evaluasi dari Unit yang Ditolak</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanUsulanLembarEvaluasi') ?>" class="<?= ($modul == 'tampilanUsulanLembarEvaluasi' || $modul == 'tampilanRincianLembarEvaluasi') ? 'active' : '' ?>">
                        <i class="icon-docs menu-icon"></i><span class="nav-text">Usulan Lembar Evaluasi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorInduk/tampilanAdministrator') ?>" class="<?= ($modul == 'tampilanAdministrator') ? 'active' : '' ?>">
                        <i class="icon-settings menu-icon"></i><span class="nav-text">Pengaturan Adminstrator</span>
                    </a>
                </li>
                <!-- <li>
                        <a href="<?= site_url('AdministratorInduk/tampilanNilaiTalenta') ?>" class="<?= ($modul == 'tampilanNilaiTalenta') ? 'active' : '' ?>">
                            <i class="icon-star menu-icon"></i><span class="nav-text">Nilai Talenta</span>
                        </a>
                    </li> -->
                <!-- <li>
                        <a href="<?= site_url('User/tampilanUsulanEvaluasi') ?>" class="<?= ($modul == 'tampilanUsulanEvaluasi') ? 'active' : '' ?>">
                            <i class="icon-paper-plane menu-icon"></i><span class="nav-text">Usulan Evaluasi</span>
                        </a>
                    </li> -->
            <?php } ?>


            <?php if ($this->uri->segment(1) == 'AdministratorUnit') { ?>
                <li>
                    <a href="<?= site_url('AdministratorUnit/tampilanDataPegawai') ?>" class="<?= ($modul == 'tampilanDataPegawai') ? 'active' : '' ?>">
                        <i class="icon-people menu-icon"></i><span class="nav-text">Data Pegawai</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('AdministratorUnit/tampilanUsulanLembarEvaluasi') ?>" class="<?= ($modul == 'tampilanUsulanLembarEvaluasi') ? 'active' : '' ?>">
                        <i class="icon-docs menu-icon"></i><span class="nav-text">Usulan Lembar Evaluasi</span>
                    </a>
                </li>
            <?php } ?>


            <?php if ($this->uri->segment(1) == 'ApprovalCommittee') { ?>
                <li>
                    <a href="<?= site_url('ApprovalCommittee/tampilanUsulanEvaluasiMasuk') ?>" class="<?= ($modul == 'tampilanUsulanEvaluasiMasuk') ? 'active' : '' ?>">
                        <i class="icon-envelope menu-icon"></i><span class="nav-text">Usulan Evaluasi Masuk</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('ApprovalCommittee/tampilanUsulanEvaluasiSelesai') ?>" class="<?= ($modul == 'tampilanUsulanEvaluasiSelesai') ? 'active' : '' ?>">
                        <i class="icon-paper-plane menu-icon"></i><span class="nav-text">Usulan Evaluasi Telah Ditanggapi</span>
                    </a>
                </li>
                <li>
                    <a href="<?= site_url('ApprovalCommittee/ubahPasswordApproval') ?>" class="<?= ($modul == 'ubahPasswordApproval') ? 'active' : '' ?>">
                        <i class="icon-settings menu-icon"></i><span class="nav-text">Sunting Password</span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>
<!-- coba push -->
<!--**********************************
            Sidebar end
        ***********************************-->