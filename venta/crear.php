<?php
include('../app/config.php');
include('../layout/sesion.php');
include('../app/controllers/login/controlador_autorizacion.php');
if (!verificarAcceso('Ventas')) {
    // Denegar acceso y redirigir
    // Si no tiene acceso, redirigir a una página de acceso denegado
    header('Location: ' . $URL . '/acceso_denegado.php');
    exit;  // Detener la ejecución después de redirigi
}
include('../layout/parte1.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/almacen/listado_productos.php');
//consulta a la base de datos sobre la tabla usuario
include('../app/controllers/venta/listado_ventas.php');
?>
<!-- Incluye Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
                    <h1 class="m-0">Registrar nueva venta</h1>
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
                            <?php
                            $contadorVentas = 0;
                            foreach ($datos_ventas as $dato_venta) {
                                ++$contadorVentas;
                            }
                            ?>
                            <h3 class="card-title">Venta No.
                                <input type="text" disabled style="text-align: center" value="<?= $contadorVentas + 1; ?>">
                            </h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <b>Carrito </b>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target=" #modal_buscar_producto">
                                <i class="fa fa-search"></i>
                                Buscar producto
                            </button>
                            <!--Modal para visualizar proveedor-->
                            <div class="modal fade" id="modal_buscar_producto">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:cornflowerblue; color: white">
                                            <h4 class="modal-title">Busqueda del producto</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table table-responsive" style="height: 400px; overflow-y: auto;">
                                                <!--tabla completa-->
                                                <table id="example1" class="table table-bordered table-striped table-sm" style="font-size: 14px">
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
                                                                        document.getElementById('btn_seleccionar<?php echo $IdProducto; ?>').addEventListener('click', function() {
                                                                            // Simulación de los detalles del producto
                                                                            var idproductoP = "<?= $dato_producto['IdProducto']; ?>" // Nombre del producto
                                                                            var producto = "<?= $dato_producto['Nombre']; ?>" // Nombre del producto
                                                                            var detalle = "<?= $dato_producto['Descripcion']; ?>" // Detalle del producto
                                                                            var precioVenta = "<?= $dato_producto['PrecioVenta']; ?>" // Precio de venta
                                                                            var precioMayorista = "<?= $dato_producto['PrecioMayorista']; ?>" // Precio mayorista
                                                                            var stock_disponible = "<?= $dato_producto['Stock']; ?>"
                                                                            $('#CantidadP').focus();
                                                                            // Asignar valores a los campos correspondientes
                                                                            document.getElementById('ProductoP').value = producto;
                                                                            document.getElementById('DetalleP').value = detalle;
                                                                            document.getElementById('IdProductoP').value = idproductoP;
                                                                            document.getElementById('stock_disponible').value = stock_disponible;

                                                                            // Limpiar el select antes de agregar nuevas opciones
                                                                            var select = document.getElementById('precio_selector');
                                                                            select.innerHTML = ''; // Limpiar opciones existentes

                                                                            // Crear nuevas opciones
                                                                            var option1 = document.createElement('option');
                                                                            option1.value = precioVenta; // Almacena el precio de venta directamente
                                                                            option1.textContent = 'Venta: ' + precioVenta;
                                                                            select.appendChild(option1);

                                                                            var option2 = document.createElement('option');
                                                                            option2.value = precioMayorista; // Almacena el precio mayorista directamente
                                                                            option2.textContent = 'Mayorista: ' + precioMayorista;
                                                                            select.appendChild(option2);
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
                                            <!--Datos del producto que sera seleccionado durante la venta-->
                                            <div class="row" style="font-size: 12px">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <input id="IdProductoP" class="form-control form-control-sm" type="text" name="" hidden>
                                                        <label for="my-input">Producto</label>
                                                        <input id="ProductoP" class="form-control form-control-sm" type="text" name="" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="my-input">Detalle</label>
                                                        <input id="DetalleP" class="form-control form-control-sm" type="text" name="" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="my-input">Cantidad</label>
                                                        <input id="CantidadP" class="form-control form-control-sm" type="number" name="">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label for="precio_selector">Precio</label>
                                                        <select id="precio_selector" class="form-control form-control-sm">
                                                            <option value="">Selecciona un precio</option>
                                                            <option id="precio_venta"></option>
                                                            <option id="precio_mayorista"></option>
                                                            <!-- Añade más opciones si es necesario -->
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style=" font-size: 12px">
                                                <div class="col-md-8"></div>
                                                <div class="col-md-2">
                                                    <label for="">Disponible</label>
                                                    <input id="stock_disponible" class="form-control form-control-sm" type="number" readonly>
                                                </div>
                                            </div>
                                            <button id="btn_añadir_producto" style="float: right" class="btn btn-primary">
                                                Añadir
                                            </button>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function() {
                                                    // Variable para almacenar el total
                                                    var totalGeneral = 0;

                                                    document.getElementById('btn_añadir_producto').addEventListener('click', function() {
                                                        var idProducto = document.getElementById('IdProductoP').value.trim();
                                                        var producto = document.getElementById('ProductoP').value.trim();
                                                        var detalle = document.getElementById('DetalleP').value.trim();
                                                        var cantidad = parseInt(document.getElementById('CantidadP').value);
                                                        var precioTexto = document.getElementById('precio_selector').value;

                                                        // Validar que se haya ingresado un precio
                                                        if (!precioTexto) {
                                                            alert('Por favor selecciona un precio.');
                                                            return;
                                                        }

                                                        var precio = parseFloat(precioTexto.match(/\d+(\.\d{1,2})?/)[0]);

                                                        // Validar que todos los campos sean válidos
                                                        if (!idProducto || !producto || !detalle || isNaN(cantidad) || cantidad <= 0 || isNaN(precio) || precio <= 0) {
                                                            alert('Por favor completa todos los campos correctamente.');
                                                            return;
                                                        }

                                                        // Validar que la cantidad no exceda el stock disponible
                                                        var stockDisponible = parseInt(document.getElementById('stock_disponible').value); // Cambia esto según cómo obtengas el stock
                                                        if (cantidad > stockDisponible) {
                                                            alert('La cantidad solicitada excede el stock disponible. Stock disponible: ' + stockDisponible);
                                                            return;
                                                        }

                                                        // **Validación para evitar duplicados**
                                                        var tabla = document.getElementById('tabla_productos').getElementsByTagName('tbody')[0];
                                                        var filas = tabla.getElementsByTagName('tr');
                                                        for (var i = 0; i < filas.length; i++) {
                                                            var celdaIdProducto = filas[i].getElementsByTagName('td')[0];
                                                            if (celdaIdProducto && celdaIdProducto.innerText === idProducto) {
                                                                alert('El producto ya ha sido seleccionado.');
                                                                return; // Evitar la adición duplicada
                                                            }
                                                        }

                                                        // Calcular el subtotal y actualizar el total general
                                                        var subtotal = cantidad * precio;
                                                        totalGeneral += subtotal;

                                                        var nuevaFila = tabla.insertRow();

                                                        nuevaFila.insertCell(0).innerText = idProducto;
                                                        nuevaFila.insertCell(1).innerText = producto;
                                                        nuevaFila.insertCell(2).innerText = detalle;
                                                        nuevaFila.insertCell(3).innerText = cantidad;
                                                        nuevaFila.insertCell(4).innerText = precio.toFixed(2);
                                                        nuevaFila.insertCell(5).innerText = subtotal.toFixed(2); // Mostrar subtotal en la tabla

                                                        var celdaAcciones = nuevaFila.insertCell(6);
                                                        var btnEliminar = document.createElement('button');
                                                        btnEliminar.className = 'btn btn-danger btn-sm';
                                                        btnEliminar.innerText = 'Eliminar';
                                                        celdaAcciones.appendChild(btnEliminar);

                                                        btnEliminar.addEventListener('click', function() {
                                                            // Actualizar total al eliminar la fila
                                                            totalGeneral -= subtotal; // Restar el subtotal del total general
                                                            tabla.deleteRow(nuevaFila.rowIndex - 1);
                                                            actualizarFilaTotal(); // Actualizar la fila de total
                                                        });

                                                        // Actualizar la fila de total
                                                        actualizarFilaTotal();

                                                        // Limpiar los campos después de añadir el producto
                                                        document.getElementById('stock_disponible').value = '';
                                                        document.getElementById('IdProductoP').value = '';
                                                        document.getElementById('ProductoP').value = '';
                                                        document.getElementById('DetalleP').value = '';
                                                        document.getElementById('CantidadP').value = '';
                                                        document.getElementById('precio_selector').value = '';
                                                    });

                                                    function actualizarFilaTotal() {
                                                        var tabla = document.getElementById('tabla_productos').getElementsByTagName('tbody')[0];

                                                        // Eliminar la fila de total si existe
                                                        var filaTotal = document.getElementById('fila_total');
                                                        if (filaTotal) {
                                                            tabla.deleteRow(filaTotal.rowIndex - 1);
                                                        }

                                                        // Crear una nueva fila para el total
                                                        filaTotal = tabla.insertRow();
                                                        filaTotal.id = 'fila_total'; // Asignar un ID a la fila de total

                                                        filaTotal.insertCell(0).innerText = ''; // Celda vacía para el ID
                                                        filaTotal.insertCell(1).innerText = ''; // Celda vacía para el Producto
                                                        filaTotal.insertCell(2).innerText = ''; // Celda vacía para el Detalle
                                                        filaTotal.insertCell(3).innerText = ''; // Celda vacía para la Cantidad
                                                        filaTotal.insertCell(4).innerText = 'Total:';
                                                        filaTotal.insertCell(5).innerText = totalGeneral.toFixed(2); // Mostrar el total en la última celda
                                                        filaTotal.insertCell(6).innerText = ''; // Celda vacía para Acciones

                                                        // Actualizar el total a pagar
                                                        $('#total_a_pagar').val(totalGeneral);
                                                    }
                                                });
                                            </script>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                            <br><br>
                            <div class="table table-responsive">
                                <table id="tabla_productos" class="table table-bordered table-sm table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID Producto</th>
                                            <th>Producto</th>
                                            <th>Detalle</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Subtotal</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div id="respuestaCrear"></div>
            </div>
            <div class="row">
                <div class="col-md-9">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Datos del cliente</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <b>Cliente </b>
                            <button type="button" class="btn btn-primary" id="btn_mostrar_clientes">
                                <i class="fa fa-search"></i>
                                Buscar cliente
                            </button>
                            <!--boton para añadir un nuevo cliente a la base de datos-->
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal_agregar_cliente">
                                <i class="fi fi-rr-add"></i>
                                Añadir cliente
                            </button>
                            <script>
                                // Capturar clic en el botón específico
                                $('#btn_mostrar_clientes').on('click', function() {
                                    // Llamar a la función que obtiene los datos de la venta
                                    loadClients();
                                });
                            </script>
                            <!--Modal para buscar a los clientes en la base de datos-->
                            <div class="modal fade" id="modal_buscar_cliente">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color:cornflowerblue; color: white">
                                            <h4 class="modal-title">Busqueda del cliente </h4>
                                            <div style="width:10px"></div>

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <div class="modal-body">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Buscar usuario</label>
                                                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar..." />
                                                    <script>
                                                        // Función para filtrar los registros de la tabla según lo ingresado en el campo de búsqueda
                                                        $('#searchInput').on('keyup', function() {
                                                            var value = $(this).val().toLowerCase(); // Convertir el valor ingresado a minúsculas
                                                            $('#example2 tbody tr').filter(function() {
                                                                // Comparar cada fila con el valor ingresado
                                                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            </div>

                                            <div class="table table-responsive" style="height: 250px; overflow-y: auto;">
                                                <!--tabla completa-->
                                                <table id="example2" class="table table-bordered table-striped table-sm" style="font-size: 14px">
                                                    <!--Cabecera de la tabla-->
                                                    <thead>
                                                        <tr>
                                                            <td>
                                                                <center>IdCliente</center>
                                                            </td>
                                                            <td>
                                                                <center>Acción</center>
                                                            </td>
                                                            <th>
                                                                <center>Nombre cliente</center>
                                                            </th>
                                                            <th>
                                                                <center>Nit cliente</center>
                                                            </th>
                                                            <th>
                                                                <center>Celular cliente</center>
                                                            </th>
                                                            <th>
                                                                <center>Correo cliente</center>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <!--Contenido de la tabla-->
                                                    <tbody id="clienteTableBody">

                                                    </tbody>
                                                    <!--Pie de la tabla-->
                                                </table>

                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <input id="IdCliente" type="text" hidden>
                                        <label for="">Nombre cliente</label>
                                        <input id="nombre_cliente" type="text" class="form-control" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">NIT cliente</label>
                                        <input id="nit_cliente" type="text" class="form-control" required readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input id="celular_cliente" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo</label>
                                        <input id="correo_cliente" type="text" class="form-control" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div id="respuestaCrear"></div>
                </div>
                <div class="col-md-3">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Generar venta</h3>

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
                                        <label for="">Total</label>
                                        <input id="total_a_pagar" style="background-color:yellow" type="number" class="form-control" disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Pagado</label>
                                            <input id="pagado" type="text" class="form-control">
                                            <script>
                                                $('#pagado').keyup(function() {
                                                    var total_a_pagar = $('#total_a_pagar ').val();
                                                    var pagado = $('#pagado ').val();
                                                    var cambio = parseFloat(pagado) - parseFloat(total_a_pagar);
                                                    $('#cambio').val(cambio);
                                                });
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cambio</label>
                                            <input id="cambio" type="text" class="form-control" disabled>
                                        </div>
                                    </div>
                                </div>

                                <button id="btn_guardar_venta" class="btn btn-primary btn-block">Guardar venta</button>
                                <!--script para guardar ventas - productos-->
                                <script>
                                    $(document).ready(function() {
                                        $('#btn_guardar_venta').click(function() {
                                            // Obtener los datos de la venta
                                            var idCliente = $('#IdCliente').val(); // Campo para seleccionar el cliente
                                            var totalPagado = $('#total_a_pagar').val(); // Total a pagar calculado

                                            // Obtener los productos del carrito
                                            var productos = [];
                                            $('#tabla_productos tbody tr').each(function() {
                                                var idProducto = $(this).find('td').eq(0).text();
                                                var cantidad = $(this).find('td').eq(3).text();
                                                var precioUnit = $(this).find('td').eq(4).text();

                                                // Validar que el idProducto y cantidad no estén vacíos
                                                if (idProducto && cantidad && cantidad > 0) {
                                                    productos.push({
                                                        idProducto: idProducto,
                                                        cantidad: cantidad,
                                                        precioUnit: precioUnit
                                                    });
                                                }
                                            });

                                            // Validar que haya productos válidos en el carrito
                                            if (productos.length === 0) {
                                                $('#mensaje').css('color', 'red').text('No hay productos válidos en el carrito para guardar la venta.'); // Mostrar el mensaje de error
                                                return;
                                            }

                                            // Enviar los datos al servidor
                                            $.ajax({
                                                url: '../app/controllers/venta/guardar_venta.php',
                                                type: 'POST',
                                                data: {
                                                    idCliente: idCliente,
                                                    totalPagado: totalPagado,
                                                    productos: productos
                                                },
                                                success: function(response) {
                                                    var result = JSON.parse(response); // Parsear la respuesta JSON
                                                    console.log(result); // Para depuración

                                                    // Mostrar mensaje de éxito o error
                                                    if (result.success) {
                                                        Swal.fire("Éxito", result.message, "success").then(() => {
                                                            // Limpiar la tabla de productos
                                                            $('#tabla_productos tbody').empty();
                                                            $('#total_a_pagar').val('');
                                                            $('#IdCliente').val('');
                                                            $('#nombre_cliente').val('');
                                                            $('#nit_cliente').val('');
                                                            $('#celular_cliente').val('');
                                                            $('#correo_cliente').val('');
                                                            $('#pagado').val('');
                                                            $('#cambio').val('');
                                                        });
                                                    } else {
                                                        Swal.fire("Error", result.message, "error");
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    Swal.fire("Error", "Ocurrió un error al guardar la venta: " + error, "error");
                                                }
                                            });
                                        });
                                    });
                                </script>

                            </div>

                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>

        </div>

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-wrapper -->
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
</script>
<!--Modal para agregar clientes-->
<div class="modal fade" id="modal_agregar_cliente">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color:orange; color: white">
                <h4 class="modal-title">Nuevo cliente</h4>
                <div style="width:10px"></div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="clienteContainer">
                    <div class="form-group">
                        <label for="NombreCliente">Nombre del cliente</label>
                        <input id="NombreCliente" class="form-control" type="text" name="NombreCliente" required>
                    </div>
                    <div class="form-group">
                        <label for="NITCliente">Nit cliente</label>
                        <input id="NITCliente" class="form-control" type="text" name="NITCliente" required>
                    </div>
                    <div class="form-group">
                        <label for="CelularCliente">Celular</label>
                        <input id="CelularCliente" class="form-control" type="text" name="CelularCliente" required>
                    </div>
                    <div class="form-group">
                        <label for="CorreoCliente">Correo</label>
                        <input id="CorreoCliente" class="form-control" type="email" name="CorreoCliente" required>
                    </div>
                    <hr>
                    <div class="form-group">
                        <button id="btnGuardarCliente" class="btn btn-primary btn-block " style="background-color: orange;">Guardar Cliente</button>
                        <script>
                            $('#btnGuardarCliente').click(function(event) {
                                // Recuperar los valores de los campos del formulario
                                var NombreCliente = $('#NombreCliente').val();
                                var NITCliente = $('#NITCliente').val();
                                var CelularCliente = $('#CelularCliente').val();
                                var CorreoCliente = $('#CorreoCliente').val();

                                // Validar que todos los campos estén completos
                                if (NombreCliente == '') {
                                    $('#NombreCliente').focus();
                                    alert('Debe completar todos los campos');
                                } else if (NITCliente == '') {
                                    $('#NITCliente').focus();
                                    alert('Debe completar todos los campos');
                                } else {
                                    // Enviar los datos al servidor usando fetch con método POST
                                    var url = "../app/controllers/cliente/guardar_cliente.php";

                                    // Enviar la solicitud POST
                                    $.post(url, {
                                        NombreCliente: NombreCliente,
                                        NITCliente: NITCliente,
                                        CelularCliente: CelularCliente,
                                        CorreoCliente: CorreoCliente
                                    }, function(datos) {
                                        // Manejar la respuesta del servidor
                                        try {
                                            var response = JSON.parse(datos); // Convertir la respuesta en un objeto JSON

                                            if (response.success) {
                                                // Mostrar un alert con el mensaje de éxito
                                                alert(response.message);

                                                // Limpiar los campos del formulario
                                                $('#NombreCliente').val('');
                                                $('#NITCliente').val('');
                                                $('#CelularCliente').val('');
                                                $('#CorreoCliente').val('');

                                                // Cerrar el modal
                                                $('#Modal_agregar_cliente').modal('hide');
                                            } else {
                                                // Mostrar mensaje de error si el servidor no devuelve success
                                                alert("Error: " + response.message);
                                            }
                                        } catch (e) {
                                            console.error("Error al procesar la respuesta: ", e);
                                            alert("Error al procesar la respuesta del servidor.");
                                        }

                                    }).fail(function(jqXHR, textStatus, errorThrown) {
                                        // Manejar errores
                                        console.error("Error en la solicitud: " + textStatus, errorThrown);
                                        alert("Hubo un problema con la solicitud: " + textStatus);
                                    });
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<script>
    function loadClients() {
        $.ajax({
            url: '../app/controllers/cliente/listado_clientes.php', // Archivo PHP donde se obtiene la lista de clientes
            type: 'POST', // Cambiado a POST
            success: function(response) {
                // Convertir la respuesta JSON
                let data = JSON.parse(response);
                console.log(data); // Para depuración

                // Llamar a la función para agregar los datos a la tabla
                agregarAClienteTabla(data);
                // Mostrar el modal
                $('#modal_buscar_cliente').modal('show');

            },
            error: function() {
                alert('Error al cargar los clientes.');
            }
        });
    }

    // Función para agregar los registros a la tabla
    function agregarAClienteTabla(data) {
        // Obtener el cuerpo de la tabla
        let tableBody = document.getElementById('clienteTableBody'); // Asegúrate de que este ID coincida con el de tu tabla

        // Limpiar el contenido anterior de la tabla
        tableBody.innerHTML = '';

        // Iterar sobre los datos y crear filas para la tabla
        data.forEach(function(cliente) {
            // Crear una nueva fila
            let row = `<tr>
    <td>
        <button id="btn_seleccionar_cliente_${cliente.IdCliente}" 
                class="btn btn-info btn-sm"
                data-id="${cliente.IdCliente}" 
                data-nombre="${cliente.NombreCliente}" 
                data-nit="${cliente.NitCliente}" 
                data-celular="${cliente.CelularCliente}" 
                data-correo="${cliente.CorreoCliente}">
            Seleccionar
        </button>
    </td>
    <td>${cliente.IdCliente}</td>
    <td>${cliente.NombreCliente}</td>
    <td>${cliente.NitCliente}</td>
    <td>${cliente.CelularCliente}</td>
    <td>${cliente.CorreoCliente}</td>
</tr>`;

            // Agregar la fila al cuerpo de la tabla
            tableBody.innerHTML += row;
        });
    }
</script>
<script>
    $(document).on('click', '[id^=btn_seleccionar_cliente_]', function() {
        var IdCliente = $(this).data('id');
        var NombreCliente = $(this).data('nombre');
        var NitCliente = $(this).data('nit');
        var CelularCliente = $(this).data('celular');
        var CorreoCliente = $(this).data('correo');

        // Rellenar los campos del formulario
        $('#IdCliente').val(IdCliente);
        $('#nombre_cliente').val(NombreCliente);
        $('#nit_cliente').val(NitCliente);
        $('#celular_cliente').val(CelularCliente);
        $('#correo_cliente').val(CorreoCliente);
    });
</script>