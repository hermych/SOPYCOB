<?php
session_start();
$medidaTicket = 180;
require("../../helpers/utils.php");
ob_start();
?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Precuenta</title>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
            * {
                margin: 2px;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Roboto', sans-serif;
            }

            .ticket {
                font-size: 14px;
            }

            .ticket img {
                /* margin-top: -25px; */
                margin-left: 40px;
                width: 70%;
            }

            .ticket .datosEmpresa p {
                line-height: 11px;
                text-align: center;
            }

            .tablaProductos {
                width: 100%;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
    <div class="ticket">
      <?php
      $rutaImagen = "../".$_SESSION['empresa']['logo'];
      $contenidoBinario = file_get_contents($rutaImagen);
      $imagenComoBase64 = base64_encode($contenidoBinario);
      ?>
        <img src="data:image/jpg;base64,<?php echo $imagenComoBase64; ?>" alt="Red dot" />

        <div class="datosEmpresa">
            <br>
            <p style="font-weight: 700; margin-top: -10px;">RUC <?php echo($_SESSION['empresa']['numeroRuc']); ?></p>
            <p><?php echo($_SESSION['empresa']['direccion']); ?></p>
            <p><b>Telf :</b> <?php echo($_SESSION['empresa']['telefono']); ?></p>
            <p style="border-bottom: 1px solid black; padding-bottom: 5px;"><b>Email
                    :</b> <?php echo($_SESSION['empresa']['email']); ?></p>
        </div>

        <div class="datosEmision">
            <p style="margin-top: 5px; text-align: start"><b>F.Emisión
                    :</b> <?php echo($_SESSION['precuenta']['f_emision']); ?></p>
            <p style="margin-top: 5px; text-align: start"><b>F.de Pago
                    :</b> <?php echo($_SESSION['precuenta']['f_pago']); ?></p>
            <p style="margin-top: 5px; text-align: start; border-bottom: 1px solid black; padding-bottom: 5px;"><b>F.Vencimiento
                    :</b> <?php echo($_SESSION['precuenta']['f_vence']); ?></p>
            <!-- <p><b>Cajero(a):</b> ASESORANDO PERU</p> -->
            <!-- <p style="border-bottom: 1px solid black; padding-bottom: 5px;"><b>Moneda:</b> SOLES</p> -->
        </div>

        <div class="datosCliente">
            <p style="margin-top: 5px; text-align: start"><b>CLIENTE</b>
                : <?php echo($_SESSION['precuenta']['cliente']); ?></p>
            <p><b>Nro. DOC:</b> <?php echo($_SESSION['precuenta']['nro_doc']); ?></p>
            <p><b>DIRECCION :</b> LIMA PERU</p>
            <p style="border-bottom: 1px solid black; padding-bottom: 5px;"><b>PENSION DEL MES
                    :</b> <?php echo Utils::mesEspañol(($_SESSION['precuenta']['mes'])); ?></p>
        </div>

        <table class="tablaProductos">
            <thead>
            <tr class="centrado">
                <th class="cantidad">CANT</th>
                <th class="producto">PRODUCTO</th>
                <th class="precio">PRECIO</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="cantidad">1</td>
                <td style="padding:0px 2px;"
                    class="producto"><?php echo($_SESSION['precuenta']['detalle_pago']); ?></td>
                <td style="text-align: right;" class="precio">S/.<?php echo($_SESSION['precuenta']['precio']); ?></td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-top: 10px; width: 65%;" class="producto">
                    <strong>TOTAL</strong>
                </td>
                <td style="width: 35%; text-align:right" class="precio">
                    <b>S/.<?php echo($_SESSION['precuenta']['precio']); ?></b>
                </td>
            </tr>
            </tbody>
        </table>
        <p style="text-align: center; margin-top: 10px; border-top: 1px solid black" class="centrado">¡EVITE LA SUSPENCION DE SU SERVICIO!</p>
        <p style="text-align: center; padding-bottom: 10px;border-bottom: 1px solid black" class="centrado">Reconexion: S/ 30.00</p>
        <p style="text-align: center; text-decoration: underline; font-weight: bold; margin-top: 10px;">WWW.SIGEFAC.COM</p>
    </div>
    </body>

    </html>
<?php
include_once "../../librerias/dompdf/autoload.inc.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf();

// Optiones para imagenes
$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

include "../views/reportes/precuenta.php";
$html = ob_get_clean();
$dompdf->load_html($html);
// Formato del papel
$dompdf->setPaper(array(0, 0, 205, 841), 'portrait');
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();
/*
include "../views/reportes/precuenta.php";
$html = ob_get_clean();
$dompdf->load_html($html);
$dompdf->setPaper(array(0, 0, 205, 841), 'portrait');
$pdf = $dompdf->output();
$dompdf->render();
$dompdf->output();
//$dompdf->stream('FicheroEjemplo.pdf');
*/
?>