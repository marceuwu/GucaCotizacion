<?php
// Inicio del almacenamiento en búfer de salida
ob_start();
require_once 'bd.php';

$sql = $conexion->prepare("SELECT * FROM `cotizaciones`");
$sql->execute();
$listaProductos = $sql->fetchAll(PDO::FETCH_ASSOC);

// Incluir el HTML que se convertirá en PDF
require 'cotizacion.php';

// Fin del almacenamiento en búfer de salida
$html = ob_get_clean();

// Configurar dompdf
require_once './libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

// Cargar el HTML en dompdf
$dompdf->loadHtml($html);

// Configurar el tamaño de papel y la orientación
$dompdf->setPaper('A4', 'landscape');

// Renderizar el PDF
$dompdf->render();

// Generar el archivo PDF
if (isset($_GET['descargar']) && $_GET['descargar'] == 'true') {
    // Descargar el PDF
    $dompdf->stream("cotizacion.pdf", array("Attachment" => true));
} else {
    // Mostrar el PDF en el navegador
    $dompdf->stream("cotizacion.pdf", array("Attachment" => false));
}
?>