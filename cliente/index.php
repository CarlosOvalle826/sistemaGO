<?php
include('../app/config.php');
include('../layout/sesion.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/login/controlador_autorizacion.php');
if (!verificarAcceso('Clientes')) {
    // Denegar acceso y redirigir
    // Si no tiene acceso, redirigir a una página de acceso denegado
    header('Location: ' . $URL . '/acceso_denegado.php');
    exit;  // Detener la ejecución después de redirigi
}
include('../layout/parte1.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/cliente/mostrar_cantidad.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de clientes
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear-cliente">
                            <i class="fi fi-rr-layer-plus"></i>
                            Agregar cliente
                        </button>
                    </h1>

                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-8">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Clientes registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <!--tabla completa-->
                            <table id="example1" class="table table-bordered table-striped">
                                <!--Cabecera de la tabla-->
                                <thead>
                                    <tr>
                                        <th>
                                            <center>No.</center>
                                        </th>
                                        <th>
                                            <center>ID cliente</center>
                                        </th>
                                        <th>
                                            <center>Nombre</center>
                                        </th>
                                        <th>
                                            <center>NIT</center>
                                        </th>
                                        <th>
                                            <center>Celular</center>
                                        </th>
                                        <th>
                                            <center>Correo</center>
                                        </th>
                                        <th>
                                            <center>Accion</center>
                                        </th>
                                    </tr>
                                </thead>
                                <!--Contenido de la tabla-->
                                <tbody>
                                    <?php
                                    $contador_cliente = 0;
                                    foreach ($datos_clientes as $dato_cliente) {
                                        //crear una variable para almacenar el ID de usuario
                                        $IdCliente = $dato_cliente['IdCliente'];
                                        $NombreCliente = $dato_cliente['NombreCliente'];
                                        $NITCliente = $dato_cliente['NitCliente'];
                                        $CelularCliente = $dato_cliente['CelularCliente'];
                                        $CorreoCliente = $dato_cliente['CorreoCliente'];
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $contador_cliente = $contador_cliente + 1; ?></center>
                                            </td>
                                            <td> <?php echo $dato_cliente['IdCliente']; ?></td>
                                            <td> <?php echo $dato_cliente['NombreCliente']; ?></td>
                                            <td> <?php echo $dato_cliente['NitCliente']; ?></td>
                                            <td> <?php echo $dato_cliente['CelularCliente']; ?></td>
                                            <td> <?php echo $dato_cliente['CorreoCliente']; ?></td>
                                            <td>
                                                <!--Botones para controlar los registros-->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-success btn-sm"
                                                        data-toggle="modal"
                                                        data-target="#modal-actualizar-cliente<?php echo $IdCliente; ?>">
                                                        <i class="fi fi-rr-pencil"></i>
                                                        Editar
                                                    </button>
                                                    <!--Modal para la actualización categoría-->
                                                    <div class="modal fade" id="modal-actualizar-cliente<?php echo $IdCliente; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #6dc36d; color: white">
                                                                    <h4 class="modal-title">Modificar cliente</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del cliente</label>
                                                                                <input type="text" id="nombre_cliente<?php echo $IdCliente; ?>" class="form-control" value="<?php echo $NombreCliente; ?>">
                                                                                <small style="color: red; display:none" id="label_actualizar_nom<?php echo $IdCliente; ?>">* Es requerido este campo</small>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">NIT del cliente</label>
                                                                                <input type="text" id="NIT_cliente<?php echo $IdCliente; ?>" class="form-control" value="<?php echo $NITCliente; ?>">
                                                                                <small style="color: red; display:none" id="label_actualizar_nit<?php echo $IdCliente; ?>">* Es requerido este campo</small>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Celular del cliente</label>
                                                                                <input type="text" id="celular_cliente<?php echo $IdCliente; ?>" class="form-control" value="<?php echo $CelularCliente; ?>">
                                                                                <small style="color: red; display:none" id="label_actualizar_cel<?php echo $IdCliente; ?>">* Es requerido este campo</small>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label for="">Correo del cliente</label>
                                                                                <input type="text" id="correo_cliente<?php echo $IdCliente; ?>" class="form-control" value="<?php echo $CorreoCliente; ?>">
                                                                                <small style="color: red; display:none" id="label_actualizar_corr<?php echo $IdCliente; ?>">* Es requerido este campo</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-success" id="btn_actualizar_cliente<?php echo $IdCliente; ?>">Actualizar</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $('#btn_actualizar_cliente<?php echo $IdCliente; ?>').click(function() {
                                                            var nombre_cliente = $('#nombre_cliente<?php echo $IdCliente; ?>').val();
                                                            var NIT_cliente = $('#NIT_cliente<?php echo $IdCliente; ?>').val();
                                                            var celular_cliente = $('#celular_cliente<?php echo $IdCliente; ?>').val();
                                                            var correo_cliente = $('#correo_cliente<?php echo $IdCliente; ?>').val();
                                                            var IdCliente = '<?php echo $IdCliente; ?>';

                                                            // Validación de campos
                                                            if (nombre_cliente == "") {
                                                                $('#nombre_cliente<?php echo $IdCliente; ?>').focus();
                                                                $('#label_actualizar_nom<?php echo $IdCliente; ?>').css('display', 'block');
                                                            } else if (NIT_cliente == "") {
                                                                $('#NIT_cliente<?php echo $IdCliente; ?>').focus();
                                                                $('#label_actualizar_nit<?php echo $IdCliente; ?>').css('display', 'block');
                                                            } else {
                                                                // Enviar datos usando POST
                                                                var url = "../app/controllers/cliente/actualizar_cliente.php";
                                                                $.post(url, {
                                                                    nombre_cliente: nombre_cliente,
                                                                    NIT_cliente: NIT_cliente,
                                                                    celular_cliente: celular_cliente,
                                                                    correo_cliente: correo_cliente,
                                                                    IdCliente: IdCliente
                                                                }, function(datos) {
                                                                    // Mostrar respuesta del servidor
                                                                    $('#respuesta_actualizar<?php echo $IdCliente; ?>').html(datos);
                                                                });
                                                            }
                                                        });
                                                    </script>

                                                    <div id="respuesta_actualizar<?php echo $IdCliente; ?>"></div>
                                                </div>
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
                                            <center>ID cliente</center>
                                        </th>
                                        <th>
                                            <center>Nombre</center>
                                        </th>
                                        <th>
                                            <center>NIT</center>
                                        </th>
                                        <th>
                                            <center>Celular</center>
                                        </th>
                                        <th>
                                            <center>Correo</center>
                                        </th>
                                        <th>
                                            <center>Accion</center>
                                        </th>
                                    </tr>
                                </tfoot>
                            </table>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Cliente",
                "infoEmpty": "Mostrando 0 to 0 de 0 Cliente",
                "infoFiltered": "(Filtrado de _MAX_ total Cliente)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Clientes",
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
<!--Modal para la creación de nuevo cliente-->
<div class="modal fade" id="modal-crear-cliente">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #109dfa; color: white;">
                <h4 class="modal-title">Crear nuevo cliente</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre del cliente</label>
                            <input type="text" id="nombre_cliente_crear" class="form-control">
                            <small style="color: red; display:none" id="label_crear_nom">* Es requerido este campo</small>
                        </div>
                        <div class="form-group">
                            <label for="">NIT del cliente</label>
                            <input type="text" id="NIT_cliente_crear" class="form-control">
                            <small style="color: red; display:none" id="label_crear_nit">* Es requerido este campo</small>
                        </div>
                        <div class="form-group">
                            <label for="">Celular del cliente</label>
                            <input type="text" id="celular_cliente_crear" class="form-control">
                            <small style="color: red; display:none" id="label_crear_cel">* Es requerido este campo</small>
                        </div>
                        <div class="form-group">
                            <label for="">Correo del cliente</label>
                            <input type="text" id="correo_cliente_crear" class="form-control">
                            <small style="color: red; display:none" id="label_crear_corr">* Es requerido este campo</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_crear_cliente">Guardar</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Script para el boton de guardar ubicado en el modal-->
<script>
    $('#btn_crear_cliente').click(function() {
        var nombre_cliente = $('#nombre_cliente_crear').val();
        var NIT_cliente = $('#NIT_cliente_crear').val();
        var celular_cliente = $('#celular_cliente_crear').val();
        var correo_cliente = $('#correo_cliente_crear').val();
        // Validación de campos
        if (nombre_cliente == "") {
            $('#nombre_cliente_crear').focus();
            $('#label_crear_nom').css('display', 'block');
        } else if (NIT_cliente == "") {
            $('#NIT_cliente').focus();
            $('#label_crear_nit').css('display', 'block');
        } else {
            // Enviar datos usando POST
            var url = "../app/controllers/cliente/guardar_cliente.php";
            $.post(url, {
                NombreCliente: nombre_cliente,
                NITCliente: NIT_cliente,
                CelularCliente: celular_cliente,
                CorreoCliente: correo_cliente,
            }, function(datos) {
                // Decodificar JSON y mostrar solo el mensaje en el alert
                var response = JSON.parse(datos);
                alert(response.message);
                //limpiar campos
                $('#nombre_cliente_crear').val('');
                $('#NIT_cliente_crear').val();
                $('#celular_cliente_crear').val();
                $('#correo_cliente_crear').val();
                // Recargar la página después de la alerta
                location.reload();
            });
        }
    });
</script>