<?php
include('app/config.php');
include('layout/sesion.php');
include('layout/parte1.php');
include('app/controllers/usuarios/listado_usuarios.php');
include('app/controllers/roles/listado_roles.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <h1 class="m-0">Bienvenido al sistema de ventas - <?php echo $rol_sesion ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            Contenido del modulo
            <!-- /.row -->
            <br></br>
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <?php
                            $contador_usuarios = 0;
                            foreach ($datos_usuario as $dato_usuario) {
                                $contador_usuarios = $contador_usuarios + 1;
                            }
                            ?>
                            <h3><?php echo $contador_usuarios; ?></h3>
                            <p>Usuarios registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/usuarios/crear.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/usuarios" class="small-box-footer">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <?php
                            $contador_roles = 0;
                            foreach ($datos_roles as $dato_roles) {
                                $contador_roles = $contador_roles + 1;
                            }
                            ?>
                            <h3><?php echo $contador_roles; ?></h3>
                            <p>Roles registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/roles/crear.php">
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/roles" class="small-box-footer">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <!-- ./col -->
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
<?php
include('layout/parte2.php');
?>