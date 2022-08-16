// ############# AGREGAR SELECTED ###################
$(document).ready(function () {
  window.$.ajax({
    type: "post",
    url: "../controllers/UsuarioController.php?method=obtenerRol",
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
      Swal.close();
      let data = JSON.parse(response);
      if(data.rol == 'VENDEDOR' || data.rol == 'CAJERO'){
        let var_date = new Date();
        hora = Number (var_date.getHours());
        if(hora < 15){
          Swal.fire({
            title: '¡A tiempo!',
            text: 'No te olvides que tienes acceso hasta las 3:00pm para subir tus datos',
            imageUrl: 'https://unsplash.it/400/200',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
            cancelButtonColor: '#3085d6',
          })
        }else{
          Swal.fire({
            allowOutsideClick: false,
            title: '¡DEMASIADO TARDE!',
            text: 'No te olvides que tienes acceso hasta las 3:00pm para subir tus datos',
            imageUrl: 'https://unsplash.it/400/200',
            imageWidth: 400,
            imageHeight: 200,
            imageAlt: 'Custom image',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Entiendo'
          }).then((result) => {
            if (result.isConfirmed) {
              location.href = "../views/home.php";
            }
          })
        }


      }
    }
  });
  $('#clientes').select2();
  cargarClientes();
});
// ############# METODOS METODOS #############
function validarInputSoloNumeros(evt) {
  let code = (evt.which) ? evt.which : evt.keyCode;
  if (code == 8) { // backspace.
    return true;
  } else if (code >= 48 && code <= 57) { // is a number.
    return true;
  } else { // other keys.
    return false;
  }
}
function cargarClientes() {
  window.$.ajax({
    type: "post",
    url: "../controllers/ClientesController.php?method=listarClientes",
    success: function (response) {
      let data = JSON.parse(response);
      let arrayClientes = data.data;
      contenido = "<option selected value='0'>Seleccione Cliente</option>";
      arrayClientes.forEach(prov => {
        contenido += `<option value=${prov.idCliente}>${prov.nombreCliente}</option>`;
      });
      $('#clientes').html(contenido);
    }
  });
}
function reiniciarModalAgregarCliente() {
  $('#nroDocumento').val('')
  $('#nombreCliente').val('')
  $('#nombreComercial').val('')
  $('#celuCliente').val('')
  $('#emailCliente').val('')
  $('#telfCliente').val('')
  $('#idDepartamento').val('0')
  $('#idProvincia').val('0')
  $('#idDistrito').val('0')
  $('#direcCliente').val('')
  $('#nombreContacto').val('')
  $('#telfContacto').val('')
  $('#dniContacto').val('')
  $('#nroDocumento').removeClass('border-success')
  $('#nroDocumento').addClass('border-danger')
  $('#nombreCliente').removeClass('border-success')
  $('#nombreCliente').addClass('border-danger')
  $('#nombreComercial').removeClass('border-success')
  $('#nombreComercial').addClass('border-danger')
  $('#celuCliente').removeClass('border-success')
  $('#celuCliente').addClass('border-danger')
  $('#idDepartamento').removeClass('border-success')
  $('#idDepartamento').addClass('border-danger')
  $('#idProvincia').removeClass('border-success')
  $('#idProvincia').addClass('border-danger')
  $('#idDistrito').removeClass('border-success')
  $('#idDistrito').addClass('border-danger')
  $('#direcCliente').removeClass('border-success')
  $('#direcCliente').addClass('border-danger')
  $('#nombreContacto').removeClass('border-success')
  $('#nombreContacto').addClass('border-danger')
  $('#telfContacto').removeClass('border-success')
  $('#telfContacto').addClass('border-danger')
  $('#dniContacto').removeClass('border-success')
  $('#dniContacto').addClass('border-danger')

}
function inputsSistemaPos() {
  // Limpiar campos innecesarios
  $('#dominioFactura').val('');
  $('#dominioRestobar').val('');
  $('#persona_contacto').val('');
  $('#cel_contacto').val('');
  $('#equipo_principal').val('');
  $('#equipo_cocina').val('');
  $('#equipo_bar').val('');
  $('#total_impresoras').val('');
  $('#usuario').val('');
  $('#clave_sol').val('');
  // Limpiar marcos a datos innecesarios
  $('#dominioFactura').removeClass('border border-danger');
  $('#dominioFactura').removeClass('border border-success');
  $('#dominioRestobar').removeClass('border border-danger');
  $('#dominioRestobar').removeClass('border border-success');
  $('#persona_contacto').removeClass('border border-danger');
  $('#persona_contacto').removeClass('border border-success');
  $('#cel_contacto').removeClass('border border-danger');
  $('#cel_contacto').removeClass('border border-success');
  $('#equipo_principal').removeClass('border border-danger');
  $('#equipo_principal').removeClass('border border-success');
  $('#equipo_cocina').removeClass('border border-danger');
  $('#equipo_cocina').removeClass('border border-success');
  $('#equipo_bar').removeClass('border border-danger');
  $('#equipo_bar').removeClass('border border-success');
  $('#total_impresoras').removeClass('border border-danger');
  $('#total_impresoras').removeClass('border border-success');
  $('#usuario').removeClass('border border-danger');
  $('#usuario').removeClass('border border-success');
  $('#clave_sol').removeClass('border border-danger');
  $('#clave_sol').removeClass('border border-success');
  // Bloquear inputs innecesarios
  $('#dominioFactura').prop('disabled', true);
  $('#dominioRestobar').prop('disabled', true);
  $('#persona_contacto').prop('disabled', true);
  $('#cel_contacto').prop('disabled', true);
  $('#equipo_principal').prop('disabled', true);
  $('#equipo_cocina').prop('disabled', true);
  $('#equipo_bar').prop('disabled', true);
  $('#total_impresoras').prop('disabled', true);
  $('#usuario').prop('disabled', true);
  $('#clave_sol').prop('disabled', true);
  // habilitar los inputs necesarios
  $('#dominioPos').prop('disabled', false);
  $('#cliente').prop('disabled', false);
  $('#dni').prop('disabled', false);
  $('#razonSocial').prop('disabled', false);
  $('#name_comercial').prop('disabled', false);
  $('#ruc').prop('disabled', false);
  $('#direc_fiscal').prop('disabled', false);
  $('#serie_compro').prop('disabled', false);
  $('#tipo_negocio').prop('disabled', false);
  $('#celular').prop('disabled', false);
  $('#telefono').prop('disabled', false);
  $('#especificacion').prop('disabled', false);
  $('#observacion').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#correo').prop('disabled', false);
  // Agregar marco rojo // amarillo
  if (($('#dominioPos').val()).length < 5) {
    $('#dominioPos').removeClass('border border-success');
    $('#dominioPos').addClass('border border-danger');
  } else {
    $('#dominioPos').removeClass('border border-danger');
    $('#dominioPos').addClass('border border-success');
  }
  if (($('#cliente').val()).length < 5) {
    $('#cliente').removeClass('border border-success');
    $('#cliente').addClass('border border-danger');
  } else {
    $('#cliente').removeClass('border border-danger');
    $('#cliente').addClass('border border-success');
  }
  if (($('#dni').val()).length < 5) {
    $('#dni').removeClass('border border-success');
    $('#dni').addClass('border border-danger');
  } else {
    $('#dni').removeClass('border border-danger');
    $('#dni').addClass('border border-success');
  }
  if (($('#razonSocial').val()).length < 5) {
    $('#razonSocial').removeClass('border border-success');
    $('#razonSocial').addClass('border border-danger');
  } else {
    $('#razonSocial').removeClass('border border-danger');
    $('#razonSocial').addClass('border border-success');
  }
  if (($('#name_comercial').val()).length < 5) {
    $('#name_comercial').removeClass('border border-success');
    $('#name_comercial').addClass('border border-danger');
  } else {
    $('#name_comercial').removeClass('border border-danger');
    $('#name_comercial').addClass('border border-success');
  }
  if (($('#ruc').val()).length < 5) {
    $('#ruc').removeClass('border border-success');
    $('#ruc').addClass('border border-danger');
  } else {
    $('#ruc').removeClass('border border-danger');
    $('#ruc').addClass('border border-success');
  }
  if (($('#direc_fiscal').val()).length < 5) {
    $('#direc_fiscal').removeClass('border border-success');
    $('#direc_fiscal').addClass('border border-danger');
  } else {
    $('#direc_fiscal').removeClass('border border-danger');
    $('#direc_fiscal').addClass('border border-success');
  }
  if (($('#serie_compro').val()).length < 5) {
    $('#serie_compro').removeClass('border border-success');
    $('#serie_compro').addClass('border border-danger');
  } else {
    $('#serie_compro').removeClass('border border-danger');
    $('#serie_compro').addClass('border border-success');
  }
  if (($('#tipo_negocio').val()).length < 4) {
    $('#tipo_negocio').removeClass('border border-success');
    $('#tipo_negocio').addClass('border border-danger');
  } else {
    $('#tipo_negocio').removeClass('border border-danger');
    $('#tipo_negocio').addClass('border border-success');
  }
  if (($('#celular').val()).length < 5) {
    $('#celular').removeClass('border border-success');
    $('#celular').addClass('border border-warning');
  } else {
    $('#celular').removeClass('border border-warning');
    $('#celular').addClass('border border-success');
  }
  if (($('#telefono').val()).length < 5) {
    $('#telefono').removeClass('border border-success');
    $('#telefono').addClass('border border-warning');
  } else {
    $('#telefono').removeClass('border border-warning');
    $('#telefono').addClass('border border-success');
  }
  if (($('#correo').val()).length < 5) {
    $('#correo').removeClass('border border-success');
    $('#correo').addClass('border border-warning');
  } else {
    $('#correo').removeClass('border border-warning');
    $('#correo').addClass('border border-success');
  }
  if (($('#especificacion').val()).length < 5) {
    $('#especificacion').removeClass('border border-success');
    $('#especificacion').addClass('border border-danger');
  } else {
    $('#especificacion').removeClass('border border-danger');
    $('#especificacion').addClass('border border-success');
  }
  if (($('#observacion').val()).length < 5) {
    $('#observacion').removeClass('border border-success');
    $('#observacion').addClass('border border-danger');
  } else {
    $('#observacion').removeClass('border border-danger');
    $('#observacion').addClass('border border-success');
  }
  if (($('#logo').val()).length < 5) {
    $('#logo').removeClass('border border-success');
    $('#logo').addClass('border border-danger');
  } else {
    $('#logo').removeClass('border border-danger');
    $('#logo').addClass('border border-success');
  }
}
function inputsSistemaFacturador() {
  // Limpiar campos innecesarios
  $('#dominioPos').val('');
  $('#dominioRestobar').val('');
  $('#persona_contacto').val('');
  $('#cel_contacto').val('');
  $('#equipo_principal').val('');
  $('#equipo_cocina').val('');
  $('#equipo_bar').val('');
  $('#total_impresoras').val('');
  // Limpiar marcos a datos innecesarios
  $('#dominioPos').removeClass('border border-danger');
  $('#dominioPos').removeClass('border border-success');
  $('#dominioRestobar').removeClass('border border-danger');
  $('#dominioRestobar').removeClass('border border-success');
  $('#persona_contacto').removeClass('border border-danger');
  $('#persona_contacto').removeClass('border border-success');
  $('#cel_contacto').removeClass('border border-danger');
  $('#cel_contacto').removeClass('border border-success');
  $('#equipo_principal').removeClass('border border-danger');
  $('#equipo_principal').removeClass('border border-success');
  $('#equipo_cocina').removeClass('border border-danger');
  $('#equipo_cocina').removeClass('border border-success');
  $('#equipo_bar').removeClass('border border-danger');
  $('#equipo_bar').removeClass('border border-success');
  $('#total_impresoras').removeClass('border border-danger');
  $('#total_impresoras').removeClass('border border-success');
  $('#usuario').removeClass('border border-danger');
  $('#usuario').removeClass('border border-success');
  $('#clave_sol').removeClass('border border-danger');
  $('#clave_sol').removeClass('border border-success');
  // Bloquear inputs innecesarios
  $('#dominioPos').prop('disabled', true);
  $('#dominioRestobar').prop('disabled', true);
  $('#persona_contacto').prop('disabled', true);
  $('#cel_contacto').prop('disabled', true);
  $('#equipo_principal').prop('disabled', true);
  $('#equipo_cocina').prop('disabled', true);
  $('#equipo_bar').prop('disabled', true);
  $('#total_impresoras').prop('disabled', true);
  // habilitar los inputs necesarios
  $('#dominioFactura').prop('disabled', false);
  $('#cliente').prop('disabled', false);
  $('#dni').prop('disabled', false);
  $('#razonSocial').prop('disabled', false);
  $('#name_comercial').prop('disabled', false);
  $('#ruc').prop('disabled', false);
  $('#direc_fiscal').prop('disabled', false);
  $('#serie_compro').prop('disabled', false);
  $('#tipo_negocio').prop('disabled', false);
  $('#celular').prop('disabled', false);
  $('#telefono').prop('disabled', false);
  $('#especificacion').prop('disabled', false);
  $('#observacion').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#correo').prop('disabled', false);
  $('#usuario').prop('disabled', false);
  $('#clave_sol').prop('disabled', false);
  // Agregar marco rojo
  if (($('#dominioFactura').val()).length < 5) {
    $('#dominioFactura').removeClass('border border-success');
    $('#dominioFactura').addClass('border border-danger');
  } else {
    $('#dominioFactura').removeClass('border border-danger');
    $('#dominioFactura').addClass('border border-success');
  }
  if (($('#cliente').val()).length < 5) {
    $('#cliente').removeClass('border border-success');
    $('#cliente').addClass('border border-danger');
  } else {
    $('#cliente').removeClass('border border-danger');
    $('#cliente').addClass('border border-success');
  }
  if (($('#dni').val()).length < 5) {
    $('#dni').removeClass('border border-success');
    $('#dni').addClass('border border-danger');
  } else {
    $('#dni').removeClass('border border-danger');
    $('#dni').addClass('border border-success');
  }
  if (($('#razonSocial').val()).length < 5) {
    $('#razonSocial').removeClass('border border-success');
    $('#razonSocial').addClass('border border-danger');
  } else {
    $('#razonSocial').removeClass('border border-danger');
    $('#razonSocial').addClass('border border-success');
  }
  if (($('#name_comercial').val()).length < 5) {
    $('#name_comercial').removeClass('border border-success');
    $('#name_comercial').addClass('border border-danger');
  } else {
    $('#name_comercial').removeClass('border border-danger');
    $('#name_comercial').addClass('border border-success');
  }
  if (($('#ruc').val()).length < 5) {
    $('#ruc').removeClass('border border-success');
    $('#ruc').addClass('border border-danger');
  } else {
    $('#ruc').removeClass('border border-danger');
    $('#ruc').addClass('border border-success');
  }
  if (($('#direc_fiscal').val()).length < 5) {
    $('#direc_fiscal').removeClass('border border-success');
    $('#direc_fiscal').addClass('border border-danger');
  } else {
    $('#direc_fiscal').removeClass('border border-danger');
    $('#direc_fiscal').addClass('border border-success');
  }
  if (($('#serie_compro').val()).length < 5) {
    $('#serie_compro').removeClass('border border-success');
    $('#serie_compro').addClass('border border-danger');
  } else {
    $('#serie_compro').removeClass('border border-danger');
    $('#serie_compro').addClass('border border-success');
  }
  if (($('#tipo_negocio').val()).length < 5) {
    $('#tipo_negocio').removeClass('border border-success');
    $('#tipo_negocio').addClass('border border-danger');
  } else {
    $('#tipo_negocio').removeClass('border border-danger');
    $('#tipo_negocio').addClass('border border-success');
  }
  if (($('#celular').val()).length < 5) {
    $('#celular').removeClass('border border-success');
    $('#celular').addClass('border border-warning');
  } else {
    $('#celular').removeClass('border border-warning');
    $('#celular').addClass('border border-success');
  }
  if (($('#telefono').val()).length < 5) {
    $('#telefono').removeClass('border border-success');
    $('#telefono').addClass('border border-warning');
  } else {
    $('#telefono').removeClass('border border-warning');
    $('#telefono').addClass('border border-success');
  }
  if (($('#especificacion').val()).length < 5) {
    $('#especificacion').removeClass('border border-success');
    $('#especificacion').addClass('border border-danger');
  } else {
    $('#especificacion').removeClass('border border-danger');
    $('#especificacion').addClass('border border-success');
  }
  if (($('#observacion').val()).length < 5) {
    $('#observacion').removeClass('border border-success');
    $('#observacion').addClass('border border-danger');
  } else {
    $('#observacion').removeClass('border border-danger');
    $('#observacion').addClass('border border-success');
  }
  if (($('#logo').val()).length < 5) {
    $('#logo').removeClass('border border-success');
    $('#logo').addClass('border border-danger');
  } else {
    $('#logo').removeClass('border border-danger');
    $('#logo').addClass('border border-success');
  }
  if (($('#correo').val()).length < 5) {
    $('#correo').removeClass('border border-success');
    $('#correo').addClass('border border-warning');
  } else {
    $('#correo').removeClass('border border-warning');
    $('#correo').addClass('border border-success');
  }
  if (($('#usuario').val()).length < 5) {
    $('#usuario').removeClass('border border-success');
    $('#usuario').addClass('border border-danger');
  } else {
    $('#usuario').removeClass('border border-danger');
    $('#usuario').addClass('border border-success');
  }
  if (($('#clave_sol').val()).length < 5) {
    $('#clave_sol').removeClass('border border-success');
    $('#clave_sol').addClass('border border-danger');
  } else {
    $('#clave_sol').removeClass('border border-danger');
    $('#clave_sol').addClass('border border-success');
  }
}
function inputsSistemaRestobar() {
  // Limpiar campos innecesarios
  $('#dominioFactura').val('');
  $('#dominioRestobar').val('');
  $('#dominioPos').val('');
  $('#usuario').val('');
  $('#clave_sol').val('');
  $('#ctd').val('');
  // Limpiar marcos a datos innecesarios
  $('#dominioRestobar').removeClass('border border-danger');
  $('#dominioRestobar').removeClass('border border-success');
  $('#dominioFactura').removeClass('border border-danger');
  $('#dominioFactura').removeClass('border border-success');
  $('#dominioPos').removeClass('border border-danger');
  $('#dominioPos').removeClass('border border-success');
  $('#usuario').removeClass('border border-danger');
  $('#usuario').removeClass('border border-success');
  $('#clave_sol').removeClass('border border-danger');
  $('#clave_sol').removeClass('border border-success');
  // Bloquear inputs innecesarios
  $('#dominioPos').prop('disabled', true);
  $('#dominioFactura').prop('disabled', true);
  $('#dominioRestobar').prop('disabled', true);
  $('#usuario').prop('disabled', true);
  $('#clave_sol').prop('disabled', true);
  // habilitar los inputs necesarios
  $('#cliente').prop('disabled', false);
  $('#dni').prop('disabled', false);
  $('#razonSocial').prop('disabled', false);
  $('#name_comercial').prop('disabled', false);
  $('#ruc').prop('disabled', false);
  $('#direc_fiscal').prop('disabled', false);
  $('#serie_compro').prop('disabled', false);
  $('#tipo_negocio').prop('disabled', false);
  $('#celular').prop('disabled', false);
  $('#telefono').prop('disabled', false);
  $('#especificacion').prop('disabled', false);
  $('#observacion').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#persona_contacto').prop('disabled', false);
  $('#cel_contacto').prop('disabled', false);
  $('#equipo_principal').prop('disabled', false);
  $('#equipo_cocina').prop('disabled', false);
  $('#equipo_bar').prop('disabled', false);
  $('#total_impresoras').prop('disabled', false);
  $('#correo').prop('disabled', false);
  // Agregar marco rojo // amarillo
  if (($('#cliente').val()).length < 5) {
    $('#cliente').removeClass('border border-success');
    $('#cliente').addClass('border border-danger');
  } else {
    $('#cliente').removeClass('border border-danger');
    $('#cliente').addClass('border border-success');
  }
  if (($('#dni').val()).length < 5) {
    $('#dni').removeClass('border border-success');
    $('#dni').addClass('border border-danger');
  } else {
    $('#dni').removeClass('border border-danger');
    $('#dni').addClass('border border-success');
  }
  if (($('#razonSocial').val()).length < 5) {
    $('#razonSocial').removeClass('border border-success');
    $('#razonSocial').addClass('border border-danger');
  } else {
    $('#razonSocial').removeClass('border border-danger');
    $('#razonSocial').addClass('border border-success');
  }
  if (($('#name_comercial').val()).length < 5) {
    $('#name_comercial').removeClass('border border-success');
    $('#name_comercial').addClass('border border-danger');
  } else {
    $('#name_comercial').removeClass('border border-danger');
    $('#name_comercial').addClass('border border-success');
  }
  if (($('#ruc').val()).length < 5) {
    $('#ruc').removeClass('border border-success');
    $('#ruc').addClass('border border-danger');
  } else {
    $('#ruc').removeClass('border border-danger');
    $('#ruc').addClass('border border-success');
  }
  if (($('#direc_fiscal').val()).length < 5) {
    $('#direc_fiscal').removeClass('border border-success');
    $('#direc_fiscal').addClass('border border-danger');
  } else {
    $('#direc_fiscal').removeClass('border border-danger');
    $('#direc_fiscal').addClass('border border-success');
  }
  if (($('#serie_compro').val()).length < 5) {
    $('#serie_compro').removeClass('border border-success');
    $('#serie_compro').addClass('border border-danger');
  } else {
    $('#serie_compro').removeClass('border border-danger');
    $('#serie_compro').addClass('border border-success');
  }
  if (($('#tipo_negocio').val()).length < 5) {
    $('#tipo_negocio').removeClass('border border-success');
    $('#tipo_negocio').addClass('border border-danger');
  } else {
    $('#tipo_negocio').removeClass('border border-danger');
    $('#tipo_negocio').addClass('border border-success');
  }
  if (($('#celular').val()).length < 5) {
    $('#celular').removeClass('border border-success');
    $('#celular').addClass('border border-warning');
  } else {
    $('#celular').removeClass('border border-warning');
    $('#celular').addClass('border border-success');
  }
  if (($('#telefono').val()).length < 5) {
    $('#telefono').removeClass('border border-success');
    $('#telefono').addClass('border border-warning');
  } else {
    $('#telefono').removeClass('border border-warning');
    $('#telefono').addClass('border border-success');
  }
  if (($('#correo').val()).length < 5) {
    $('#correo').removeClass('border border-success');
    $('#correo').addClass('border border-warning');
  } else {
    $('#correo').removeClass('border border-warning');
    $('#correo').addClass('border border-success');
  }
  if (($('#especificacion').val()).length < 5) {
    $('#especificacion').removeClass('border border-success');
    $('#especificacion').addClass('border border-danger');
  } else {
    $('#especificacion').removeClass('border border-danger');
    $('#especificacion').addClass('border border-success');
  }
  if (($('#observacion').val()).length < 5) {
    $('#observacion').removeClass('border border-success');
    $('#observacion').addClass('border border-danger');
  } else {
    $('#observacion').removeClass('border border-danger');
    $('#observacion').addClass('border border-success');
  }
  if (($('#logo').val()).length < 5) {
    $('#logo').removeClass('border border-success');
    $('#logo').addClass('border border-danger');
  } else {
    $('#logo').removeClass('border border-danger');
    $('#logo').addClass('border border-success');
  }
  if (($('#persona_contacto').val()).length < 5) {
    $('#persona_contacto').removeClass('border border-success');
    $('#persona_contacto').addClass('border border-danger');
  } else {
    $('#persona_contacto').removeClass('border border-danger');
    $('#persona_contacto').addClass('border border-success');
  }
  if (($('#cel_contacto').val()).length <= 9) {
    $('#cel_contacto').removeClass('border border-success');
    $('#cel_contacto').addClass('border border-danger');
  } else {
    $('#cel_contacto').removeClass('border border-danger');
    $('#cel_contacto').addClass('border border-success');
  }
  if (($('#equipo_principal').val()).length < 5) {
    $('#equipo_principal').removeClass('border border-success');
    $('#equipo_principal').addClass('border border-danger');
  } else {
    $('#equipo_principal').removeClass('border border-danger');
    $('#equipo_principal').addClass('border border-success');
  }
  if (($('#equipo_cocina').val()).length < 5) {
    $('#equipo_cocina').removeClass('border border-success');
    $('#equipo_cocina').addClass('border border-danger');
  } else {
    $('#equipo_cocina').removeClass('border border-danger');
    $('#equipo_cocina').addClass('border border-success');
  }
  if (($('#equipo_bar').val()).length < 5) {
    $('#equipo_bar').removeClass('border border-success');
    $('#equipo_bar').addClass('border border-danger');
  } else {
    $('#equipo_bar').removeClass('border border-danger');
    $('#equipo_bar').addClass('border border-success');
  }
  if (($('#total_impresoras').val()).length < 5) {
    $('#total_impresoras').removeClass('border border-success');
    $('#total_impresoras').addClass('border border-danger');
  } else {
    $('#total_impresoras').removeClass('border border-danger');
    $('#total_impresoras').addClass('border border-success');
  }

}
function inputsSistemaRestobarWeb() {
  // Limpiar campos innecesarios
  $('#dominioFactura').val('');
  $('#dominioPos').val('');
  $('#usuario').val('');
  $('#clave_sol').val('');
  $('#ctd').val('');
  $('#persona_contacto').val('');
  $('#cel_contacto').val('');
  $('#equipo_principal').val('');
  $('#equipo_cocina').val('');
  $('#equipo_bar').val('');
  $('#total_impresoras').val('');
  // Limpiar marcos a datos innecesarios
  $('#dominioFactura').removeClass('border border-danger');
  $('#dominioFactura').removeClass('border border-success');
  $('#dominioPos').removeClass('border border-danger');
  $('#dominioPos').removeClass('border border-success');
  $('#usuario').removeClass('border border-danger');
  $('#usuario').removeClass('border border-success');
  $('#clave_sol').removeClass('border border-danger');
  $('#clave_sol').removeClass('border border-success');
  $('#persona_contacto').removeClass('border border-danger');
  $('#persona_contacto').removeClass('border border-success');
  $('#cel_contacto').removeClass('border border-danger');
  $('#cel_contacto').removeClass('border border-success');
  $('#equipo_principal').removeClass('border border-danger');
  $('#equipo_principal').removeClass('border border-success');
  $('#equipo_cocina').removeClass('border border-danger');
  $('#equipo_cocina').removeClass('border border-success');
  $('#equipo_bar').removeClass('border border-danger');
  $('#equipo_bar').removeClass('border border-success');
  $('#total_impresoras').removeClass('border border-danger');
  $('#total_impresoras').removeClass('border border-success');
  // Bloquear inputs innecesarios
  $('#dominioPos').prop('disabled', true);
  $('#dominioFactura').prop('disabled', true);
  $('#usuario').prop('disabled', true);
  $('#clave_sol').prop('disabled', true);
  $('#persona_contacto').prop('disabled', true);
  $('#cel_contacto').prop('disabled', true);
  $('#equipo_principal').prop('disabled', true);
  $('#equipo_cocina').prop('disabled', true);
  $('#equipo_bar').prop('disabled', true);
  $('#total_impresoras').prop('disabled', true);
  // habilitar los inputs necesarios
  $('#dominioRestobar').prop('disabled', false);
  $('#cliente').prop('disabled', false);
  $('#dni').prop('disabled', false);
  $('#razonSocial').prop('disabled', false);
  $('#name_comercial').prop('disabled', false);
  $('#ruc').prop('disabled', false);
  $('#direc_fiscal').prop('disabled', false);
  $('#serie_compro').prop('disabled', false);
  $('#tipo_negocio').prop('disabled', false);
  $('#celular').prop('disabled', false);
  $('#telefono').prop('disabled', false);
  $('#especificacion').prop('disabled', false);
  $('#observacion').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#correo').prop('disabled', false);
  // Agregar marco rojo // amarillo
  if (($('#dominioRestobar').val()).length < 5) {
    $('#dominioRestobar').removeClass('border border-success');
    $('#dominioRestobar').addClass('border border-danger');
  } else {
    $('#dominioRestobar').removeClass('border border-danger');
    $('#dominioRestobar').addClass('border border-success');
  }
  if (($('#cliente').val()).length < 5) {
    $('#cliente').removeClass('border border-success');
    $('#cliente').addClass('border border-danger');
  } else {
    $('#cliente').removeClass('border border-danger');
    $('#cliente').addClass('border border-success');
  }
  if (($('#dni').val()).length < 5) {
    $('#dni').removeClass('border border-success');
    $('#dni').addClass('border border-danger');
  } else {
    $('#dni').removeClass('border border-danger');
    $('#dni').addClass('border border-success');
  }
  if (($('#razonSocial').val()).length < 5) {
    $('#razonSocial').removeClass('border border-success');
    $('#razonSocial').addClass('border border-danger');
  } else {
    $('#razonSocial').removeClass('border border-danger');
    $('#razonSocial').addClass('border border-success');
  }
  if (($('#name_comercial').val()).length < 5) {
    $('#name_comercial').removeClass('border border-success');
    $('#name_comercial').addClass('border border-danger');
  } else {
    $('#name_comercial').removeClass('border border-danger');
    $('#name_comercial').addClass('border border-success');
  }
  if (($('#ruc').val()).length < 5) {
    $('#ruc').removeClass('border border-success');
    $('#ruc').addClass('border border-danger');
  } else {
    $('#ruc').removeClass('border border-danger');
    $('#ruc').addClass('border border-success');
  }
  if (($('#direc_fiscal').val()).length < 5) {
    $('#direc_fiscal').removeClass('border border-success');
    $('#direc_fiscal').addClass('border border-danger');
  } else {
    $('#direc_fiscal').removeClass('border border-danger');
    $('#direc_fiscal').addClass('border border-success');
  }
  if (($('#serie_compro').val()).length < 5) {
    $('#serie_compro').removeClass('border border-success');
    $('#serie_compro').addClass('border border-danger');
  } else {
    $('#serie_compro').removeClass('border border-danger');
    $('#serie_compro').addClass('border border-success');
  }
  if (($('#tipo_negocio').val()).length < 5) {
    $('#tipo_negocio').removeClass('border border-success');
    $('#tipo_negocio').addClass('border border-danger');
  } else {
    $('#tipo_negocio').removeClass('border border-danger');
    $('#tipo_negocio').addClass('border border-success');
  }
  if (($('#celular').val()).length < 5) {
    $('#celular').removeClass('border border-success');
    $('#celular').addClass('border border-warning');
  } else {
    $('#celular').removeClass('border border-warning');
    $('#celular').addClass('border border-success');
  }
  if (($('#telefono').val()).length < 5) {
    $('#telefono').removeClass('border border-success');
    $('#telefono').addClass('border border-warning');
  } else {
    $('#telefono').removeClass('border border-warning');
    $('#telefono').addClass('border border-success');
  }
  if (($('#correo').val()).length < 5) {
    $('#correo').removeClass('border border-success');
    $('#correo').addClass('border border-warning');
  } else {
    $('#correo').removeClass('border border-warning');
    $('#correo').addClass('border border-success');
  }
  if (($('#especificacion').val()).length < 5) {
    $('#especificacion').removeClass('border border-success');
    $('#especificacion').addClass('border border-danger');
  } else {
    $('#especificacion').removeClass('border border-danger');
    $('#especificacion').addClass('border border-success');
  }
  if (($('#observacion').val()).length < 5) {
    $('#observacion').removeClass('border border-success');
    $('#observacion').addClass('border border-danger');
  } else {
    $('#observacion').removeClass('border border-danger');
    $('#observacion').addClass('border border-success');
  }
  if (($('#logo').val()).length < 5) {
    $('#logo').removeClass('border border-success');
    $('#logo').addClass('border border-danger');
  } else {
    $('#logo').removeClass('border border-danger');
    $('#logo').addClass('border border-success');
  }

}
function inputsPosFactura() {
  // Limpiar campos innecesarios
  $('#dominioRestobar').val('');
  $('#persona_contacto').val('');
  $('#cel_contacto').val('');
  $('#equipo_principal').val('');
  $('#equipo_cocina').val('');
  $('#equipo_bar').val('');
  $('#total_impresoras').val('');
  // Limpiar marcos a datos innecesarios
  $('#dominioRestobar').removeClass('border border-danger');
  $('#dominioRestobar').removeClass('border border-success');
  $('#persona_contacto').removeClass('border border-danger');
  $('#persona_contacto').removeClass('border border-success');
  $('#cel_contacto').removeClass('border border-danger');
  $('#cel_contacto').removeClass('border border-success');
  $('#equipo_principal').removeClass('border border-danger');
  $('#equipo_principal').removeClass('border border-success');
  $('#equipo_cocina').removeClass('border border-danger');
  $('#equipo_cocina').removeClass('border border-success');
  $('#equipo_bar').removeClass('border border-danger');
  $('#equipo_bar').removeClass('border border-success');
  $('#total_impresoras').removeClass('border border-danger');
  $('#total_impresoras').removeClass('border border-success');
  // Bloquear inputs innecesarios
  $('#dominioRestobar').prop('disabled', true);
  $('#persona_contacto').prop('disabled', true);
  $('#cel_contacto').prop('disabled', true);
  $('#equipo_principal').prop('disabled', true);
  $('#equipo_cocina').prop('disabled', true);
  $('#equipo_bar').prop('disabled', true);
  $('#total_impresoras').prop('disabled', true);
  // habilitar los inputs necesarios
  $('#dominioPos').prop('disabled', false);
  $('#dominioFactura').prop('disabled', false);
  $('#cliente').prop('disabled', false);
  $('#dni').prop('disabled', false);
  $('#razonSocial').prop('disabled', false);
  $('#name_comercial').prop('disabled', false);
  $('#ruc').prop('disabled', false);
  $('#direc_fiscal').prop('disabled', false);
  $('#serie_compro').prop('disabled', false);
  $('#tipo_negocio').prop('disabled', false);
  $('#celular').prop('disabled', false);
  $('#telefono').prop('disabled', false);
  $('#especificacion').prop('disabled', false);
  $('#observacion').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#correo').prop('disabled', false);
  $('#usuario').prop('disabled', false);
  $('#clave_sol').prop('disabled', false);
  // Agregar marco rojo
  if (($('#dominioPos').val()).length < 5) {
    $('#dominioPos').removeClass('border border-success');
    $('#dominioPos').addClass('border border-danger');
  } else {
    $('#dominioPos').removeClass('border border-danger');
    $('#dominioPos').addClass('border border-success');
  }
  if (($('#dominioFactura').val()).length < 5) {
    $('#dominioFactura').removeClass('border border-success');
    $('#dominioFactura').addClass('border border-danger');
  } else {
    $('#dominioFactura').removeClass('border border-danger');
    $('#dominioFactura').addClass('border border-success');
  }
  if (($('#cliente').val()).length < 5) {
    $('#cliente').removeClass('border border-success');
    $('#cliente').addClass('border border-danger');
  } else {
    $('#cliente').removeClass('border border-danger');
    $('#cliente').addClass('border border-success');
  }
  if (($('#dni').val()).length < 5) {
    $('#dni').removeClass('border border-success');
    $('#dni').addClass('border border-danger');
  } else {
    $('#dni').removeClass('border border-danger');
    $('#dni').addClass('border border-success');
  }
  if (($('#razonSocial').val()).length < 5) {
    $('#razonSocial').removeClass('border border-success');
    $('#razonSocial').addClass('border border-danger');
  } else {
    $('#razonSocial').removeClass('border border-danger');
    $('#razonSocial').addClass('border border-success');
  }
  if (($('#name_comercial').val()).length < 5) {
    $('#name_comercial').removeClass('border border-success');
    $('#name_comercial').addClass('border border-danger');
  } else {
    $('#name_comercial').removeClass('border border-danger');
    $('#name_comercial').addClass('border border-success');
  }
  if (($('#ruc').val()).length < 5) {
    $('#ruc').removeClass('border border-success');
    $('#ruc').addClass('border border-danger');
  } else {
    $('#ruc').removeClass('border border-danger');
    $('#ruc').addClass('border border-success');
  }
  if (($('#direc_fiscal').val()).length < 5) {
    $('#direc_fiscal').removeClass('border border-success');
    $('#direc_fiscal').addClass('border border-danger');
  } else {
    $('#direc_fiscal').removeClass('border border-danger');
    $('#direc_fiscal').addClass('border border-success');
  }
  if (($('#serie_compro').val()).length < 5) {
    $('#serie_compro').removeClass('border border-success');
    $('#serie_compro').addClass('border border-danger');
  } else {
    $('#serie_compro').removeClass('border border-danger');
    $('#serie_compro').addClass('border border-success');
  }
  if (($('#tipo_negocio').val()).length < 5) {
    $('#tipo_negocio').removeClass('border border-success');
    $('#tipo_negocio').addClass('border border-danger');
  } else {
    $('#tipo_negocio').removeClass('border border-danger');
    $('#tipo_negocio').addClass('border border-success');
  }
  if (($('#celular').val()).length < 5) {
    $('#celular').removeClass('border border-success');
    $('#celular').addClass('border border-warning');
  } else {
    $('#celular').removeClass('border border-warning');
    $('#celular').addClass('border border-success');
  }
  if (($('#telefono').val()).length < 5) {
    $('#telefono').removeClass('border border-success');
    $('#telefono').addClass('border border-warning');
  } else {
    $('#telefono').removeClass('border border-warning');
    $('#telefono').addClass('border border-success');
  }
  if (($('#especificacion').val()).length < 5) {
    $('#especificacion').removeClass('border border-success');
    $('#especificacion').addClass('border border-danger');
  } else {
    $('#especificacion').removeClass('border border-danger');
    $('#especificacion').addClass('border border-success');
  }
  if (($('#observacion').val()).length < 5) {
    $('#observacion').removeClass('border border-success');
    $('#observacion').addClass('border border-danger');
  } else {
    $('#observacion').removeClass('border border-danger');
    $('#observacion').addClass('border border-success');
  }
  if (($('#logo').val()).length < 5) {
    $('#logo').removeClass('border border-success');
    $('#logo').addClass('border border-danger');
  } else {
    $('#logo').removeClass('border border-danger');
    $('#logo').addClass('border border-success');
  }
  if (($('#correo').val()).length < 5) {
    $('#correo').removeClass('border border-success');
    $('#correo').addClass('border border-warning');
  } else {
    $('#correo').removeClass('border border-warning');
    $('#correo').addClass('border border-success');
  }
  if (($('#usuario').val()).length < 5) {
    $('#usuario').removeClass('border border-success');
    $('#usuario').addClass('border border-danger');
  } else {
    $('#usuario').removeClass('border border-danger');
    $('#usuario').addClass('border border-success');
  }
  if (($('#clave_sol').val()).length < 5) {
    $('#clave_sol').removeClass('border border-success');
    $('#clave_sol').addClass('border border-danger');
  } else {
    $('#clave_sol').removeClass('border border-danger');
    $('#clave_sol').addClass('border border-success');
  }
}
function inputsFactRest() {
  // Limpiar campos innecesarios
  $('#dominioPos').val('');
  $('#dominioRestobar').val('');
  // Limpiar marcos a datos innecesarios
  $('#dominioPos').removeClass('border border-danger');
  $('#dominioPos').removeClass('border border-success');
  $('#dominioRestobar').removeClass('border border-danger');
  $('#dominioRestobar').removeClass('border border-success');
  // Bloquear inputs innecesarios
  $('#dominioPos').prop('disabled', true);
  $('#dominioRestobar').prop('disabled', true);
  // habilitar los inputs necesarios
  $('#dominioFactura').prop('disabled', false);
  $('#cliente').prop('disabled', false);
  $('#dni').prop('disabled', false);
  $('#razonSocial').prop('disabled', false);
  $('#name_comercial').prop('disabled', false);
  $('#ruc').prop('disabled', false);
  $('#direc_fiscal').prop('disabled', false);
  $('#serie_compro').prop('disabled', false);
  $('#tipo_negocio').prop('disabled', false);
  $('#celular').prop('disabled', false);
  $('#telefono').prop('disabled', false);
  $('#especificacion').prop('disabled', false);
  $('#observacion').prop('disabled', false);
  $('#persona_contacto').prop('disabled', false);
  $('#cel_contacto').prop('disabled', false);
  $('#equipo_principal').prop('disabled', false);
  $('#equipo_cocina').prop('disabled', false);
  $('#equipo_bar').prop('disabled', false);
  $('#total_impresoras').prop('disabled', false);
  $('#usuario').prop('disabled', false);
  $('#clave_sol').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#correo').prop('disabled', false);
  // Agregar marco rojo
  if (($('#dominioFactura').val()).length < 5) {
    $('#dominioFactura').removeClass('border border-success');
    $('#dominioFactura').addClass('border border-danger');
  } else {
    $('#dominioFactura').removeClass('border border-danger');
    $('#dominioFactura').addClass('border border-success');
  }
  if (($('#cliente').val()).length < 5) {
    $('#cliente').removeClass('border border-success');
    $('#cliente').addClass('border border-danger');
  } else {
    $('#cliente').removeClass('border border-danger');
    $('#cliente').addClass('border border-success');
  }
  if (($('#dni').val()).length < 5) {
    $('#dni').removeClass('border border-success');
    $('#dni').addClass('border border-danger');
  } else {
    $('#dni').removeClass('border border-danger');
    $('#dni').addClass('border border-success');
  }
  if (($('#razonSocial').val()).length < 5) {
    $('#razonSocial').removeClass('border border-success');
    $('#razonSocial').addClass('border border-danger');
  } else {
    $('#razonSocial').removeClass('border border-danger');
    $('#razonSocial').addClass('border border-success');
  }
  if (($('#name_comercial').val()).length < 5) {
    $('#name_comercial').removeClass('border border-success');
    $('#name_comercial').addClass('border border-danger');
  } else {
    $('#name_comercial').removeClass('border border-danger');
    $('#name_comercial').addClass('border border-success');
  }
  if (($('#ruc').val()).length < 5) {
    $('#ruc').removeClass('border border-success');
    $('#ruc').addClass('border border-danger');
  } else {
    $('#ruc').removeClass('border border-danger');
    $('#ruc').addClass('border border-success');
  }
  if (($('#clave_sol').val()).length < 5) {
    $('#clave_sol').removeClass('border border-success');
    $('#clave_sol').addClass('border border-danger');
  } else {
    $('#clave_sol').removeClass('border border-danger');
    $('#clave_sol').addClass('border border-success');
  }
  if (($('#serie_compro').val()).length < 5) {
    $('#serie_compro').removeClass('border border-success');
    $('#serie_compro').addClass('border border-danger');
  } else {
    $('#serie_compro').removeClass('border border-danger');
    $('#serie_compro').addClass('border border-success');
  }
  if (($('#tipo_negocio').val()).length < 5) {
    $('#tipo_negocio').removeClass('border border-success');
    $('#tipo_negocio').addClass('border border-danger');
  } else {
    $('#tipo_negocio').removeClass('border border-danger');
    $('#tipo_negocio').addClass('border border-success');
  }
  if (($('#celular').val()).length < 5) {
    $('#celular').removeClass('border border-success');
    $('#celular').addClass('border border-warning');
  } else {
    $('#celular').removeClass('border border-warning');
    $('#celular').addClass('border border-success');
  }
  if (($('#telefono').val()).length < 5) {
    $('#telefono').removeClass('border border-success');
    $('#telefono').addClass('border border-warning');
  } else {
    $('#telefono').removeClass('border border-warning');
    $('#telefono').addClass('border border-success');
  }
  if (($('#especificacion').val()).length < 5) {
    $('#especificacion').removeClass('border border-success');
    $('#especificacion').addClass('border border-danger');
  } else {
    $('#especificacion').removeClass('border border-danger');
    $('#especificacion').addClass('border border-success');
  }
  if (($('#observacion').val()).length < 5) {
    $('#observacion').removeClass('border border-success');
    $('#observacion').addClass('border border-danger');
  } else {
    $('#observacion').removeClass('border border-danger');
    $('#observacion').addClass('border border-success');
  }
  if (($('#logo').val()).length < 5) {
    $('#logo').removeClass('border border-success');
    $('#logo').addClass('border border-danger');
  } else {
    $('#logo').removeClass('border border-danger');
    $('#logo').addClass('border border-success');
  }
  if (($('#persona_contacto').val()).length < 5) {
    $('#persona_contacto').removeClass('border border-success');
    $('#persona_contacto').addClass('border border-danger');
  } else {
    $('#persona_contacto').removeClass('border border-danger');
    $('#persona_contacto').addClass('border border-success');
  }
  if (($('#cel_contacto').val()).length <= 9) {
    $('#cel_contacto').removeClass('border border-success');
    $('#cel_contacto').addClass('border border-danger');
  } else {
    $('#cel_contacto').removeClass('border border-danger');
    $('#cel_contacto').addClass('border border-success');
  }
  if (($('#equipo_principal').val()).length < 5) {
    $('#equipo_principal').removeClass('border border-success');
    $('#equipo_principal').addClass('border border-danger');
  } else {
    $('#equipo_principal').removeClass('border border-danger');
    $('#equipo_principal').addClass('border border-success');
  }
  if (($('#equipo_cocina').val()).length < 5) {
    $('#equipo_cocina').removeClass('border border-success');
    $('#equipo_cocina').addClass('border border-danger');
  } else {
    $('#equipo_cocina').removeClass('border border-danger');
    $('#equipo_cocina').addClass('border border-success');
  }
  if (($('#equipo_bar').val()).length < 5) {
    $('#equipo_bar').removeClass('border border-success');
    $('#equipo_bar').addClass('border border-danger');
  } else {
    $('#equipo_bar').removeClass('border border-danger');
    $('#equipo_bar').addClass('border border-success');
  }
  if (($('#total_impresoras').val()).length < 5) {
    $('#total_impresoras').removeClass('border border-success');
    $('#total_impresoras').addClass('border border-danger');
  } else {
    $('#total_impresoras').removeClass('border border-danger');
    $('#total_impresoras').addClass('border border-success');
  }
  if (($('#correo').val()).length < 5) {
    $('#correo').removeClass('border border-success');
    $('#correo').addClass('border border-warning');
  } else {
    $('#correo').removeClass('border border-warning');
    $('#correo').addClass('border border-success');
  }
  if (($('#usuario').val()).length < 5) {
    $('#usuario').removeClass('border border-success');
    $('#usuario').addClass('border border-danger');
  } else {
    $('#usuario').removeClass('border border-danger');
    $('#usuario').addClass('border border-success');
  }
  if (($('#clave_sol').val()).length < 5) {
    $('#clave_sol').removeClass('border border-success');
    $('#clave_sol').addClass('border border-danger');
  } else {
    $('#clave_sol').removeClass('border border-danger');
    $('#clave_sol').addClass('border border-success');
  }
}
function inputsFactRestWeb() {
  // Limpiar campos innecesarios
  $('#dominioPos').val('');
  $('#persona_contacto').val('');
  $('#cel_contacto').val('');
  $('#equipo_principal').val('');
  $('#equipo_cocina').val('');
  $('#equipo_bar').val('');
  $('#total_impresoras').val('');
  // Limpiar marcos a datos innecesarios
  $('#dominioPos').removeClass('border border-danger');
  $('#dominioPos').removeClass('border border-success');
  $('#persona_contacto').removeClass('border border-danger');
  $('#persona_contacto').removeClass('border border-success');
  $('#cel_contacto').removeClass('border border-danger');
  $('#cel_contacto').removeClass('border border-success');
  $('#equipo_principal').removeClass('border border-danger');
  $('#equipo_principal').removeClass('border border-success');
  $('#equipo_cocina').removeClass('border border-danger');
  $('#equipo_cocina').removeClass('border border-success');
  $('#equipo_bar').removeClass('border border-danger');
  $('#equipo_bar').removeClass('border border-success');
  $('#total_impresoras').removeClass('border border-danger');
  $('#total_impresoras').removeClass('border border-success');
  // Bloquear inputs innecesarios
  $('#dominioPos').prop('disabled', true);
  $('#persona_contacto').prop('disabled', true);
  $('#cel_contacto').prop('disabled', true);
  $('#equipo_principal').prop('disabled', true);
  $('#equipo_cocina').prop('disabled', true);
  $('#equipo_bar').prop('disabled', true);
  $('#total_impresoras').prop('disabled', true);
  // habilitar los inputs necesarios
  $('#dominioFactura').prop('disabled', false);
  $('#dominioRestobar').prop('disabled', false);
  $('#cliente').prop('disabled', false);
  $('#dni').prop('disabled', false);
  $('#razonSocial').prop('disabled', false);
  $('#name_comercial').prop('disabled', false);
  $('#ruc').prop('disabled', false);
  $('#direc_fiscal').prop('disabled', false);
  $('#serie_compro').prop('disabled', false);
  $('#tipo_negocio').prop('disabled', false);
  $('#celular').prop('disabled', false);
  $('#telefono').prop('disabled', false);
  $('#especificacion').prop('disabled', false);
  $('#observacion').prop('disabled', false);
  $('#usuario').prop('disabled', false);
  $('#clave_sol').prop('disabled', false);
  $('#logo').prop('disabled', false);
  $('#correo').prop('disabled', false);
  // Agregar marco rojo
  if (($('#dominioFactura').val()).length < 5) {
    $('#dominioFactura').removeClass('border border-success');
    $('#dominioFactura').addClass('border border-danger');
  } else {
    $('#dominioFactura').removeClass('border border-danger');
    $('#dominioFactura').addClass('border border-success');
  }
  if (($('#dominioRestobar').val()).length < 5) {
    $('#dominioRestobar').removeClass('border border-success');
    $('#dominioRestobar').addClass('border border-danger');
  } else {
    $('#dominioRestobar').removeClass('border border-danger');
    $('#dominioRestobar').addClass('border border-success');
  }
  if (($('#cliente').val()).length < 5) {
    $('#cliente').removeClass('border border-success');
    $('#cliente').addClass('border border-danger');
  } else {
    $('#cliente').removeClass('border border-danger');
    $('#cliente').addClass('border border-success');
  }
  if (($('#dni').val()).length < 5) {
    $('#dni').removeClass('border border-success');
    $('#dni').addClass('border border-danger');
  } else {
    $('#dni').removeClass('border border-danger');
    $('#dni').addClass('border border-success');
  }
  if (($('#razonSocial').val()).length < 5) {
    $('#razonSocial').removeClass('border border-success');
    $('#razonSocial').addClass('border border-danger');
  } else {
    $('#razonSocial').removeClass('border border-danger');
    $('#razonSocial').addClass('border border-success');
  }
  if (($('#name_comercial').val()).length < 5) {
    $('#name_comercial').removeClass('border border-success');
    $('#name_comercial').addClass('border border-danger');
  } else {
    $('#name_comercial').removeClass('border border-danger');
    $('#name_comercial').addClass('border border-success');
  }
  if (($('#ruc').val()).length < 5) {
    $('#ruc').removeClass('border border-success');
    $('#ruc').addClass('border border-danger');
  } else {
    $('#ruc').removeClass('border border-danger');
    $('#ruc').addClass('border border-success');
  }
  if (($('#direc_fiscal').val()).length < 5) {
    $('#direc_fiscal').removeClass('border border-success');
    $('#direc_fiscal').addClass('border border-danger');
  } else {
    $('#direc_fiscal').removeClass('border border-danger');
    $('#direc_fiscal').addClass('border border-success');
  }
  if (($('#serie_compro').val()).length < 5) {
    $('#serie_compro').removeClass('border border-success');
    $('#serie_compro').addClass('border border-danger');
  } else {
    $('#serie_compro').removeClass('border border-danger');
    $('#serie_compro').addClass('border border-success');
  }
  if (($('#tipo_negocio').val()).length < 5) {
    $('#tipo_negocio').removeClass('border border-success');
    $('#tipo_negocio').addClass('border border-danger');
  } else {
    $('#tipo_negocio').removeClass('border border-danger');
    $('#tipo_negocio').addClass('border border-success');
  }
  if (($('#celular').val()).length < 5) {
    $('#celular').removeClass('border border-success');
    $('#celular').addClass('border border-warning');
  } else {
    $('#celular').removeClass('border border-warning');
    $('#celular').addClass('border border-success');
  }
  if (($('#telefono').val()).length < 5) {
    $('#telefono').removeClass('border border-success');
    $('#telefono').addClass('border border-warning');
  } else {
    $('#telefono').removeClass('border border-warning');
    $('#telefono').addClass('border border-success');
  }

  if (($('#especificacion').val()).length < 5) {
    $('#especificacion').removeClass('border border-success');
    $('#especificacion').addClass('border border-danger');
  } else {
    $('#especificacion').removeClass('border border-danger');
    $('#especificacion').addClass('border border-success');
  }
  if (($('#observacion').val()).length < 5) {
    $('#observacion').removeClass('border border-success');
    $('#observacion').addClass('border border-danger');
  } else {
    $('#observacion').removeClass('border border-danger');
    $('#observacion').addClass('border border-success');
  }
  if (($('#logo').val()).length < 5) {
    $('#logo').removeClass('border border-success');
    $('#logo').addClass('border border-danger');
  } else {
    $('#logo').removeClass('border border-danger');
    $('#logo').addClass('border border-success');
  }
  if (($('#correo').val()).length < 5) {
    $('#correo').removeClass('border border-success');
    $('#correo').addClass('border border-warning');
  } else {
    $('#correo').removeClass('border border-warning');
    $('#correo').addClass('border border-success');
  }
  if (($('#usuario').val()).length < 5) {
    $('#usuario').removeClass('border border-success');
    $('#usuario').addClass('border border-danger');
  } else {
    $('#usuario').removeClass('border border-danger');
    $('#usuario').addClass('border border-success');
  }
  if (($('#clave_sol').val()).length < 5) {
    $('#clave_sol').removeClass('border border-success');
    $('#clave_sol').addClass('border border-danger');
  } else {
    $('#clave_sol').removeClass('border border-danger');
    $('#clave_sol').addClass('border border-success');
  }
}
function inputsVacios() {
  // Limpiar campos innecesarios
  $('#titulo').val('');
  $('#dominioPos').val('');
  $('#dominioRestobar').val('');
  $('#dominioFactura').val('');
  $('#cliente').val('');
  $('#dni').val('');
  $('#razonSocial').val('');
  $('#name_comercial').val('');
  $('#ruc').val('');
  $('#direc_fiscal').val('');
  $('#serie_compro').val('');
  $('#tipo_negocio').val('');
  $('#celular').val('');
  $('#telefono').val('');
  $('#especificacion').val('');
  $('#observacion').val('');
  $('#persona_contacto').val('');
  $('#cel_contacto').val('');
  $('#equipo_bar').val('');
  $('#equipo_principal').val('');
  $('#total_impresoras').val('');
  $('#equipo_cocina').val('');
  $('#usuario').val('');
  $('#clave_sol').val('');
  $('#logo').val('');
  $('#correo').val('');
  $('#asesor').val('');
  // Limpiar marcos a datos innecesarios
  $('#dominioPos').removeClass('border border-danger');
  $('#dominioPos').removeClass('border border-success');
  $('#dominioRestobar').removeClass('border border-danger');
  $('#dominioRestobar').removeClass('border border-success');
  $('#dominioFactura').removeClass('border border-danger');
  $('#dominioFactura').removeClass('border border-success');
  $('#cliente').removeClass('border border-danger');
  $('#cliente').removeClass('border border-success');
  $('#dni').removeClass('border border-danger');
  $('#dni').removeClass('border border-success');
  $('#razonSocial').removeClass('border border-danger');
  $('#razonSocial').removeClass('border border-success');
  $('#name_comercial').removeClass('border border-danger');
  $('#name_comercial').removeClass('border border-success');
  $('#ruc').removeClass('border border-danger');
  $('#ruc').removeClass('border border-success');
  $('#direc_fiscal').removeClass('border border-danger');
  $('#direc_fiscal').removeClass('border border-success');
  $('#serie_compro').removeClass('border border-danger');
  $('#serie_compro').removeClass('border border-success');
  $('#tipo_negocio').removeClass('border border-danger');
  $('#tipo_negocio').removeClass('border border-success');
  $('#celular').removeClass('border border-warning');
  $('#celular').removeClass('border border-success');
  $('#telefono').removeClass('border border-warning');
  $('#telefono').removeClass('border border-success');
  $('#especificacion').removeClass('border border-danger');
  $('#especificacion').removeClass('border border-success');
  $('#observacion').removeClass('border border-danger');
  $('#observacion').removeClass('border border-success');
  $('#persona_contacto').removeClass('border border-danger');
  $('#persona_contacto').removeClass('border border-success');
  $('#cel_contacto').removeClass('border border-danger');
  $('#cel_contacto').removeClass('border border-success');
  $('#equipo_bar').removeClass('border border-danger');
  $('#equipo_bar').removeClass('border border-success');
  $('#equipo_principal').removeClass('border border-danger');
  $('#equipo_principal').removeClass('border border-success');
  $('#total_impresoras').removeClass('border border-danger');
  $('#total_impresoras').removeClass('border border-success');
  $('#equipo_cocina').removeClass('border border-danger');
  $('#equipo_cocina').removeClass('border border-success');
  $('#usuario').removeClass('border border-danger');
  $('#usuario').removeClass('border border-success');
  $('#clave_sol').removeClass('border border-danger');
  $('#clave_sol').removeClass('border border-success');
  $('#logo').removeClass('border border-danger');
  $('#logo').removeClass('border border-success');
  $('#correo').removeClass('border border-warning');
  $('#correo').removeClass('border border-success');
  $('#asesor').removeClass('border border-danger');
  $('#asesor').addClass('border border-danger');
  $('#asesor').removeClass('border border-success');
  // Bloquear inputs innecesarios
  $('#dominioPos').prop('disabled', true);
  $('#dominioRestobar').prop('disabled', true);
  $('#dominioFactura').prop('disabled', true);
  $('#cliente').prop('disabled', true);
  $('#dni').prop('disabled', true);
  $('#razonSocial').prop('disabled', true);
  $('#name_comercial').prop('disabled', true);
  $('#ruc').prop('disabled', true);
  $('#direc_fiscal').prop('disabled', true);
  $('#serie_compro').prop('disabled', true);
  $('#tipo_negocio').prop('disabled', true);
  $('#celular').prop('disabled', true);
  $('#telefono').prop('disabled', true);
  $('#especificacion').prop('disabled', true);
  $('#observacion').prop('disabled', true);
  $('#persona_contacto').prop('disabled', true);
  $('#cel_contacto').prop('disabled', true);
  $('#equipo_principal').prop('disabled', true);
  $('#equipo_cocina').prop('disabled', true);
  $('#equipo_bar').prop('disabled', true);
  $('#total_impresoras').prop('disabled', true);
  $('#usuario').prop('disabled', true);
  $('#clave_sol').prop('disabled', true);
  $('#logo').prop('disabled', true);
  $('#correo').prop('disabled', true);
}
function agendar(formData) {
  window.$.ajax({
    type: "post",
    url: "InstalacionController.php?method=agendar",
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
      Swal.close();
      let data = JSON.parse(response);
      if (data.estado == "ok") {
        inputsVacios()
        $('#tipo_sistema').val('0');
        Swal.fire({
          text: data.mensaje,
          icon: 'success',
        })
        setTimeout(() => {
          Swal.close();
        }, 2500);
      } else {
        Swal.fire({
          text: data.mensaje,
          icon: 'error',
        })
        setTimeout(() => {
          Swal.close()
        }, 2500);
      }
    },
  });
}
// ############## EVENTOS PARA GUARDAR INSTALACION
$('#tipo_sistema').change(function () {
  if ($('#tipo_sistema').val() == '1') {
    inputsSistemaPos();
  } else if ($('#tipo_sistema').val() == '2') {
    inputsSistemaFacturador();
  } else if ($('#tipo_sistema').val() == '3') {
    inputsSistemaRestobar();
  } else if ($('#tipo_sistema').val() == '4') {
    inputsSistemaRestobarWeb();
  } else if ($('#tipo_sistema').val() == '5') {
    inputsPosFactura();
  } else if ($('#tipo_sistema').val() == '6') {
    inputsFactRest();
  } else if ($('#tipo_sistema').val() == '7') {
    inputsFactRestWeb();
  } else {
    inputsVacios();
  }
})
$("#titulo").focus(function () {
  $("#titulo").keyup(function () {
    if (($('#titulo').val()).length > 10) {
      $('#titulo').removeClass('border border-danger')
      $('#titulo').addClass('border border-success')
    } else {
      $('#titulo').removeClass('border border-success')
      $('#titulo').addClass('border border-danger')
    }
  });
});
$("#asesor").focus(function () {
  $("#asesor").keyup(function () {
    if (($('#asesor').val()).length >= 3) {
      $('#asesor').removeClass('border border-danger')
      $('#asesor').addClass('border border-success')
    } else {
      $('#asesor').removeClass('border border-success')
      $('#asesor').addClass('border border-danger')
    }
  });
});
$("#dominioPos").focus(function () {
  $("#dominioPos").keyup(function () {
    if (($('#dominioPos').val()).length > 10) {
      $('#dominioPos').removeClass('border border-danger')
      $('#dominioPos').addClass('border border-success')
    } else {
      $('#dominioPos').removeClass('border border-success')
      $('#dominioPos').addClass('border border-danger')
    }
  });
});
$("#dominioFactura").focus(function () {
  $("#dominioFactura").keyup(function () {
    if (($('#dominioFactura').val()).length > 10) {
      $('#dominioFactura').removeClass('border border-danger')
      $('#dominioFactura').addClass('border border-success')
    } else {
      $('#dominioFactura').removeClass('border border-success')
      $('#dominioFactura').addClass('border border-danger')
    }
  });
});
$("#dominioRestobar").focus(function () {
  $("#dominioRestobar").keyup(function () {
    if (($('#dominioRestobar').val()).length > 10) {
      $('#dominioRestobar').removeClass('border border-danger')
      $('#dominioRestobar').addClass('border border-success')
    } else {
      $('#dominioRestobar').removeClass('border border-success')
      $('#dominioRestobar').addClass('border border-danger')
    }
  });
});
$("#cliente").focus(function () {
  $("#cliente").keyup(function () {
    if (($('#cliente').val()).length > 10) {
      $('#cliente').removeClass('border border-danger')
      $('#cliente').addClass('border border-success')
    } else {
      $('#cliente').removeClass('border border-success')
      $('#cliente').addClass('border border-danger')
    }
  });
});
$("#dni").focus(function () {
  $("#dni").keyup(function () {
    if (($('#dni').val()).length == 8) {
      $('#dni').removeClass('border border-danger')
      $('#dni').addClass('border border-success')
    } else {
      $('#dni').removeClass('border border-success')
      $('#dni').addClass('border border-danger')
    }
  });
});
$("#razonSocial").focus(function () {
  $("#razonSocial").keyup(function () {
    if (($('#razonSocial').val()).length > 10) {
      $('#razonSocial').removeClass('border border-danger')
      $('#razonSocial').addClass('border border-success')
    } else {
      $('#razonSocial').removeClass('border border-success')
      $('#razonSocial').addClass('border border-danger')
    }
  });
});
$("#name_comercial").focus(function () {
  $("#name_comercial").keyup(function () {
    if (($('#name_comercial').val()).length > 5) {
      $('#name_comercial').removeClass('border border-danger')
      $('#name_comercial').addClass('border border-success')
    } else {
      $('#name_comercial').removeClass('border border-success')
      $('#name_comercial').addClass('border border-danger')
    }
  });
});
$("#ruc").focus(function () {
  $("#ruc").keyup(function () {
    if (($('#ruc').val()).length == 11) {
      $('#ruc').removeClass('border border-danger')
      $('#ruc').addClass('border border-success')
    } else {
      $('#ruc').removeClass('border border-success')
      $('#ruc').addClass('border border-danger')
    }
  });
});
$("#tipo_negocio").focus(function () {
  $("#tipo_negocio").keyup(function () {
    if (($('#tipo_negocio').val()).length > 3) {
      $('#tipo_negocio').removeClass('border border-danger')
      $('#tipo_negocio').addClass('border border-success')
    } else {
      $('#tipo_negocio').removeClass('border border-success')
      $('#tipo_negocio').addClass('border border-danger')
    }
  });
});
$("#celular").focus(function () {
  $("#celular").keyup(function () {
    if (($('#celular').val()).length >= 9 ) {
      $('#celular').removeClass('border border-warning')
      $('#celular').addClass('border border-success')
    } else {
      $('#celular').removeClass('border border-success')
      $('#celular').addClass('border border-warning')
    }
  });
});
$("#telefono").focus(function () {
  $("#telefono").keyup(function () {
    if (($('#telefono').val()).length == 7) {
      $('#telefono').removeClass('border border-warning')
      $('#telefono').addClass('border border-success')
    } else {
      $('#telefono').removeClass('border border-success')
      $('#telefono').addClass('border border-warning')
    }
  });
});
$("#correo").focus(function () {
  $("#correo").keyup(function () {
    if (($('#correo').val()).length > 10) {
      $('#correo').removeClass('border border-warning')
      $('#correo').addClass('border border-success')
    } else {
      $('#correo').removeClass('border border-success')
      $('#correo').addClass('border border-warning')
    }
  });
});
$("#direc_fiscal").focus(function () {
  $("#direc_fiscal").keyup(function () {
    if (($('#direc_fiscal').val()).length > 10) {
      $('#direc_fiscal').removeClass('border border-danger')
      $('#direc_fiscal').addClass('border border-success')
    } else {
      $('#direc_fiscal').removeClass('border border-success')
      $('#direc_fiscal').addClass('border border-danger')
    }
  });
});
$("#serie_compro").focus(function () {
  $("#serie_compro").keyup(function () {
    if (($('#serie_compro').val()).length > 10) {
      $('#serie_compro').removeClass('border border-danger')
      $('#serie_compro').addClass('border border-success')
    } else {
      $('#serie_compro').removeClass('border border-success')
      $('#serie_compro').addClass('border border-danger')
    }
  });
});
$("#especificacion").focus(function () {
  $("#especificacion").keyup(function () {
    if (($('#especificacion').val()).length > 10) {
      $('#especificacion').removeClass('border border-danger')
      $('#especificacion').addClass('border border-success')
    } else {
      $('#especificacion').removeClass('border border-success')
      $('#especificacion').addClass('border border-danger')
    }
  });
});
$("#observacion").focus(function () {
  $("#observacion").keyup(function () {
    if (($('#observacion').val()).length > 10) {
      $('#observacion').removeClass('border border-danger')
      $('#observacion').addClass('border border-success')
    } else {
      $('#observacion').removeClass('border border-success')
      $('#observacion').addClass('border border-danger')
    }
  });
});
$("#persona_contacto").focus(function () {
  $("#persona_contacto").keyup(function () {
    if (($('#persona_contacto').val()).length > 3) {
      $('#persona_contacto').removeClass('border border-danger')
      $('#persona_contacto').addClass('border border-success')
    } else {
      $('#persona_contacto').removeClass('border border-success')
      $('#persona_contacto').addClass('border border-danger')
    }
  });
});
$("#cel_contacto").focus(function () {
  $("#cel_contacto").keyup(function () {
    if (($('#cel_contacto').val()).length >= 9) {
      $('#cel_contacto').removeClass('border border-danger')
      $('#cel_contacto').addClass('border border-success')
    } else {
      $('#cel_contacto').removeClass('border border-success')
      $('#cel_contacto').addClass('border border-danger')
    }
  });
});
$("#equipo_principal").focus(function () {
  $("#equipo_principal").keyup(function () {
    if (($('#equipo_principal').val()).length > 2) {
      $('#equipo_principal').removeClass('border border-danger')
      $('#equipo_principal').addClass('border border-success')
    } else {
      $('#equipo_principal').removeClass('border border-success')
      $('#equipo_principal').addClass('border border-danger')
    }
  });
});
$("#equipo_cocina").focus(function () {
  $("#equipo_cocina").keyup(function () {
    if (($('#equipo_cocina').val()).length > 10) {
      $('#equipo_cocina').removeClass('border border-danger')
      $('#equipo_cocina').addClass('border border-success')
    } else {
      $('#equipo_cocina').removeClass('border border-success')
      $('#equipo_cocina').addClass('border border-danger')
    }
  });
});
$("#equipo_bar").focus(function () {
  $("#equipo_bar").keyup(function () {
    if (($('#equipo_bar').val()).length > 1) {
      $('#equipo_bar').removeClass('border border-danger')
      $('#equipo_bar').addClass('border border-success')
    } else {
      $('#equipo_bar').removeClass('border border-success')
      $('#equipo_bar').addClass('border border-danger')
    }
  });
});
$("#total_impresoras").focus(function () {
  $("#total_impresoras").keyup(function () {
    if (($('#total_impresoras').val()).length >= 1) {
      $('#total_impresoras').removeClass('border border-danger')
      $('#total_impresoras').addClass('border border-success')
    } else {
      $('#total_impresoras').removeClass('border border-success')
      $('#total_impresoras').addClass('border border-danger')
    }
  });
});
$("#usuario").focus(function () {
  $("#usuario").keyup(function () {
    if (($('#usuario').val()).length > 1) {
      $('#usuario').removeClass('border border-danger')
      $('#usuario').addClass('border border-success')
    } else {
      $('#usuario').removeClass('border border-success')
      $('#usuario').addClass('border border-danger')
    }
  });
});
$("#clave_sol").focus(function () {
  $("#clave_sol").keyup(function () {
    if (($('#clave_sol').val()).length > 1) {
      $('#clave_sol').removeClass('border border-danger')
      $('#clave_sol').addClass('border border-success')
    } else {
      $('#clave_sol').removeClass('border border-success')
      $('#clave_sol').addClass('border border-danger')
    }
  });
});
$("#logo").change(function () {
  if (($("#logo").val()).length > '10') {
    $('#logo').removeClass('border border-danger');
    $('#logo').addClass('border border-success');
  } else {
    $('#logo').removeClass('border border-success');
    $('#logo').addClass('border border-danger');
  }
});
// proceso de guardar (programar instalacion)
setInterval(() => {
  if ($('#tipo_sistema').val() == '1') {
    if ($("#titulo").hasClass("border-danger") || $("#dominioPos").hasClass("border-danger") || $("#cliente").hasClass("border-danger") || $("#dni").hasClass("border-danger") || $("#razonSocial").hasClass("border-danger") || $("#name_comercial").hasClass("border-danger") || $("#ruc").hasClass("border-danger") || $("#tipo_negocio").hasClass("border-danger") || $("#direc_fiscal").hasClass("border-danger") || $("#serie_compro").hasClass("border-danger") || $("#especificacion").hasClass("border-danger") || $("#observacion").hasClass("border-danger") || $("#logo").hasClass("border-danger") || $("#asesor").hasClass("border-danger")) {
      $('#btnAgendar').prop('disabled', true)
    } else {
      $('#btnAgendar').prop('disabled', false)
    }
  } else if ($('#tipo_sistema').val() == '2') {
    if ($("#titulo").hasClass("border-danger") || $("#dominioFactura").hasClass("border-danger") || $("#cliente").hasClass("border-danger") || $("#dni").hasClass("border-danger") || $("#razonSocial").hasClass("border-danger") || $("#name_comercial").hasClass("border-danger") || $("#ruc").hasClass("border-danger") || $("#tipo_negocio").hasClass("border-danger") || $("#direc_fiscal").hasClass("border-danger") || $("#serie_compro").hasClass("border-danger") || $("#especificacion").hasClass("border-danger") || $("#observacion").hasClass("border-danger") || $("#logo").hasClass("border-danger") || $("#usuario").hasClass("border-danger") || $("#clave_sol").hasClass("border-danger") || $("#asesor").hasClass("border-danger")) {
      $('#btnAgendar').prop('disabled', true)
    } else {
      $('#btnAgendar').prop('disabled', false)
    }
  } else if ($('#tipo_sistema').val() == '3') {
    if ($("#titulo").hasClass("border-danger") || $("#cliente").hasClass("border-danger") || $("#dni").hasClass("border-danger") || $("#razonSocial").hasClass("border-danger") || $("#name_comercial").hasClass("border-danger") || $("#ruc").hasClass("border-danger") || $("#tipo_negocio").hasClass("border-danger") || $("#direc_fiscal").hasClass("border-danger") || $("#serie_compro").hasClass("border-danger") || $("#especificacion").hasClass("border-danger") || $("#observacion").hasClass("border-danger") || $("#logo").hasClass("border-danger") || $("#persona_contacto").hasClass("border-danger") || $("#cel_contacto").hasClass("border-danger") || $("#equipo_principal").hasClass("border-danger") || $("#equipo_cocina").hasClass("border-danger") || $("#equipo_bar").hasClass("border-danger") || $("#total_impresoras").hasClass("border-danger") || $("#asesor").hasClass("border-danger")) {
      $('#btnAgendar').prop('disabled', true)
    } else {
      $('#btnAgendar').prop('disabled', false)
    }
  } else if ($('#tipo_sistema').val() == '4') {
    if ($("#titulo").hasClass("border-danger") || $("#dominioRestobar").hasClass("border-danger") || $("#cliente").hasClass("border-danger") || $("#dni").hasClass("border-danger") || $("#razonSocial").hasClass("border-danger") || $("#name_comercial").hasClass("border-danger") || $("#ruc").hasClass("border-danger") || $("#tipo_negocio").hasClass("border-danger") || $("#direc_fiscal").hasClass("border-danger") || $("#serie_compro").hasClass("border-danger") || $("#especificacion").hasClass("border-danger") || $("#observacion").hasClass("border-danger") || $("#logo").hasClass("border-danger") || $("#asesor").hasClass("border-danger")) {
      $('#btnAgendar').prop('disabled', true)
    } else {
      $('#btnAgendar').prop('disabled', false)
    }
  } else if ($('#tipo_sistema').val() == '5') {
    if ($("#titulo").hasClass("border-danger") || $("#dominioPos").hasClass("border-danger") || $("#dominioFactura").hasClass("border-danger") || $("#cliente").hasClass("border-danger") || $("#dni").hasClass("border-danger") || $("#razonSocial").hasClass("border-danger") || $("#name_comercial").hasClass("border-danger") || $("#ruc").hasClass("border-danger") || $("#tipo_negocio").hasClass("border-danger") || $("#direc_fiscal").hasClass("border-danger") || $("#serie_compro").hasClass("border-danger") || $("#especificacion").hasClass("border-danger") || $("#observacion").hasClass("border-danger") || $("#logo").hasClass("border-danger") || $("#usuario").hasClass("border-danger") || $("#clave_sol").hasClass("border-danger") || $("#asesor").hasClass("border-danger")) {
      $('#btnAgendar').prop('disabled', true)
    } else {
      $('#btnAgendar').prop('disabled', false)
    }
  } else if ($('#tipo_sistema').val() == '6') {
    if ($("#titulo").hasClass("border-danger") || $("#dominioFactura").hasClass("border-danger") || $("#cliente").hasClass("border-danger") || $("#dni").hasClass("border-danger") || $("#razonSocial").hasClass("border-danger") || $("#name_comercial").hasClass("border-danger") || $("#ruc").hasClass("border-danger") || $("#tipo_negocio").hasClass("border-danger") || $("#direc_fiscal").hasClass("border-danger") || $("#serie_compro").hasClass("border-danger") || $("#especificacion").hasClass("border-danger") || $("#observacion").hasClass("border-danger") || $("#logo").hasClass("border-danger") || $("#persona_contacto").hasClass("border-danger") || $("#cel_contacto").hasClass("border-danger") || $("#equipo_principal").hasClass("border-danger") || $("#equipo_cocina").hasClass("border-danger") || $("#equipo_bar").hasClass("border-danger") || $("#total_impresoras").hasClass("border-danger") || $("#usuario").hasClass("border-danger") || $("#clave_sol").hasClass("border-danger") || $("#asesor").hasClass("border-danger")) {
      $('#btnAgendar').prop('disabled', true)
    } else {
      $('#btnAgendar').prop('disabled', false)
    }
  } else if ($('#tipo_sistema').val() == '7') {
    if ($("#titulo").hasClass("border-danger") || $("#dominioFactura").hasClass("border-danger") || $("#dominioRestobar").hasClass("border-danger") || $("#cliente").hasClass("border-danger") || $("#dni").hasClass("border-danger") || $("#razonSocial").hasClass("border-danger") || $("#name_comercial").hasClass("border-danger") || $("#ruc").hasClass("border-danger") || $("#tipo_negocio").hasClass("border-danger") || $("#direc_fiscal").hasClass("border-danger") || $("#serie_compro").hasClass("border-danger") || $("#especificacion").hasClass("border-danger") || $("#observacion").hasClass("border-danger") || $("#logo").hasClass("border-danger") || $("#usuario").hasClass("border-danger") || $("#clave_sol").hasClass("border-danger") || $("#asesor").hasClass("border-danger")) {
      $('#btnAgendar').prop('disabled', true)
    } else {
      $('#btnAgendar').prop('disabled', false)
    }
  } else {
    $('#btnAgendar').prop('disabled', true)
  }
}, 100);
$("#btnAgendar").click(function (e) {
  let formData = new FormData();
  formData.append("titulo", ($('#titulo').val()).toUpperCase());
  formData.append("tipo_sistema", ($('#tipo_sistema').val()).toUpperCase());
  formData.append("asesor", ($('#asesor').val()).toUpperCase());
  formData.append("cliente", ($('#cliente').val()).toUpperCase());
  formData.append("dni", $('#dni').val());
  formData.append("razonSocial", ($('#razonSocial').val()).toUpperCase());
  formData.append("name_comercial", ($('#name_comercial').val()).toUpperCase());
  formData.append("ruc", $('#ruc').val());
  formData.append("tipo_negocio", ($('#tipo_negocio').val()).toUpperCase());
  formData.append("celular", $('#celular').val());
  formData.append("telefono", $('#telefono').val());
  formData.append("correo", ($('#correo').val()).toUpperCase());
  formData.append("direc_fiscal", ($('#direc_fiscal').val()).toUpperCase());
  formData.append("serie_compro", ($('#serie_compro').val()).toUpperCase());
  formData.append("especificacion", $('#especificacion').val());
  formData.append("observacion", $('#observacion').val());
  formData.append("logo_1", $('#logo')[0].files[0]);
  formData.append("logo_2", $('#logo')[0].files[1]);
  if ($('#tipo_sistema').val() == '1') {
    formData.append("dominioPos", $('#dominioPos').val());
  } else if ($('#tipo_sistema').val() == '2') {
    formData.append("dominioFactura", $('#dominioFactura').val());
    formData.append("usuario", $('#usuario').val());
    formData.append("clave_sol", $('#clave_sol').val());
  } else if ($('#tipo_sistema').val() == '3') {
    formData.append("persona_contacto", $('#persona_contacto').val());
    formData.append("cel_contacto", $('#cel_contacto').val());
    formData.append("equipo_principal", $('#equipo_principal').val());
    formData.append("equipo_cocina", $('#equipo_cocina').val());
    formData.append("equipo_bar", $('#equipo_bar').val());
    formData.append("total_impresoras", $('#total_impresoras').val());
  } else if ($('#tipo_sistema').val() == '4') {
    formData.append("dominioRestobar", $('#dominioRestobar').val());
  } else if ($('#tipo_sistema').val() == '5') {
    formData.append("dominioPos", $('#dominioPos').val());
    formData.append("dominioFactura", $('#dominioFactura').val());
    formData.append("usuario", $('#usuario').val());
    formData.append("clave_sol", $('#clave_sol').val());
  } else if ($('#tipo_sistema').val() == '6') {
    formData.append("dominioFactura", $('#dominioFactura').val());
    formData.append("persona_contacto", $('#persona_contacto').val());
    formData.append("cel_contacto", $('#cel_contacto').val());
    formData.append("equipo_principal", $('#equipo_principal').val());
    formData.append("equipo_cocina", $('#equipo_cocina').val());
    formData.append("equipo_bar", $('#equipo_bar').val());
    formData.append("total_impresoras", $('#total_impresoras').val());
    formData.append("usuario", $('#usuario').val());
    formData.append("clave_sol", $('#clave_sol').val());
  } else if ($('#tipo_sistema').val() == '7') {
    formData.append("dominioRestobar", $('#dominioRestobar').val());
    formData.append("dominioFactura", $('#dominioFactura').val());
    formData.append("clave_sol", $('#clave_sol').val());
    formData.append("usuario", $('#usuario').val());
  }
  agendar(formData);
});


