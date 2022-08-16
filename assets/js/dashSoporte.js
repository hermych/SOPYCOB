const charts = document.querySelectorAll(".chart");
const ctx_anterior = document.getElementById("chartMesAnterior");
const ctx_Actual = document.getElementById("chartMesActual");

$(document).ready(function () {
  $.ajax({
    type: "post",
    url: "../controllers/dashSoporteController.php?method=datosEstadisticos",
    success: function (response) {
      data = JSON.parse(response);
      console.log(data);
      // INICIANDO DATOS GLOBAL
      let cantMod_global = 0;
      let cantInst_global = 0;
      let cantImpl_global = 0;
      let cantAct_global = 0;
      // INCIANDO DATOS MES ACTUAL
      let cantMod_actual = 0;
      let cantInst_actual = 0;
      let cantImpl_actual = 0;
      let cantAct_actual = 0;
      // INCIANDO DATOS MES ANTERIOR
      let cantMod_antes = 0;
      let cantInst_antes = 0;
      let cantImpl_antes = 0;
      let cantAct_antes = 0;


      // * #### DATOS GLOBALES #####
      if (data["global"].length != 0) {
        for (let i = 0; i < data["global"].length; i++) {
          if (data["global"][i]["nombreProceso"] == "MODIFICACION") {
            cantMod_global = data["global"][i]["cantidad"];
          } else if (data["global"][i]["nombreProceso"] == "INSTALACION") {
            cantInst_global = data["global"][i]["cantidad"];
          } else if (data["global"][i]["nombreProceso"] == "IMPLEMENTACION") {
            cantImpl_global = data["global"][i]["cantidad"];
          } else if (data["global"][i]["nombreProceso"] == "ACTUALIZACION") {
            cantAct_global = data["global"][i]["cantidad"];
          }
        }
      }
      // * #### DATOS PARA MES ANTERIOR #####
      if (data["mesAntes"].length != 0) {
        for (let i = 0; i < data["mesAntes"].length; i++) {
          if (data["mesAntes"][i]["nombreProceso"] == "MODIFICACION") {
            cantMod_antes = data["mesAntes"][i]["cantidad"];
          } else if (data["mesAntes"][i]["nombreProceso"] == "INSTALACION") {
            cantInst_antes = data["mesAntes"][i]["cantidad"];
          } else if (data["mesAntes"][i]["nombreProceso"] == "IMPLEMENTACION") {
            cantImpl_antes = data["mesAntes"][i]["cantidad"];
          } else if (data["mesAntes"][i]["nombreProceso"] == "ACTUALIZACION") {
            cantAct_antes = data["mesAntes"][i]["cantidad"];
          }
        }
      }
      // * #### DATOS PARA MES ACTUAL ####
      if (data["mesActual"].length != 0) {
        for (let i = 0; i < data["mesActual"].length; i++) {
          if (data["mesActual"][i]["nombreProceso"] == "MODIFICACION") {
            cantMod_actual = data["mesActual"][i]["cantidad"];
          } else if (data["mesActual"][i]["nombreProceso"] == "INSTALACION") {
            cantInst_actual = data["mesActual"][i]["cantidad"];
          } else if (
            data["mesActual"][i]["nombreProceso"] == "IMPLEMENTACION"
          ) {
            cantImpl_actual = data["mesActual"][i]["cantidad"];
          } else if (data["mesActual"][i]["nombreProceso"] == "ACTUALIZACION") {
            cantAct_actual = data["mesActual"][i]["cantidad"];
          }
        }
      }
      // * #### ASIGNANDO DATOS A LOS CARDS ####
      $("#cantMod").text(cantMod_global);
      $("#cantInst").text(cantInst_global);
      $("#cantImpl").text(cantImpl_global);
      $("#cantAct").text(cantAct_global);

      // * #### CREANDO LAS TABLAS ESTADISTICAS DEL MES ACTUAL ######
      const myChart2 = new Chart(ctx_Actual, {
        type: "bar",
        data: {
          labels: [
            "MODIFICACION",
            "INSTALACION",
            "IMPLEMENTACION",
            "ACTUALIZACION",
          ],
          datasets: [
            {
              label: "# de Tickets",
              data: [
                cantMod_actual,
                cantInst_actual,
                cantImpl_actual,
                cantAct_actual,
              ],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
              ],
              borderWidth: 2,
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
      // * #### CREANDO LAS TABLAS ESTADISTICAS DEL MES ACTUAL ######
      const myChart = new Chart(ctx_anterior, {
        type: "bar",
        data: {
          labels: [
            "MODIFICACION",
            "INSTALACION",
            "IMPLEMENTACION",
            "ACTUALIZACION",
          ],
          datasets: [
            {
              label: "# de Tickets",
              data: [
                cantMod_antes,
                cantInst_antes,
                cantImpl_antes,
                cantAct_antes,
              ],
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
              ],
              borderWidth: 2,
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
