<?php
session_start();
$medidaTicket = 180;
require("../../helpers/utils.php");
ob_start();
?>
  <!DOCTYPE html>
  <title>Reporte Ticket <?=$_SESSION['cajero']['nroCaja']?></title>
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
      <h2 style="margin-top: -5px; text-align: center; border-bottom: 1px solid black; padding-bottom: 5px;">00<?php echo($_SESSION['cajero']['nroCaja']); ?></h2>

      <p style="margin-top: 5px; text-align: start"><b>Cajero(a):</b> <?php echo($_SESSION['cajero']['cajero']); ?></p>
      <p style="margin-top: -5px; text-align: start"><b>Fecha Apertura:</b> <?php echo($_SESSION['cajero']['fApertura']); ?></p>
      <p style="margin-top: -5px; text-align: start; padding-bottom: 5px;"><b>Fecha Cierre:</b> <?php echo(date('d-m-Y')); ?></p>
      <p style="margin-top: -10px; border-bottom: 1px solid black; text-align: start; padding-bottom: 5px;"><b>Moneda:</b>SOLES (S/.)</p>
    </div>

    <div class="datosCaja">
      <p style="text-align: center"><b>Detalle venta</b></p>
      <p style="margin-top: 0px; text-align: start"><b>EFECTIVO:</b>
        S/ <?php echo($_SESSION['detalleVenta']['efectivo']); ?></p>
      <p style="margin-top: -5px; text-align: start"><b>TARJETA:</b>
        S/ <?php echo($_SESSION['detalleVenta']['tarjeta']); ?></p>
      <p style="margin-top: -5px; text-align: start; padding-bottom: 5px;"><b>YAPE:</b>
        S/ <?php echo($_SESSION['detalleVenta']['yape']); ?></p>
      <p style="margin-top: -10px; text-align: start; border-bottom: 1px solid black; padding-bottom: 5px;"><b>PLIN:</b>
        S/ <?php echo($_SESSION['detalleVenta']['plin']); ?></p>
    </div>

    <div class="datosMovCaja">
      <p style="text-align: center"><b>Detalle General</b></p>
      <p style="margin-top: 0px; text-align: start"><b>MONTO
          INICIAL:</b> <?php echo($_SESSION['detalleMovCaja']['montoInicial']); ?></p>
      <p style="margin-top: -5px; text-align: start">
        <b>INGRESOS:</b> <?php echo($_SESSION['detalleMovCaja']['ingresos']); ?></p>
      <p style="margin-top: -5px; text-align: start;">
        <b>DEVOLUCIONES:</b> <?php echo($_SESSION['detalleMovCaja']['devolucion']); ?></p>
      <p style="margin-top: -5px; text-align: start;">
        <b>PRÉSTAMOS:</b> <?php echo($_SESSION['detalleMovCaja']['prestamo']); ?></p>
      <p style="margin-top: -5px; border-bottom: 1px solid black; text-align: start; padding-bottom: 5px;"><b>GASTOS:</b> <?php echo($_SESSION['detalleMovCaja']['gasto']); ?>
      </p>
    </div>

    <div class="datosCuadroFinal">
      <p style="text-align: center"><b>Detalle de Cuadre FInal</b></p>
      <p style="margin-top: 0px; text-align: start"><b>INGRESOS TOTALES:</b> <?php echo($_SESSION['detalleMovCaja']['ingresos']); ?></p>
      <p style="margin-top: -5px; text-align: start"><b>EGRESOS TOTALES:</b> <?php echo(($_SESSION['detalleCuadreFinal']['egresosTotales'])!= 0 ? $_SESSION['detalleCuadreFinal']['egresosTotales'] : '0.00' ); ?></p>
      <p style="margin-top: -5px; text-align: start;"><b>SALDO:</b> <?php echo(($_SESSION['detalleCuadreFinal']['saldo'])!= 0 ? $_SESSION['detalleCuadreFinal']['saldo'] : '0.00' ); ?></p>
      <p style="margin-top: -5px; border-bottom: 1px solid black; text-align: start;"><b>MONTO INICIAL + SALDO:</b> <?php echo(($_SESSION['detalleCuadreFinal']['montoTotal'])!= 0 ? $_SESSION['detalleCuadreFinal']['montoTotal'] : '0.00' ); ?></p>
    </div>

    <div class="datosFinal">
      <p style="margin-top: 5px; text-align: start"><b>TOTAL EFECT. EN CAJA:</b> <?php echo(($_SESSION['montoFinal']['caja'])!= 0 ? $_SESSION['montoFinal']['caja'] : '0.00' ); ?></p>
      <p style="margin-top: -5px; text-align: start"><b>TOTAL EN CTA BANCARIA:</b> <?php echo(($_SESSION['montoFinal']['banco'])!= 0 ? $_SESSION['montoFinal']['banco'] : '0.00' ); ?></p>
      <p style="margin-top: -5px; text-align: start;"><b>TOTAL CUADRE:</b> <?php echo(($_SESSION['montoFinal']['cajaBanco'])!= 0 ? $_SESSION['montoFinal']['cajaBanco'] : '0.00' ); ?></p>
    </div>

    <p style="margin-top: 5px; padding-bottom: 10px; border-bottom: 1px dashed black; text-align: start; font-size: 12px"><b>SON: <?php echo($_SESSION['montoFinal']['cajaBancoLetra']); ?></b></p>
    <p style="text-align: center; border-bottom: 1px solid black; padding-bottom: 5px" class="centrado">¡GRACIAS POR SU PREFERENCIA!</p>

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

include "../views/reportes/ticketCaja2.php";
$html = ob_get_clean();
$dompdf->load_html($html);
// Formato del papel
$dompdf->setPaper(array(0, 0, 205, 841), 'portrait');
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();

?>