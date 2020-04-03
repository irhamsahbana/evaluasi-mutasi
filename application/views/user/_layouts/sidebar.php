<?php  $modul = $this->uri->segment(2);   ?>

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Menu</li>
                    <li>
                        <a href="javascript:void()">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('AdministratorInduk/tampilanDataPegawai') ?>" class="<?= ($modul == 'tampilanDataPegawai') ? 'active' : '' ?>">
                            <i class="icon-people menu-icon"></i><span class="nav-text">Data Pegawai</span>
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
                        <a href="<?= site_url('User/tampilanDaftarJabatan') ?>" class="<?= ($modul == 'tampilanDaftarJabatan') ? 'active' : '' ?>">
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
                        <a href="<?= site_url('User/tampilanUsulanEvaluasiDariUnit') ?>" class="<?= ($modul == 'tampilanUsulanEvaluasiDariUnit') ? 'active' : '' ?>">
                            <i class="icon-note menu-icon"></i><span class="nav-text">Usulan Evaluasi dari Unit</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('User/tampilanUsulanEvaluasiYangDitolak') ?>" class="<?= ($modul == 'tampilanUsulanEvaluasiYangDitolak') ? 'active' : '' ?>">
                            <i class="icon-user-unfollow menu-icon"></i><span class="nav-text">Usulan Evaluasi dari Unit yang Ditolak</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('User/tampilanLembarEvaluasi') ?>" class="<?= ($modul == 'tampilanLembarEvaluasi') ? 'active' : '' ?>">
                            <i class="icon-docs menu-icon"></i><span class="nav-text">Lembar Evaluasi</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('User/tampilanPengaturanPengguna') ?>" class="<?= ($modul == 'tampilanPengaturanPengguna') ? 'active' : '' ?>">
                            <i class="icon-settings menu-icon"></i><span class="nav-text">Pengaturan Adminstrator</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('AdministratorInduk/tampilanNilaiTalenta') ?>" class="<?= ($modul == 'tampilanNilaiTalenta') ? 'active' : '' ?>">
                            <i class="icon-star menu-icon"></i><span class="nav-text">Nilai Talenta</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('User/tampilanUsulanEvaluasiMasuk') ?>" class="<?= ($modul == 'tampilanUsulanEvaluasiMasuk') ? 'active' : '' ?>">
                            <i class="icon-envelope menu-icon"></i><span class="nav-text">Usulan Evaluasi Masuk</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?= site_url('User/tampilanUsulanEvaluasi') ?>" class="<?= ($modul == 'tampilanUsulanEvaluasi') ? 'active' : '' ?>">
                            <i class="icon-paper-plane menu-icon"></i><span class="nav-text">Usulan Evaluasi</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->