// ############# METODOS METODOS #############
function validarDatos(datos) {
  respuesta = {};
  datos.forEach((dato) => {
    if (dato.value == "" || dato.value == "0") {
      respuesta[dato.name] = `El campo ${dato.name} es obligatorio`;
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

// #################### INICIO DE  GUARDAR CLIENTE ############################
// Abrir modal de guardar usuario y validar los campos con datos
$("#btnAbrirModalGuardarCliente").click(() => {
  let nroDocumento = document.getElementById("nroDocumento");
  let nombreCliente = document.getElementById("nombreCliente");
  let celuCliente = document.getElementById("celuCliente");
  let idDepartamento = document.getElementById("idDepartamento");
  let idProvincia = document.getElementById("idProvincia");
  let idDistrito = document.getElementById("idDistrito");
  let direcCliente = document.getElementById("direcCliente");
  let nombreContactoProv = document.getElementById("nombreContactoProv");
  let telfContactoProv = document.getElementById("telfContactoProv");
  datosArray = [
    nroDocumento, nombreCliente, celuCliente, idDepartamento, idProvincia, idDistrito, direcCliente, nombreContactoProv, telfContactoProv
  ];
  setInterval(() => {
    let respuesta = validarDatos(datosArray);
    if (Object.keys(respuesta).length == 0) {
      $("#btnGuardarCliente").prop("disabled", false);
    } else {
      $("#btnGuardarCliente").prop("disabled", true);
    }
  }, 200);
});
// Traer lista de deparmentos para formulario guardar
$("#btnAbrirModalGuardarCliente").click(() => {
  window.$.ajax({
    type: "GET",
    url: "ClientesController.php?method=listarDeparmentos",
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
      let selectDepa = document.getElementById("idDepartamento");
      contenido = "<option value='0'>Departamentos</option>";
      data.forEach((depa) => {
        contenido += `<option value=${depa.idDepartamento}>${depa.nombreDepa}</option>`;
      });
      selectDepa.innerHTML = contenido;
    },
  });
})
// Traer lista de provincias para formulario guardar
$("#idDepartamento").change(function () {
  let formData = new FormData();
  formData.append("idDep", $("#idDepartamento").val());
  window.$.ajax({
    type: "post",
    url: "ClientesController.php?method=listarProvincias",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (response) {
      $('#idProvincia').prop('disabled', false)
      let data = JSON.parse(response);
      contenido = "<option value='0'>Provincias</option>";
      data.forEach((prov) => {
        contenido += `<option value=${prov.idProvincia}>${prov.nombreProvincia}</option>`;
      });
      $('#idProvincia').html(contenido);
      $('#idDistrito').prop('disabled', true)
    },
  });
})
// Traer lista de distritos para formulario guardar
$("#idProvincia").change(function () {
  let formData = new FormData();
  formData.append("idProv", $("#idProvincia").val());
  formData.append("idDep", $("#idDepartamento").val());
  window.$.ajax({
    type: "post",
    url: "ClientesController.php?method=listarDistritos",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (response) {
      $('#idDistrito').prop('disabled', false)
      let data = JSON.parse(response);
      contenido = "<option value='0'>Distritos</option>";
      data.forEach((prov) => {
        contenido += `<option value=${prov.idDistrito}>${prov.nombreDistrito}</option>`;
      });
      $('#idDistrito').html(contenido);
    },
  });
});

// Buscar cliente por DNI para formulario guardar
let inputDocumento = document.getElementById('nroDocumento');
inputDocumento.addEventListener("keyup", function () {
  nroDoc = inputDocumento.value;
  cantNroDoc = (inputDocumento.value).length
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
          $('#nombreCliente').attr('disabled', false)
        } else {
          $('#nombreCliente').attr('disabled', true)
          $('#direcCliente').attr('disabled', false)
          let nombreCompleto = `${datos.nombres} ${datos.apellidoPaterno} ${datos.apellidoMaterno}`
          $('#nombreCliente').val(nombreCompleto);
        }
      },
    });
  }
  if (cantNroDoc == 11) {
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
        $('#divNombreComercial').css("display", "block");
        let nombreCompleto = `${datos.razonSocial}`
        $('#nombreCliente').val(nombreCompleto);
        $('#direcCliente').attr('disabled', true)
        $('#direcCliente').val(datos.direccion);
      },
    });
  }
  if (cantNroDoc != 8 || cantNroDoc != 11) {
    $('#nombreCliente').attr('disabled', true)
    $('#nombreCliente').val("");
    $('#direcCliente').val("");
    $('#divNombreComercial').css("display", "none");
    $('#nombreComercial').val("");
  }
})
// Proceso de guardar Cliente
$("#btnGuardarCliente").click(function (e) {
  let nroDocumento = document.getElementById("nroDocumento");
  let tipoDoc;
  if ((nroDocumento.value).length == 8) {
    tipoDoc = 1;
  } else {
    tipoDoc = 2;
  }
  let nombreCliente = document.getElementById("nombreCliente");
  let nombreComercial = document.getElementById("nombreComercial");
  let celuCliente = document.getElementById("celuCliente");
  let emailCliente = document.getElementById("emailCliente");
  let telfCliente = document.getElementById("telfCliente");
  let idDepartamento = document.getElementById("idDepartamento");
  let idProvincia = document.getElementById("idProvincia");
  let idDistrito = document.getElementById("idDistrito");
  let direcCliente = document.getElementById("direcCliente");
  let nombreContactoProv = document.getElementById("nombreContactoProv");
  let telfContactoProv = document.getElementById("telfContactoProv");
  let emailContactoProv = document.getElementById("emailContactoProv");
  let formData = new FormData();
  formData.append("nroDocumento", nroDocumento.value);
  formData.append("tipoDoc", tipoDoc);
  formData.append("nombreCliente", nombreCliente.value);
  formData.append("nombreComercial", nombreComercial.value);
  formData.append("celuCliente", celuCliente.value);
  formData.append("emailCliente", emailCliente.value);
  formData.append("telfCliente", telfCliente.value);
  formData.append("idDepartamento", idDepartamento.value);
  formData.append("idProvincia", idProvincia.value);
  formData.append("idDistrito", idDistrito.value);
  formData.append("direcCliente", direcCliente.value);
  formData.append("nombreContactoProv", nombreContactoProv.value);
  formData.append("telfContactoProv", telfContactoProv.value);
  formData.append("emailContactoProv", emailContactoProv.value);
  window.$.ajax({
    type: "post",
    url: "ClientesController.php?method=guardarCliente",
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
        $("#modalAgregarCliente").modal("hide");
        Swal.fire({
          text: data.mensaje,
          icon: "success",
        });
        setTimeout(() => {
          Swal.close();
          window.location.href = '/controllers/ContratosController.php?method=contratos';
        }, 750);
      } else {
        Swal.fire({
          text: data.mensaje,
          icon: "error",
        });
        setTimeout(() => {
          Swal.close();
        }, 2000);
      }
    },
  });
});
// ##################### FIN DE GUARDAR CLIENTE ##############################

// Traer lista de servicios en el select
$("#clientes").change(function () {
  window.$.ajax({
    type: "post",
    url: "../controllers/ServiciosController.php?method=listarServicios",
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
      let servicios = data.data;
      contenido = "<option selected value='0'>Seleccione Servicio</option>";
      servicios.forEach(serv => {
        contenido += `<option value=${serv.idServicio} data-precio="${serv.precio}">${serv.nombreServicio} -> S/. ${serv.precio}</option>`;
      });
      $('#servicios').html(contenido);
      $('#servicios').attr('disabled', false);
    }
  });
});
// Validar cant de meses
$('#meses').focusout(function () {
  if ($('#meses').val() < 3 || $('#meses').val() > 12) {
    $('#meses').val('')
  }
})
// Validar dias de pagos disponibles
$('#diasPago').focusout(function () {
  if ($('#diasPago').val() < 1 || $('#diasPago').val() > 31) {
    $('#diasPago').val('')
  }
})
// Validar dias de plazo a pagar disponibles
$('#plazoPagar').focusout(function () {
  if (((Number($('#diasPago').val()) + Number($('#plazoPagar').val()))) > 28) {
    $('#plazoPagar').val('0')
  }
})
// Validar que todos los campos de Realizar COntrato esten completos
setInterval(() => {
  idCliente = $("#clientes").val();
  idServicios = $("#servicios").val();
  meses = $("#meses").val();
  fechaInicio = $("#fechaInicio").val();
  tipoAfectacion = $("#tipoAfectacion").val();
  idDepartamentoContrato = $("#idDepartamentoContrato").val();
  idProvinciaContrato = $("#idProvinciaContrato").val();
  idDistritoContrato = $("#idDistritoContrato").val();
  if (idCliente.length != 0 && idServicios.length != 0 && meses.length != 0 && fechaInicio.length != 0 && (tipoAfectacion != '0' ) && idDepartamentoContrato != '0' && idProvinciaContrato != '0' && idDistritoContrato != '0') {
    $('#btnGenerarContrato').attr('disabled', false)
  } else {
    $('#btnGenerarContrato').attr('disabled', true)
  }
}, 200);
// Agregar buscados al select y listar los clientes en el select
$(document).ready(function () {
  $('#clientes').select2();
  $('#servicios').select2();
  window.$.ajax({
    type: "post",
    url: "../controllers/ClientesController.php?method=listarClientes",
    success: function (response) {
      let data = JSON.parse(response);
      let arrayClientes = data.data;
      contenido = "<option selected value='0'>Seleccione Cliente</option>";
      arrayClientes.forEach(prov => {
        contenido += `<option value=${prov.idCliente}>${prov.nombreComercial}</option>`;
      });
      $('#clientes').html(contenido);
    }
  });
});
// Listar departamentos para el formulario de contrato
$(document).ready(function () {
  window.$.ajax({
    type: "post",
    url: "../controllers/ClientesController.php?method=listarDeparmentos",
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
      let selectDepa = document.getElementById("idDepartamentoContrato");
      contenido = "<option value='0'>Departamentos</option>";
      data.forEach((depa) => {
        contenido += `<option value=${depa.idDepartamento}>${depa.nombreDepa}</option>`;
      });
      selectDepa.innerHTML = contenido;
    }
  });
});
// Traer lista de provincias para formulario de contrato
$("#idDepartamentoContrato").change(function () {
  let formData = new FormData();
  formData.append("idDep", $("#idDepartamentoContrato").val());
  window.$.ajax({
    type: "post",
    url: "ClientesController.php?method=listarProvincias",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (response) {
      $('#idProvinciaContrato').prop('disabled', false)
      let data = JSON.parse(response);
      contenido = "<option value='0'>Provincias</option>";
      data.forEach((prov) => {
        contenido += `<option value=${prov.idProvincia}>${prov.nombreProvincia}</option>`;
      });
      $('#idProvinciaContrato').html(contenido);
      $('#idDistritoContrato').prop('disabled', true)
    },
  });
})
// Traer lista de distritos para formulario de contrato
$("#idProvinciaContrato").change(function () {
  let formData = new FormData();
  formData.append("idProv", $("#idProvinciaContrato").val());
  formData.append("idDep", $("#idDepartamentoContrato").val());
  window.$.ajax({
    type: "post",
    url: "ClientesController.php?method=listarDistritos",
    data: formData,
    cache: false,
    processData: false,
    contentType: false,
    success: function (response) {
      $('#idDistritoContrato').prop('disabled', false)
      let data = JSON.parse(response);
      contenido = "<option value='0'>Distritos</option>";
      data.forEach((prov) => {
        contenido += `<option value=${prov.idDistrito}>${prov.nombreDistrito}</option>`;
      });
      $('#idDistritoContrato').html(contenido);
    },
  });
});
// Listar tipos de afectaciones para el formulario de contrato
$(document).ready(function () {
  window.$.ajax({
    type: "post",
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
    url: "../controllers/ContratosController.php?method=listarTipoAfectacion",
    success: function (response) {
      setTimeout(() => {
        Swal.close()
      }, 2000);
      let data = JSON.parse(response);
      contenido = "<option value='0'>Tipo Afectacion</option>";
      data.forEach((depa) => {
        contenido += `<option value=${depa.idafectacionigv}>${depa.descripcion}</option>`;
      });
      $('#tipoAfectacion').html(contenido);
    }
  });
});
// #################################################################################

// Proceso de generar contrato (guardar en la bd)
$('#btnGenerarContrato').click(function () {
  var selected = $('#servicios').find('option:selected');
  var extra = selected.data('precio');
  formData = new FormData();
  formData.append('idCliente', $("#clientes").val());
  formData.append('idServicios', $("#servicios").val());
  formData.append('precioServicio', extra);
  formData.append('meses', $("#meses").val());
  formData.append('fechaInicio', $("#fechaInicio").val());
  //formData.append('diasPago', $("#diasPago").val());
  //formData.append('plazoPagar', $("#plazoPagar").val());
  formData.append('tipoAfectacion', $("#tipoAfectacion").val());
  formData.append('idDepartamentoContrato', $("#idDepartamentoContrato").val());
  formData.append('idProvinciaContrato', $("#idProvinciaContrato").val());
  formData.append('idDistritoContrato', $("#idDistritoContrato").val());
  window.$.ajax({
    type: "post",
    url: "../controllers/ContratosController.php?method=generarContrato",
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
        }
      })
    },
    success: function (response) {
      setTimeout(() => {
        Swal.close()
      }, 2000);
      let data = JSON.parse(response);
      if (data.estado == "ok") {
        $("#clientes").val('0')
        $('#clientes').change();
        $("#servicios").val('0')
        $("#plazoPagar").val('')
        $("#tipoAfectacion").val('0')
        $("#idDepartamentoContrato").val('0').attr('selected', true)
        $('#idDepartamentoContrato').change();
        $("#idProvinciaContrato").val('0')
        $("#idDistritoContrato").val('0')
        $("#meses").val('')
        $("#fechaInicio").val('')
        $("#diasPago").val('')
        Swal.fire({
          text: data.mensaje,
          icon: "success",
        });
        setTimeout(() => {
          Swal.close();
        }, 1500);
      } else {
        Swal.fire({
          text: data.mensaje,
          icon: "error",
        });
        setTimeout(() => {
          Swal.close();
        }, 2000);
      }
    }
  });
})
// Limpiar inputs de modal de agregar
setInterval(() => {
  if (!($("#modalAgregarCliente").hasClass("show"))) {
    $("#nroDocumento").val('')
    $("#nombreCliente").val('')
    $("#celuCliente").val('')
    $("#emailCliente").val('')
    $("#telfCliente").val('')
    $("#idDepartamento").val('0')
    $("#idProvincia").val('0')
    $("#idDistrito").val('0')
    $("#direcCliente").val('')
    $("#nombreContactoProv").val('')
    $("#telfContactoProv").val('')
    $("#emailContactoProv").val('')
  }
}, 500);