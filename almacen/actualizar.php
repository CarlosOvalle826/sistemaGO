<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../layout/parte1.php');
include('../app/controllers/categorias/listado_categorias.php');
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
                <div class="col-sm-6">
                    <h1 class="m-0">Actualizar producto</h1>
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
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Modifique los productos necesarios</h3>

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
                                    <form action="../app/controllers/almacen/actualizar.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-9"><!--Primera columna-->
                                                <div class="row"><!--Primera fila-->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Código</label>
                                                            <input name="Codigo" class="form-control" type="text" value="<?php echo $Codigo; ?>" disabled>
                                                            <input type="text" name="IdProducto" value="<?php echo $IdProductoGet; ?>" hidden>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Categoría</label>
                                                            <div style="display: flex">
                                                                <select name="IdCategoria" id="" class="form-control" required>
                                                                    <?php
                                                                    foreach ($datos_categorias as $dato_categorias) {
                                                                        $NombreCategoriaTabla = $dato_categorias['NombreCategoria'];
                                                                        $IdCategoria = $dato_categorias['IdCategoria'] ?>
                                                                        <option value="<?php echo $IdCategoria; ?>" <?php if ($NombreCategoriaTabla == $NombreCategoria) { ?> selected="selected" <?php } ?>>
                                                                            <?php echo $NombreCategoriaTabla; ?>
                                                                        </option>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Nombre</label>
                                                            <input name="NombreProducto" class="form-control" type="text" value="<?php echo $Nombre; ?>" placeholder="Ingrese nombre del producto">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"><!--Segunda fila-->
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock</label>
                                                            <input name="Stock" class="form-control" value="<?php echo $Stock; ?>" type="number" placeholder="Cantidad existente" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock mínimo</label>
                                                            <input name="StockMinimo" class="form-control" value="<?php echo $StockMinimo; ?>" type="number" placeholder="Asigne cantidad">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Stock máximo</label>
                                                            <input name="StockMaximo" class="form-control" type="number" value="<?php echo $StockMaximo; ?>" placeholder="Asigne cantidad">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio compra</label>
                                                            <input name="Compra" class="form-control" value="<?php echo $PrecioCompra; ?>" type="number" placeholder="Q" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio venta</label>
                                                            <input name="Venta" class="form-control" value="<?php echo $PrecioVenta; ?>" type="number" placeholder="Q" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <label for="">Precio mayorista</label>
                                                            <input name="Mayorista" class="form-control" value="<?php echo $PrecioMayorista; ?>" type="number" placeholder="Q" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row"><!--Tercera fila-->
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Fecha de ingreso</label>
                                                            <input name="FechaIngreso" class="form-control" value="<?php echo $FechaIngreso; ?>" type="date" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="">Usuario</label>
                                                            <input class="form-control" type="text" value="<?php echo $CorreoUsuario; ?>" disabled>
                                                            <input name="IdUsuario" type="text" value="<?php echo $IdUsuario; ?>" hidden>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="">Descripción</label>
                                                            <textarea name="Descripcion" class="form-control" id="" cols="" rows="3"><?php echo $Descripcion ?>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3"><!--desplegar imagen-->
                                                <div class="form-group">
                                                    <label for="">Imagen del producto</label>
                                                    <input name="Imagen" type="file" class="form-control" id="cargarImagen" accept="image/jpeg, image/png, image/gif">
                                                    <input name="TextoImagen" type="text" value="<?php echo $Imagen ?>" hidden>
                                                    <br>
                                                    <output id="list">
                                                        <img id="preview" src="<?php echo $URL . "/almacen/img_productos/" . $Imagen; ?>" alt="" width="100%">
                                                    </output>
                                                    <script>
                                                        // Función para mostrar la imagen seleccionada
                                                        document.getElementById('cargarImagen').addEventListener('change', function(event) {
                                                            const file = event.target.files[0];
                                                            const reader = new FileReader();

                                                            reader.onload = function(e) {
                                                                const preview = document.getElementById('preview');
                                                                preview.src = e.target.result;
                                                                preview.style.display = 'block'; // Mostrar la imagen
                                                            }

                                                            if (file) {
                                                                reader.readAsDataURL(file);
                                                            }
                                                        });
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
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