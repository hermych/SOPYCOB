</section>
<!-- PIE DE PAGINA -->

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
<!-- LINK DE DATATABLE -->
<script src="../assets/js/librerias/datatables.min.js"></script>
<!-- LINK DE SELECT2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- LINK DE CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>

<!-- LINK DE JS PROPIOS -->
<script src="../assets/js/home.js"></script>
<script src="../assets/js/sidebar.js"></script>
<?php
$porciones = explode("?", $_SERVER["REQUEST_URI"]);
if (count($porciones) > 1) {
  $porciones2 = explode("=", $porciones[1]);
  if ($porciones2[1] == 'categorias') {
    $script = '<script src="../assets/js/servicios/categorias.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'proveedores') {
    $script = '<script src="../assets/js/servicios/proveedores.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'servicios') {
    $script = '<script src="../assets/js/servicios/servicios.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'cargos') {
    $script = '<script src="../assets/js/usuario/cargos.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'principal') {
    $script = '<script src="../assets/js/usuario/index.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'permisos') {
    $script = '<script src="../assets/js/usuario/permisos.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'procesos') {
    $script = '<script src="../assets/js/soporte/procesos.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'estados') {
    $script = '<script src="../assets/js/soporte/estados.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'clientes') {
    $script = '<script src="../assets/js/clientes.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'comprobantes') {
    $script = '<script src="../assets/js/comprobantes/comprobantes.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'tirajes') {
    $script = '<script src="../assets/js/comprobantes/tirajes.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'contratos') {
    $script = '<script src="../assets/js/pagos/contratos.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'pensionesMes') {
    $script = '<script src="../assets/js/pagos/pensiones.js"></script>';
    echo $script;
  }  elseif ($porciones2[1] == 'pagosRealizadosView') {
    $script = '<script src="../assets/js/pagos/pagosRealizados.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'clienteServicio') {
    $script = '<script src="../assets/js/pagos/servicioXCliente.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'consultasCM') {
    $script = '<script src="../assets/js/comunityManager/consultas.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'demosYCierres') {
    $script = '<script src="../assets/js/comunityManager/controlSolic.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'dashSoporte') {
    $script = '<script src="../assets/js/dashSoporte.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'dashCobranza') {
    $script = '<script src="../assets/js/dashCobranza.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'datosGenerales') {
    $script = '<script src="../assets/js/empresa.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'dashComunity') {
    $script = '<script src="../assets/js/dashComunity.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'admiCaja') {
    $script = '<script src="../assets/js/caja/administrar.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'historial') {
    $script = '<script src="../assets/js/caja/historial.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'ticketSop') {
    $script = '<script src="../assets/js/soporte/ticketSop.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'suspenderSistemas') {
    $script = '<script src="../assets/js/soporte/suspenderSistemas.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'darBajaSistemas') {
    $script = '<script src="../assets/js/soporte/darBajaSistemas.js"></script>';
    echo $script;
  }  elseif ($porciones2[1] == 'instalacionesRealizadas') {
    $script = '<script src="../assets/js/soporte/instalacionesRealizadas.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'sucursales') {
    $script = '<script src="../assets/js/empresa/sucursales.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'pensionesXFecha') {
    $script = '<script src="../assets/js/reportesView/pensionesPagadas.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'ticketsAtendidos') {
    $script = '<script src="../assets/js/reportesView/ticketsAtendidos.js"></script>';
    echo $script;
  }  elseif ($porciones2[1] == 'pagosVigentes') {
    $script = '<script src="../assets/js/reportesView/pagosVigentes.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'pagosRealizados') {
    $script = '<script src="../assets/js/reportesView/pagosRealizados.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'pagosAnulados') {
    $script = '<script src="../assets/js/reportesView/pagosAnulados.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'pagosAnuales') {
    $script = '<script src="../assets/js/reportesView/pagosAnuales.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'pagosVencidos') {
    $script = '<script src="../assets/js/reportesView/pagosVencidos.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'pagosPendientesVencidos') {
    $script = '<script src="../assets/js/reportesView/pagosPendientesVencidos.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'serviciosSuspendidos') {
    $script = '<script src="../assets/js/reportesView/serviciosSuspendidos.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'capacitaciones') {
    $script = '<script src="../assets/js/capacitaciones/capacitaciones.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'altaSistemas') {
    $script = '<script src="../assets/js/comunityManager/altaSistemas.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'instalaciones') {
    $script = '<script src="../assets/js/comunityManager/instalaciones.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'porInstalar') {
    $script = '<script src="../assets/js/soporte/porInstalar.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'bajaServicios') {
    $script = '<script src="../assets/js/reportesView/bajaServicios.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'misSolicInsta') {
    $script = '<script src="../assets/js/comunityManager/misSolicInsta.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'pautasG') {
    $script = '<script src="../assets/js/comunityManager/pautasG.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'sistemasG') {
    $script = '<script src="../assets/js/comunityManager/sistemasG.js"></script>';
    echo $script;
  } elseif ($porciones2[1] == 'equiposG') {
    $script = '<script src="../assets/js/comunityManager/equiposG.js"></script>';
    echo $script;
  };
}
?>
<script>
  document.addEventListener("DOMContentLoaded", function(){
    // Invocamos cada 5 segundos ;)
    const milisegundos = 6 *10000;
    setInterval(function(){
      // No esperamos la respuesta de la petición porque no nos importa
      fetch("../config/refrescar.php");
    },milisegundos);
  });
</script>
</body>

</html>