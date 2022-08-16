let traerDatos = function () {
  $.ajax({
    type: "post",
    url: "../controllers/EmpresaController.php?method=datosEmpresa",
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
      data = JSON.parse(response);
      $('#idEmpresa').val(data.idDatosEmpresa);
      $('#ruc').val(data.numeroRuc);
      $('#email').val(data.email);
      $('#telefono').val(data.telefono);
      $('#celular').val(data.celular);
      $('#propietario').val(data.propietario);
      $('#direccion').val(data.direccionEmpresa);
      $('#razonSocial').val(data.razonSocial);
      $('#nombreComercial').val(data.nombreComercial);
      $('#logo').val('');
      $('#logoEmpresa').attr('src', data.logoEmpresa);
      Swal.close()
    },
  });
}
$(document).ready(function () {
  traerDatos();
});
$('#btnEditarEmpresa').click(function () {
  formData = new FormData();
  formData.append('idEmpresa', $('#idEmpresa').val())
  formData.append('ruc', $('#ruc').val())
  formData.append('email', $('#email').val())
  formData.append('telefono', $('#telefono').val())
  formData.append('celular', $('#celular').val())
  formData.append('propietario', ($('#propietario').val()).toUpperCase())
  formData.append('direccion', $('#direccion').val())
  formData.append('razonSocial', ($('#razonSocial').val()).toUpperCase())
  formData.append('nombreComercial', ($('#nombreComercial').val()).toUpperCase())
  formData.append('logo', $('#logo')[0].files[0])
  window.$.ajax({
    type: "post",
    url: "../controllers/EmpresaController.php?method=editarDatos",
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
        Swal.fire({
          text: data.mensaje,
          icon: "success",
        });
        setTimeout(() => {
          Swal.close();
          traerDatos();
        }, 1000);
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
})
setInterval(() => {
  let ruc = $('#ruc').val();
  let telefono = $('#telefono').val();
  let celular = $('#celular').val();
  let propietario = $('#propietario').val();
  let direccion = $('#direccion').val();
  let razonSocial = $('#razonSocial').val();
  let nombreComercial = $('#nombreComercial').val();
  if(ruc == '' || telefono == '' || celular == '' || propietario == '' || direccion == '' || razonSocial == '' || nombreComercial == ''){
    $('#btnEditarEmpresa').prop('disabled', true)
  }else{
    $('#btnEditarEmpresa').prop('disabled', false)
  }
}, 200);