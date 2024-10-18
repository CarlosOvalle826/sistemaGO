<?php
include('../app/config.php');
include('../layout/sesion.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/login/controlador_autorizacion.php');
if (!verificarAcceso('Usuarios')) {
    // Denegar acceso y redirigir
    // Si no tiene acceso, redirigir a una página de acceso denegado
    header('Location: ' . $URL . '/acceso_denegado.php');
    exit;  // Detener la ejecución después de redirigi
}
include('../layout/parte1.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/usuarios/listado_usuarios.php');
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Listado de usuarios</h1>
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
                            <h3 class="card-title">Usuarios registrados</h3>

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
                                            <center>Nombre</center>
                                        </th>
                                        <th>
                                            <center>Correo</center>
                                        </th>
                                        <th>
                                            <center>Rol de usuario</center>
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
                                    foreach ($datos_usuario as $dato_usuario) {
                                        //crear una variable para almacenar el ID de usuario
                                        $IdUsuario = $dato_usuario['IdUsuario'];

                                    ?>
                                        <tr>
                                            <td>
                                                <center><?php echo $contador = $contador + 1; ?></center>
                                            </td>
                                            <td> <?php echo $dato_usuario['NombreUsuario']; ?></td>
                                            <td> <?php echo $dato_usuario['CorreoUsuario']; ?></td>
                                            <td>
                                                <center><?php echo $dato_usuario['Rol']; ?></center>
                                            </td>
                                            <td>
                                                <center>
                                                    <!--Botones para controlar los registros-->
                                                    <div class="btn-group">
                                                        <a href="mostrar.php?id=<?php echo $IdUsuario; ?>" type="button" class="btn btn-outline-info"><i class="fi fi-rr-magnifying-glass-eye"></i>Ver</a>
                                                        <a href="actualizar.php?id=<?php echo $IdUsuario; ?>" type="button" class="btn btn-outline-success"><i class="fi fi-rr-pencil"></i>Editar</a>
                                                        <a href="borrar.php?id=<?php echo $IdUsuario; ?>" type="button" class="btn btn-outline-danger"><i class="fi fi-rr-delete-user"></i>Eliminar</a>

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
                                            <center>Nombre</center>
                                        </th>
                                        <th>
                                            <center>Correo</center>
                                        </th>
                                        <th>
                                            <center>Rol de usuario</center>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Usuarios",
                "infoEmpty": "Mostrando 0 to 0 de 0 Usuarios",
                "infoFiltered": "(Filtrado de _MAX_ total Usuarios)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Usuarios",
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
                    text: 'Visol de columnas'
                }
            ],
            /*Fin de ajuste de botones*/
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>