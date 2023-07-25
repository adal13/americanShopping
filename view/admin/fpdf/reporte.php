<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD


      // $this->Image('logo.png', 185, 5, 20); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 15); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Reporte de Venta'), 1, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      /* UBICACION */
      // $this->Cell(110);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(96, 10, utf8_decode("Ubicación : "), 0, 0, '', 0);
      // $this->Ln(5);

      // /* TELEFONO */
      // $this->Cell(110);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(59, 10, utf8_decode("Teléfono : "), 0, 0, '', 0);
      // $this->Ln(5);

      // /* COREEO */
      // $this->Cell(110);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(85, 10, utf8_decode("Correo : "), 0, 0, '', 0);
      // $this->Ln(5);

      // /* TELEFONO */
      // $this->Cell(110);  // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // $this->Cell(85, 10, utf8_decode("Sucursal : "), 0, 0, '', 0);
      // $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      // $this->SetTextColor(228, 100, 0);
      // $this->Cell(50); // mover a la derecha
      // $this->SetFont('Arial', 'B', 10);
      // // $this->Cell(100, 10, utf8_decode("REPORTE DE USUARIOS"), 0, 1, 'C', 0);
      // $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 9);
      $this->Cell(10, 10, utf8_decode('N°'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Cliente'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Tipo_Usuario'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Marca'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Categoria'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Cantidad'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('Fecha Venta'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      date_default_timezone_set('America/Mexico_City');
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}
session_start();
require_once("C:/xampp/htdocs/americanShoping/config/db.config.php");
$con = new db();
$Conext = $con->conexion();

$fromDate = $_SESSION['from_data'];
$toDate = $_SESSION['to_date'];


$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();

$i = 0;
$pdf->SetFont('Arial', '', 8);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

$consulta_reporte_usuario = $Conext->query("SELECT 
   users.nombre, 
   tipo_usuario.tx_tipo_usuario, 
   producto.marca, 
   categoria.tx_categoria, 
   venta.cantida, 
   venta.total, 
   venta.fecha_venta 
FROM venta 
INNER JOIN users ON venta.id_usuario = users.id_usuario
INNER JOIN tipo_usuario ON tipo_usuario.id_tipo_usuario = users.id_tipo_usuario
INNER JOIN producto ON venta.id_producto = producto.id_producto
INNER JOIN categoria ON producto.id_categoria = categoria.id_categoria 
WHERE fecha_venta BETWEEN '$fromDate' AND '$toDate'
ORDER BY venta.id_venta ASC");

while ($datos_reporte = $consulta_reporte_usuario->fetch(PDO::FETCH_OBJ)) {      
   $i = $i + 1;
   /* TABLA */
   $pdf->Cell(10, 10, utf8_decode($i), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->nombre), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->tx_tipo_usuario), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->marca), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->tx_categoria), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode($datos_reporte->cantida), 1, 0, 'C', 0);
   $pdf->Cell(25, 10, utf8_decode("$ ".$datos_reporte->total), 1, 0, 'C', 0);
   $pdf->Cell(30, 10, utf8_decode($datos_reporte->fecha_venta), 1, 1, 'C', 0);
}

$consulta_precio = $Conext->query("SELECT SUM(total) AS suma_total FROM venta
WHERE fecha_venta BETWEEN '$fromDate' AND '$toDate'");

while($consulta_total = $consulta_precio->fetch(PDO::FETCH_OBJ)){
   $pdf->Cell(135, 10, 'Suma Total:', 1, 0, 'R');
   $pdf->Cell(25, 10, "$ ".$consulta_total->suma_total, 1, 1, 'C');
}


$pdf->Output('Reporte_Venta.pdf', 'I'); //Visor(I->visualizar - D->descargar)
