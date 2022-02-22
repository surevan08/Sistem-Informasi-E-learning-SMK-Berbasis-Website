<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?> | E-learning SMK Piri 1 Yogyakarta</title>
    <link rel="shortcut icon" href="<?= base_url('assets/img/favicon.png'); ?>">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Css sb & table-->
    <link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css'); ?>" rel="stylesheet">
    <script src="<?= base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script>
    <!-- custom van  -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->
    <script src="<?= base_url('assets/vendor/jquery/jquery-3.5.1.min.js'); ?>"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('petugas/beranda') ?>">
                <div class="sidebar-brand-img sm-6">
                    <img src="<?= base_url('assets/img/logopiri.png'); ?>" width="70">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-3">

            <!-- Nav Item - Beranda -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('petugas/beranda') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Data Master -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datamaster" aria-expanded="true" aria-controls="datamaster">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Master</span>
                </a>
                <div id="datamaster" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Master</h6>
                        <a class="collapse-item" href="<?= base_url('petugas/datapetugas'); ?>">Data Petugas</a>
                        <a class="collapse-item" href="<?= base_url('petugas/dataguru'); ?>">Data Guru</a>
                        <a class="collapse-item" href="<?= base_url('petugas/datasiswa'); ?>">Data Siswa</a>
                        <a class="collapse-item" href="<?= base_url('petugas/jurusan'); ?>">Jurusan</a>
                        <a class="collapse-item" href="<?= base_url('petugas/kelas'); ?>">Kelas</a>
                        <a class="collapse-item" href="<?= base_url('petugas/mapel'); ?>">Mata Pelajaran</a>
                        <a class="collapse-item" href="<?= base_url('petugas/tahunajaran'); ?>">Tahun Ajaran</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pembelajaran -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pembelajaran" aria-expanded="true" aria-controls="pembelajaran">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Pembelajaran</span>
                </a>
                <div id="pembelajaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pembelajaran</h6>
                        <a class="collapse-item" href="<?= base_url('petugas/perkelasan'); ?>">Perkelasan</a>
                        <a class="collapse-item" href="<?= base_url('petugas/mengajar'); ?>">Mengajar</a>
                    </div>
                </div>
            </li>


            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- button select tahun ajaran  -->
                    <form method="POST" action="<?= base_url('petugas/tahunajaran/settahun'); ?>">
                        <div class="input-group">
                            <select class="custom-select custom-select-sm" name="id_tahun">
                                <option selected>Tahun Ajaran</option>
                                <?php foreach (tampil_tahun() as $key => $value) : ?>
                                    <option value=" <?= $value['id_tahun']; ?>" <?= $value['id_tahun'] == $this->session->userdata('id_tahun') ? 'selected' : ''; ?>><?= $value['tahun_ajaran']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <select class="custom-select custom-select-sm" name="semester">
                                <option selected>Semester</option>
                                <option value="Ganjil" <?= $this->session->userdata("semester") == "Ganjil" ? "selected" : ""; ?>>Ganjil</option>
                                <option value="Genap" <?= $this->session->userdata("semester") == "Genap" ? "selected" : ""; ?>>Genap</option>
                            </select>
                            <div class="input-group-append">
                                <input type="hidden" name="balik" value="<?php echo current_url(); ?>">
                                <button class="btn btn-sm btn-primary font-weight-bold" type="submit">PILIH</button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php $petugas = $this->session->userdata('petugas') ?>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $petugas['nama_petugas']; ?>
                                </span>
                                <?php if (!empty($petugas["foto_petugas"])) : ?>
                                    <img class="img-profile rounded-circle" src="<?= base_url("assets/img/petugas/" . $petugas["foto_petugas"]); ?>">
                                <?php else : ?>
                                    <img class="img-profile rounded-circle" src="<?= base_url("assets/img/avatar.jpg"); ?>">
                                <?php endif; ?>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('petugas/beranda'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->


                <!-- Logout Modal -->
                <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Yakin Keluar?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Pilih "Logout" di bawah ini jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
                                <a class="btn btn-primary btn-sm" href="<?= base_url('petugas/logout'); ?>">Logout</a>
                            </div>
                        </div>
                    </div>
                </div>