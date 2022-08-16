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
function pintarRoles(datos) {
  let rolUsuario = document.getElementById("rolUsuario");
  contenido = "";
  datos.forEach((rol) => {
    contenido += `<option value=${rol.idRol}>${rol.nombre}</option>`;
  });
  rolUsuario.innerHTML = contenido;
}
function validarDatos(datos) {
  respuesta = {};
  datos.forEach((dato) => {
    if (dato.value == "" || dato.value == "0") {
      respuesta[dato.name] = `El campo ${dato.name} es obligatorio`;
    }
    if (dato.name == "celular" || dato.name == "editCelUsuario") {
      if (dato.value.length != 9) {
        respuesta["cantDigitosCelular"] = "El campo tiene que tener 9 digitos";
      }
    }
  });
  return respuesta;
}
function validarInputSoloNumeros(evt) {
  let code = evt.which ? evt.which : evt.keyCode;
  if (code == 8) {
    // backspace.
    return true;
  } else if (code >= 48 && code <= 57) {
    // is a number.
    return true;
  } else {
    // other keys.
    return false;
  }
}

// ############# ASIGNANDO FUNCIONES ##############
$("#btnAbrirModalGuardarUsuario").click(() => {
  let nombres = document.getElementById("nombreProceso");
  datosArray = [nombres];
  setInterval(() => {
    let respuesta = validarDatos(datosArray);
    if (Object.keys(respuesta).length == 0) {
      $("#btnGuardarProceso").prop("disabled", false);
    } else {
      $("#btnGuardarProceso").prop("disabled", true);
    }
  }, 150);
});
$("#tbody").on("click", "#btnAbriModalEditarUsuario", function () {
  let nombres = document.getElementById("editNombreProceso");
  datosArray = [nombres];
  setInterval(() => {
    let respuesta = validarDatos(datosArray);
    if (Object.keys(respuesta).length == 0) {
      $("#btnEditarProceso").prop("disabled", false);
    } else {
      $("#btnEditarProceso").prop("disabled", true);
    }
  }, 150);
});

// ######## LLENAR DATA TABLE ############
$(document).ready(function () {
  let dataTable = $("#example").DataTable({
    ajax: {
      url: "../controllers/ProcesosController.php?method=listarProcesosGlobal",
      method: "GET",
    },
    columns: [
      { data: "indice" },
      { data: "nombreProceso" },
      {
        data: "estado",
        render: function (data, type, row) {
          if (row.estado == 'activo') {
            return `<span class="badge bg-success">Activo</span>`
          } else {
            return `<span class="badge bg-danger">Inactivo</span>`
          }
        }
      },
      {
        data: "estado",
        render: function (data, type, row) {
          if (row.estado == 'activo') {
            return `<button type="button" id="btnAbriModalEditarProceso" class="editar btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarProceso"><i class="fas fa-edit"></i></button>
            <button type="button" class="inhabilitar btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalInhabilitarProceso"><i class="fas fa-trash-alt"></i></button>`;
          }
          if (row.estado == 'inhabilitado') {
            return `<button type="button" id="btnAbriModalEditarProceso" class="editar btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarProceso"><i class="fas fa-edit"></i></button>
            <button type="button" class="habilitar btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalHabilitarProceso"><i class="fas fa-check-circle"></i></button>
            `;
          }
        }
      },
    ],
    language: español,
  });
  // Modal Editar con datos correspondientes
  $("#example tbody").on("click", ".editar", function () {
    let data = dataTable.row($(this).parents()).data();
    $("#idProcesoEdit").val(data.idProceso);
    $("#editNombreProceso").val(data.nombreProceso);
    setInterval(() => {
      if (($('#editNombreProceso').val()) == ''){
        $('#btnEditarProceso').prop('disabled', true)
      }else{
        $('#btnEditarProceso').prop('disabled', false)
      }
    }, 250)
  });
  // Modal Inhabilitar usuario con datos correspondientes
  $("#example tbody").on("click", ".inhabilitar", function () {
    let data = dataTable.row($(this).parents()).data();
    $("#nombreProcesoInhabilitar").text(data.nombreProceso);
    $("#idProcesoInhabilitar").val(data.idProceso);
  });
  // Modal habilitar usuario con datos correspondientes
  $("#example tbody").on("click", ".habilitar", function () {
    let data = dataTable.row($(this).parents()).data();
    $("#nombreProcesoHabilitar").text(data.nombreProceso);
    $("#idProcesoHabilitar").val(data.idProceso);
  });
  // Proceso de guardar proceso
  $("#btnGuardarProceso").click(function (e) {
    let nombres = document.getElementById("nombreProceso");
    let formData = new FormData();
    formData.append("nombreProceso", (nombres.value).toUpperCase());
    window.$.ajax({
      type: "post",
      url: "ProcesosController.php?method=guardarProceso",
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
        setTimeout(() => {
          Swal.close()
        }, 2000);
        let data = JSON.parse(response);
        if (data.estado == "ok") {
          $("#guardarProceso").modal("hide");
          nombres.value = "";
          Swal.fire({
            text: data.mensaje,
            icon: "success",
          });
          setTimeout(() => {
            Swal.close();
            dataTable.ajax.reload();
          }, 1000);
        } else {
          $("#guardarProceso").modal("hide");
          Swal.fire({
            text: data.mensaje,
            icon: "error",
          });
          setTimeout(() => {
            Swal.close();
          }, 1500);
        }
      },
    });
  });
  // Proceso de editar proceso
  $("#btnEditarProceso").click(function (e) {
    let idUsuario = document.getElementById("idProcesoEdit");
    let nombres = document.getElementById("editNombreProceso");
    let formData = new FormData();
    formData.append("nombreProceso", nombres.value);
    formData.append("idProceso", idUsuario.value);
    window.$.ajax({
      type: "post",
      url: "ProcesosController.php?method=editarProceso",
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
        setTimeout(() => {
          Swal.close()
        }, 2000);
        let data = JSON.parse(response);
        if ((data.estado = "ok")) {
          $("#modalEditarProceso").modal("hide");
          Swal.fire({
            text: data.mensaje,
            icon: "success",
          });
          setTimeout(() => {
            Swal.close();
            dataTable.ajax.reload();
          }, 900);
        }
      },
    });
  });
  // Proceso de inhabilitar proceso
  $("#btnInhabilitarProceso").click(function (e) {
    let idProceso = document.getElementById("idProcesoInhabilitar");
    let formData = new FormData();
    formData.append("idProceso", idProceso.value);
    window.$.ajax({
      type: "post",
      url: "ProcesosController.php?method=inhabilitarProceso",
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
        setTimeout(() => {
          Swal.close()
        }, 2000);
        let data = JSON.parse(response);
        if (data.estado == "ok") {
          $("#modalInhabilitarProceso").modal("hide");
          Swal.fire({
            text: data.mensaje,
            icon: "success",
          });
          setTimeout(() => {
            Swal.close();
            dataTable.ajax.reload();
          }, 900);
        }
      },
    });
  });
  // Proceso de inhabilitar proceso
  $("#btnHabilitarProceso").click(function (e) {
    let idProceso = document.getElementById("idProcesoHabilitar");
    let formData = new FormData();
    formData.append("idProceso", idProceso.value);
    window.$.ajax({
      type: "post",
      url: "ProcesosController.php?method=HabilitarProceso",
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
        setTimeout(() => {
          Swal.close()
        }, 2000);
        let data = JSON.parse(response);
        if (data.estado == "ok") {
          $("#modalHabilitarProceso").modal("hide");
          Swal.fire({
            text: data.mensaje,
            icon: "success",
          });
          setTimeout(() => {
            Swal.close();
            dataTable.ajax.reload();
          }, 900);
        }
      },
    });
  });
});
// Limpiar inputs de modal de agregar
setInterval(() => {
  if (!($("#guardarProceso").hasClass("show"))) {
    $("#nombreProceso").val('')
  }
}, 500);
