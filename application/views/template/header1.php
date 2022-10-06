<?php $data = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url() ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-green {
            background-color: #90C8AC;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-green sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>">
                <div class="sidebar-brand-text mx-3">Pinter Hits</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">


            <!-- Query Menu -->
            <?php
            $role_id = $this->session->userdata('role_id');
            $queryMenu = "SELECT `user_menu`.`id`, `menu`,`icon`
                                FROM `user_menu` JOIN `user_access_menu`
                                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                                WHERE `user_access_menu`.`role_id` = $role_id
                                ORDER BY `user_access_menu`.`menu_id` ASC
                ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>


            <!-- Looping Menu -->
            <?php
            foreach ($menu as $m) :
            ?>
                <!-- <div class="sidebar-heading text-white mt-2">
                    <?= $m['menu']; ?>
                </div> -->

                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#<?= $m['menu']; ?>" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="<?= $m['icon'] ?>"></i>
                        <span><?= $m['menu']; ?></span>
                    </a>
                    <div id="<?= $m['menu']; ?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Data <?= $m['menu']; ?></h6>

                            <!-- Sub Menu Sesuai Menu -->
                            <?php
                            $menuId = $m['id'];
                            $querySubMenu = "SELECT *
                     FROM `user_sub_menu` JOIN `user_menu`
                         ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                     WHERE `user_sub_menu`.`menu_id` = $menuId
                     AND `user_sub_menu`.`is_active` = 1";
                            $subMenu = $this->db->query($querySubMenu)->result_array();
                            ?>
                            <?php foreach ($subMenu as $sm) : ?>
                                <!-- <li class="nav-item">
                        <a class="nav-link" href="<?= base_url($sm['url']) ?>">
                            <i class="<?= $sm['icon'] ?>"></i>
                            <span><?= $sm['title'] ?></span></a>
                    </li> -->
                                <a class="collapse-item" href="<?= base_url($sm['url']) ?>"><?= $sm['title'] ?></a>


                            <?php endforeach; ?>
                        </div>
                    </div>
                </li>
                <hr class="sidebar-divider">

            <?php endforeach; ?>

            <!-- Divider -->

            <!-- Nav Item - Pages Collapse Menu -->

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                        </li>


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('name') ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url() ?>assets/image/profile/<?= $user['image'] ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
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