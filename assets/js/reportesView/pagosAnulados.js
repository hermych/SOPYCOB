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
function traerTotal(){
  let fechaDesde = $('#desde').val()
  let fechaHasta = $('#hasta').val()
  let cliente = $('#cliente').val()
  let ruta = `../controllers/ReportesViewController.php?method=totalPagosAnuladosFecha&desde=${fechaDesde}&hasta=${fechaHasta}&cliente=${cliente}`;
  window.$.ajax({
    type: "GET",
    url: ruta,
    beforeSend: function () {
      Swal.fire({
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
      let montos = JSON.parse(response);
      $('#subTotal').text(montos.pension);
      $('#mora').text(montos.mora);
      $('#reconexion').text(montos.recorte);
      $('#pagoTotal').text(montos.global);
    },
  });
}
function cargarTabla (){
  if($.fn.DataTable.isDataTable( '#pagosVigentesTable' )){
    $("#pagosVigentesTable").dataTable().fnDestroy();
  }
  let fechaDesde = $('#desde').val()
  let fechaHasta = $('#hasta').val()
  let cliente = $('#cliente').val()
  let ruta = `../controllers/ReportesViewController.php?method=pagosAnuladosFecha&desde=${fechaDesde}&hasta=${fechaHasta}&cliente=${cliente}`;
  let dataTable = $("#pagosVigentesTable").DataTable({
    ajax: {
      url: ruta,
      method: "GET",
    },
    columns: [
      /*{data: "indice"},*/
      {data: "cliente"},
      {data: "servicio"},
      {data: "mensualidad"},
      {data: "mora"},
      {data: "recorte"},
      {
        data: "mes",
        render: function (data, type, row) {
          return `<span class="badge bg-info text-dark">${mesEspañol(row.mes)}</i></span>`;
        }
      },
      {data: "fPago"},
      {data: "comprobante"},
      /*{
        data: "medioPago",
        data: "banco",
        render: function (data, type, row) {
          if (row.medioPago == 'transferencia') {
            return `TRANSF. ${row.banco}`;
          } else {
            return `${(row.medioPago).toUpperCase()}`;
          }
        },
      },
      {data: "nroOperacion"},*/
      {data: "totalPagar"},
      {
        defaultContent: `
          <span class="badge bg-danger">Anulado</span>`,
      },
      //{data: "nombre"},
    ],
    language: español,
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
$('#btnRepExcel').click(function (){
  let fechaDesde = $('#desde').val()
  let fechaHasta = $('#hasta').val()
  let cliente = $('#cliente').val()
  let ruta = `../controllers/ReportesViewController.php?method=reportePagosAnuladosFecha&desde=${fechaDesde}&hasta=${fechaHasta}&cliente=${cliente}`;
  window.$.ajax({
    type: "GET",
    url: ruta,
    success: function (response) {
      window.location.href=ruta;
    },
  });
})