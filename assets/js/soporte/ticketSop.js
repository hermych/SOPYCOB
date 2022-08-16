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
function validarDatos(datos) {
  respuesta = {};
  datos.forEach((dato) => {
    if (dato.value == "" || dato.value == "0") {
      respuesta[dato.name] = `El campo ${dato.name} es obligatorio`;
    }
    if (dato.name == "celSolicitante") {
      if (dato.value.length != 9) {
        respuesta[dato.name] = `Celular son 9 digitos`;
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
// ############################################

// Abrir modal de registrar ticket y validar los campos con datos
$("#btnAbrirmodalRegistrarTicket").click(() => {
  let rucDniName = document.getElementById("rucDni");
  let cliente = document.getElementById("cliente");
  let nombreSolicita = document.getElementById("nombreSolicita");
  let celSolicitante = document.getElementById("celSolicitante");
  let mensaje = document.getElementById("mensaje");
  let proceso = document.getElementById("proceso");
  let comentario = document.getElementById("comentario");
  let motivoNoCompete = document.getElementById("motivoNoCompete");
  window.$.ajax({
    url: "../controllers/ProcesosController.php?method=listarProcesos",
    method: "GET",
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
      let data = JSON.parse(response).data;
      let contenido = '<option value="0" selected>Seleccione proceso</option>';
      for (let i = 0; i < data.length; i++) {
        contenido += `<option value="${data[i].idProceso}">${data[i].nombreProceso}</option>`;
      }
      $("#proceso").html(contenido);
      Swal.close()
    },
  });
  let datosArray = [
    rucDniName,
    cliente,
    nombreSolicita,
    celSolicitante,
    mensaje,
    proceso,
  ];

  setInterval(() => {
    $("#proceso").change(function () {
      if ($("#proceso").val() == "6") {
        datosArray = [
          rucDniName,
          cliente,
          nombreSolicita,
          celSolicitante,
          mensaje,
          proceso,
          comentario,
        ];
        $("#divComentario").css("display", "block");
        $("#motivoNoCompete").val("");
        $("#divNoCompeteMotivo").css("display", "none");
      } else if ($("#proceso").val() == "4") {
        datosArray = [
          rucDniName,
          cliente,
          nombreSolicita,
          celSolicitante,
          mensaje,
          proceso,
          motivoNoCompete,
        ];
        $("#divNoCompeteMotivo").css("display", "block");
        $("#comentario").val("");
        $("#divComentario").css("display", "none");
      } else {
        datosArray = [
          rucDniName,
          cliente,
          nombreSolicita,
          celSolicitante,
          mensaje,
          proceso,
        ];
        $("#comentario").val("");
        $("#motivoNoCompete").val("");
        $("#divComentario").css("display", "none");
        $("#divNoCompeteMotivo").css("display", "none");
      }
    });
    let respuesta = validarDatos(datosArray);
    if (Object.keys(respuesta).length == 0) {
      $("#btnRegistrarTicket").prop("disabled", false);
    } else {
      $("#btnRegistrarTicket").prop("disabled", true);
    }
  }, 200);
});
// Listar responsables de tickets
$("#proceso").change(function () {
  if ($("#proceso").val() == 0 || $("#proceso").val() == "0") {
    $("#responsable").prop("disabled", true);
    $("#responsable").val("0");
  } else {
    $("#responsable").prop("disabled", false);
  }
  window.$.ajax({
    url: "../controllers/UsuarioController.php?method=listarUsuarios",
    method: "GET",
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
      let data = JSON.parse(response).data;
      let contenido =
        '<option value="0" selected>Seleccione responsable</option>';
      for (let i = 0; i < data.length; i++) {
        contenido += `<option value="${data[i].idUsuario}">${data[i].nombreApellido}</option>`;
      }
      $("#responsable").html(contenido);
      Swal.close()
    },
  });
});
// Buscar cliente por DNI para formulario registrar TICKET
$("#rucDni").blur(function () {
  claveBuscador = $("#rucDni").val();
  cantNroDoc = claveBuscador.length;
  firstCaracter = claveBuscador.substr(0, 1);
  if (isNaN(firstCaracter)) {
    formData = new FormData();
    formData.append("valor", claveBuscador);
    formData.append("nombreComercial", "si");
    window.$.ajax({
      type: "post",
      url: "../controllers/ClientesController.php?method=listarClienteEspecifico",
      data: formData,
      cache: false,
      processData: false,
      contentType: false,
      beforeSend: function () {
        $("#searchContainer")
          .html(`<div class="spinner-border text-info" style="padding: 0px;" role="status">
        <span class="visually-hidden" style="padding: 2px;">Loading...</span>
      </div>`);
      },
      success: function (response) {
        let data = JSON.parse(response);
        if (Array.isArray(data)) {
          let cliente = data[0];
          $("#cliente").val(cliente.nombreCliente);
          $("#idCliente").val(cliente.idCliente);
          $("#nameContacto").val(cliente.nombreContacto);
          $("#celContacto").val(cliente.nroContacto);
        } else {
          Swal.fire({
            text: data.mensaje,
            icon: "error",
          });
          $("#cliente").val("");
          $("#contacto").val("");
          $("#celular").val("");
        }
      },
      complete: function () {
        $("#searchContainer").html(`<i class="fas fa-search"></i>`);
      },
    });
  } else {
    if (cantNroDoc == 11) {
      formData = new FormData();
      formData.append("valor", $("#rucDni").val());
      window.$.ajax({
        type: "post",
        url: "../controllers/ClientesController.php?method=listarClienteEspecifico",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {
          $("#searchContainer")
            .html(`<div class="spinner-border text-info" style="padding: 0px;" role="status">
        <span class="visually-hidden" style="padding: 2px;">Loading...</span>
      </div>`);
        },
        success: function (response) {
          let data = JSON.parse(response);
          if (Array.isArray(data)) {
            let cliente = data[0];
            $("#cliente").val(cliente.nombreCliente);
            $("#idCliente").val(cliente.idCliente);
            $("#nameContacto").val(cliente.nombreContacto);
            $("#celContacto").val(cliente.nroContacto);
          } else {
            Swal.fire({
              text: data.mensaje,
              icon: "error",
            });
            $("#cliente").val("");
            $("#contacto").val("");
            $("#celular").val("");
          }
        },
        complete: function () {
          $("#searchContainer").html(`<i class="fas fa-search"></i>`);
        },
      });
    }
    if (cantNroDoc == 8) {
      formData = new FormData();
      formData.append("valor", $("#rucDni").val());
      window.$.ajax({
        type: "post",
        url: "../controllers/ClientesController.php?method=listarClienteEspecifico",
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {
          $("#searchContainer")
            .html(`<div class="spinner-border text-info" style="padding: 0px;" role="status">
          <span class="visually-hidden" style="padding: 2px;">Loading...</span>
        </div>`);
        },
        success: function (response) {
          let data = JSON.parse(response);
          if (Array.isArray(data)) {
            let cliente = data[0];
            $("#cliente").val(cliente.nombreCliente);
            $("#idCliente").val(cliente.idCliente);
            $("#nameContacto").val(cliente.nombreContacto);
            $("#celContacto").val(cliente.nroContacto);
          } else {
            Swal.fire({
              text: data.mensaje,
              icon: "error",
            });
            $("#cliente").val("");
            $("#contacto").val("");
            $("#celular").val("");
          }
        },
        complete: function () {
          $("#searchContainer").html(`<i class="fas fa-search"></i>`);
        },
      });
    }
  }
});

$(document).ready(function () {
  // ########### Llenar DataTable ###########
  let dataTable = $("#ticketSopTable").DataTable({
    ajax: {
      url: "../controllers/ticketSopController.php?method=listarTicketsPendientes",
      method: "GET",
    },
    columns: [
      { data: "indice" },
      {
        data: "estado",
        render: function (data, type, row) {
          if (row.nombreEstado == "En Proceso") {
            return `<span class="badge bg-warning text-dark">TK-${row.numero}</span>`;
          } else if (row.nombreEstado == "No compete") {
            return `<span class="badge bg-secondary">TK-${row.numero}</span>`;
          } else if (row.nombreEstado == "Pendiente") {
            return `<span class="badge bg-danger">TK-${row.numero}</span>`;
          } else {
            return `<span class="badge bg-success">TK-${row.numero}</span>`;
          }
        },
      },
      { data: "fechaHora" },
      { data: "nombreComercial" },
      {
        data: "nombreProceso",
        render: function (data, type, row) {
          return `<span class="badge bg-info text-dark">${row.nombreProceso}</span>`;
        },
      },
      { data: "responsable" },
      {
        data: "estado",
        render: function (data, type, row) {
          if (row.nombreEstado == "En Proceso") {
            return `<span class="badge bg-warning text-dark">En Proceso</span>`;
          } else if (row.nombreEstado == "No compete") {
            return `<span class="badge bg-secondary">No Compete</span>`;
          } else if (row.nombreEstado == "Pendiente") {
            return `<span class="badge bg-danger">Pendiente</span>`;
          } else {
            return `<span class="badge bg-success">Realizado</span>`;
          }
        },
      },
      // OPCIONES
      {
        data: "estado",
        render: function (data, type, row) {
          if (row.nombreEstado == "Pendiente") {
            return `<button type="button" class="iniciarTicket btn btn-danger btn-sm"><i class="fas fa-play"></i></button>
            <button type="button" class="verInfo btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInfoTicket"><i class="fas fa-info-circle"></i></button>`;
          } else if (row.nombreEstado == "No compete") {
            return `<button type="button" class="verInfo btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInfoTicket"><i class="fas fa-ban"></i></button>`;
          } else if (row.nombreEstado == "En Proceso") {
            return `<button type="button" class="finalizarTicket btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modalFinalizarTicket"><i class="fas fa-stopwatch" style="font-size: 1.1rem"></i></button>
            <button type="button" class="verInfo btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInfoTicket"><i class="fas fa-info-circle"></i></button>`;
          } else {
            return `<button type="button" class="verInfo btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalInfoTicket"><i class="fas fa-info-circle"></i></button>`;
          }
        },
      },
    ],
    language: español,
  });
  // Proceso de registrar ticket (guardar en la bd)
  $("#btnRegistrarTicket").click(function () {
    formData = new FormData();
    // formData.append('file', $('#media')[0].files[0]);
    formData.append("idCliente", $("#idCliente").val());
    formData.append("mensaje", $("#mensaje").val());
    formData.append("proceso", $("#proceso").val());
    formData.append("nombreSolicita", $("#nombreSolicita").val());
    formData.append("responsable", $("#responsable").val());
    formData.append("celSolicitante", $("#celSolicitante").val());
    if ($("#proceso").val() == "6") {
      formData.append("comentario", $("#comentario").val());
    } else if ($("#proceso").val() == "4") {
      formData.append("motivoNoCompete", $("#motivoNoCompete").val());
    }
    window.$.ajax({
      type: "post",
      url: "../controllers/ticketSopController.php?method=registrarTicket",
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
        let data = JSON.parse(response);
        if (data.estado == "ok") {
          Swal.close()
          $("#modalRegistrarTicket").modal("hide");
          $("#rucDni").val("");
          $("#cliente").val("");
          $("#nombreSolicita").val("");
          $("#celSolicitante").val("");
          $("#mensaje").val("");
          $("#proceso").val("0");
          $("#comentario").val("");
          $("#motivoNoCompete").val("");
          dataTable.ajax.reload();
          Swal.fire({
            text: data.mensaje,
            icon: "success",
          });
          setTimeout(() => {
            Swal.close();
          }, 2300);
        } else {
          $('#modalLoading').modal("show");
          Swal.fire({
            text: data.mensaje,
            icon: "error",
          });
          setTimeout(() => {
            Swal.close();
          }, 2300);
        }
      },
    });
  });
  // Modal Ver informacion con datos correspondientes
  $("#ticketSopTable tbody").on("click", ".verInfo", function () {
    let data = dataTable.row($(this).parents()).data();
    let contenido = "";
    $("#nroTicket").text(`TICKET N° ${data.numero}`);
    $("#rucDniInfo").val(data.nroDocumento);
    $("#clienteInfo").val(data.nombreCliente);
    $("#nombreSolicitaInfo").val(data.nombreSolicita);
    $("#celSolicitanteInfo").val(data.numSolicita);
    $("#mensajeInfo").val(data.descripcion);
    $("#procesoInfo").val(data.nombreProceso);
    $("#nombreContactoInfo").val(data.nombreContacto);
    $("#celContactoInfo").val(data.nroContacto);
    let numTicketAtendiendo = `En estos momentos estamos atendiendo el <b>*Ticket N° ${data.lastNum}*</b>`;
    if (data.lastNum == null) {
      numTicketAtendiendo = `*Vamos a realizar las verificaciones en estos momentos*`;
    }
    if (data.nombreEstado == "Pendiente") {
      contenido = `Buenos días, le saluda <b>*${data.responsable}*</b> del área de soporte Sigefac, se le generó el <b>*Ticket N° ${data.numero}*</b>, incidencia: "<b>*${data.descripcion}*</b>" para su empresa <b>*${data.nombreComercial}*</b>. ${numTicketAtendiendo}`;
    } else if (data.nombreEstado == "En Proceso") {
      contenido = `Buenos días, le saluda <b>*${data.responsable}*</b> del área de soporte Sigefac. En estos momentos estamos atendiento su ticket. Por favor estar atento a su WhatsApp. !Gracias¡`;
    } else {
      contenido = `Buenos días, le saluda <b>*${data.responsable}*</b> del área de soporte Sigefac. Le informo que su problema ya ha sido solucionado. Si tiene algún otro inconveniente no dude en escribirnos. !Gracias!`;
    }
    $("#msjForCliente").html(contenido);
    if (data.comentario != "" || data.comentario.length != 0) {
      $("#divComentarioInfo").css("display", "block");
      $("#comentarioInfo").val(data.comentario);
    } else {
      $("#divComentarioInfo").css("display", "none");
    }
    if (data.motivoNoCompete != "" || data.motivoNoCompete.length != 0) {
      $("#divNoCompeteMotivoInfo").css("display", "block");
      $("#motivoNoCompeteInfo").val(data.motivoNoCompete);
    } else {
      $("#divNoCompeteMotivoInfo").css("display", "none");
    }
    if (data.msjFinalizado != null) {
      $("#divMsjFInal").css("display", "block");
      $("#msjFinalizado").val(data.msjFinalizado);
    } else {
      $("#divMsjFInal").css("display", "none");
    }
  });
  // Proceso de iniciar ticket
  $("#ticketSopTable tbody").on("click", ".iniciarTicket", function () {
    var data = dataTable.row($(this).parents()).data();
    formData = new FormData();
    formData.append("idTicket", data.idTicket);
    window.$.ajax({
      type: "post",
      url: "../controllers/ticketSopController.php?method=iniciarTicket",
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
        let data = JSON.parse(response);
        if (data.estado == "ok") {
          Swal.close()
          Swal.fire({
            position: "center",
            icon: "success",
            title: `Ticket N° ${data.idTicket} iniciado`,
            showConfirmButton: false,
            timer: 1200,
          });
          dataTable.ajax.reload();
        } else {
          $('#modalLoading').modal("show");
          Swal.fire({
            position: "center",
            icon: "error",
            title: `Ups! Hay algun problema`,
            showConfirmButton: false,
            timer: 1200,
          });
        }
      },
    });
  });
  // Modal finalizar ticket con datos
  $("#ticketSopTable tbody").on("click", ".finalizarTicket", function () {
    let data = dataTable.row($(this).parents()).data();
    $("#idTicketFin").val(data.idTicket);
  });
  // Proceso de finalizar ticket
  $("#finTicket").click(function () {
    var data = dataTable.row($(this).parents()).data();
    formData = new FormData();
    formData.append("idTicket", $("#idTicketFin").val());
    formData.append("msjFinalizado", $("#msjFinalizado2").val());
    window.$.ajax({
      type: "post",
      url: "../controllers/ticketSopController.php?method=finalizarTicket",
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
          $("#modalFinalizarTicket").modal("hide");
          Swal.fire({
            position: "center",
            icon: "success",
            title: `Ticket N° ${data.idTicket} finalizado`,
            showConfirmButton: false,
            timer: 1200,
          });
          dataTable.ajax.reload();
        } else {
          $('#modalLoading').modal("show");
          Swal.fire({
            position: "center",
            icon: "error",
            title: `Ups! Hay algun problema`,
            showConfirmButton: false,
            timer: 1200,
          });
        }
      },
    });
  });
});

// Limpiar inputs de modal de agregar
setInterval(() => {
  if (!$("#modalRegistrarTicket").hasClass("show")) {
    $("#rucDni").val("");
    $("#cliente").val("");
    $("#nombreSolicita").val("");
    $("#celSolicitante").val("");
    $("#mensaje").val("");
    $("#proceso").val("0");
    $("#divComentario").css("display", "none");
    $("#comentario").val("");
    $("#divNoCompeteMotivo").css("display", "none");
    $("#motivoNoCompete").val("");
    $("#responsable").val("0");
  }
}, 500);
