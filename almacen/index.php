<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/almacen/listado_productos.php');

?>
<style>
    .tooltip-text {
        visibility: hidden;
        background-color: black;
        color: #fff;
        text-align: center;
        padding: 5px;
        border-radius: 5px;

        /* Posicionamiento */
        position: absolute;
        z-index: 1;
        bottom: 125%;
        /* Muestra el mensaje encima del elemento */
        left: 50%;
        transform: translateX(-50%);

        /* Flecha del tooltip */
        opacity: 0;
        transition: opacity 0.3s;
    }

    .tooltip-text::after {
        content: '';
        position: absolute;
        top: 100%;
        /* Posiciona la flecha debajo del tooltip */
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: black transparent transparent transparent;
    }

    .stock-message:hover .tooltip-text {
        visibility: visible;
        opacity: 1;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de productos</h1>
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
                            <h3 class="card-title">Productos registrados</h3>

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
                                            <!--<th>
                                            <center>Stock minimo</center>
                                        </th>
                                        <th>
                                            <center>Stock maximo</center>
                                        </th>-->
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
                                                <center>Acción</center>
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
                                                <td> <?php echo $dato_producto['Codigo']; ?></td>
                                                <td> <?php echo $dato_producto['NombreCategoria']; ?></td>
                                                <td>
                                                    <img src="<?php echo $URL . "/almacen/img_productos/" . $dato_producto['Imagen'] ?>" width="100px" alt="">
                                                </td>
                                                <td> <?php echo $dato_producto['Nombre']; ?></td>
                                                <td> <?php echo $dato_producto['Descripcion']; ?></td>
                                                <!--alertas en stock-->
                                                <?php
                                                $StockAct = $dato_producto['Stock'];
                                                $StockMax = $dato_producto['StockMaximo'];
                                                $StockMin = $dato_producto['StockMinimo'];
                                                if ($StockAct < $StockMin) { ?> <!--alerta naranja-->
                                                    <td class="stock-message" style="position: relative; background-color: #fd7e14;">
                                                        <div>
                                                            <?php echo $dato_producto['Stock']; ?>
                                                            <span class="tooltip-text">Reabastecer urgente</span>
                                                        </div>
                                                    </td><!--opciones-->
                                                <?php
                                                } else if ($StockAct > $StockMax) { ?><!--sobrecarga azul-->
                                                    <td class="stock-message" style="position: relative; background-color: #17a2b8;">
                                                        <div>
                                                            <?php echo $dato_producto['Stock']; ?>
                                                            <span class="tooltip-text">Exceso de stock</span>
                                                        </div>
                                                    </td><!--opciones-->
                                                <?php
                                                } else if ($StockAct == $StockMin) { ?><!--advertencia amarillo-->
                                                    <td class="stock-message" style="position: relative; background-color: #ffc107;">
                                                        <div>
                                                            <?php echo $dato_producto['Stock']; ?>
                                                            <span class="tooltip-text">Stock bajo</span>
                                                        </div>
                                                    </td><!--opciones-->
                                                <?php
                                                } else { ?>
                                                    <td> <?php echo $dato_producto['Stock']; ?></td>
                                                <?php
                                                } ?>
                                                <td> <?php echo $dato_producto['PrecioCompra']; ?></td>
                                                <td> <?php echo $dato_producto['PrecioVenta']; ?></td>
                                                <td> <?php echo $dato_producto['PrecioMayorista']; ?></td>
                                                <td> <?php echo $dato_producto['FechaIngreso']; ?></td>
                                                <td>
                                                    <center>
                                                        <!--Botones para controlar los registros-->
                                                        <div class=" btn-group">
                                                            <a href="mostrar.php?id=<?php echo $IdProducto; ?>" type="button" class="btn btn-outline-info btn-sm"><i class="fi fi-rr-magnifying-glass-eye"></i>Ver</a>
                                                            <a href="actualizar.php?id=<?php echo $IdProducto; ?>" type="button" class="btn btn-outline-success btn-sm"><i class="fi fi-rr-pencil"></i>Editar</a>
                                                            <a href="borrar.php?id=<?php echo $IdProducto; ?>" type="button" class="btn btn-outline-danger btn-sm"><i class="fi fi-rr-cross-circle"></i>Eliminar</a>

                                                        </div>
                                                    </center>
                                                </td>
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
                                            <!-- <th>
                                            <center>Stock minimo</center>
                                        </th>
                                        <th>
                                            <center>Stock maximo</center>
                                        </th>-->
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
                                                <center>Acción</center>
                                            </th>
                                            <th>
                                                <center>Usuario</center>
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