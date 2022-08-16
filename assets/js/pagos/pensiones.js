// ############# VARIABLES ###############
let español = {
  aria: {
    sortAscending: "Activar para ordenar la columna de manera ascendente",
    sortDescending: "Activar para ordenar la columna de manera descendente",
  },
  autoFill: {
    cancel: "Cancelar",
    fill: "Rellene todas las celdas con <i>%d</i>",
    fillHorizontal: "Rellenar celdas horizontalmente",
    fillVertical: "Rellenar celdas verticalmente",
  },
  buttons: {
    collection: "Colección",
    colvis: "Visibilidad",
    colvisRestore: "Restaurar visibilidad",
    copy: "Copiar",
    copyKeys:
      "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
    copySuccess: {
      1: "Copiada 1 fila al portapapeles",
      _: "Copiadas %d fila al portapapeles",
    },
    copyTitle: "Copiar al portapapeles",
    csv: "CSV",
    excel: "Excel",
    pageLength: {
      "-1": "Mostrar todas las filas",
      _: "Mostrar %d filas",
    },
    pdf: "PDF",
    print: "Imprimir",
    createState: "Crear Estado",
    removeAllStates: "Borrar Todos los Estados",
    removeState: "Borrar Estado",
    renameState: "Renombrar Estado",
    savedStates: "Guardar Estado",
    stateRestore: "Restaurar Estado",
    updateState: "Actualizar Estado",
  },
  infoThousands: ",",
  loadingRecords: "Cargando...",
  paginate: {
    first: "Primero",
    last: "Último",
    next: "Siguiente",
    previous: "Anterior",
  },
  processing: "Procesando...",
  search: "Buscar:",
  searchBuilder: {
    add: "Añadir condición",
    button: {
      0: "Constructor de búsqueda",
      _: "Constructor de búsqueda (%d)",
    },
    clearAll: "Borrar todo",
    condition: "Condición",
    deleteTitle: "Eliminar regla de filtrado",
    leftTitle: "Criterios anulados",
    logicAnd: "Y",
    logicOr: "O",
    rightTitle: "Criterios de sangría",
    title: {
      0: "Constructor de búsqueda",
      _: "Constructor de búsqueda (%d)",
    },
    value: "Valor",
    conditions: {
      date: {
        after: "Después",
        before: "Antes",
        between: "Entre",
        empty: "Vacío",
        equals: "Igual a",
        not: "Diferente de",
        notBetween: "No entre",
        notEmpty: "No vacío",
      },
      number: {
        between: "Entre",
        empty: "Vacío",
        equals: "Igual a",
        gt: "Mayor a",
        gte: "Mayor o igual a",
        lt: "Menor que",
        lte: "Menor o igual a",
        not: "Diferente de",
        notBetween: "No entre",
        notEmpty: "No vacío",
      },
      string: {
        contains: "Contiene",
        empty: "Vacío",
        endsWith: "Termina con",
        equals: "Igual a",
        not: "Diferente de",
        startsWith: "Inicia con",
        notEmpty: "No vacío",
        notContains: "No Contiene",
        notEnds: "No Termina",
        notStarts: "No Comienza",
      },
      array: {
        equals: "Igual a",
        empty: "Vacío",
        contains: "Contiene",
        not: "Diferente",
        notEmpty: "No vacío",
        without: "Sin",
      },
    },
    data: "Datos",
  },
  searchPanes: {
    clearMessage: "Borrar todo",
    collapse: {
      0: "Paneles de búsqueda",
      _: "Paneles de búsqueda (%d)",
    },
    count: "{total}",
    emptyPanes: "Sin paneles de búsqueda",
    loadMessage: "Cargando paneles de búsqueda",
    title: "Filtros Activos - %d",
    countFiltered: "{shown} ({total})",
    collapseMessage: "Colapsar",
    showMessage: "Mostrar Todo",
  },
  select: {
    cells: {
      1: "1 celda seleccionada",
      _: "%d celdas seleccionadas",
    },
    columns: {
      1: "1 columna seleccionada",
      _: "%d columnas seleccionadas",
    },
  },
  thousands: ",",
  datetime: {
    previous: "Anterior",
    hours: "Horas",
    minutes: "Minutos",
    seconds: "Segundos",
    unknown: "-",
    amPm: ["am", "pm"],
    next: "Siguiente",
    months: {
      0: "Enero",
      1: "Febrero",
      10: "Noviembre",
      11: "Diciembre",
      2: "Marzo",
      3: "Abril",
      4: "Mayo",
      5: "Junio",
      6: "Julio",
      7: "Agosto",
      8: "Septiembre",
      9: "Octubre",
    },
    weekdays: [
      "Domingo",
      "Lunes",
      "Martes",
      "Miércoles",
      "Jueves",
      "Viernes",
      "Sábado",
    ],
  },
  editor: {
    close: "Cerrar",
    create: {
      button: "Nuevo",
      title: "Crear Nuevo Registro",
      submit: "Crear",
    },
    edit: {
      button: "Editar",
      title: "Editar Registro",
      submit: "Actualizar",
    },
    remove: {
      button: "Eliminar",
      title: "Eliminar Registro",
      submit: "Eliminar",
      confirm: {
        _: "¿Está seguro que desea eliminar %d filas?",
        1: "¿Está seguro que desea eliminar 1 fila?",
      },
    },
    multi: {
      title: "Múltiples Valores",
      restore: "Deshacer Cambios",
      noMulti:
        "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
      info: "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, haga click o toque aquí, de lo contrario conservarán sus valores individuales.",
    },
    error: {
      system:
        'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\"> Más información</a>).',
    },
  },
  decimal: ".",
  emptyTable: "No hay datos disponibles en la tabla",
  zeroRecords: "No se encontraron coincidencias",
  info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
  infoEmpty: "Mostrando 0 a 0 de 0 entradas",
  infoFiltered: "(Filtrado de _MAX_ total de entradas)",
  lengthMenu: "Mostrar _MENU_ entradas",
  stateRestore: {
    removeTitle: "Eliminar",
    creationModal: {
      search: "Busccar",
    },
  },
};

// ############# METODOS METODOS #############
function downloadFile(filePath){
  var link=document.createElement('a');
  link.href = filePath;
  link.download = filePath.substr(filePath.lastIndexOf('/') + 1);
  link.click();
}
function validarInputSoloNumeros(evt) {
  let code = evt.which ? evt.which : evt.keyCode;
  if (code == 8) {
    // backspace.
    return true;
  } else if ((code >= 48 && code <= 57) || code == 46) {
    // is a number.
    return true;
  } else {
    // other keys.
    return false;
  }
}
function validarDatos(datos) {
  respuesta = {};
  datos.forEach((dato) => {
    if (dato.value == "" || dato.value == "0") {
      respuesta[dato.name] = `El campo ${dato.name} es obligatorio`;
    }
  });
  return respuesta;
}
function cambiarEstadoSunat(idPension, estado, mensaje){
  let formData = new FormData();
  formData.append('idPension', idPension)
  formData.append('estado', estado)
  formData.append('mensaje', mensaje)
  window.$.ajax({
    type: "post",
    url: '../controllers/PensionesController.php?method=cambiarEstadoSunat',
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (response) {
      Swal.close()
      let data = JSON.parse(response);
      $('#tipoPago').val('0')
      $('#comprobanteNombreDe').val('')
      $('#nroDocClientePaga').val('')
      $('#banco').val('0')
      $('#mora').val('no')
      $('#reconexion').val('no')
      $('#montoRecibido').val('')
      $('#comprobante').val('ticket')
      $('#cambioVuelto').val('')
      $('#montoMora').val('')
      $('#montoReconexion').val('')
      $('#divMontoMora').css('display', 'none')
      $('#divMontoReconexion').css('display', 'none')
      $('#modalPagarPension').modal("hide")
      if(data.estado == 'ok'){
        Swal.fire({
          text: `${mensaje}`,
          icon: 'success',
        })
      }else{
        Swal.fire({
          text: `${mensaje}`,
          icon: 'error',
        })
      }
      /*
      if (data.respuesta == 'ok') {

        Swal.fire({
          text: "Se realizo el pago correctamente",
          icon: 'success',
        })
      } else {
        Swal.fire({
          text: "Error al realizar la factura, comuniquese con soporte",
          icon: 'error',
        })
      }*/
    },
  });
}
function traerTotal(){
  window.$.ajax({
    type: "GET",
    url: '../controllers/PensionesController.php?method=totalMontoPensionesCobrar',
    beforeSend: function () {
      Swal.fire({
        allowOutsideClick: false,
        title: 'Cargando',
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
          }, 300)
        }
      })
    },
    success: function (response) {
      let monto = JSON.parse(response);
      $('#pagoTotal').text(monto);
      Swal.close()
    },
  });
}
function enviarJson(datos, idPension) {
  let ruta = "https://facturadoractualizado.sigefac.com/sunat_integracion/api_enviosunat.php";
  window.$.ajax({
    type: "post",
    url: ruta,
    data: datos,
    cache: false,
    processData: false,
    contentType: false,
    success: function (response) {
      let data = JSON.parse(response);
      let estado = data.respuesta;
      let mensaje = data.msj_sunat
      cambiarEstadoSunat(idPension, estado, mensaje)
    },
  });
}
function buscarDniApi(nroDoc, cantNroDoc){
    if (cantNroDoc == 8) {
        url = `https://dniruc.apisperu.com/api/v1/dni/${nroDoc}?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Implc3VzLmh5Ljk2QGdtYWlsLmNvbSJ9.iFRy56HuRFPLb8YjRy6-09d_H7v6E-6-VT7VEj_L110`
        window.$.ajax({
            type: "get",
            url: url,
            beforeSend: function () {
                $('#loaderDni').css("display", "block");
                $('#searchDni').css("display", "none");
            },
            success: function (datos) {
                $('#loaderDni').css("display", "none");
                $('#searchDni').css("display", "block");
                if (datos.nombres == undefined || datos.apellidoPaterno == undefined || datos.apellidoMaterno == undefined) {
                    $('#comprobanteNombreDe').attr('disabled', false)
                } else {
                    let nombreCompleto = `${datos.nombres} ${datos.apellidoPaterno} ${datos.apellidoMaterno}`
                    $('#comprobanteNombreDe').val(nombreCompleto);
                    $('#comprobanteNombreDe').attr('disabled', true)
                    $('#direccion').val('Lima');
                }
            },
        });
        // ***** buscando ruc *******
    } else if (cantNroDoc == 11) {
        url = `https://dniruc.apisperu.com/api/v1/ruc/${nroDoc}?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Implc3VzLmh5Ljk2QGdtYWlsLmNvbSJ9.iFRy56HuRFPLb8YjRy6-09d_H7v6E-6-VT7VEj_L110`
        window.$.ajax({
            type: "get",
            url: url,
            beforeSend: function () {
                $('#loaderDni').css("display", "block");
                $('#searchDni').css("display", "none");
            },
            success: function (datos) {
                $('#loaderDni').css("display", "none");
                $('#searchDni').css("display", "block");
                let nombreCompleto = `${datos.razonSocial}`
                $('#comprobanteNombreDe').val(nombreCompleto);
                $('#direccion').val(datos.direccion);
            },
        });
        // *****  ni dni ni ruc *******
    } else if (cantNroDoc != 8 || cantNroDoc != 11) {
        $('#comprobanteNombreDe').attr('disabled', true)
        $('#comprobanteNombreDe').val("");
        $('#comprobanteNombreDe').val("");
    }
}
function buscarCliente(documento, clienteDoc) {
  let formData = new FormData();
  formData.append("documento", documento);
  formData.append("clienteDoc", clienteDoc);
  window.$.ajax({
    type: "post",
    url: "ClientesController.php?method=buscarCliente",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    beforeSend: function () {
      Swal.fire({
        allowOutsideClick: false,
        title: 'Cargando',
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
          }, 300)
        }
      })
    },
    success: function (response) {
      Swal.close()
      let data = JSON.parse(response)
      if (data.estado == 'noExiste') {
          let nroDoc = $('#nroDocClientePaga').val();
          let cantNroDoc = ($('#nroDocClientePaga').val()).length
          buscarDniApi(nroDoc, cantNroDoc)
      } else {
        $('#comprobanteNombreDe').val(data.nombreCliente)
        $('#direccion').val(data.direccion)
      }
    },
  });
}

// CAJA ## CAJA ## CAJA ## CAJA ## CAJA ##
window.addEventListener("load", function () {
  // Consultar si caja esta abierta
  window.$.ajax({
    type: "get",
    url: "CajaController.php?method=consultarCajaAbierta",
    beforeSend: function () {
      Swal.fire({
        allowOutsideClick: false,
        title: 'Cargando',
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
          }, 300)
        }
      })
    },
    success: function (response) {
      setTimeout(() => {
        Swal.close()
      }, 2000);
      data = JSON.parse(response);
      if (data.estado == "abrir") {
        $("#modalAbrirCaja").modal("show");
      }
    },
  });

  // Abrir Caja
  $("#btnAbrirCaja").on("click", function () {
    let montoCajaApertura = $("#montoCajaApertura").val();
    let formData = new FormData();
    formData.append("montoApertura", montoCajaApertura);
    window.$.ajax({
      type: "post",
      url: "CajaController.php?method=abrirCaja",
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      beforeSend: function () {
        Swal.fire({
          allowOutsideClick: false,
          title: 'Cargando',
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            }, 300)
          }
        })
      },
      success: function (response) {
        Swal.close()
        let data = JSON.parse(response);
        if (data.estado == "ok") {
          $("#modalAbrirCaja").modal("hide");
          Swal.fire({
            text: data.mensaje,
            icon: "success",
          });
        } else {
          Swal.fire({
            text: data.mensaje,
            icon: "error",
          });
        }
      },
    });
  });
  $("#montoCajaApertura").blur(function () {
    if ($("#montoCajaApertura").val() != "") {
      $("#btnAbrirCaja").prop("disabled", false);
    } else {
      $("#btnAbrirCaja").prop("disabled", true);
    }
  });
});

// ######## LLENAR DATA TABLE ############
$(document).ready(function () {
  traerTotal()
  let dataTable = $("#pensionesDataTable").DataTable({
    ajax: {
      url: "../controllers/PensionesController.php?method=listarPensionesMes",
      method: "GET",
    },
    columns: [
      {data: "indice"},
      {data: "detallePago"},
      {data: "nombreComercial"},
      {data: "contacto"},
      {data: "contactoCel"},
      {data: "fechaEmisionRecibo"},
      {data: "fechaVencimiento"},
      {data: "precio"},
      {
        data: "dias_transcurridos",
        render: function (data, type, row) {
          if (Number(row.dias_transcurridos) > 2) {
            return `<span class="badge bg-info text-dark">PENDIENTE</i></span>`;
          } else if (Number(row.dias_transcurridos) < 0) {
            return `<span class="badge bg-danger">VENCIDO</i></span>`;
          } else {
            return `<span class="badge bg-warning text-success">POR VENCER</i></span>`;
          }
        },
      },
      {
        data: "dias_transcurridos",
        render: function (data, type, row) {
          let dias = Number(row.dias_transcurridos)
          if(row.dias_transcurridos >= 0){
            return `0`
          }else{
            dias = (row.dias_transcurridos).replace("-", "")
            return  `${dias}`
          }
        },
      },
      {
        defaultContent: `
        <button type="button" class="precuenta btn btn-info btn-sm"><i class="fas fa-file-invoice"></i></button>  
        <button type="button" id="btnAbrirModalPagarPension" class="pagar btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalPagarPension"><i class="fas fa-cash-register"></i></button>
        <button type="button" class="anular btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalAnularPension"><i class="fas fa-ban"></i></button>
        `,
      },
      // <button type="button" class="anular btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalAnularPension"><i class="fab fa-whatsapp"></i></i></button>
    ],
    language: español,
  });
  // Modal PAGAR pension con datos correspondientes
  $("#pensionesDataTable tbody").on("click", ".pagar", function () {
    let data = dataTable.row($(this).parents()).data();
    $("#cliente").attr("data-nroDoc", data.nroDocumento);
    $("#cliente").attr("data-idafectacionigv", data.idafectacionigv);
    $("#cliente").attr("data-idDetallePensiones", data.idDetallePensiones);
    $("#montoPago").val(data.precio);
    $("#precio").val(data.precio);
    $("#servicio").val(data.detallePago);
    $("#cliente").val(`${data.nombreCliente} / N° Doc: ${data.nroDocumento}`);
    $("#contacto").val(`${data.contacto} / N° Doc: ${data.nroDocContacto}`);

    $("#montoPago").val((Number($('#montoMora').val()) + Number($('#montoReconexion').val()) + Number(data.precio)).toFixed(2));
    $("#montoRecibido").keyup(function () {
      let cambioVuelto = Number($("#montoRecibido").val()) - Number($('#montoPago').val());
      $("#cambioVuelto").val(cambioVuelto.toFixed(2));
    })
    $("#montoMora").keyup(function () {
      $("#montoPago").val((Number($('#montoMora').val()) + Number($('#montoReconexion').val()) + Number(data.precio)).toFixed(2));
    })
    $("#montoReconexion").keyup(function () {
      $("#montoPago").val((Number($('#montoMora').val()) + Number($('#montoReconexion').val()) + Number(data.precio)).toFixed(2));
    })
    // ****** validaciones previas a pagar *************
    setInterval(() => {
      let respuesta = true;
      if (Number($("#montoRecibido").val()) < Number($("#montoPago").val())) {
        respuesta = false;
      }
      if ($("#tipoPago").val() == 0) {
        respuesta = false;
      }
      if ($("#mora").val() == 'si') {
        if ($('#montoMora').val() == '0.00' || $('#montoMora').val() == '') {
          respuesta = false
        }
      }
      if ($("#comprobanteNombreDe").val() == '') {
        respuesta = false
      }
      if ($("#comprobante").val() == 'boleta') {
        if (($('#nroDocClientePaga').val()).length != 8) {
          respuesta = false
        }
      }
      if ($("#comprobante").val() == 'factura') {
        if (($('#nroDocClientePaga').val()).length != 11) {
          respuesta = false
        }
      }
      if ($("#reconexion").val() == 'si') {
        if ($('#montoReconexion').val() == '0.00' || $('#montoReconexion').val() == '') {
          respuesta = false
        }
      }
      if ($("#tipoPago").val() == 'transferencia' || $("#tipoPago").val() == 'deposito') {
        if ($('#banco').val() == '0') {
          respuesta = false
        }
      }
      if (Number($("#montoRecibido").val()) < Number($('#montoPago').val())) {
        respuesta = false
      }
      if (respuesta) {
        $('#btnPagar').prop('disabled', false)
      } else {
        $('#btnPagar').prop('disabled', true)
      }
    }, 100);
  });
  // Modal ANULAR pension con datos correspondientes
  $("#pensionesDataTable tbody").on("click", ".anular", function () {
    let data = dataTable.row($(this).parents()).data();
    setInterval(function () {
      if ($('#motivoAnulacionPension').val().length > 20) {
        $('#btnAnularPension').prop('disabled', false)
      } else {
        $('#btnAnularPension').prop('disabled', true)
      }
    }, 500)
    $("#idPension").val(data.idDetallePensiones);
  });
  // Proceso de Anular pension
  $("#btnAnularPension").click(function (e) {
    let formData = new FormData();
    formData.append("idPension", $("#idPension").val());
    formData.append("motivo", $("#motivoAnulacionPension").val());
    window.$.ajax({
      type: "post",
      url: "PensionesController.php?method=anularPension",
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      beforeSend: function () {
        Swal.fire({
          allowOutsideClick: false,
          title: 'Cargando',
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            }, 300)
          }
        })
      },
      success: function (response) {
        traerTotal()
        Swal.close()
        let data = JSON.parse(response);
        if (data.estado == "ok") {
          $("#modalAnularPension").modal("hide");
          Swal.fire({
            text: data.mensaje,
            icon: "success",
          });
          setTimeout(() => {
            Swal.close();
            dataTable.ajax.reload();
          }, 1000);
        } else {
          $("#modalAnularPension").modal("hide");
          Swal.fire({
            text: data.mensaje,
            icon: "error",
          });
          setTimeout(() => {
            Swal.close();
            dataTable.ajax.reload();
          }, 1000);
        }
      },
    });
  });
  // Proceso de pagar pension
  $('#nroDocClientePaga').keyup(function () {
    if ($('#comprobante').val() == 'boleta') {
      if (($('#nroDocClientePaga').val()).length == 8) {
        let dni = $('#nroDocClientePaga').val();
        let clienteDoc = $("#cliente").attr("data-nroDoc");
        buscarCliente(dni, clienteDoc);
      } else {
        $('#comprobanteNombreDe').val('')
      }
    } else if ($('#comprobante').val() == 'ticket') {
      if (($('#nroDocClientePaga').val()).length == 11 || ($('#nroDocClientePaga').val()).length == 8) {
        let ruc = $('#nroDocClientePaga').val();
        let clienteDoc = $("#cliente").attr("data-nroDoc");
        buscarCliente(ruc, clienteDoc)
      } else {
        $('#comprobanteNombreDe').val('')
      }
    } else {
      if (($('#nroDocClientePaga').val()).length == 11) {
        let ruc = $('#nroDocClientePaga').val();
        let clienteDoc = $("#cliente").attr("data-nroDoc");
        buscarCliente(ruc, clienteDoc)
      } else {
        $('#comprobanteNombreDe').val('')
      }
    }
  })
  $('#mora').change(function () {
    if ($('#mora').val() == 'si') {
      $('#divMontoMora').css("display", "block");
    } else {
      $('#divMontoMora').css("display", "none");
      $('#montoMora').val('0.00')
    }
  })
  $('#reconexion').change(function () {
    if ($('#reconexion').val() == 'si') {
      $('#divMontoReconexion').css("display", "block");
    } else {
      $('#divMontoReconexion').css("display", "none");
      $('#montoReconexion').val('0.00')
    }
  })
  $('#tipoPago').change(function () {
    if ($('#tipoPago').val() == 'transferencia' ||$('#tipoPago').val() == 'deposito' ) {
      $('#divBanco').css("display", "block");
    } else {
      $('#divBanco').css("display", "none");
      $('#banco').val('0')
    }
  })
  $('#comprobante').change(function () {
    if ($('#comprobante').val() == 'factura') {
      if (($('#nroDocClientePaga').val()).length != 11) {
        $('#nroDocClientePaga').val('')
        $('#comprobanteNombreDe').val('')
      }
    }
    if ($('#comprobante').val() == 'boleta') {
      if (($('#nroDocClientePaga').val()).length != 8) {
        $('#nroDocClientePaga').val('')
        $('#comprobanteNombreDe').val('')
      }
    }
  })
  $("#btnPagar").click(function () {
    let idPension = $("#cliente").attr("data-idDetallePensiones");
    let formData = new FormData();
    formData.append("nroDocCliente", $("#cliente").attr("data-nroDoc"));
    formData.append("nroDocClientePaga", $('#nroDocClientePaga').val());
    formData.append("comprobante", $('#comprobante').val());
    formData.append("banco", $('#banco').val());
    formData.append("detallePago", $("#servicio").val());
    formData.append("clienteServicio", $("#cliente").val());
    formData.append("clientePaga", $("#comprobanteNombreDe").val());
    formData.append("precioServ", $("#precio").val());
    formData.append("totalPago", $("#montoPago").val());
    formData.append("idafectacionigv", $("#cliente").attr("data-idafectacionigv"));
    formData.append("tipoPago", $("#tipoPago").val());
    formData.append("montoRecibido", $("#montoRecibido").val());
    formData.append("cambioVuelto", $("#cambioVuelto").val());
    formData.append("idDetallePensiones",idPension);
    formData.append("nroOperacion", $("#nroOperacion").val());
    formData.append("direccion", $("#direccion").val());
    if ($('#mora').val() == 'si') {
      formData.append("mora", $("#montoMora").val());
    }
    if ($('#reconexion').val() == 'si') {
      formData.append("reconexion", $("#montoReconexion").val());
    }
    window.$.ajax({
      type: "post",
      url: "PensionesController.php?method=pagarPension",
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      beforeSend: function () {
        Swal.fire({
          allowOutsideClick: false,
          title: 'Cargando',
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            }, 100)
          }
        })
      },
      success: function (response) {
        let data = JSON.parse(response);
        if ((data.serie_comprobante).startsWith('B') || (data.serie_comprobante).startsWith('F')) {
          enviarJson(response, idPension)
        } else {
          Swal.close()
          $('#comprobante').val('ticket')
          $('#tipoPago').val('0')
          $('#comprobanteNombreDe').val('')
          $('#nroDocClientePaga').val('')
          $('#banco').val('0')
          $('#mora').val('no')
          $('#reconexion').val('no')
          $('#montoRecibido').val('')
          $('#cambioVuelto').val('')
          $('#montoMora').val('')
          $('#montoReconexion').val('')
          $('#divMontoMora').css('display', 'none')
          $('#divMontoReconexion').css('display', 'none')
          $('#modalPagarPension').modal("hide")
          $('#nroOperacion').val("")
        }
        traerTotal()
        dataTable.ajax.reload()
        //window.open("../views/reportes/comprobante.php", "_blank");
        downloadFile('../views/reportes/comprobante.php');
      },
    });
  });
  // Proceso de ver la precuenta
  $("#pensionesDataTable tbody").on("click", ".precuenta", function () {
    let data = dataTable.row($(this).parents()).data();
    let cliente = data.nombreComercial;
    let f_emision = data.fechaEmisionRecibo;
    let f_pago = data.fechaPago;
    let f_vence = data.fechaVencimiento;
    let nro_doc = data.nroDocumento;
    let direccion = "Calle Las Pimpinelas Mz Z Lote 14 Ancieta Alta";
    let detalle_pago = data.detallePago;
    let precio = data.precio;
    formData = new FormData();
    formData.append("cliente", cliente);
    formData.append("f_emision", f_emision);
    formData.append("f_pago", f_pago);
    formData.append("f_vence", f_vence);
    formData.append("nro_doc", nro_doc);
    formData.append("direccion", direccion);
    formData.append("detalle_pago", detalle_pago);
    formData.append("precio", precio);

    window.$.ajax({
      type: "post",
      url: "ReportesController.php?method=precuenta",
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      beforeSend: function () {
        Swal.fire({
          allowOutsideClick: false,
          title: 'Cargando',
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading()
            const b = Swal.getHtmlContainer().querySelector('b')
            timerInterval = setInterval(() => {
            }, 300)
          }
        })
      },
      success: function (response) {
        Swal.close()
        window.open("../views/reportes/precuenta.php", "_blank");
      },
    });
  });
  // Limpiar campos al cerrar modal de pagar
  $('#btnCerrarModalPagar').click(function () {
    $('#mora').val('no');
    $('#nroDocClientePaga').val('');
    $('#divMontoMora').css("display", "none");
    $('#montoMora').val('');

    $('#reconexion').val('no');
    $('#divMontoReconexion').css("display", "none");
    $('#montoReconexion').val('')

    $('#montoRecibido').val('0.00')
    $('#cambioVuelto').val('0.00')

    $('#tipoPago').val('0');
    $('#divBanco').css("display", "none");
    $('#banco').val('0')

    $('#comprobanteNombreDe').val('')
    $('#nroOperacion').val('')
  });
  $('#btnCerrarGuardarCliente').click(function () {
    $("#modalGuardarCliente").modal("hide");
    $("#modalPagarPension").modal("show");
  })
  $('#btnNoAbrirCaja').click(function (){
    location.replace("../views/home.php");
  })
});
