<?php
session_start();
$medidaTicket = 180;
require("../../helpers/utils.php");
ob_start();
?>
    <!DOCTYPE html>
    <title>Movimiento de Caja</title>
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
        </style>
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
            <p><?php echo($_SESSION['empresa']['direccion']); ?></p>
            <p><b>Celular :</b> <?php echo($_SESSION['empresa']['celular']); ?></p>
            <p style="border-bottom: 1px solid black; padding-bottom: 5px;">
                <b>Email:</b> <?php echo($_SESSION['empresa']['email']); ?></p>
        </div>

        <div class="datosCajero">
            <p style="margin-top: 5px; text-align: center; padding-bottom: 5px;"><b>CAJA NRO</b></p>
            <h2 style="margin-top: -5px; text-align: center; border-bottom: 1px solid black; padding-bottom: 5px;">
                00<?php echo($_SESSION['cajero']['nroCaja']); ?></h2>

            <p style="margin-top: 5px; text-align: start">
                <b>Cajero(a):</b> <?php echo($_SESSION['cajero']['cajero']); ?></p>
            <p style="margin-top: -5px; text-align: start"><b>Fecha
                    Apertura:</b> <?php echo($_SESSION['cajero']['fApertura']); ?></p>
            <p style="margin-top: -5px; text-align: start; padding-bottom: 5px;"><b>Fecha
                    Cierre:</b> <?php echo(date('d-m-Y')); ?></p>
            <p style="margin-top: -10px; border-bottom: 1px solid black; text-align: start; padding-bottom: 5px;"><b>Moneda:</b>
                SOLES (S/.)</p>
        </div>

        <div class="datosCaja" style="border-bottom: 1px solid black">
            <p style="text-align: center"><b>Detalle venta</b></p>
            <table class="tablaProductos">
                <tbody style="padding-bottom: 5px; margin-bottom: 5px">
                <tr>
                    <td class="cantidad" style="font-weight: bolder">EFECTIVO: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleVenta']['efectivo']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">TARJETA: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleVenta']['tarjeta']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">TRANSFERENCIA: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleVenta']['transferencia']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">YAPE: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleVenta']['yape']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">PLIN: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleVenta']['plin']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">DEPOSITO: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleVenta']['deposito']); ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="datosMovCaja" style="border-bottom: 1px solid black">
            <p style="text-align: center"><b>Detalle General</b></p>
            <table class="tablaProductos">
                <tbody style="padding-bottom: 5px; margin-bottom: 5px">
                <tr>
                    <td class="cantidad" style="font-weight: bolder">MONTO INICIAL: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleMovCaja']['montoInicial']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">INGRESOS: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleMovCaja']['ingresos']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">DEVOLUCIONES: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleMovCaja']['devolucion']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">PRÉSTAMOS: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleMovCaja']['prestamo']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">GASTOS: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleMovCaja']['gasto']); ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="datosCuadroFinal" style="border-bottom: 1px solid black">
            <p style="text-align: center"><b>Detalle de Cuadre FInal</b></p>
            <table class="tablaProductos">
                <tbody style="padding-bottom: 5px; margin-bottom: 5px">
                <tr>
                    <td class="cantidad" style="font-weight: bolder">INGRESOS TOTALES: </td>
                    <td style="padding:0px 2px;">S/ <?php echo($_SESSION['detalleMovCaja']['ingresos']); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">EGRESOS TOTALES:</td>
                    <td style="padding:0px 2px;">S/ <?php echo(($_SESSION['detalleCuadreFinal']['egresosTotales'])!= 0 ? $_SESSION['detalleCuadreFinal']['egresosTotales'] : '0.00' ); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">SALDO: </td>
                    <td style="padding:0px 2px;">S/ <?php echo(($_SESSION['detalleCuadreFinal']['saldo'])!= 0 ? $_SESSION['detalleCuadreFinal']['saldo'] : '0.00' ); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">MONTO INICIAL + SALDO: </td>
                    <td style="padding:0px 2px;">S/ <?php echo(($_SESSION['detalleCuadreFinal']['montoTotal'])!= 0 ? $_SESSION['detalleCuadreFinal']['montoTotal'] : '0.00' ); ?></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="datosFinal" style="border-bottom: 1px solid black">
            <table class="tablaProductos">
                <tbody style="padding-bottom: 5px; margin-bottom: 5px">
                <tr>
                    <td class="cantidad" style="font-weight: bolder">TOTAL EFECT. EN CAJA: </td>
                    <td style="padding:0px 2px;">S/ <?php echo(($_SESSION['montoFinal']['caja'])!= 0 ? $_SESSION['montoFinal']['caja'] : '0.00' ); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">TOTAL EN CTA BANCARIA:</td>
                    <td style="padding:0px 2px;">S/ <?php echo(($_SESSION['montoFinal']['banco'])!= 0 ? $_SESSION['montoFinal']['banco'] : '0.00' ); ?></td>
                </tr>
                <tr>
                    <td class="cantidad" style="font-weight: bolder">TOTAL CUADRE:</td>
                    <td style="padding:0px 2px;">S/ <?php echo(($_SESSION['montoFinal']['cajaBanco'])!= 0 ? $_SESSION['montoFinal']['cajaBanco'] : '0.00' ); ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <p style="margin-top: 5px; padding-bottom: 10px; border-bottom: 1px dashed black; text-align: start; font-size: 12px"><b>SON: <?php echo($_SESSION['montoFinal']['cajaBancoLetra']); ?></b></p>

        <p style="text-align: center; margin-top: 10px;" class="centrado">UN SOFTWARE DE SIGEFAC</p>
        <p style="text-align: center; text-decoration: underline; font-weight: bold;">
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