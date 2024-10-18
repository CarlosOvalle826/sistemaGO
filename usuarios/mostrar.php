<?php
include('../app/config.php');
include('../layout/sesion.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/login/controlador_autorizacion.php');
if (!verificarAcceso('Usuarios')) {
    // Denegar acceso y redirigir
    // Si no tiene acceso, redirigir a una página de acceso denegado
    header('Location: ' . $URL . '/acceso_denegado.php');
    exit;  // Detener la ejecución después de redirigi
}
include('../layout/parte1.php');
include('../app/controllers/usuarios/mostrar_usuario.php');
?>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Custom functions file -->
<script src="js/functions.js"></script>
<!-- Sweet Alert Script -->
<script src="js/sweetalert.min.js"></script>
<!-- Sweet Alert Styles -->
<link href="css/sweetalert.css" rel="stylesheet">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Datos del usuario <?php echo $NombreUsuario ?></h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <!--contenido del modulo create-->
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Información del usuario</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" name="NombreUsuario" class="form-control" value="<?php echo $NombreUsuario ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input type="email" name="CorreoUsuario" class="form-control" value="<?php echo $CorreoUsuario ?>" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Rol de usuario</label>
                                        <input type="text" name="Rol" class="form-control" value="<?php echo $Rol ?>" disabled>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class=" control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
<?php
include('../layout/parte2.php');
?>
<?php
include('../layout/mensaje.php');
?>