<?php
include('../app/config.php');
include('../layout/sesion.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/login/controlador_autorizacion.php');
if (!verificarAcceso('Compras')) {
    // Denegar acceso y redirigir
    // Si no tiene acceso, redirigir a una página de acceso denegado
    header('Location: ' . $URL . '/acceso_denegado.php');
    exit;  // Detener la ejecución después de redirigi
}
include('../layout/parte1.php');
include('../app/controllers/categorias/listado_categorias.php');
include('../app/controllers/almacen/listado_productos.php');
//consulta a la base de datos sobre la tabla
include('../app/controllers/almacen/listado_productos.php');
//consulta a la base de datos sobre la tabla
include('../app/controllers/proveedor/listado_proveedores.php');
//consulta a la base de datos sobre la tabla 
include('../app/controllers/compra/cargar_compra.php');
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

    td.descripcion {
        max-width: 300px;
        /* Define el ancho máximo antes de que aparezca la barra desplazadora */
        white-space: nowrap;
        /* Mantiene el texto en una sola línea */
        overflow-x: auto;
        /* Agrega una barra desplazadora horizontal si es necesario */
    }

    td.direccion {
        max-width: 300px;
        /* Define el ancho máximo antes de que aparezca la barra desplazadora */
        white-space: nowrap;
        /* Mantiene el texto en una sola línea */
        overflow-x: auto;
        /* Agrega una barra desplazadora horizontal si es necesario */
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Datos de la compra</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <!--contenido del modulo create-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Detalles de la compra</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="display: block;">
                                    <div style="display:flex">
                                        <h5>Datos del producto</h5>
                                    </div>
                                    <hr>
                                    <div class="row" style="font-size: 12px">
                                        <div class="col-md-9"><!--Primera columna-->
                                            <div class="row"><!--Primera fila-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input id="IdProducto" type="text" hidden>
                                                        <label for="">Codigo</label>
                                                        <input id="CodigoProducto" value="<?= $CodigoProd; ?>" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Categoria</label>
                                                        <input id="NombreCategoria" value="<?= $NombreCategoria; ?>" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nombre</label>
                                                        <input id="NombreProducto" value="<?= $NombreProducto; ?>" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row"><!--Segunda fila-->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock</label>
                                                        <input value="<?= $Stock; ?>" id="Stock" class="form-control" type="text" disabled style="background-color:yellow;">
                                                    </div>
                                                </div>
                                                <div class=" col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock mínimo</label>
                                                        <input value="<?= $StockMinimo; ?>" id="StockMinimo" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock máximo</label>
                                                        <input value="<?= $StockMaximo; ?>" id="StockMaximo" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio compra</label>
                                                        <input value="<?= $PrecioCompra; ?>" id="PrecioCompra" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio venta</label>
                                                        <input value="<?= $PrecioVenta; ?>" id="PrecioVenta" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio mayorista</label>
                                                        <input value="<?= $PrecioMayorista; ?>" id="PrecioMayor" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"><!--Tercera fila-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Fecha de ingreso</label>
                                                        <input value="<?= $FechaIngreso; ?>" id="FechaIngreso" class="form-control" type="date" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input value="<?= $NombreUsuario; ?>" id="Usuario" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Descripción</label>
                                                        <textarea id="Descripcion" class="form-control" id="" cols="" rows="3" disabled><?= $Descripcion; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3"><!--columna para-->
                                            <div class="form-group">
                                                <label for="">Imagen del producto</label>
                                                <br>
                                                <center>
                                                    <img id="imgProducto" src="<?php echo $URL . "/almacen/img_productos/" . $IMG; ?>" alt="" width="100%">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div style="display:flex">
                                        <h5>Datos del proveedor</h5>
                                    </div>
                                    <hr>
                                    <div class="container-fluid">
                                        <div class="row" style="font-size: 12px"> <!--primera fila-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nombre del proveedor</label>
                                                    <input type="text" id="IdProveedor" hidden>
                                                    <input value="<?= $NombreProveedorC; ?>" type="text" id="nombre_proveedor" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Celular</b></label>
                                                    <input value="<?= $Celular; ?>" type="text" id="celular" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="font-size: 12px"> <!--segunda fila-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Empresa</label>
                                                    <input value="<?= $Empresa; ?>" type="text" id="empresa" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Correo</label>
                                                    <input value="<?= $Correo; ?>" type="text" id="correo" class="form-control" disabled>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" style="font-size: 12px"> <!--tercera fila-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Dirección</label>
                                                    <textarea type="text" id="direccion" class="form-control" cols="60" rows="2" disabled><?= $Direccion; ?></textarea>
                                                </div>
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
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Detalle de la compra</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Numero de la compra</label>
                                                <input value="<?= $NumCompra; ?>" class="form-control" type="text" disabled>
                                                <input id="NumCompra" value="<?= $NumCompra; ?>" type="text" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Fecha de la compra</label>
                                                <input value="<?= $FechaCompra; ?>" id="FechaCompra" class="form-control" type="date" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Comprobante de la compra</label>
                                                <input value="<?= $Comprobante; ?>" id="Comprobante" class="form-control" type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Precio de la compra</label>
                                                <input value="<?= $PrecioCompraC; ?>" id="PrecioCompraCrear" class="form-control" type="number" step="0.01" placeholder="Q" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Cantidad de la compra</label>
                                                <input value="<?= $CantidadCompra; ?>" class="form-control" id="CantidadCompra" style="text-align:center" type="number" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Usuario</label>
                                                <input class="form-control" type="text" value="<?= $NombreUsuarioC; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary btn-block">Regresar al listado de compras</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <!--<div id="respuestaCrear">respuesta</div>-->
                            </div>
                        </div>
                    </div>
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

<!-- /.control-sidebar -->
<?php
include('../layout/parte2.php');
?>
<?php
include('../layout/mensaje.php');
?>