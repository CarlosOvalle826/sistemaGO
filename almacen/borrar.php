<?php
include('../app/config.php');
include('../layout/sesion.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/login/controlador_autorizacion.php');
if (!verificarAcceso('Almacen')) {
    // Denegar acceso y redirigir
    // Si no tiene acceso, redirigir a una página de acceso denegado
    header('Location: ' . $URL . '/acceso_denegado.php');
    exit;  // Detener la ejecución después de redirigi
}
include('../layout/parte1.php');
include('../app/controllers/almacen/cargar_producto.php');
?>
<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<!-- Custom functions file -->
<script src="js/functions.js"></script>
<!-- Sweet Alert Script -->
<script src="js/sweetalert.min.js"></script>
<!-- Sweet Alert Styles -->
<link href="css/sweetalert.css" rel="stylesheet">
<!--Dimenciones para la imagen-->
<style>
    #preview {
        margin-top: 20px;
        max-width: 100%;
        /* Ajusta el ancho máximo de la imagen */
        max-height: 300px;
        /* Ajusta la altura máxima de la imagen */
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Eliminar producto: <?php echo $dato_producto['Nombre']; ?></h1>
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
                <div class="col-md-12">
                    <form action="../app/controllers/almacen/borrar.php" method="post">
                        <input name="IdProducto" type="text" value="<?php echo $IdProductoGet ?>" hidden>
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">¿Esta seguro de proceder a eliminar el producto?</h3>

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
                                        <form action="../app/controllers/almacen/crear.php" method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-9"><!--Primera columna-->
                                                    <div class="row"><!--Primera fila-->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Codigo</label>
                                                                <input class="form-control" type="text" value="<?php echo $Codigo; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Categoria</label>
                                                                <input class="form-control" type="text" value="<?php echo $NombreCategoria; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Nombre</label>
                                                                <input class="form-control" type="text" value="<?php echo $Nombre; ?>" disabled>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row"><!--Segunda fila-->
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock</label>
                                                                <input class="form-control" type="text" value="<?php echo $Stock; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class=" col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock mínimo</label>
                                                                <input class="form-control" type="text" value="<?php echo $StockMinimo; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Stock máximo</label>
                                                                <input class="form-control" type="text" value="<?php echo $StockMaximo; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio compra</label>
                                                                <input class="form-control" type="text" value="<?php echo "Q " . $PrecioCompra; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio venta</label>
                                                                <input class="form-control" type="text" value="<?php echo "Q " . $PrecioVenta; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="">Precio mayorista</label>
                                                                <input class="form-control" type="text" value="<?php echo "Q " . $PrecioMayorista; ?>" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row"><!--Tercera fila-->
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Fecha de ingreso</label>
                                                                <input class="form-control" type="date" value="<?php echo $FechaIngreso; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">Usuario</label>
                                                                <input class="form-control" type="text" value="<?php echo $CorreoUsuario; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Descripción</label>
                                                                <textarea class="form-control" id="" cols="" rows="3" disabled><?php echo $Descripcion; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3"><!--columna para-->
                                                    <div class="form-group">
                                                        <label for="">Imagen del producto</label>
                                                        <img src="<?php echo $URL . "/almacen/img_productos/" . $Imagen; ?>" alt="" width="100%">
                                                    </div>
                                                </div>
                                            </div>

                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                        <button class="btn btn-danger">Eliminar</button>
                                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        </form>
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