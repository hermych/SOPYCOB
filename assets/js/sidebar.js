let btnlogout = document.getElementById('logout');
let btnlogoutImg = document.getElementById('logoutImg');
btnlogout.addEventListener("click", ()=>{
  $.ajax({
    type: "post",
    url: '../controllers/UsuarioController.php?method=logout',
    success: function (response) {
      let data = JSON.parse(response);
      if (data.estado=='ok') {
        location.href = '../'+data.dbname+'.php';
      } 
    }
  });
});
btnlogoutImg.addEventListener("click", ()=>{
  // console.log("click");
  $.ajax({
    type: "post",
    url: '../controllers/UsuarioController.php?method=logout',
    beforeSend: function () {
      allowOutsideClick: false,
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
      let data = JSON.parse(response);
      if (data.estado=='ok') {
        location.href = '../'+data.dbname+'.php';
      } 
    }
  });
});
//javascript:alert(document.title);
$(window).on("load", function (){
  if(document.title == 'Home' || document.title == 'Clientes'  || document.title == 'Ticket Soporte'  || document.title == 'Instalaciones Pendientes' || document.title == 'Suspenciones de Sistemas'  || document.title == 'Dar de Baja Sistemas'  ){
    window.$.ajax({
      type: "post",
      url: "../controllers/UsuarioController.php?method=consultarPendientes",
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
        swal.close()
        let data = JSON.parse(response)
        if(data.rol == 'SO'){
          info = data.info;
          Swal.fire({
            allowOutsideClick: false,
            title: '<strong>PENDIENTES</strong>',
            icon: 'info',
            html:
              `<p style="margin-bottom: 5px"><b>Tickets</b> → ${info.tickets}</p> ` +
              `<p style="margin-bottom: 5px"><b>Instalaciones</b> → ${info.instalaciones}</p> ` +
              `<p style="margin-bottom: 5px"><b>Suspenciones</b> → ${info.suspenciones}</p> ` +
              `<p style="margin-bottom: 5px"><b>Bajas de Servicio</b> → ${info.bajas}</p> `
          })
        }
      },
    });
  }
});
