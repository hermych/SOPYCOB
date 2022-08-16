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
function mesEspañol(mes) {
  let mesEspañol = ''
  if (mes == 'Jan'|| mes == 'January' || mes == 01) {
    mesEspañol = 'Enero'
  } else if (mes == 'Feb' || mes == 'February' || mes == 02) {
    mesEspañol = 'Febrero'
  } else if (mes == 'Mar' || mes == 'March' || mes == 03) {
    mesEspañol = 'Marzo'
  } else if (mes == 'Apr' || mes == 'April' || mes == 04) {
    mesEspañol = 'Abril'
  } else if (mes == 'May' || mes == 'May' || mes == 05) {
    mesEspañol = 'Mayo'
  } else if (mes == 'Jun' || mes == 'June' || mes == 06) {
    mesEspañol = 'Junio'
  } else if (mes == 'Jul' || mes == 'July' || mes == 07) {
    mesEspañol = 'Julio'
  } else if (mes == 'Aug' || mes == 'August' || mes == 08) {
    mesEspañol = 'Agosto'
  } else if (mes == 'Sep' || mes == 'September' || mes == 09) {
    mesEspañol = 'Setiembre'
  } else if (mes == 'Oct' || mes == 'October' || mes == 10) {
    mesEspañol = 'Octubre'
  } else if (mes == 'Nov' || mes == 'November' || mes == 11) {
    mesEspañol = 'Noviembre'
  } else if (mes == 'Dec' || mes == 'December' || mes == 12) {
    mesEspañol = 'Diciembre'
  }
  return mesEspañol;
}
function cargarTabla (){
  if($.fn.DataTable.isDataTable( '#pensionesDataTable' )){
    $("#pensionesDataTable").dataTable().fnDestroy();
  }
  let fechaDesde = $('#desde').val()
  let fechaHasta = $('#hasta').val()
  let cliente = $('#cliente').val()
  let ruta = `../controllers/PensionesController.php?method=listarPagosRealizados&desde=${fechaDesde}&hasta=${fechaHasta}&cliente=${cliente}`;
  let dataTable = $("#pensionesDataTable").DataTable({
    ajax: {
      url: ruta,
      method: "GET",
    },
    columns: [
      {data: "indice"},
      {data: "cliente"},
      {
        data: "servicio",
        render: function (data, type, row) {
          let service = (row.servicio).replace(' + mora', '')
          service = service.replace(' + mora + reconexion', '')
          service = service.replace(' + reconexion', '')
          return `${service}`;
        }
      },
      {data: "mensualidad"},
      {data: "mora"},
      {data: "recorte"},
      {
        data: "mes",
        render: function (data, type, row) {
          return `<span class="badge bg-info text-dark">${mesEspañol(row.mes)}</i></span>`;
        }
      },
      {
        data: "comprobante",
        render: function (data, type, row) {
          return `<span class="badge bg-warning text-dark">${row.comprobante}</i></span>`;
        }
      },
      {data: "fPago"},
      {
        data: "estadoSunat",
        data: "serie",
        render: function (data, type, row) {
          if(row.serie != 'TTK1'){
            if(row.estadoSunat == 'ok'){
              return `<span class="badge bg-success">Enviado Aceptado</i></span>`;
            }else{
              return `<span class="badge bg-danger">Revisar</i></span>`;
            }
          }else{
            return `<span class="badge bg-info">No Necesario</i></span>`;
          }
        }
      },
      {
        defaultContent: `
        <button type="button" class="precuenta btn btn-info btn-sm me-1"><i class="fas fa-file-invoice"></i>
        </button><button type="button" class="anular btn btn-danger btn-sm"><i class="fas fa-ban fw-bolder"></i></button>`,
      },
    ],
    language: español,
  });
}
function anularEnFacturacion(respuesta, comprobante){
  let motivo = $('#motivo').val()
  const arrayDatosVenta = new Object();
  arrayDatosVenta.iddocumento = respuesta.iddocumento;
  arrayDatosVenta.folio = respuesta.folio;
  arrayDatosVenta.corretativo = respuesta.corretativo;
  arrayDatosVenta.serie_Documento = respuesta.serie_Documento;
  arrayDatosVenta.fecha_referencia = respuesta.fecha_referencia;
  arrayDatosVenta.nombrecomprobante = respuesta.nombrecomprobante;
  arrayDatosVenta.tipo_comprobante = respuesta.tipo_comprobante;
  arrayDatosVenta.motivoingresado = motivo;
  arrayDatosVenta.idusuario = respuesta.idusuario;
  arrayDatosVenta.idsucursal = respuesta.idsucursal;
  $.ajax({
    url: "https://facturadoractualizado.sigefac.com/controllers/con_anularcomprobantes.php",
    type: 'POST',
    data: arrayDatosVenta,
    success(datos_respuesta) {
      if(datos_respuesta!=''){
        Swal.fire({
          text: `EL comprobante ${comprobante} ha sido anulado`,
          icon: "success",
        });
      }else{
        Swal.fire({
          text: `EL comprobante ${comprobante} no se anulo en el facturador. Verifiquelo en su sistema de Facturacion`,
          icon: "error",
        });
      }
    }
  })
}
function anularPensionSistema(idPension, tipo_comprobante, comprobante){
  let dataTable = $("#pensionesDataTable").DataTable();
  let motivo = $('#motivo').val()
  let formData = new FormData();
  formData.append("idPension", idPension);
  formData.append("motivo", motivo);
  window.$.ajax({
    type: "post",
    url: "PensionesController.php?method=anularPagoPension",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (respuestas) {
      dataTable.ajax.reload()
      let respuesta = JSON.parse(respuestas);
      if(respuesta.estado == 'ok'){
        Swal.fire({
          text: `EL comprobante ${comprobante} ha sido anulado`,
          icon: "success",
        });
      }else{
        Swal.fire({
          text: respuesta.mensaje,
          icon: "error",
        });
      }
    },
  });
}
function traerTotal(){
  let fechaDesde = $('#desde').val()
  let fechaHasta = $('#hasta').val()
  let cliente = $('#cliente').val()
  window.$.ajax({
    type: "GET",
    url: `../controllers/PensionesController.php?method=totalMontoPagosRealizados&desde=${fechaDesde}&hasta=${fechaHasta}&cliente=${cliente}`,
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
// ######## LLENAR DATA TABLE ############
$(document).ready(function () {
  cargarTabla();
  traerTotal();
});
$('#btnBuscar').click(function (){
  cargarTabla();
  traerTotal();
})
/** #### VISTA PREVIA DE COMPROBANTE ##### */
$("#pensionesDataTable tbody").on("click", ".precuenta", function () {
  let dataTable = $("#pensionesDataTable").DataTable();
  idPension = dataTable.row($(this).parents()).data().idPension;
  formData = new FormData();
  formData.append("idPension",idPension);
  window.$.ajax({
    type: "post",
    url: "ReportesController.php?method=comprobantePago",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    /*beforeSend: function () {
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
    },*/
    success: function (response) {
      Swal.close();
      window.open("../views/reportes/comprobante.php", "_blank");
    },
  });
});
/** #### ANULAR PAGO DE PENSION ###### */
$("#pensionesDataTable tbody").on("click", ".anular", function () {
  let dataTable = $("#pensionesDataTable").DataTable();
  let datos = dataTable.row($(this).parents()).data()
  let numero_comprobante = datos.numero;
  let serie_comprobante = datos.serie;
  let tipo_comprobante = datos.tipoComprobante;
  let comprobante = datos.comprobante;
  let idPension = datos.idPension;
  $.ajax({
    url: "https://facturadoractualizado.sigefac.com/controllers/con_obtenerdatosanulacion.php",
    type: 'GET',
    data: `proceso=obtenerDatosAnulacion&numero_comprobante=${numero_comprobante}&serie_comprobante="${serie_comprobante}"`,
    dataType: 'json',
    success(respuesta){
      if(tipo_comprobante == 'TICKET'){
        Swal.fire({
          title: '<strong>Anular comprobante</strong>',
          icon: 'info',
          html:
            '<input type="text" class="form-control" id="motivo" name="motivo">',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            '<i class="fa fa-thumbs-up me-1"></i> Confirmar!',
          cancelButtonText:
            '<i class="fa fa-thumbs-down me-1"></i> Cancelar',
        }).then((result) => {
          if (result.isConfirmed) {
            anularPensionSistema(idPension, tipo_comprobante, comprobante)
          }
        })
      }
      else{
        Swal.fire({
          title: '<strong>Anular comprobante</strong>',
          icon: 'info',
          html:
            '<input type="text" class="form-control" id="motivo" name="motivo">',
          showCloseButton: true,
          showCancelButton: true,
          focusConfirm: false,
          confirmButtonText:
            '<i class="fa fa-thumbs-up me-1"></i> Confirmar!',
          cancelButtonText:
            '<i class="fa fa-thumbs-down me-1"></i> Cancelar',
        }).then((result) => {
          if (result.isConfirmed) {
            respuesta = respuesta[0];
            anularEnFacturacion(respuesta, comprobante);
            anularPensionSistema(idPension, tipo_comprobante, comprobante);
          }
        })
      }
    }
  })
});
