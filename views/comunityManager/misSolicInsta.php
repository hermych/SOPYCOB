<?php require_once('../views/layout/header.php'); ?>
  <div class="container-fluid" id="container">
    <div class="card text-center">
      <div class="card-header">
        <div class="d-sm-flex justify-content-between">
          <h4 class="mt-2">Mis Solicitudes de Instalacion</h4>
          <!-- <button type="button" id="btnAbrirModalRegistrar" class="btn btn-primary btn-sm px-2" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Agregar Cliente
          </button> -->
        </div>
      </div>
      <div class="card-body">
        <table id="dataTable" class="display table table-hover text-center mb-4" style="width: 100%;">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha Instalacion</th>
            <th scope="col">Titulo</th>
            <th scope="col">Negocio</th>
            <th scope="col">Cliente</th>
            <th scope="col">CDT</th>
            <th scope="col">Logo 1</th>
            <th scope="col">Logo 2</th>
            <th scope="col">Estado</th>
            <th scope="col">Opciones</th>
          </tr>
          </thead>
          <tbody id="tbody" style="font-size: 13px;">

          </tbody>
        </table>
      </div>
      <div class="card-footer text-muted text-end">
        <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
      </div>
    </div>
  </div>

  <!-- ################################# MODALES MODALES MODALES MODALES MODALES ######################################### -->
  <!-- Modal editar-->
  <div class="modal fade" id="modalInstalacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header pb-0">
            <div class="row text-center" style="width: 100%">
                <h5 class="modal-title" id="exampleModalLabel">Instalacion para: <span id="cliente_titulo" class="fw-bold"></h5>
                <h4 id="msjRechazo" class="text-danger fw-bolder fs-5"></h4>
            </div>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-6 mb-1">
                <label for="titulo" class="form-label fw-bolder">Titulo</label>
                <input type="text" class="form-control border border-danger" id="titulo" name="titulo" placeholder="Ejemplo: SISTEMA POS BOTICA INTEGRADO CON SISTEMA DE FACTURACIÓN ELECTRÓNICA">
              <input type="hidden" id="id_insta" name="id_insta">
            </div>
            <div class="col-auto mb-1">
              <label for="tipo_sistema" class="form-label fw-bolder">Tipo de Sistema</label>
              <select class="form-select" id="tipo_sistema" name="tipo_sistema">
                <option selected value="0">Seleccione Sistema</option>
                <option value="1">Sistema Pos</option>
                <option value="2">Sistema Factura</option>
                <option value="3">Sistema Restobar Escritorio</option>
                <option value="4">Sistema Restobar Web</option>
                <option value="5">Sistema Pos + Facturacion</option>
                <option value="6">Sistema Restobar + Facturacion</option>
                <option value="7">Sistema Restobar Web + Facturacion</option>
              </select>
            </div>
            <div class="col mb-1">
              <label for="asesor" class="form-label fw-bolder">Asesor Comercial</label>
              <input type="text" class="form-control border border-danger fw-bolder text-info" id="asesor" name="asesor" placeholder="Nombre de Asesor Comercial" disabled>
            </div>
          </div>
          <!-- Dominios -->
          <div class="row mb-2">
            <div class="col mb-1">
              <label for="dominioPos" class="form-label fw-bolder">Dominio POS</label>
              <input type="text" class="form-control" id="dominioPos" name="dominioPos" placeholder="Ejemplo: posboticalurenfarma.sigefac.com" disabled>
            </div>
            <div class="col mb-1">
              <label for="dominioFactura" class="form-label fw-bolder">Dominio Factura</label>
              <input type="text" class="form-control" id="dominioFactura" name="dominioFactura" placeholder="Ejemplo: facturaboticalurenfarma.sigefac.com" disabled>
            </div>
            <div class="col mb-1">
              <label for="dominioRestobar" class="form-label fw-bolder">Dominio Rest. Web</label>
              <input type="text" class="form-control" id="dominioRestobar" name="dominioRestobar" placeholder="Ejemplo: restobartoshimey.sigefac.com" disabled>
            </div>
            <div class="col-auto mb-1">
              <label for="tipo_negocio" class="form-label fw-bolder">Tipo Negocio</label>
              <input type="text" class="form-control" id="tipo_negocio" name="tipo_negocio" placeholder="Ejemplo: POLLERÍA" disabled>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col mb-1">
              <label for="dni" class="form-label fw-bolder">DNI</label>
              <input type="text" class="form-control" id="dni" name="dni" placeholder="Ejemplo: 15967838" disabled>
            </div>
            <div class="col mb-1">
              <label for="ruc" class="form-label fw-bolder">RUC</label>
              <input type="text" class="form-control" id="ruc" name="ruc" placeholder="Ejemplo: 10159678381" disabled>
            </div>
            <div class="col mb-1">
              <label for="celular" class="form-label fw-bolder">Celular</label>
              <input type="text" class="form-control" id="celular" name="celular" placeholder="Ejemplo: 975963741" disabled>
            </div>
            <div class="col mb-1">
              <label for="telefono" class="form-label fw-bolder">Telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ejemplo: 3271754" disabled>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col mb-1">
              <label for="cliente" class="form-label fw-bolder">Cliente</label>
              <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Ejemplo: INAFUKO INAFUKO JUAN RAMON" disabled>
            </div>
            <div class="col mb-1">
              <label for="name_comercial" class="form-label fw-bolder">Nombre Comercial</label>
              <input type="text" class="form-control" id="name_comercial" name="name_comercial" placeholder="Ejemplo: TOSHIMEY" disabled>
            </div>
            <div class="col mb-1">
              <label for="razonSocial" class="form-label fw-bolder">Razon Social</label>
              <input type="text" class="form-control" id="razonSocial" name="razonSocial" placeholder="Ejemplo: INAFUKO INAFUKO JUAN RAMON" disabled>
            </div>
            <div class="col mb-1">
              <label for="correo" class="form-label fw-bolder">Correo</label>
              <input type="text" class="form-control" id="correo" name="correo" placeholder="Ejemplo: yoserpascual@gmail.com" disabled>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col mb-1">
              <label for="direc_fiscal" class="form-label fw-bolder">Direccion Fiscal</label>
              <textarea class="form-control" id="direc_fiscal" rows="4" name="direc_fiscal" disabled placeholder="(0000) -> Av las pruebas 325"></textarea>
            </div>
            <div class="col mb-1">
              <label for="serie_compro" class="form-label fw-bolder">Serie Comprobantes</label>
              <textarea class="form-control" id="serie_compro" rows="4" name="serie_compro" disabled placeholder="(0000) -> TICKET: TK01 / BOLETA: B001 / FACTURA: F001 "></textarea>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col mb-1">
              <label for="especificacion" class="form-label fw-bolder">Especificacion</label>
              <textarea class="form-control" id="especificacion" rows="4" name="especificacion" disabled placeholder="1. EN BUSQUEDA DE DNI Y RUC 10 DEBE IR POR DEFECTO:  HUARAL - LIMA"></textarea>
            </div>
            <div class="col mb-1">
              <label for="observacion" class="form-label fw-bolder">Observacion</label>
              <textarea class="form-control" id="observacion" rows="4" name="observacion" disabled placeholder="1. SISTEMA RESTOBAR WEB INTEGRADO CON SISTEMA DE FACTURACIÓN ELECTRÓNICA"></textarea>
            </div>
          </div>
          <div class="row mb-2">
            <div class="col mb-1">
              <label for="persona_contacto" class="form-label fw-bolder">Persona de Contacto</label>
              <input type="text" class="form-control" id="persona_contacto" name="persona_contacto" disabled placeholder="Carlos Quispe">
            </div>
            <div class="col mb-1">
              <label for="cel_contacto" class="form-label fw-bolder">Celular del Contacto</label>
              <input type="text" class="form-control" id="cel_contacto" name="cel_contacto" disabled placeholder="932681121">
            </div>
            <div class="col mb-1">
              <label for="equipo_principal" class="form-label fw-bolder">Equipo en caja Principal</label>
              <input type="text" class="form-control" id="equipo_principal" name="equipo_principal" disabled placeholder="ticketera">
            </div>
            <div class="col mb-1">
              <label for="equipo_cocina" class="form-label fw-bolder">Equipo en cocina</label>
              <input type="text" class="form-control" id="equipo_cocina" name="equipo_cocina" disabled placeholder="Ticketera (no es de nosotros)">
            </div>
            <div class="col mb-1">
              <label for="equipo_bar" class="form-label fw-bolder">Equipo en bar</label>
              <input type="text" class="form-control" id="equipo_bar" name="equipo_bar" disabled placeholder="Ticketera por red">
            </div>
          </div>
          <div class="row mb-2">
            <div class="col mb-1">
              <label for="total_impresoras" class="form-label fw-bolder">Total de impresoras</label>
              <input type="text" class="form-control" id="total_impresoras" name="total_impresoras" disabled placeholder="3">
            </div>
            <div class="col mb-1">
              <label for="usuario" class="form-label fw-bolder">Usuario</label>
              <input type="text" class="form-control" id="usuario" name="usuario" disabled placeholder="ASESORIA">
            </div>
            <div class="col mb-1">
              <label for="clave_sol" class="form-label fw-bolder">Clave Sol</label>
              <input type="text" class="form-control" id="clave_sol" name="clave_sol" disabled placeholder="EFECTIVAsac7">
            </div>
          </div>
          <div class="row mb-2">
              <div class="col mb-1">
                  <label for="cdt" class="form-label fw-bolder">CDT</label>
                  <input type="file" class="form-control" id="cdt" name="cdt" disabled>
              </div>
            <div class="col mb-1">
              <label for="logo_1" class="form-label fw-bolder">Logo 1</label>
              <input type="file" class="form-control" id="logo_1" name="logo_1">
            </div>
            <div class="col mb-1">
              <label for="logo_2" class="form-label fw-bolder">Logo 2</label>
              <input type="file" class="form-control" id="logo_2" name="logo_2">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary bg-danger fw-bolder" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" id="btnReenviar" class="btn btn-primary bg-success fw-bolder">Reenviar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal ver logo 1-->
  <div class="modal fade" id="verLogo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="logo_img_1" style="width: 100%;" class="border border-primary">
        </div>
      </div>
    </div>
  </div>
  <!-- Modal ver logo 2-->
  <div class="modal fade" id="verLogo2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Logo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <img id="logo_img_2" style="width: 100%;" class="border border-primary">
        </div>
      </div>
    </div>
  </div>
  <!-- Modal para ver informacion de instalacion culminada -->
  <div class="modal fade" id="modalInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Detalles de Instalacion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for="msj_final">Detalles</label>
              <input type="hidden" id="id_insta_final">
              <textarea class="form-control border border-danger" name="msj_final" id="msj_final" rows="15" readonly></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="btnCerrar" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<?php require_once('../views/layout/footer.php'); ?>