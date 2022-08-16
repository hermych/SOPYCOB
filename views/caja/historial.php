<?php require_once('../views/layout/header.php'); ?>
    <div class="container-fluid" id="container">
        <!-- Button trigger modal -->
        <div class="card">
            <div class="card-header"><h2 class="mt-2">Historial de Caja</h2></div>
            <div class="card-body">
                <!--<button type="button" id="btnAbrirModalGuardarCliente" class="btn btn-success float-end mb-4" data-bs-toggle="modal" data-bs-target="#modalGuardarCliente">
                  Agregar -->
                </button>
                <table id="historialCajaTable" class="display table table-hover text-center mb-4 table-responsive"
                       style="width: 100%;">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Cajero</th>
                        <th scope="col">Fecha Apertura</th>
                        <th scope="col">Monto Apertura</th>
                        <th scope="col">Monto Cierre</th>
                        <th scope="col">Fecha Cierre</th>
                        <th scope="col">Estado</th>
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

<?php require_once('../views/layout/footer.php'); ?>