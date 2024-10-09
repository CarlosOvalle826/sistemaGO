<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/compra/listado_compras.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de compras</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Compras registradas</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <!--tabla responsiva-->
                            <div class="table table-responsive">
                                <!--tabla completa-->
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <!--Cabecera de la tabla-->
                                    <thead>
                                        <tr>
                                            <th>
                                                <center>No.</center>
                                            </th>
                                            <th>
                                                <center>No. Compra</center>
                                            </th>
                                            <th>
                                                <center>Producto</center>
                                            </th>
                                            <th>
                                                <center>Fecha de compra</center>
                                            </th>
                                            <th>
                                                <center>Proveedor</center>
                                            </th>
                                            <th>
                                                <center>Comprobante</center>
                                            </th>
                                            <th>
                                                <center>Usuario</center>
                                            </th>
                                            <th>
                                                <center>Precio compra</center>
                                            </th>
                                            <th>
                                                <center>Cantidad</center>
                                            </th>
                                            <th>
                                                <center>Acción</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <!--Contenido de la tabla-->
                                    <tbody>
                                        <?php
                                        $contador = 0;
                                        foreach ($datos_compras as $dato_compra) {
                                            //crear una variable para almacenar el ID compra
                                            $IdCompra = $dato_compra['IdCompra'];

                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?php echo $contador = $contador + 1; ?></center>
                                                </td>
                                                <td> <?php echo $dato_compra['NumCompra']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                                                        style="background-color:cornflowerblue; color: white" data-target=" #modal_producto<?php echo $IdCompra; ?>">
                                                        <?php echo $dato_compra['NombreProducto'] ?>
                                                    </button>
                                                    <!--Modals para las acciones de visualización-->
                                                    <!--Modal para visualizar producto-->
                                                    <div class="modal fade" id="modal_producto<?php echo $IdCompra; ?>">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:cornflowerblue; color: white">
                                                                    <h4 class="modal-title">Datos del productor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-8"><!--Primera columna-->
                                                                            <div class="row"><!--Primera fila-->
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Codigo</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['Codigo']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Nombre</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['Nombre']; ?>" disabled>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="row"><!--Segunda fila-->
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['Stock']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock mínimo</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['StockMinimo']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Stock máximo</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['StockMaximo']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row"><!--Tercera fila-->
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Precio compra</label>
                                                                                        <input class="form-control" type="text" value="<?php echo "Q " . $dato_compra['PrecioCompra']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Precio venta</label>
                                                                                        <input class="form-control" type="text" value="<?php echo "Q " . $dato_compra['PrecioVenta']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Precio mayorista</label>
                                                                                        <input class="form-control" type="text" value="<?php echo "Q " . $dato_compra['PrecioMayorista']; ?>" disabled>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="row"><!--cuarta fila-->
                                                                                <div class="col-md-8">
                                                                                    <div class="form-group">
                                                                                        <label for="">Descripción</label>
                                                                                        <textarea class="form-control" id="" cols="" rows="5" disabled><?php echo $dato_compra['Descripcion'] ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Fecha de ingreso</label>
                                                                                        <input class="form-control" type="date" value="<?php echo $dato_compra['FechaIngreso']; ?>" disabled>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <label for="">Categoría</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['NombreCategoria']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="col-md-12"><!--columna para-->
                                                                                <div class="form-group">
                                                                                    <label for="">Imagen del producto</label>
                                                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $dato_compra['Imagen']; ?>" alt="" width="100%">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="">Usuario</label>
                                                                                    <input class="form-control" type="text" value="<?php echo $dato_compra['NombreUsuario']; ?>" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </div>
                                                </td>
                                                <td> <?php echo $dato_compra['FechaCompra']; ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal"
                                                        style="background-color:cornflowerblue; color: white" data-target=" #modal_proveedor<?php echo $IdCompra; ?>">
                                                        <?php echo $dato_compra['NombreProveedor'] ?>
                                                    </button>

                                                    <!--Modal para visualizar proveedor-->
                                                    <div class="modal fade" id="modal_proveedor<?php echo $IdCompra; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:cornflowerblue; color: white">
                                                                    <h4 class="modal-title">Datos del proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12"><!--Primera columna-->
                                                                            <div class="row"><!--Primera fila-->
                                                                                <div class="col-md-8">
                                                                                    <div class="form-group">
                                                                                        <label for="">Nombre</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['NombreProveedor']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div class="form-group">
                                                                                        <label for="">Celular</label>
                                                                                        <br>
                                                                                        <a href="https://wa.me/502<?php echo $dato_compra['Celular'] ?>" class="btn btn-success">
                                                                                            <i class="fi fi-rr-circle-phone-flip"></i>
                                                                                            <?php echo $dato_compra['Celular']; ?>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                            <div class="row"><!--Segunda fila-->
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Empresa</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['Empresa']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                                <div class=" col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label for="">Correo</label>
                                                                                        <input class="form-control" type="text" value="<?php echo $dato_compra['Correo']; ?>" disabled>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row"><!--Tercera fila-->
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <label for="">Dirección</label>
                                                                                        <textarea name="" id="" class="form-control" disabled><?php echo $dato_compra['Direccion']; ?></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                    </div>
                                                </td>
                                                <td> <?php echo $dato_compra['Comprobante']; ?></td>
                                                <td>
                                                    <?php echo $dato_compra['NombreUsuarioC']; ?>
                                                </td>
                                                <td> <?php echo $dato_compra['PrecioCompraC']; ?></td>
                                                <td> <?php echo $dato_compra['Cantidad']; ?></td>
                                                <td>
                                                    <center>
                                                        <!--Botones para controlar los registros-->
                                                        <div class="btn-group">
                                                            <a href="mostrar.php?id=<?php echo $IdProducto; ?>" type="button" class="btn btn-outline-info btn-sm"><i class="fi fi-rr-magnifying-glass-eye"></i>Ver</a>
                                                            <a href="actualizar.php?id=<?php echo $IdProducto; ?>" type="button" class="btn btn-outline-success btn-sm"><i class="fi fi-rr-pencil"></i>Editar</a>
                                                            <a href="borrar.php?id=<?php echo $IdProducto; ?>" type="button" class="btn btn-outline-danger btn-sm"><i class="fi fi-rr-cross-circle"></i>Eliminar</a>

                                                        </div>
                                                    </center>
                                                </td>
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
                                                <center>No. Compra</center>
                                            </th>
                                            <th>
                                                <center>Producto</center>
                                            </th>
                                            <th>
                                                <center>Fecha de compra</center>
                                            </th>
                                            <th>
                                                <center>Proveedor</center>
                                            </th>
                                            <th>
                                                <center>Comprobante</center>
                                            </th>
                                            <th>
                                                <center>Usuario</center>
                                            </th>
                                            <th>
                                                <center>Precio compra</center>
                                            </th>
                                            <th>
                                                <center>Cantidad</center>
                                            </th>
                                            <th>
                                                <center>Acción</center>
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
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
            /* Ajuste de botones */
            buttons: [{
                    extend: 'collection',
                    text: 'Reportes',
                    orientation: 'landscape',
                    buttons: [{
                        text: 'Copiar',
                        extend: 'copy'
                    }, {
                        extend: 'pdf',
                    }, {
                        extend: 'csv',
                    }, {
                        extend: 'excel',
                    }, {
                        text: 'Imprimir',
                        extend: 'print'
                    }]
                },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas'
                }
            ],
            /*Fin de ajuste de botones*/
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>