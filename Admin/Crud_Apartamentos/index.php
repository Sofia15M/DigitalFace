<?php
include '../../Conexion/conexion.php';
require_once('../../TCPDF-main/tcpdf.php');

// Check if the form is submitted
if (isset($_POST['download_pdf'])) {
    // Create PDF
    $pdf = new TCPDF();
    $pdf->AddPage();

    // Set font to Helvetica bold with a size of 12
    $pdf->SetFont('helvetica', 'B', 12);

    // Add title
    $pdf->Cell(0, 10, 'Lista de Apartamentos', 0, 1, 'C');

    // Set font for content
    $pdf->SetFont('helvetica', '', 12);

    // Get data from the database
    $query = "SELECT * FROM apartamentos";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if (!$result) {
        die('Error in the query: ' . mysqli_error($connection));
    }

    // Add table headers
    $pdf->SetFillColor(200, 220, 255);
    $pdf->Cell(30, 10, 'Numero', 1, 0, 'C', 1);
    $pdf->Cell(30, 10, 'Estado', 1, 0, 'C', 1);
    $pdf->Cell(100, 10, 'Descripcion Apartamento', 1, 1, 'C', 1);

    // Loop through the results and add to the PDF
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell(30, 10, $row['ID_Apartamento'], 1);

        // Use MultiCell for Description to allow wrapping
        $pdf->Cell(30, 10, $row['status'], 1, 'C', false);
        $pdf->Cell(100, 10, $row['Descripcion_Apartamento'], 1, 1, 'C', false);
    }

    // Output the PDF for download
    $pdf->Output('ListaApartamentos.pdf', 'D');
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/style.css">
    <link rel="stylesheet" href="../../CSS/nav.css">
    <link rel="icon" href="../../IMG/Logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Info. Apartamentos</title>
</head>
<body>
    <header class="header">
        <div class="container">
        <nav class="menu">
                <a href="#">Apartamentos</a>
                <a href="#" class="fa fa-print icono" title="Imprimir"></a>
                <a href="desactivados.php" class="desativados">Ver Desactivados</a>
                <a href="../IndexAdmin.php" class="atras" >Volver atras</a>
            </nav>
        </div>
    </header>
    <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">

                            <br>

                            <a href="añadir.php" class="boton">Añadir nuevo Apartamento</a>

                            <br><br>

                            <table class="table">
                    
                                <thead>
                                    <tr>
                                        <th colspan="3" class="titulo">Apartamentos</th>
                                    </tr>

                                    <tr>
                                        <th scope="col">Numero Apartamento</th>
                                        <th scope="col">Informacion</th>
                                        <th scope="col">Acciones</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    include '../../Conexion/conexion.php';

                                    $queryActivos = "SELECT * FROM apartamentos WHERE status = 'active'";
                                    $resultActivos = mysqli_query($connection, $queryActivos);

                                    while ($row = mysqli_fetch_assoc($resultActivos)) {
                                        echo "<tr>
                                                <td>{$row['ID_Apartamento']}</td>
                                                <td>{$row['Descripcion_Apartamento']}</td>
                                                <td>
                                                    <a href='edit.php?id={$row['ID_Apartamento']}' class='editar'>Editar</a>
                                                    <a href='desactivar.php?id={$row['ID_Apartamento']}'class='desativar''>Desactivar</a>
                                                </td>
                                            </tr>";
                                    }

                                    mysqli_close($connection);
                                ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    <br>

</body>
</html>
