<?php require_once('../views/layout/header.php'); ?>
  <div class="container-fluid" id="container">
    <div class="card text-center">
      <div class="card-header">
        <div class="d-sm-flex justify-content-between">
          <h4 class="mt-2">Instalaciones Realizadas</h4>
          <!-- <button type="button" id="btnAbrirModalRegistrar" class="btn btn-primary btn-sm px-2" data-bs-toggle="modal" data-bs-target="#modalRegistrar">Agregar Cliente
          </button> -->
        </div>
      </div>
      <div class="card-body">
        <table id="dataTable" class="display table table-hover text-center mb-4" style="width: 100%;">
          <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha Realizado</th>
            <th scope="col">Negocio</th>
            <th scope="col">CDT</th>
            <th scope="col">Logo 1</th>
            <th scope="col">Logo 2</th>
            <th scope="col">Estado</th>
            <th scope="col">Realizado</th>
            <th scope="col">Opciones</th>
          </tr>
          </thead>
          <tbody id="tbody" style="font-size: 14px;">

          </tbody>
        </table>
      </div>
      <div class="card-footer text-muted text-end">
        <?php echo "<b>" . date("d") . " de " . date("M") . " de " . date("Y"); ?>
      </div>
    </div>
  </div>

  <!-- ################################# MODALES MODALES MODALES MODALES MODALES ######################################### -->
  <!-- Button trigger modal -->

  <!-- Modal editar-->
  <div class="modal fade" id="modalVerInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Instalacion - <span id="cliente_titulo" class="fw-bold">Juan</span></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-hover">
            <tbody>
            <tr>
              <th style="font-weight: bolder;"><label for="titulo">Titulo</label></th>
              <td colspan="3">
                <div type="text" class="form-control border" id="titulo" name="titulo"></div>
              </td>
              <input type="hidden" name="id_insta" id="id_insta">
              <th style="font-weight: bolder;"><label for="tipo_sistema">Tipo de Sistema</label></th>
              <td>
                <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="tipo_sistema" name="tipo_sistema" disabled>
                  <option selected value="0">Seleccione Sistema</option>
                  <option value="1">Sistema Pos</option>
                  <option value="2">Sistema Factura</option>
                  <option value="3">Sistema Restobar</option>
                  <option value="4">Sistema Restobar Web</option>
                  <option value="5">Sistema Pos + Facturacion</option>
                  <option value="6">Sistema Restobar + Facturacion</option>
                  <option value="7">Sistema Restobar Web + Facturacion</option>
                </select>
              </td>
            </tr>
            <!-- Dominios -->
            <tr>
              <th style="font-weight: bolder;"><label for="dominioPos">Dominio POS</label></th>
              <td>
                <div type="text" class="form-control" id="dominioPos" name="dominioPos"></div>
              </td>
              <th style="font-weight: bolder;"><label for="dominioFactura">Dominio Factura</label></th>
              <td>
                <div type="text" class="form-control" id="dominioFactura" name="dominioFactura"></div>
              </td>
              <th style="font-weight: bolder;"><label for="dominioRestobar">Dominio Rest. Web</label></th>
              <td>
                <div type="text" class="form-control" id="dominioRestobar" name="dominioRestobar"></div>
              </td>
            </tr>
            <tr>
              <th style="font-weight: bolder;"><label for="cliente">Cliente</label></th>
              <td>
                <div type="text" class="form-control" id="cliente" name="cliente"></div>
              </td>
              <td style="font-weight: bolder;"><label for="dni">DNI</label></td>
              <td>
                <div type="text" class="form-control" id="dni" name="dni"></div>
              </td>
              <th style="font-weight: bolder;"><label for="razonSocial">Razon Social</label></th>
              <td>
                <div type="text" class="form-control" id="razonSocial" name="razonSocial"></div>
              </td>
            </tr>
            <tr>
              <td style="font-weight: bolder;"><label for="name_comercial">Nombre Comercial</label></td>
              <td>
                <div type="text" class="form-control" id="name_comercial" name="name_comercial"></div>
              </td>
              <th style="font-weight: bolder;"><label for="ruc">RUC</label></th>
              <td>
                <div type="text" class="form-control" id="ruc" name="ruc"></div>
              </td>
              <td style="font-weight: bolder;"><label for="tipo_negocio">Tipo Negocio</label></td>
              <td>
                <div type="text" class="form-control" id="tipo_negocio" name="tipo_negocio"></div>
              </td>
            </tr>
            <tr>
              <th style="font-weight: bolder;"><label for="celular">Celular</label></th>
              <td>
                <div type="text" class="form-control" id="celular" name="celular"></div>
              </td>
              <td style="font-weight: bolder;"><label for="telefono">Telefono</label></td>
              <td>
                <div type="text" class="form-control" id="telefono" name="telefono"></div>
              </td>
              <th style="font-weight: bolder;"><label for="correo">Correo</label></th>
              <td>
                <div type="text" class="form-control" id="correo" name="correo"></div>
              </td>
            </tr>
            <tr>
              <td style="font-weight: bolder;" style="width: 20%;"><label for="direc_fiscal">Direccion Fiscal</label></td>
              <td colspan="2" style="width: 30%;"><textarea class="form-control" id="direc_fiscal" rows="3" name="direc_fiscal" readonly></textarea></td>
              <th style="font-weight: bolder;"><label for="serie_compro">Serie Comprobantes</label></th>
              <td colspan="2"><textarea class="form-control" id="serie_compro" rows="3" name="serie_compro" readonly></textarea></td>
            </tr>
            <tr>
              <th style="font-weight: bolder;"><label for="especificacion">Especificacion</label></th>
              <td colspan="2"><textarea class="form-control" id="especificacion" rows="3" name="especificacion" readonly></textarea></td>
              <td style="font-weight: bolder;"><label for="observacion">Observacion</label></td>
              <td colspan="2"><textarea class="form-control" id="observacion" rows="3" name="observacion" readonly></textarea></td>
            </tr>
            <tr>
              <th style="font-weight: bolder;"><label for="persona_contacto">Persona de Contacto</label></th>
              <td>
                <div type="text" class="form-control" id="persona_contacto" name="persona_contacto"></div>
              </td>
              <td style="font-weight: bolder;"><label for="cel_contacto">Celular del Contacto</label></td>
              <td>
                <div type="text" class="form-control" id="cel_contacto" name="cel_contacto"></div>
              </td>
              <th style="font-weight: bolder;"><label for="equipo_principal">Equipo en caja Principal</label></th>
              <td>
                <div type="text" class="form-control" id="equipo_principal" name="equipo_principal"></div>
              </td>
            </tr>
            <tr>
              <td style="font-weight: bolder;"><label for="equipo_cocina">Equipo en cocina</label></td>
              <td>
                <div type="text" class="form-control" id="equipo_cocina" name="equipo_cocina"></div>
              </td>
              <th style="font-weight: bolder;"><label for="equipo_bar">Equipo en bar</label></th>
              <td>
                <div type="text" class="form-control" id="equipo_bar" name="equipo_bar"></div>
              </td>
              <td style="font-weight: bolder;"><label for="total_impresoras">Total de impresoras</label></td>
              <td>
                <div type="text" class="form-control" id="total_impresoras" name="total_impresoras"></div>
              </td>
            </tr>
            <tr>
              <td style="font-weight: bolder;"><label for="usuario">Usuario</label></td>
              <td>
                <div type="text" class="form-control" id="usuario" name="usuario"></div>
              </td>
              <th style="font-weight: bolder;"><label for="clave_sol">Clave Sol</label></th>
              <td>
                <div type="text" class="form-control" id="clave_sol" name="clave_sol"></div>
              </td>
              <!-- <td style="font-weight: bolder;"><label for="cdt">CDT</label></td> -->
              <!-- <td><input type="file" class="form-control" id="cdt" name="cdt" disabled></td> -->
            </tr>
            <tr>
              <td style="font-weight: bolder;"><label for="clave_cdt">Clave de CDT</label></td>
              <td>
                <div type="text" class="form-control" id="clave_cdt" name="clave_cdt" disabled placeholder="Ejm: FactSigefac1"></div>
              </td>
              <th style="font-weight: bolder;"><label for="usuario_sec">Usuario Sec</label></th>
              <td>
                <div type="text" class="form-control" id="usuario_sec" name="usuario_sec" disabled placeholder="Ejm: COFFEE01"></div>
              </td>
              <td style="font-weight: bolder;"><label for="clave_sec">Clave Sec</label></td>
              <td>
                <div type="text" class="form-control" id="clave_sec" name="clave_sec" disabled placeholder="Ejm: FactSigefac1"></div>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary bg-danger" data-bs-dismiss="modal">Cerrar</button>
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
  <!-- Modal de confirmacion instalacion -->
  <div class="modal fade" id="modalCulminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Culminar Finalizacion</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <label for="msj_final">Mensaje de Finalizacion</label>
              <input type="hidden" id="id_insta_final">
              <textarea class="form-control border border-danger" name="msj_final" id="msj_final" rows="15"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="btnCerrar" data-bs-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-success" id="btnGuardar" disabled>Confirmar</button>
        </div>
      </div>
    </div>
  </div>
<?php require_once('../views/layout/footer.php'); ?>