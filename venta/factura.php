<?php
// Incluye la conexión a la base de datos
require('../app/config.php'); // Retrocede una carpeta para acceder a app/config.php
// Incluye la librería FPDF
require('../fpdf/fpdf.php'); // Asegúrate de que la ruta sea correcta

// Validar el IdVenta
if (isset($_GET['idVenta']) && filter_var($_GET['idVenta'], FILTER_VALIDATE_INT)) {
    $idVenta = $_GET['idVenta']; // Obtener el IdVenta de la URL

    // Consulta SQL para obtener los detalles de la venta
    $sql = "SELECT v.IdVenta, v.TotalPago, v.FechaCreacion AS FechaVenta, c.NombreCliente,
    c.NitCliente, c.CelularCliente, c.CorreoCliente, a.Nombre AS NombreProducto, 
    cr.Cantidad, cr.PrecioUnitario, (cr.Cantidad * cr.PrecioUnitario) AS SubTotal
    FROM tbventa v
    INNER JOIN tbcliente c ON v.IdCliente = c.IdCliente
    INNER JOIN tbcarrito cr ON v.IdVenta = cr.IdVenta
    INNER JOIN tbalmacen a ON cr.IdProducto = a.IdProducto
    WHERE v.IdVenta = :idVenta";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':idVenta', $idVenta, PDO::PARAM_INT);
    $stmt->execute();
    $ventaDetalles = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Verificar si hay datos y luego proceder a generar el PDF
    if ($ventaDetalles) {
        // Crear una nueva instancia de FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Agregar logo a la derecha
        $pdf->Image('../public/images/logo.jpg', 160, 10, 30); // Ajustar la posición y el tamaño según sea necesario

        // Título
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Comprobante de Venta', 0, 1, 'C');
        $pdf->Ln(5); // Espacio entre título y detalles

        // Detalles del cliente
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Cliente: ' . htmlspecialchars($ventaDetalles[0]['NombreCliente']), 0, 1);
        $pdf->Cell(0, 10, 'NIT: ' . htmlspecialchars($ventaDetalles[0]['NitCliente']), 0, 1);
        $pdf->Cell(0, 10, 'Celular: ' . htmlspecialchars($ventaDetalles[0]['CelularCliente']), 0, 1);
        $pdf->Cell(0, 10, 'Correo: ' . htmlspecialchars($ventaDetalles[0]['CorreoCliente']), 0, 1);
        $pdf->Cell(0, 10, 'Fecha de Venta: ' . htmlspecialchars($ventaDetalles[0]['FechaVenta']), 0, 1);
        $pdf->Cell(0, 10, 'Id Venta: ' . htmlspecialchars($ventaDetalles[0]['IdVenta']), 0, 1);
        $pdf->Ln(10); // Espacio entre secciones

        // Encabezado de la tabla
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(80, 10, 'Producto', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Cantidad', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Precio Unitario', 1, 0, 'C');
        $pdf->Cell(40, 10, 'Subtotal', 1, 0, 'C');
        $pdf->Ln();

        // Detalles de la venta
        $pdf->SetFont('Arial', '', 10);
        foreach ($ventaDetalles as $detalle) {
            $xPos = $pdf->GetX();
            $yPos = $pdf->GetY();

            // Usar MultiCell para el nombre del producto
            $pdf->SetXY($xPos, $yPos);
            $pdf->MultiCell(80, 8, htmlspecialchars($detalle['NombreProducto']), 1);
            // Obtener la altura ocupada por MultiCell
            $multiCellHeight = $pdf->GetY() - $yPos;
            // Ajustar la posición para las otras celdas
            $pdf->SetXY($xPos + 80, $yPos);
            $pdf->Cell(30, $multiCellHeight, htmlspecialchars($detalle['Cantidad']), 1, 0, 'C');
            $pdf->Cell(40, $multiCellHeight, htmlspecialchars($detalle['PrecioUnitario']), 1, 0, 'R');
            $pdf->Cell(40, $multiCellHeight, htmlspecialchars($detalle['SubTotal']), 1, 0, 'R');
            // Nueva línea para el siguiente registro
            $pdf->Ln(max(10, $multiCellHeight));
        }
        // Total
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(80, 10, '', 0);
        $pdf->Cell(30, 10, '', 0);
        $pdf->Cell(40, 10, 'Total a Pagar', 1);
        $pdf->Cell(40, 10, htmlspecialchars($ventaDetalles[0]['TotalPago']), 1);

        // Footer
        $pdf->SetY(-30); // Posiciona el pie a 30 mm del final
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->Cell(0, 10, 'Gracias por su compra!', 0, 0, 'C'); // Mensaje de agradecimiento
        $pdf->Ln();
        $pdf->Cell(0, 10, 'Si tiene alguna pregunta, contáctenos al: info@suempresa.com', 0, 0, 'C'); // Información de contacto

        // Salida del PDF
        $pdf->Output('D', 'Comprobante_Venta_' . $idVenta . '.pdf'); // 'D' para forzar la descarga
    } else {
        echo "No se encontraron detalles para esta venta.";
    }
} else {
    die("ID de venta no válido.");
}
