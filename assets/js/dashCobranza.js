const ctx_anterior = document.getElementById("chartMesAnterior");
const ctx_Actual = document.getElementById("chartMesActual");

$(document).ready(function () {
  $.ajax({
    type: "post",
    url: "../controllers/dashCobranzaController.php?method=datosEstadisticos",
    success: function (response) {
      data = JSON.parse(response);
      console.log(data);
      // INICIANDO DATOS GLOBAL
      let pagoTotal_global = 0;
      let pagoFueraFecha_global = 0;
      let ingresos_global = 0;
      let pagosEnero_global = 0;
      let pagosFebre_global = 0;
      let pagosMarzo_global = 0;
      let pagosAbril_global = 0;
      let pagosMayo_global = 0;
      let pagosJunio_global = 0;
      let pagosJulio_global = 0;
      let pagosAgost_global = 0;
      let pagosSetie_global = 0;
      let pagosOctub_global = 0;
      let pagosNovie_global = 0;
      let pagosDicie_global = 0;

      // * #### DATOS GLOBALES ESTADISTICA #####
      if (data["global"].length != 0) {
        if (data["global"]["pagoTotal"] != "") {
          pagoTotal_global = data["global"]["pagoTotal"];
        }
        if (data["global"]["pagoFueraFecha"] != "") {
          pagoFueraFecha_global = data["global"]["pagoFueraFecha"];
        }
        if (data["global"]["ingresoTotal"] != "" || data["global"]["ingresoTotal"] != NULL) {
          ingresos_global = data["global"]["ingresoTotal"];
        }
        if ((data["global"]["pagosMensuales"]).length != 0) {
          for (let i = 0; i < (data["global"]["pagosMensuales"]).length; i++) {
            if(data["global"]["pagosMensuales"][i]['mes'] == '1'){
              pagosEnero_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '2'){
              pagosFebre_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '3'){
              pagosMarzo_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '4'){
              pagosAbril_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '5'){
              pagosMayo_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '6'){
              pagosJunio_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '7'){
              pagosJulio_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '8'){
              pagosAgost_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '9'){
              pagosSetie_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '10'){
              pagosOctub_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '11'){
              pagosNovie_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
            if(data["global"]["pagosMensuales"][i]['mes'] == '12'){
              pagosDicie_global = data["global"]["pagosMensuales"][i]['ingresos']
            }
          }
        }
      }
      // * #### ASIGNANDO DATOS A LOS CARDS ####
      $("#cantMod").text(pagoTotal_global);
      $("#cantInst").text(pagoFueraFecha_global);
      $("#cantImpl").text(ingresos_global);
      // $("#cantAct").text(cantYT_global);


      // * #### CREANDO LAS TABLAS ESTADISTICAS DEL MES ANTERIOR ######
      const myChart = new Chart(ctx_anterior, {
        type: "line",
        data: {
          labels: [
            "Enero",
            "Febero",
            "Marzo",
            "Abril",
            "Mayo",
            "Junio",
            "Agosto",
            "Setiembre",
            "Octubre",
            "Noviembre",
            "Diciembre",
          ],
          datasets: [
            {
              label: "Total de Pagos Mensuales",
              data: [pagosEnero_global,
                pagosFebre_global,
                pagosMarzo_global,
                pagosAbril_global,
                pagosMayo_global,
                pagosJunio_global,
                pagosJulio_global,
                pagosAgost_global,
                pagosSetie_global,
                pagosOctub_global,
                pagosNovie_global,
                pagosDicie_global,
              ],
              borderColor: 'rgb(75, 192, 192)',
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    },
  });
});