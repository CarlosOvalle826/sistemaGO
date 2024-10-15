<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hermanitas G. O.</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
    <!--integracion de sweet alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Iconos de Flaticon-->
    <!--<link rel="stylesheet" href="public/images/uicons-solid-rounded/css/uicons-solid-rounded.css">-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.5.1/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!--Cuerpo de la vista-->
    <!-- jQuery -->
    <script src="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Sistema de ventas</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: white;">
            <!-- Brand Logo -->
            <a href="<?php echo $URL ?>" class="brand-link">
                <img src="<?php echo $URL; ?>/public/images/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light" style="color: black;">Hermanitas G. O.</span>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="<?php echo $URL; ?>/public/templeates/AdminLTE-3.2.0/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block" style="color: black;"><?php echo $nombre_sesion; ?></a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fi fi-rr-users-alt"></i>
                                <p>
                                    Usuarios
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/usuarios" class="nav-link active">
                                        <i class="fi fi-rr-list-check"></i>
                                        <p style="color: black;">Usuarios registrados</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/usuarios/crear.php" class="nav-link active">
                                        <i class="fi fi-rr-user-add"></i>
                                        <p style="color: black;">Crear usuario</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--Integración de roles de usaurio al sistema-->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fi fi-rr-credit-card-buyer"></i>
                                <p>
                                    Roles
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/roles" class="nav-link active">
                                        <i class="fi fi-rr-book-user"></i>
                                        <p style="color: black;">Roles registrados</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/roles/crear.php" class="nav-link active">
                                        <i class="fi fi-rr-user-lock"></i>
                                        <p style="color: black;">Crear roles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--Integración del modulo categorias-->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fi fi-rr-brand"></i>
                                <p>
                                    Categorias
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/categorias" class="nav-link active">
                                        <i class="fi fi-rr-tags"></i>
                                        <p style="color: black;">Categorias registradas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--Integración del modulo almacen-->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fi fi-rr-warehouse-alt"></i>
                                <p>
                                    Almacén
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/almacen" class="nav-link active">
                                        <i class="fi fi-rr-assessment"></i>
                                        <p style="color: black;">Productos registrados</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/almacen/crear.php" class="nav-link active">
                                        <i class="fi fi-rr-apps-add"></i>
                                        <p style="color: black;">Crear productos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--Integración del modulo almacen-->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="i fi-rr-supplier-alt"></i>
                                <p>
                                    Proveedores
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/proveedor" class="nav-link active">
                                        <i class="fi fi-rr-supplier"></i>
                                        <p style="color: black;">Proveedores registrados</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--Integración del modulo de compras-->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fi fi-rr-shopping-bag"></i>
                                <p>
                                    Compras
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/compra" class="nav-link active">
                                        <i class="fi fi-rr-bags-shopping"></i>
                                        <p style="color: black;">Compras registradas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/compra/crear.php" class="nav-link active">
                                        <i class="fi fi-rr-shopping-bag-add"></i>
                                        <p style="color: black;">Crear compra</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--Integración del modulo de ventas-->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="fi fi-rs-comments-dollar"></i>
                                <p>
                                    Ventas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/venta" class="nav-link active">
                                        <i class="fi fi-rs-file-invoice-dollar"></i>
                                        <p style="color: black;">Ventas registradas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo $URL; ?>/venta/crear.php" class="nav-link active">
                                        <i class="fi fi-rr-shopping-cart-add"></i>
                                        <p style="color: black;">Crear venta</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $URL; ?>/app/controllers/login/cerrar_sesion.php" class="nav-link active" style="background-color: #ca0a0b">
                                <i class="fi fi-rr-sign-out-alt"></i>
                                <p>
                                    Cerrar sesion
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>