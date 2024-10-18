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
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/almacen/listado_productos.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/proveedor/listado_proveedores.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/compra/listado_compras.php');
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
                    <h1 class="m-0">Registrar nueva compra</h1>
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
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Ingrese los datos al formulario</h3>

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
                                        <div style="width: 20px;"></div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target=" #modal_buscar_producto">
                                            <i class="fa fa-search"></i>
                                            Buscar producto
                                        </button>
                                        <!--Modal para visualizar proveedor-->
                                        <div class="modal fade" id="modal_buscar_producto">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:cornflowerblue; color: white">
                                                        <h4 class="modal-title">Busqueda del producto</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table table-responsive" style="max-height: 500px; overflow-y: auto;">
                                                            <!--tabla completa-->
                                                            <table id="example1" class="table table-bordered table-striped table-sm">
                                                                <!--Cabecera de la tabla-->
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <center>No.</center>
                                                                        </th>
                                                                        <td>
                                                                            <center>Seleccionar</center>
                                                                        </td>
                                                                        <th>
                                                                            <center>Código</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre categoría</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Imagen</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Descripción</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Stock</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Precio compra</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Precio venta</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Precio mayorista</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Fecha ingreso</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Usuario</center>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <!--Contenido de la tabla-->
                                                                <tbody>
                                                                    <?php
                                                                    $contador = 0;
                                                                    foreach ($datos_productos as $dato_producto) {
                                                                        //crear una variable para almacenar el ID de producto
                                                                        $IdProducto = $dato_producto['IdProducto'];

                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <center><?php echo $contador = $contador + 1; ?></center>
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-info" id="btn_seleccionar<?php echo $IdProducto; ?>">Seleccionar</button>
                                                                                <script>
                                                                                    $('#btn_seleccionar<?php echo $IdProducto; ?>').click(function() {
                                                                                        var IdProducto = "<?php echo $dato_producto['IdProducto'] ?>";
                                                                                        $('#IdProducto').val(IdProducto);
                                                                                        var Codigo = "<?php echo $dato_producto['Codigo'] ?>";
                                                                                        $('#CodigoProducto').val(Codigo);
                                                                                        var NombreCategoria = "<?php echo $dato_producto['NombreCategoria'] ?>";
                                                                                        $('#NombreCategoria').val(NombreCategoria);
                                                                                        var Nombre = "<?php echo $dato_producto['Nombre'] ?>";
                                                                                        $('#NombreProducto').val(Nombre);
                                                                                        var Stock = "<?php echo $dato_producto['Stock'] ?>";
                                                                                        $('#Stock').val(Stock);
                                                                                        var StockActual = "<?php echo $dato_producto['Stock'] ?>";
                                                                                        $('#StockActual').val(StockActual);
                                                                                        var StockMinimo = "<?php echo $dato_producto['StockMinimo'] ?>";
                                                                                        $('#StockMinimo').val(StockMinimo);
                                                                                        var StockMaximo = "<?php echo $dato_producto['StockMaximo'] ?>";
                                                                                        $('#StockMaximo').val(StockMaximo);
                                                                                        var PrecioCompra = "<?php echo $dato_producto['PrecioCompra'] ?>";
                                                                                        $('#PrecioCompra').val(PrecioCompra);
                                                                                        var PrecioVenta = "<?php echo $dato_producto['PrecioVenta'] ?>";
                                                                                        $('#PrecioVenta').val(PrecioVenta);
                                                                                        var PrecioMayorista = "<?php echo $dato_producto['PrecioMayorista'] ?>";
                                                                                        $('#PrecioMayor').val(PrecioMayorista);
                                                                                        var FechaIngreso = "<?php echo $dato_producto['FechaIngreso'] ?>";
                                                                                        $('#FechaIngreso').val(FechaIngreso);
                                                                                        var CorreoUsuario = "<?php echo $dato_producto['CorreoUsuario'] ?>";
                                                                                        $('#Usuario').val(CorreoUsuario);
                                                                                        var Descripcion = "<?php echo $dato_producto['Descripcion'] ?>";
                                                                                        $('#Descripcion').val(Descripcion);
                                                                                        var rutaImg = "<?php echo $URL . '/almacen/img_productos/' . $dato_producto['Imagen']; ?>";
                                                                                        $('#imgProducto').attr({
                                                                                            src: rutaImg
                                                                                        });
                                                                                        $('#modal_buscar_producto').modal('toggle')
                                                                                    });
                                                                                </script>
                                                                            </td>
                                                                            <td> <?php echo $dato_producto['Codigo']; ?></td>
                                                                            <td> <?php echo $dato_producto['NombreCategoria']; ?></td>
                                                                            <td>
                                                                                <img src="<?php echo $URL . "/almacen/img_productos/" . $dato_producto['Imagen']; ?>" width="100px" alt="">
                                                                            </td>
                                                                            <td> <?php echo $dato_producto['Nombre']; ?></td>
                                                                            <td class="descripcion"><?php echo $dato_producto['Descripcion']; ?></td>
                                                                            <td> <?php echo $dato_producto['Stock']; ?></td><!--opciones-->
                                                                            <td> <?php echo $dato_producto['PrecioCompra']; ?></td>
                                                                            <td> <?php echo $dato_producto['PrecioVenta']; ?></td>
                                                                            <td> <?php echo $dato_producto['PrecioMayorista']; ?></td>
                                                                            <td> <?php echo $dato_producto['FechaIngreso']; ?></td>
                                                                            <td> <?php echo $dato_producto['CorreoUsuario']; ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                                <!--Pie de la tabla-->
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>
                                                                            <center>No.</center>
                                                                        </th>
                                                                        <td>
                                                                            <center>Seleccionar</center>
                                                                        </td>
                                                                        <th>
                                                                            <center>Código</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre categoría</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Imagen</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Descripción</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Stock</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Precio compra</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Precio venta</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Precio mayorista</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Fecha ingreso</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Usuario</center>
                                                                        </th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" style="font-size: 12px">
                                        <div class="col-md-9"><!--Primera columna-->
                                            <div class="row"><!--Primera fila-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input id="IdProducto" type="text" hidden>
                                                        <label for="">Codigo</label>
                                                        <input id="CodigoProducto" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Categoria</label>
                                                        <input id="NombreCategoria" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Nombre</label>
                                                        <input id="NombreProducto" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row"><!--Segunda fila-->
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock</label>
                                                        <input id="Stock" class="form-control" type="text" disabled style="background-color:yellow;">
                                                    </div>
                                                </div>
                                                <div class=" col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock mínimo</label>
                                                        <input id="StockMinimo" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Stock máximo</label>
                                                        <input id="StockMaximo" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio compra</label>
                                                        <input id="PrecioCompra" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio venta</label>
                                                        <input id="PrecioVenta" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Precio mayorista</label>
                                                        <input id="PrecioMayor" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row"><!--Tercera fila-->
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Fecha de ingreso</label>
                                                        <input id="FechaIngreso" class="form-control" type="date" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="">Usuario</label>
                                                        <input id="Usuario" class="form-control" type="text" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Descripción</label>
                                                        <textarea id="Descripcion" class="form-control" id="" cols="" rows="3" disabled></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3"><!--columna para-->
                                            <div class="form-group">
                                                <label for="">Imagen del producto</label>
                                                <br>
                                                <center>
                                                    <img id="imgProducto" src="<?php echo $URL . "/almacen/img_productos/" . $Imagen; ?>" alt="" width="50%">
                                                </center>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div style="display:flex">
                                        <h5>Datos del proveedor</h5>
                                        <div style="width: 20px;"></div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target=" #modal_buscar_proveedor">
                                            <i class="fa fa-search"></i>
                                            Buscar proveedor
                                        </button>
                                        <!--Modal para visualizar proveedor-->
                                        <div class="modal fade" id="modal_buscar_proveedor">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header" style="background-color:cornflowerblue; color: white">
                                                        <h4 class="modal-title">Busqueda del proveedor</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table table-responsive" style="max-height: 500px; overflow-y: auto;">
                                                            <!--tabla completa-->
                                                            <table id="example2" class="table table-bordered table-striped  table-sm">
                                                                <!--Cabecera de la tabla-->
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <center>No.</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Seleccionar</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre proveedor</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Celular</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Empresa</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Correo</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Dirección</center>
                                                                        </th>
                                                                    </tr>
                                                                </thead>
                                                                <!--Contenido de la tabla-->
                                                                <tbody>
                                                                    <?php
                                                                    $contador = 0;
                                                                    foreach ($datos_proveedores as $dato_proveedor) {
                                                                        //crear una variable para almacenar proveedor
                                                                        $IdProveedor = $dato_proveedor['IdProveedor'];
                                                                        $NombreProveedor = $dato_proveedor['NombreProveedor'];
                                                                    ?>
                                                                        <tr>
                                                                            <td>
                                                                                <center><?php echo $contador = $contador + 1; ?></center>
                                                                            </td>
                                                                            <td>
                                                                                <button class="btn btn-info" id="btn_seleccionar_proveedor<?php echo $IdProveedor; ?>">Seleccionar</button>
                                                                                <script>
                                                                                    $('#btn_seleccionar_proveedor<?php echo $IdProveedor; ?>').click(function() {
                                                                                        var IdProveedor = '<?php echo $IdProveedor; ?>';
                                                                                        $('#IdProveedor').val(IdProveedor);
                                                                                        var NombreProveedor = '<?php echo $NombreProveedor; ?>';
                                                                                        $('#nombre_proveedor').val(NombreProveedor);
                                                                                        var Celular = '<?php echo $dato_proveedor['Celular']; ?>';
                                                                                        $('#celular').val(Celular);
                                                                                        var Empresa = '<?php echo $dato_proveedor['Empresa']; ?>';
                                                                                        $('#empresa').val(Empresa);
                                                                                        var Correo = '<?php echo $dato_proveedor['Correo'] ?>';
                                                                                        $('#correo').val(Correo);
                                                                                        var Direccion = '<?php echo $dato_proveedor['Direccion'] ?>';
                                                                                        $('#direccion').val(Direccion);
                                                                                        $('#modal_buscar_proveedor').modal('toggle')
                                                                                    });
                                                                                </script>
                                                                            </td>
                                                                            <td> <?php echo $dato_proveedor['NombreProveedor']; ?></td>
                                                                            <td><a href="https://wa.me/502<?php echo $dato_proveedor['Celular']; ?>" class="btn btn-success btn-sm">
                                                                                    <i class="fi fi-rr-circle-phone-flip"></i>
                                                                                    <?php echo $dato_proveedor['Celular']; ?>
                                                                                </a>
                                                                            </td>
                                                                            <td> <?php echo $dato_proveedor['Empresa']; ?></td>
                                                                            <td> <?php echo $dato_proveedor['Correo']; ?></td>
                                                                            <td class="direccion"> <?php echo $dato_proveedor['Direccion']; ?></td>
                                                                        </tr>
                                                                    <?php } ?>
                                                                </tbody>
                                                                <!--Pie de la tabla-->
                                                                <tfoot>
                                                                    <tr>
                                                                        <th>
                                                                            <center>No.</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Seleccionar</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Nombre proveedor</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Celular</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Empresa</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Correo</center>
                                                                        </th>
                                                                        <th>
                                                                            <center>Dirección</center>
                                                                        </th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="container-fluid">
                                        <div class="row" style="font-size: 12px"> <!--primera fila-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Nombre del proveedor</label>
                                                    <input type="text" id="IdProveedor" hidden>
                                                    <input type="text" id="nombre_proveedor" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Celular</b></label>
                                                    <input type="text" id="celular" class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="font-size: 12px"> <!--segunda fila-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Empresa</label>
                                                    <input type="text" id="empresa" class="form-control" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Correo</label>
                                                    <input type="text" id="correo" class="form-control" disabled>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row" style="font-size: 12px"> <!--tercera fila-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Dirección</label>
                                                    <textarea type="text" id="direccion" class="form-control" cols="60" rows="2" disabled></textarea>
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
                            <div class="card card-outline card-primary">
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
                                                <?php
                                                $contadorCompras = 1;
                                                foreach ($datos_compras as $dato_compra) {
                                                    $contadorCompras++;
                                                }
                                                ?>
                                                <label for="my-input">Numero de la compra</label>
                                                <input value="<?php echo $contadorCompras; ?>" class="form-control" type="text" disabled>
                                                <input id="NumCompra" value="<?php echo $contadorCompras; ?>" type="text" hidden>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Fecha de la compra</label>
                                                <input id="FechaCompra" class="form-control" type="date" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Comprobante de la compra</label>
                                                <input id="Comprobante" class="form-control" type="text" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Precio de la compra</label>
                                                <input id="PrecioCompraCrear" class="form-control" type="number" step="0.01" placeholder="Q" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="my-input">Stock actual</label>
                                                <input id="StockActual" class="form-control" type="number" style="background-color: yellow;" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="my-input">Stock total</label>
                                                <input id="StockTotal" class="form-control" type="number" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Cantidad de la compra</label>
                                                <input class="form-control" id="CantidadCompra" style="text-align:center" type="number" required>
                                            </div>
                                            <!--script para realizar la suma de las cantidades en stock-->
                                            <script>
                                                $('#CantidadCompra').keyup(function() {
                                                    //alert('Esta precionando la tecla');
                                                    var StockActual = $('#StockActual').val();
                                                    var StockCompra = $('#CantidadCompra').val();
                                                    var total = parseInt(StockActual) + parseInt(StockCompra);
                                                    $('#StockTotal').val(total);
                                                });
                                            </script>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="my-input">Usuario</label>
                                                <input class="form-control" type="text" value="<?php echo $nombre_sesion; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button id="btnGuardarCompra" class="btn btn-primary btn-block">Guardar</button>
                                            <!--Script para almacenar datos en variables y completar la creación-->
                                            <script>
                                                $('#btnGuardarCompra').click(function() {
                                                    //recuperar los campos por medio de las variables
                                                    var IdProducto = $('#IdProducto').val();
                                                    var NumCompra = $('#NumCompra').val();
                                                    var FechaCompra = $('#FechaCompra').val();
                                                    var IdProveedor = $('#IdProveedor').val();
                                                    var Comprobante = $('#Comprobante').val();
                                                    var IdUsuarioSesion = <?php echo $IdUsuarioSesion; ?>;
                                                    var PrecioCompraCrear = $('#PrecioCompraCrear').val();
                                                    var CantidadCompra = $('#CantidadCompra').val();
                                                    var StockTotal = $('#StockTotal').val();
                                                    if (IdProducto == '') {
                                                        $('#IdProducto').focus();
                                                        alert('Debe completar todos lo campos');
                                                    } else if (FechaCompra == '') {
                                                        $('#FechaCompra').focus();
                                                        alert('Debe completar todos lo campos');
                                                    } else if (Comprobante == '') {
                                                        $('#Comprobante').focus();
                                                        alert('Debe completar todos lo campos');
                                                    } else if (PrecioCompraCrear == '') {
                                                        $('#PrecioCompraCrear').focus();
                                                        alert('Debe completar todos lo campos');
                                                    } else if (CantidadCompra == '') {
                                                        $('#CantidadCompra').focus();
                                                        alert('Debe completar todos lo campos');
                                                    } else {
                                                        alert('datos ingresados');

                                                        var url = "../app/controllers/compra/crear.php";
                                                        $.get(url, {
                                                            IdProducto: IdProducto,
                                                            NumCompra: NumCompra,
                                                            FechaCompra: FechaCompra,
                                                            IdProveedor: IdProveedor,
                                                            Comprobante: Comprobante,
                                                            IdUsuarioSesion: IdUsuarioSesion,
                                                            PrecioCompraCrear: PrecioCompraCrear,
                                                            CantidadCompra: CantidadCompra,
                                                            StockTotal: StockTotal
                                                        }, function(datos) {
                                                            $('#respuestaCrear').html(datos);
                                                        });
                                                    }
                                                });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div id="respuestaCrear"></div>
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
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            /* cambio de idiomas de datatable */
            "pageLength": 5,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Productos",
                "infoEmpty": "Mostrando 0 to 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ Total productos)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Productos",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            /* fin de idiomas */
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
    $(function() {
        $("#example2").DataTable({
            /* cambio de idiomas de datatable */
            "pageLength": 5,
            language: {
                "emptyTable": "No hay información",
                "decimal": "",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 to 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ Total proveedores)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Proveedores",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            /* fin de idiomas */
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,

        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

    });
</script>