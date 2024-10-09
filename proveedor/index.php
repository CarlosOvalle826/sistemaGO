<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/proveedor/listado_proveedores.php');

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de proveedores
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
                            <i class="fi fi-rr-layer-plus"></i>
                            Aregar proveedor
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
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Proveedores registrados</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="display: block;">
                            <!--tabla completa-->
                            <table id="example1" class="table table-bordered table-striped  table-sm">
                                <!--Cabecera de la tabla-->
                                <thead>
                                    <tr>
                                        <th>
                                            <center>No.</center>
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
                                        <th>
                                            <center>Acción</center>
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
                                            <td> <?php echo $dato_proveedor['NombreProveedor']; ?></td>
                                            <td><a href="https://wa.me/502<?php echo $dato_proveedor['Celular'] ?>" class="btn btn-success btn-sm">
                                                    <i class="fi fi-rr-circle-phone-flip"></i>
                                                    <?php echo $dato_proveedor['Celular']; ?>
                                                </a>
                                            </td>
                                            <td> <?php echo $dato_proveedor['Empresa']; ?></td>
                                            <td> <?php echo $dato_proveedor['Correo']; ?></td>
                                            <td> <?php echo $dato_proveedor['Direccion']; ?></td>
                                            <td>
                                                <!--Botones para controlar los registros ACTUALIZAR-->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal-actualizar<?php echo $IdProveedor; ?>">
                                                        <i class="fi fi-rr-pencil"></i>
                                                        Editar
                                                    </button>
                                                    <!--contenido para actualizar el modal y permitir visualizar en movil-->
                                                    <!--Modal para la actualización de proveedores-->
                                                    <div class="modal fade" id="modal-actualizar<?php echo $IdProveedor; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #6dc36d; color: white">
                                                                    <h4 class="modal-title">Modificar Proveedor</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row"> <!--primera fila-->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Nombre del proveedor</label>
                                                                                <input type="text" id="nombre_proveedor<?php echo $IdProveedor; ?>" class="form-control" value="<?php echo $NombreProveedor; ?>">
                                                                                <small style="color: red; display:none" id="label_nombre<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Celular<b>*</b></label>
                                                                                <input type="text" id="celular<?php echo $IdProveedor; ?>" class="form-control" value="<?php echo $dato_proveedor['Celular']; ?>">
                                                                                <small style="color: red; display:none" id="label_celular<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row"> <!--segunda fila-->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Empresa<b>*</b></label>
                                                                                <input type="text" id="empresa<?php echo $IdProveedor; ?>" class="form-control" value="<?php echo $dato_proveedor['Empresa']; ?>">
                                                                                <small style="color: red; display:none" id="label_empresa<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Correo<b>*</b></label>
                                                                                <input type="text" id="correo<?php echo $IdProveedor; ?>" class="form-control" value="<?php echo $dato_proveedor['Correo']; ?>">
                                                                                <small style="color: red; display:none" id="label_correo<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row"> <!--tercera fila-->
                                                                        <div class="col-md-12">
                                                                            <div class="form-group">
                                                                                <label for="">Dirección<b>*</b></label>
                                                                                <textarea type="text" id="direccion<?php echo $IdProveedor; ?>"
                                                                                    class="form-control" cols="60" rows="2"><?php echo $dato_proveedor['Direccion']; ?></textarea>
                                                                                <small style="color: red; display:none" id="label_direccion<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-success" id="btn_actualizar<?php echo $IdProveedor; ?>">Actualizar</button>
                                                                </div>
                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
                                                    <!-- /.modal -->
                                                    <script>
                                                        $('#btn_actualizar<?php echo $IdProveedor; ?>').click(function() {

                                                            var nombre_proveedor = $('#nombre_proveedor<?php echo $IdProveedor; ?>').val();
                                                            var Celular = $('#celular<?php echo $IdProveedor; ?>').val();
                                                            var Empresa = $('#empresa<?php echo $IdProveedor; ?>').val();
                                                            var Correo = $('#correo<?php echo $IdProveedor; ?>').val();
                                                            var Direccion = $('#direccion<?php echo $IdProveedor; ?>').val();
                                                            var IdProveedor = '<?php echo $IdProveedor; ?>';

                                                            if (nombre_proveedor == "") {
                                                                $('#nombre_proveedor<?php echo $IdProveedor; ?>').focus();
                                                                $('#label_nombre<?php echo $IdProveedor; ?>').css('display', 'block');
                                                            } else if (celular == "") {
                                                                $('#celular<?php echo $IdProveedor; ?>').focus();
                                                                $('#label_celular<?php echo $IdProveedor; ?>').css('display', 'block');
                                                            } else if (empresa == "") {
                                                                $('#empresa<?php echo $IdProveedor; ?>').focus();
                                                                $('#label_empresa<?php echo $IdProveedor; ?>').css('display', 'block');
                                                            } else if (correo == "") {
                                                                $('#correo<?php echo $IdProveedor; ?>').focus();
                                                                $('#label_correo<?php echo $IdProveedor; ?>').css('display', 'block');
                                                            } else if (direccion == "") {
                                                                $('#direccion<?php echo $IdProveedor; ?>').focus();
                                                                $('#label_direccion<?php echo $IdProveedor; ?>').css('display', 'block');
                                                            } else {
                                                                var url = "../app/controllers/proveedor/actualizar.php";
                                                                $.get(url, {
                                                                    IdProveedor: IdProveedor,
                                                                    nombre_proveedor: nombre_proveedor,
                                                                    celular: Celular,
                                                                    empresa: Empresa,
                                                                    correo: Correo,
                                                                    direccion: Direccion
                                                                }, function(datos) {
                                                                    $('#respuesta_actualizar<?php echo $IdProveedor; ?>').html(datos);
                                                                });
                                                            }
                                                        });
                                                    </script>
                                                    <div id="respuesta_actualizar<?php echo $IdProveedor; ?>"></div>
                                                </div>
                                                <!--Botones para controlar los registros ELIMINAR-->
                                                <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modal-eliminar<?php echo $IdProveedor; ?>">
                                                    <i class="fi fi-rr-delete-user"></i>
                                                    Eliminar
                                                </button>
                                                <!--Modal para eliminar proveedores-->
                                                <div class="modal fade" id="modal-eliminar<?php echo $IdProveedor; ?>">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color:red; color: white">
                                                                <h4 class="modal-title">¿Esta seguro de eliminar al proveedor?</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row"> <!--primera fila-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre del proveedor</label>
                                                                            <input type="text" id="nombre_proveedor<?php echo $IdProveedor; ?>" class="form-control" value="<?php echo $NombreProveedor; ?>" disabled>
                                                                            <small style="color: red; display:none" id="label_nombre<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                        </div>

                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Celular<b>*</b></label>
                                                                            <input type="text" id="celular<?php echo $IdProveedor; ?>" class="form-control" value="<?php echo $dato_proveedor['Celular']; ?>" disabled>
                                                                            <small style="color: red; display:none" id="label_celular<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row"> <!--segunda fila-->
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Empresa<b>*</b></label>
                                                                            <input type="text" id="empresa<?php echo $IdProveedor; ?>" class="form-control" value="<?php echo $dato_proveedor['Empresa']; ?>" disabled>
                                                                            <small style="color: red; display:none" id="label_empresa<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Correo<b>*</b></label>
                                                                            <input type="text" id="correo<?php echo $IdProveedor; ?>" class="form-control" value="<?php echo $dato_proveedor['Correo']; ?>" disabled>
                                                                            <small style="color: red; display:none" id="label_correo<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                                <div class="row"> <!--tercera fila-->
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Dirección<b>*</b></label>
                                                                            <textarea type="text" id="direccion<?php echo $IdProveedor; ?>"
                                                                                class="form-control" cols="60" rows="2" disabled><?php echo $dato_proveedor['Direccion']; ?></textarea>
                                                                            <small style="color: red; display:none" id="label_direccion<?php echo $IdProveedor; ?>">* Es requerido este campo</small>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                <button type="button" class="btn btn-danger" id="btn_eliminar<?php echo $IdProveedor; ?>">Eliminar</button>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                                <script>
                                                    $('#btn_eliminar<?php echo $IdProveedor; ?>').click(function() {
                                                        var IdProveedor = '<?php echo $IdProveedor; ?>';

                                                        var url2 = "../app/controllers/proveedor/eliminar.php";
                                                        $.get(url2, {
                                                            IdProveedor: IdProveedor
                                                        }, function(datos) {
                                                            $('#respuesta_eliminar<?php echo $IdProveedor; ?>').html(datos);
                                                        });
                                                    });
                                                </script>
                                                <div id="respuesta_eliminar<?php echo $IdProveedor; ?>"></div>
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
                                        <th>
                                            <center>Acción</center>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Proveedores",
                "infoEmpty": "Mostrando 0 to 0 de 0 Proveedores",
                "infoFiltered": "(Filtrado de _MAX_ total Proveedores)",
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
<!--Modal para la creación de un nuevo proveedor-->
<div class="modal fade" id="modal-crear">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #109dfa; color: white;">
                <h4 class="modal-title">Crear nuevo proveedor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row"> <!--primera fila-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre del proveedor<b>*</b></label>
                            <input type="text" id="nombre_proveedor" class="form-control">
                            <small style="color: red; display:none" id="label_nombre">* Es requerido este campo</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Celular<b>*</b></label>
                            <input type="text" id="celular" class="form-control">
                            <small style="color: red; display:none" id="label_celular">* Es requerido este campo</small>
                        </div>
                    </div>
                </div>
                <div class="row"> <!--segunda fila-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Empresa<b>*</b></label>
                            <input type="text" id="empresa" class="form-control">
                            <small style="color: red; display:none" id="label_empresa">* Es requerido este campo</small>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Correo<b>*</b></label>
                            <input type="text" id="correo" class="form-control">
                            <small style="color: red; display:none" id="label_correo">* Es requerido este campo</small>
                        </div>
                    </div>

                </div>
                <div class="row"> <!--tercera fila-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Dirección<b>*</b></label>
                            <textarea type="text" id="direccion" class="form-control" cols="60" rows="2"></textarea>
                            <small style="color: red; display:none" id="label_direccion">* Es requerido este campo</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_crear">Guardar</button>
                <div id="respuesta"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!--Script para el boton de guardar ubicado en el modal-->
<script>
    $('#btn_crear').click(function() {
        //alert("Guardar");
        var nombre_proveedor = $('#nombre_proveedor').val();
        var celular = $('#celular').val();
        var empresa = $('#empresa').val();
        var correo = $('#correo').val();
        var direccion = $('#direccion').val();
        if (nombre_proveedor == "") {
            $('#nombre_proveedor').focus();
            $('#label_nombre').css('display', 'block');
        } else if (celular == "") {
            $('#celular').focus();
            $('#label_celular').css('display', 'block');
        } else if (empresa == "") {
            $('#empresa').focus();
            $('#label_empresa').css('display', 'block');
        } else if (correo == "") {
            $('#correo').focus();
            $('#label_correo').css('display', 'block');
        } else if (direccion == "") {
            $('#direccion').focus();
            $('#label_direccion').css('display', 'block');
        } else {
            var url = "../app/controllers/proveedor/crear.php";
            $.get(url, {
                nombre_proveedor: nombre_proveedor,
                celular: celular,
                empresa: empresa,
                correo: correo,
                direccion: direccion
            }, function(datos) {
                $('#respuesta').html(datos);
            });
        }

    });
</script>