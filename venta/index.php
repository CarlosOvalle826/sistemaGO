<?php
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/login/controlador_autorizacion.php');

if (!verificarAcceso('Ventas')) {
    // Denegar acceso
    header('Location: acceso_denegado.php');
    exit;  // Detener la ejecución después de redirigir
}
?>
<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
//consulta a la base de datos sobre la tabla cargar_detalle
include('../app/controllers/venta/cargar_detalle.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de ventas</h1>
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
                            <h3 class="card-title">Ventas registradas</h3>
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
                                                <center>Codigo venta</center>
                                            </th>
                                            <th>
                                                <center>Cliente</center>
                                            </th>
                                            <th>
                                                <center>Total pagado</center>
                                            </th>
                                            <th>
                                                <center>Fecha</center>
                                            </th>
                                            <th>
                                                <center>Estado</center>
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
                                        foreach ($datos_detalles as $dato_detalle) {
                                            //crear una variable para almacenar el ID compra
                                            $IdVenta = $dato_detalle['IdVenta'];
                                            $contador = $contador + 1;
                                        ?>
                                            <tr>
                                                <td>
                                                    <center><?= $contador; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $IdVenta; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $dato_detalle['NombreCliente']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $dato_detalle['TotalPago']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $dato_detalle['FechaCreacion']; ?></center>
                                                </td>
                                                <td>
                                                    <center><?= $dato_detalle['Estado']; ?></center>
                                                </td>
                                                <td>
                                                    <center>
                                                        <button class="btn btn-info" id="btn_visualizar<?php echo $IdVenta; ?>" data-id="<?php echo $IdVenta; ?> ">Ver</button>
                                                        <script>
                                                            $(document).ready(function() {
                                                                // Capturar clic en el botón específico
                                                                $('#btn_visualizar<?php echo $IdVenta; ?>').on('click', function() {
                                                                    // Obtener el ID de la venta del atributo 'data-id'
                                                                    let ventaId = $(this).data('id');

                                                                    // Llamar a la función que obtiene los datos de la venta
                                                                    loadProductDetails(ventaId);
                                                                });

                                                                function loadProductDetails(ventaId) {
                                                                    $.ajax({
                                                                        url: '../app/controllers/venta/cargar_carrito.php', // Archivo PHP donde se obtiene el detalle de la venta
                                                                        type: 'POST', // Cambiar a POST
                                                                        data: {
                                                                            id: ventaId
                                                                        }, // Enviar el ID de la venta
                                                                        success: function(response) {
                                                                            // Convertir la respuesta JSON
                                                                            let data = JSON.parse(response);
                                                                            console.log(data); // Para depuración

                                                                            // Llamar a la función para agregar los datos a la tabla
                                                                            agregarAProductoTabla(data);

                                                                            // Mostrar el modal
                                                                            $('#modal_mostrar_detalle').modal('show');
                                                                        },
                                                                        error: function() {
                                                                            alert('Error al cargar los detalles de la venta.');
                                                                        }
                                                                    });
                                                                }

                                                                // Función para agregar los registros a la tabla
                                                                function agregarAProductoTabla(data) {
                                                                    // Obtener el cuerpo de la tabla
                                                                    let tableBody = document.getElementById('productTableBody');

                                                                    // Limpiar el contenido anterior de la tabla
                                                                    tableBody.innerHTML = '';

                                                                    // Iterar sobre los datos y crear filas para la tabla
                                                                    data.forEach(function(venta) {
                                                                        // Crear una nueva fila
                                                                        let row = `<tr>
            <td>${venta.IdVenta}</td>
            <td>${venta.IdCarrito}</td>            
            <td>    
                <button id="btn_seleccionar_carrito_${venta.IdCarrito}"
                class="btn btn-danger btn-sm" 
                data-id="${venta.IdCarrito}">
                Cancelar</button>
            </td>
            <td>${venta.Nombre}</td>
            <td>${venta.Descripcion}</td>
            <td>${venta.Cantidad}</td>
            <td>${venta.PrecioUnitario}</td>
            <td>${venta.Estado}</td>
        </tr>`;
                                                                        // Agregar la fila al cuerpo de la tabla
                                                                        tableBody.innerHTML += row;
                                                                    });
                                                                }


                                                            });
                                                        </script>
                                                        <div class="modal fade" id="modal_mostrar_detalle">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color:cornflowerblue; color: white">
                                                                        <h4 class="modal-title">Detalle de la venta</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <!--tabla completa-->
                                                                        <table id="example1" class="table table-bordered table-striped">
                                                                            <!--Cabecera de la tabla-->
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>
                                                                                        <center>No. venta</center>
                                                                                    </th>
                                                                                    <th>
                                                                                        <center>No. Detalle</center>
                                                                                    </th>
                                                                                    <th>
                                                                                        <center>Acción</center>
                                                                                    <th>
                                                                                        <center>Nombre</center>
                                                                                    </th>
                                                                                    <th>
                                                                                        <center>Detalle</center>
                                                                                    </th>
                                                                                    <th>
                                                                                        <center>Cantidad</center>
                                                                                    </th>
                                                                                    <th>
                                                                                        <center>Precio unitario</center>
                                                                                    </th>
                                                                                    <th>
                                                                                        <center>Estado</center>
                                                                                    </th>
                                                                                </tr>
                                                                            </thead>
                                                                            <!--Contenido de la tabla-->
                                                                            <tbody id="productTableBody">

                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                    <!-- /.modal-content -->
                                                                </div>
                                                                <!-- /.modal-dialog -->
                                                            </div>
                                                            <!-- /.modal -->
                                                        </div>
                                                        <button id="btnCancelarVenta<?php echo $IdVenta; ?>" type=" button" class="btn btn-danger"><i class="fi fi-rr-delete"></i>Anular venta</button>
                                                        <!--permite cancelar el estado de la venta-->
                                                        <script>
                                                            $('#btnCancelarVenta<?php echo $IdVenta; ?>').click(function(event) {
                                                                event.preventDefault();

                                                                // Confirmación para evitar cancelaciones accidentales
                                                                var confirmacion = confirm("¿Estás seguro de que deseas cancelar esta venta?");
                                                                if (confirmacion) {
                                                                    // Aquí debes obtener el ID de la venta que deseas cancelar
                                                                    var idVenta = '<?php echo $IdVenta; ?>' // Suponiendo que tienes el IdVenta en un input hidden o en algún otro lugar

                                                                    // Enviar solicitud AJAX para cancelar la venta
                                                                    $.ajax({
                                                                        url: '../app/controllers/venta/cancelar_venta.php', // Cambia la URL según la ubicación de tu script
                                                                        type: 'POST',
                                                                        data: {
                                                                            IdVenta: idVenta
                                                                        },
                                                                        success: function(response) {
                                                                            // Manejar la respuesta del servidor
                                                                            var result = JSON.parse(response);
                                                                            if (result.success) {
                                                                                alert(result.message); // Mostrar mensaje de éxito
                                                                                // Aquí puedes actualizar la interfaz, por ejemplo, eliminando la venta de la tabla o recargando la página
                                                                                location.reload(); // Recargar la página para actualizar los datos visibles
                                                                            } else {
                                                                                alert(result.message); // Mostrar mensaje de error
                                                                            }
                                                                        },
                                                                        error: function(jqXHR, textStatus, errorThrown) {
                                                                            // Manejar errores de la solicitud AJAX
                                                                            console.error("Error en la solicitud: " + textStatus, errorThrown);
                                                                            alert("Hubo un error al cancelar la venta. Inténtalo de nuevo.");
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        </script>
                                                    </center>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                    <script>
                                        $(document).on('click', '[id^=btn_seleccionar_carrito_]', function() {
                                            // Obtener el IdCarrito del botón clicado
                                            var IdCarrito = $(this).data('id');

                                            // Ahora puedes usar el IdCarrito en otras funciones
                                            console.log("ID Carrito:", IdCarrito);

                                            // Si deseas, puedes llamar a otra función pasando el IdCarrito
                                            cancelarCarrito(IdCarrito);
                                        });



                                        function cancelarCarrito(IdCarrito) {
                                            if (confirm("¿Estás seguro de que deseas cancelar este producto?")) {
                                                $.ajax({
                                                    url: '../app/controllers/venta/cancelar_carrito.php', // Ruta a tu controlador
                                                    type: 'POST',
                                                    data: {
                                                        IdCarrito: IdCarrito
                                                    }, // Enviar el ID del carrito al servidor
                                                    success: function(response) {
                                                        var result = JSON.parse(response);
                                                        alert(result.message); // Mostrar el mensaje retornado por el servidor
                                                        if (result.success) {
                                                            // Aquí puedes recargar la tabla o eliminar la fila del carrito cancelado
                                                            location.reload(); // O actualizar la tabla de alguna otra manera
                                                        }
                                                    },
                                                    error: function(jqXHR, textStatus, errorThrown) {
                                                        console.error("Error en la solicitud: " + textStatus, errorThrown);
                                                        alert("Hubo un error al cancelar el carrito.");
                                                    }
                                                });
                                            }
                                        }
                                    </script>
                                    <!--Pie de la tabla-->
                                    <tfoot>
                                        <tr>
                                            <th>
                                                <center>No.</center>
                                            </th>
                                            <th>
                                                <center>Codigo venta</center>
                                            </th>
                                            <th>
                                                <center>Cliente</center>
                                            </th>
                                            <th>
                                                <center>Total pagado</center>
                                            </th>
                                            <th>
                                                <center>Fecha</center>
                                            </th>
                                            <th>
                                                <center>Estado</center>
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