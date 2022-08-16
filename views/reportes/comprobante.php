<?php
session_start();
$medidaTicket = 180;
require("../../helpers/utils.php");
ob_start();
?>
<?php
$serie = $_SESSION['pension']['serie'];
$inicio = substr($serie, 0, 1);
?>
    <!DOCTYPE html>
    <html>
    <head>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

            * {
                margin: 2px;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Roboto', sans-serif;
            }

            .ticket {
                font-size: 13px;
            }

            .ticket img {
                /* margin-top: -25px; */
                margin-left: 40px;
                width: 70%;
            }

            .ticket .datosEmpresa p,
            .ticket .serieComprobante p {
                line-height: 11px;
                text-align: center;
            }

            .tablaProductos {
                width: 100%;
                margin-top: 10px;
            }
        </style>
        <title>Comprobante de Pago</title>
    </head>
    <body>
    <div class="ticket">
      <?php
      $rutaImagen = "../" . $_SESSION['empresa']['logo'];
      $contenidoBinario = file_get_contents($rutaImagen);
      $imagenComoBase64 = base64_encode($contenidoBinario);
      ?>
        <img src="data:image/jpg;base64,<?php echo $imagenComoBase64; ?>" alt="Red dot"/>

        <div class="datosEmpresa">
            <p style="font-weight: 700; margin-top: 10px;">RUC <?php echo($_SESSION['empresa']['numeroRuc']); ?></p>
            <p><?php echo($_SESSION['empresa']['direccion']); ?></p>
            <p><b>Telf :</b> <?php echo($_SESSION['empresa']['telefono']); ?></p>
            <p style="border-bottom: 1px solid black; padding-bottom: 5px;">
                <b>Email: </b> <?php echo($_SESSION['empresa']['email']); ?></p>
        </div>

        <div class="serieComprobante">
            <?php if ($inicio=='F'): ?>
                <p style="margin-top: 5px">FACTURA DE VENTA ELECTRONICA</p>
            <?php elseif($inicio=='B'): ?>
                <p style="margin-top: 5px">BOLETA DE VENTA ELECTRONICA</p>
            <?php else : ?>
                <p style="margin-top: 5px">TICKET DE VENTA ELECTRONICA</p>
            <?php endif; ?>
            <p style="font-size: 25px; margin-top: 10px; border-bottom: 2px solid black; padding-bottom: 8px"><?php echo($_SESSION['pension']['serie']); ?>
                - <?php echo($_SESSION['pension']['numero']); ?></p>
        </div>

        <div class="datosEmision">
            <p style="margin-top: 0px; text-align: start"><b>F.Emisión
                    :</b> <?php echo($_SESSION['pension']['f_emision']); ?></p>
            <p style="margin-top: 0px; text-align: start"><b>Hora :</b> <?php echo($_SESSION['pension']['hora']); ?></p>
            <p style="margin-top: 0px; text-align: start"><b>Cajero :</b> <?php echo($_SESSION['pension']['cajero']); ?>
            </p>
            <p style="border-bottom: 2px solid black; padding-bottom: 5px;"><b>Moneda:</b> SOLES</p>
        </div>

        <div class="datosCliente" style="font-size: 12px">
            <?php if ($inicio!='F'): ?>
                <p style="margin-top: 5px; text-align: start"><b>SEÑOR(ES): </b><?php echo($_SESSION['pension']['cliente']); ?></p>
                <p><b>N° DNI:</b> <?php echo($_SESSION['pension']['nro_doc']); ?></p>
                <!-- <p><b>A NOMBRE DE</b>: <?php echo($_SESSION['pension']['razonSocial']); ?></p> -->
                <p style="padding-bottom: 5px; border-bottom: 2px solid black"><b>DIRECCION :</b> <?php echo($_SESSION['pension']['direccion']); ?></p>
            <?php else: ?>
                <p style="margin-top: 5px; text-align: start"><b>RAZON SOCIAL: </b><?php echo($_SESSION['pension']['cliente']); ?></p>
                <p><b>N° RUC:</b> <?php echo($_SESSION['pension']['nro_doc']); ?></p>
                <!-- <p><b>A NOMBRE DE</b>: <?php echo($_SESSION['pension']['razonSocial']); ?></p> -->
                <p style="padding-bottom: 5px; border-bottom: 2px solid black"><b>DIRECCION :</b> <?php echo($_SESSION['pension']['direccion']); ?></p>
            <?php endif; ?>
        </div>

        <table class="tablaProductos">
            <thead style="border-bottom: 1px dashed black;">
            <tr class="centrado">
                <th class="cantidad">CANT</th>
                <th class="producto">PRODUCTO</th>
                <th class="precio">PRECIO</th>
            </tr>
            </thead>
            <tbody style="padding-bottom: 5px; border-bottom: 2px solid black; margin-bottom: 5px">
            <tr>
                <td class="cantidad">1</td>
                <td style="padding:0px 2px;" class="producto"><?php echo($_SESSION['pension']['detalle']); ?></td>
                <td style="text-align: right;" class="precio">S/.<?php echo($_SESSION['pension']['totalPago']); ?></td>
            </tr>
            <?php if ($inicio=='F'|| $inicio=='B'): ?>
            <tr>
                <td></td>
                <td style="padding-top: 10px; width: 55%;" class="producto"><strong>OP. Gravadas : S/</strong></td>
                <td style="width: 35%; text-align:right" class="precio">
                    <b>S/.<?php echo($_SESSION['pension']['OPgravadas']); ?></b></td>
            </tr>
            <tr>
                <td></td>
                <td style="width: 65%;" class="producto"><strong>IGV (18%) : S/</strong></td>
                <td style="width: 35%; text-align:right" class="precio">
                    <b>S/.<?php echo($_SESSION['pension']['igv']); ?></b></td>
            </tr>
            <?php endif; ?>
            <tr>
                <td></td>
                <td style="width: 65%;" class="producto"><strong>Total a Pagar : S/.</strong></td>
                <td style="width: 35%; text-align:right" class="precio">
                    <b>S/.<?php echo($_SESSION['pension']['totalPago']); ?></b>
                </td>
            </tr>
            </tbody>
        </table>
        <p style="margin-top: 5px; text-align: start"><b>PENSION DEL MES DE: </b><?php echo(Utils::mesEspañol($_SESSION['pension']['mes'])); ?></p>
        <p><b>FORMA DE PAGO:</b> <?php echo($_SESSION['pension']['formaPago']); ?></p>
      <?php if ($inicio=='F'|| $inicio=='B'): ?>
          <p style=" font-size: 12px; padding-top: 15px"><a style="text-decoration: none; color: black" href="https://facturacion.sigefac.com/busqueda" target="_blank">CONSULTE SU COMPROBANTE DE PAGO AQUI</a></p>
          <p style="font-size: 10px; text-align: center"><b>https://facturacion.sigefac.com/busqueda</b></p>
      <?php endif; ?>
        <p style="text-align: center; margin-top: 10px;" class="centrado">¡GRACIAS POR SER PARTE DE NUESTRA FAMILIA!</p>
        <p style="text-align: center; text-decoration: underline; font-weight: bold; margin-top: 10px;">
            WWW.SIGEFAC.COM</p>
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
?>