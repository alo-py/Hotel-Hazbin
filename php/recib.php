<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir los datos del formulario
    $nombreCliente = $_POST['nombreCliente'];
    $emailCliente = $_POST['emailCliente'];
    $telefonoCliente = $_POST['telefonoCliente'];
    $habitacionSeleccionada = $_POST['habitacionSeleccionada'];
    $precioHabitacion = $_POST['precioHabitacion'];

    // Verificar si se ha solicitado generar el PDF
    if (isset($_POST['pdf'])) {
        // Incluir la biblioteca TCPDF
        require_once('libreria/tcpdf.php');

        // Crear una instancia de TCPDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // Establecer la información del documento
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Hotel Hazbin');
        $pdf->SetTitle('Informe de Reservación');
        $pdf->SetSubject('Información de Habitación');
        $pdf->SetKeywords('Hotel, Habitación, Reservación');

        // Establecer márgenes
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT, true);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // Establecer el modo de subconjunto de fuentes
        $pdf->setFontSubsetting(true);

        // Establecer fuentes
        $pdf->SetFont('dejavusans', '', 12, '', true);

        // Agregar una página
        $pdf->AddPage();

        // Agregar contenido al PDF
        $html = '
            <h1>Información de la Reservación</h1>
            <p>Nombre del Cliente: ' . $nombreCliente . '</p>
            <p>Email: ' . $emailCliente . '</p>
            <p>Número de Teléfono: ' . $telefonoCliente . '</p>
            <p>Habitación Seleccionada: ' . $habitacionSeleccionada . '</p>
            <p>Precio: ' . $precioHabitacion . '</p>
        ';

        $pdf->writeHTML($html, true, false, true, false, '');

        // Cerrar y generar el PDF
        $pdf->Output('informe_reservacion.pdf', 'D');
    }
}
?>