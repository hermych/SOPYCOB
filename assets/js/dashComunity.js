const charts = document.querySelectorAll(".chart");
const ctx_anterior = document.getElementById("chartMesAnterior");
const ctx_Actual = document.getElementById("chartMesActual");

$(document).ready(function () {
  $.ajax({
    type: "post",
    url: "../controllers/dashComunityController.php?method=datosEstadisticos",
    success: function (response) {
      data = JSON.parse(response);
      console.log(data);
      // INICIANDO DATOS GLOBAL
      let cantFb_global = 0;
      let cantIg_global = 0;
      let cantTikTok_global = 0;
      let cantYT_global = 0;
      // INICIANDO DATOS MES_ACTUAL
      let cantFb_actual = 0;
      let cantIg_actual = 0;
      let cantTikTok_actual = 0;
      let cantYT_actual = 0;
      // INICIANDO DATOS MES_ANTERIOR
      let cantFb_antes = 0;
      let cantIg_antes = 0;
      let cantTikTok_antes = 0;
      let cantYT_antes = 0;

      // * #### DATOS GLOBALES ESTADISTICA #####
      if (data["global"].length != 0) {
        for (let i = 0; i < data["global"].length; i++) {
          if (data["global"][i]["canal"] == "facebook") {
            cantFb_global = data["global"][i]["cantidad"];
          } else if (data["global"][i]["canal"] == "instagram") {
            cantIg_global = data["global"][i]["cantidad"];
          } else if (data["global"][i]["canal"] == "tiktok") {
            cantTikTok_global = data["global"][i]["cantidad"];
          } else if (data["global"][i]["canal"] == "youtube") {
            cantYT_global = data["global"][i]["cantidad"];
          }
        }
      }
      // * #### DATOS PARA MES ANTERIOR #####
      if (data["mesAntes"].length != 0) {
        for (let i = 0; i < data["mesAntes"].length; i++) {
          if (data["mesAntes"][i]["canal"] == "facebook") {
            cantFb_antes = data["mesAntes"][i]["cantidad"];
          } else if (data["mesAntes"][i]["canal"] == "Instagram") {
            cantIg_antes = data["mesAntes"][i]["cantidad"];
          } else if (data["mesAntes"][i]["canal"] == "tiktok") {
            cantTikTok_antes = data["mesAntes"][i]["cantidad"];
          } else if (data["mesAntes"][i]["canal"] == "youtube") {
            cantYT_antes = data["mesAntes"][i]["cantidad"];
          }
        }
      }
      // * #### DATOS PARA MES ACTUAL ####
      if (data["mesActual"].length != 0) {
        for (let i = 0; i < data["mesActual"].length; i++) {
          if (data["mesActual"][i]["canal"] == "facebook") {
            cantFb_actual = data["mesActual"][i]["cantidad"];
          } else if (data["mesActual"][i]["canal"] == "instagram") {
            cantIg_actual = data["mesActual"][i]["cantidad"];
          } else if (
            data["mesActual"][i]["canal"] == "tiktok"
          ) {
            cantTikTok_actual = data["mesActual"][i]["cantidad"];
          } else if (data["mesActual"][i]["canal"] == "youtube") {
            cantYT_actual = data["mesActual"][i]["cantidad"];
          }
        }
      }
      // * #### ASIGNANDO DATOS A LOS CARDS ####
      $("#cantMod").text(cantFb_global);
      $("#cantInst").text(cantIg_global);
      $("#cantImpl").text(cantTikTok_global);
      $("#cantAct").text(cantYT_global);

      
      // * #### CREANDO LAS TABLAS ESTADISTICAS DEL MES ANTERIOR ######
      const myChart = new Chart(ctx_anterior, {
        type: "bar",
        data: {
          labels: [
            "Facebook",
            "Instagram",
            "YouTube",
            "TikTok",
          ],
          datasets: [
            {
              label: "# de Tickets",
              data: [
                cantFb_antes,
                cantIg_antes,
                cantTikTok_antes,
                cantYT_antes,
              ],
              backgroundColor: [
                "rgba(54, 162, 235, 0.2)",
                "rgba(223, 70, 187, 0.2)",
                "rgba(255, 99, 132, 0.2)",
                "rgba(0, 0, 0, 0.2)",
              ],
              borderColor: [
                "rgba(54, 162, 235, 1)",
                "rgba(223, 70, 187, 1)",
                "rgba(255, 99, 132, 1)",
                "rgba(0, 0, 0, 1)",
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
      const myChart2 = new Chart(ctx_Actual, {
        type: "bar",
        data: {
          labels: [
            "Facebook",
            "Instagram",
            "YouTube",
            "TikTok",
          ],
          datasets: [
            {
              label: "# de Tickets",
              data: [
                cantFb_actual,
                cantIg_actual,
                cantTikTok_actual,
                cantYT_actual,
              ],
              backgroundColor: [
                "rgba(54, 162, 235, 0.2)",
                "rgba(223, 70, 187, 0.2)",
                "rgba(255, 99, 132, 0.2)",
                "rgba(0, 0, 0, 0.2)",
              ],
              borderColor: [
                "rgba(54, 162, 235, 1)",
                "rgba(223, 70, 187, 1)",
                "rgba(255, 99, 132, 1)",
                "rgba(0, 0, 0, 1)",
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