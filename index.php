<?php
include('app/config.php');
include('layout/sesion.php');
include('layout/parte1.php');
include('app/controllers/usuarios/listado_usuarios.php');
include('app/controllers/roles/listado_roles.php');
include('app/controllers/categorias/listado_categorias.php');
include('app/controllers/almacen/listado_productos.php');
include('app/controllers/proveedor/listado_proveedores.php');
include('app/controllers/compra/listado_compras.php');
include('app/controllers/venta/listado_ventas.php');
include('app/controllers/cliente/mostrar_cantidad.php');
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Bienvenid@ <?php echo $nombre_sesion ?> al sistema integrado de inventario y ventas</h1>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- /.row -->
            <br></br>
            <div class="row">
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="color:white">
                    <!-- small card -->
                    <div class=" small-box" style="background-color:#5E2E91; ">
                        <div class="inner">
                            <?php
                            $contador_usuarios = 0;
                            foreach ($datos_usuario as $dato_usuario) {
                                $contador_usuarios = $contador_usuarios + 1;
                            }
                            ?>
                            <h3><?php echo $contador_usuarios; ?></h3>
                            <p>Usuarios registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/usuarios/crear.php">
                            <div class="icon" style="color:white">
                                <i class="fi fi-rr-user-add"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/usuarios" class="small-box-footer">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="color:white">
                    <!-- small card -->
                    <div class=" small-box" style="background-color:#F39C12; ">
                        <div class="inner">
                            <?php
                            $contador_roles = 0;
                            foreach ($datos_roles as $dato_roles) {
                                $contador_roles = $contador_roles + 1;
                            }
                            ?>
                            <h3><?php echo $contador_roles; ?></h3>
                            <p>Roles registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/roles/crear.php">
                            <div class="icon" style="color:white">
                                <i class="fi fi-rr-id-card-clip-alt"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/roles" class="small-box-footer">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="color:white">
                    <!-- small card -->
                    <div class=" small-box" style="background-color:#7B4B9E; ">
                        <div class="inner">
                            <?php
                            $contador_categorias = 0;
                            foreach ($datos_categorias as $dato_categoria) {
                                $contador_categorias = $contador_categorias + 1;
                            }
                            ?>
                            <h3><?php echo $contador_categorias; ?></h3>
                            <p>Categorías registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/categorias">
                            <div class="icon" style="color:white">
                                <i class="fi fi-rr-tags"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/categorias" class="small-box-footer">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="color:white">
                    <!-- small card -->
                    <div class=" small-box" style="background-color:#F7B24A; ">
                        <div class="inner">
                            <?php
                            $contador_productos = 0;
                            foreach ($datos_productos as $dato_producto) {
                                $contador_productos = $contador_productos + 1;
                            }
                            ?>
                            <h3><?php echo $contador_productos; ?></h3>
                            <p>Productos registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/almacen/crear.php">
                            <div class="icon" style="color:white">
                                <i class="fi fi-rr-apps-add"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/almacen" class="small-box-footer" style="color:white">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <div class="row">
                <div class="col-lg-3 col-6" style="color:white">
                    <!-- small card -->
                    <div class=" small-box bg-" style="background-color:#F7B24A;  ">
                        <div class="inner">
                            <?php
                            $contador_proveedores = 0;
                            foreach ($datos_proveedores as $dato_proveedor) {
                                $contador_proveedores = $contador_proveedores + 1;
                            }
                            ?>
                            <h3><?php echo $contador_proveedores; ?></h3>
                            <p>Proveedores registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/proveedor">
                            <div class="icon" style="color:white">
                                <i class="fi fi-rr-supplier"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/proveedor" class="small-box-footer" style="color:white">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6" style="color:white">
                    <!-- small card -->
                    <div class=" small-box bg-" style="background-color:#7B4B9E;     ">
                        <div class="inner">
                            <?php
                            $contador_compra = 0;
                            foreach ($datos_compras as $dato_compra) {
                                $contador_compra = $contador_compra + 1;
                            }
                            ?>
                            <h3><?php echo $contador_compra; ?></h3>
                            <p>Compras registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/compra">
                            <div class="icon" style="color:white">
                                <i class="fi fi-rr-bags-shopping"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/compra" class="small-box-footer" style="color:white">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-6" style="color:white">
                    <!-- small card -->
                    <div class=" small-box bg-" style="background-color:#F39C12;     ">
                        <div class="inner">
                            <?php
                            $contador_venta = 0;
                            foreach ($datos_ventas as $dato_venta) {
                                $contador_venta = $contador_venta + 1;
                            }
                            ?>
                            <h3><?php echo $contador_venta; ?></h3>
                            <p>Ventas registradas</p>
                        </div>
                        <a href="<?php echo $URL; ?>/venta/crear.php">
                            <div class="icon" style="color:white">
                                <i class="fi fi-rr-shopping-cart-add"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/venta" class="small-box-footer" style="color:white">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6" style="color:white">
                    <!-- small card -->
                    <div class=" small-box" style="background-color:#5E2E91; ">
                        <div class="inner">
                            <?php
                            $contador_cliente = 0;
                            foreach ($datos_clientes as $dato_cliente) {
                                $contador_cliente = $contador_cliente + 1;
                            }
                            ?>
                            <h3><?php echo $contador_cliente; ?></h3>
                            <p>Clientes registrados</p>
                        </div>
                        <a href="<?php echo $URL; ?>/cliente.php">
                            <div class="icon" style="color:white">
                                <i class="fi fi-rr-user-add"></i>
                            </div>
                        </a>
                        <a href="<?php echo $URL; ?>/cliente" class="small-box-footer">
                            Mas información <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
    </div>
</aside>
<!-- /.control-sidebar -->
<?php
include('layout/parte2.php');
?>