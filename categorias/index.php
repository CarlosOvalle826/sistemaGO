<?php
include('../app/config.php');
include('../layout/sesion.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/login/controlador_autorizacion.php');
if (!verificarAcceso('Categorias')) {
    // Denegar acceso y redirigir
    // Si no tiene acceso, redirigir a una página de acceso denegado
    header('Location: ' . $URL . '/acceso_denegado.php');
    exit;  // Detener la ejecución después de redirigi
}
include('../layout/parte1.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/categorias/listado_categorias.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de categorias
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-crear">
                            <i class="fi fi-rr-layer-plus"></i>
                            Agregar categoría
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
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorias registradas</h3>

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
                                            <center>Nombre Categoria</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
                                        </th>
                                    </tr>
                                </thead>
                                <!--Contenido de la tabla-->
                                <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($datos_categorias as $dato_categorias) {
                                        //crear una variable para almacenar el ID de usuario
                                        $IdCategoria = $dato_categorias['IdCategoria'];
                                        $NombreCategoria = $dato_categorias['NombreCategoria'];
                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $contador = $contador + 1; ?></center>
                                            </td>
                                            <td> <?php echo $dato_categorias['NombreCategoria']; ?></td>

                                            <td>
                                                <center>
                                                    <!--Botones para controlar los registros-->
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#modal-actualizar<?php echo $IdCategoria; ?>">
                                                            <i class="fi fi-rr-pencil"></i>
                                                            Editar
                                                        </button>
                                                        <!--Modal para la actualización categoría-->
                                                        <div class="modal fade" id="modal-actualizar<?php echo $IdCategoria; ?>">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header" style="background-color: #6dc36d; color: white">
                                                                        <h4 class="modal-title">Modificar Categoría</h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre de la categoría</label>
                                                                                    <input type="text" id="nombre_categoria<?php echo $IdCategoria; ?>" class="form-control" value="<?php echo $NombreCategoria ?>">
                                                                                    <small style="color: red; display:none" id="label_actualizar<?php echo $IdCategoria; ?>">* Es requerido este campo</small>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                        <button type="button" class="btn btn-success" id="btn_actualizar<?php echo $IdCategoria; ?>">Actualizar</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                        <!-- /.modal -->
                                                        <script>
                                                            $('#btn_actualizar<?php echo $IdCategoria; ?>').click(function() {

                                                                var nombre_categoria = $('#nombre_categoria<?php echo $IdCategoria; ?>').val();
                                                                var IdCategoria = '<?php echo $IdCategoria; ?>';
                                                                if (nombre_categoria == "") {
                                                                    $('#nombre_categoria<?php echo $IdCategoria; ?>').focus();
                                                                    $('#label_actualizar<?php echo $IdCategoria; ?>').css('display', 'block');
                                                                } else {
                                                                    var url = "../app/controllers/categorias/actualizar_categorias.php";
                                                                    $.get(url, {
                                                                        nombre_categoria: nombre_categoria,
                                                                        IdCategoria: IdCategoria
                                                                    }, function(datos) {
                                                                        $('#respuesta_actualizar<?php echo $IdCategoria; ?>').html(datos);
                                                                    });
                                                                }
                                                            });
                                                        </script>
                                                        <div id="respuesta_actualizar<?php echo $IdCategoria; ?>"></div>
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
                                            <center>Nombre Categoria</center>
                                        </th>
                                        <th>
                                            <center>Acciones</center>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
                "infoEmpty": "Mostrando 0 to 0 de 0 Categorías",
                "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Categorías",
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
<!--Modal para la creación de una nueva categoría-->
<div class="modal fade" id="modal-crear">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #109dfa; color: white;">
                <h4 class="modal-title">Crear nueva Categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre de la categoría <b>*</b></label>
                            <input type="text" id="nombre_categoria" class="form-control">
                            <small style="color: red; display:none" id="label_crear">* Es requerido este campo</small>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btn_crear">Guardar</button>

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
        var nombre_categoria = $('#nombre_categoria').val();
        if (nombre_categoria == "") {
            $('#nombre_categoria').focus();
            $('#label_crear').css('display', 'block');
        } else {
            var url = "../app/controllers/categorias/registro_categorias.php";
            $.get(url, {
                nombre_categoria: nombre_categoria
            }, function(datos) {
                $('#respuesta').html(datos);
            });
        }

    });
</script>
<div id="respuesta"></div>