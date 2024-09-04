<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Registro de usuarios</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Usuarios registrados</h3>

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
                                    <form action="../app/controllers/usuarios/crear.php" method="post">
                                        <div class="form-group">
                                            <label for="">Nombre</label>
                                            <input type="text" class="form-control" placeholder="Escriba el nombre de usuario">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" class="form-control" placeholder="Escriba su correo">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contraseña</label>
                                            <input type="text" class="form-control" placeholder="Escriba una contraseña">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Repita la contraseña</label>
                                            <input type="text" class="form-control" placeholder="Escriba de nuevo la contraseña">
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a href="" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </form>
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