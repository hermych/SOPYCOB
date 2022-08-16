const ctx = document.getElementById("myChart");
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

function validarInputSoloNumeros(evt) {
    let code = evt.which ? evt.which : evt.keyCode;
    if (code == 8) {
        // backspace.
        return true;
    } else if ((code >= 48 && code <= 57) || code == 46) {
        // is a number.
        return true;
    } else {
        // other keys.
        return false;
    }
}

function cargarTorta() {
    $.ajax({
        type: "post",
        url: "../controllers/CajaController.php?method=movimiento",
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
            data = JSON.parse(response);
            let datosTabla = data["tabla"];
            let datosTorta = data["torta"];
            // Asignando datos
            let ingresos = '0.00';
            let devoluciones = '0.00';
            let prestamos = '0.00';
            let gastos = '0.00';
            if (
                datosTorta["ingresos"].ingresosTotal != null ||
                datosTorta["ingresos"].ingresosTotal > 0
            ) {
                ingresos = datosTorta["ingresos"].ingresosTotal;
            }
            if (
                datosTorta["devoluciones"].devolucionesTotal != null ||
                datosTorta["devoluciones"].devolucionesTotal > 0
            ) {
                devoluciones = datosTorta["devoluciones"].devolucionesTotal;
            }
            if (
                datosTorta["prestamo"].prestamoTotal != null ||
                datosTorta["prestamo"].prestamoTotal > 0
            ) {
                prestamos = datosTorta["prestamo"].prestamoTotal;
            }
            if (
                datosTorta["gasto"].gastosTotal != null ||
                datosTorta["gasto"].gastosTotal > 0
            ) {
                gastos = datosTorta["gasto"].gastosTotal;
            }

            let montoInicial = datosTorta["montoInicial"];
            let egresos = ((parseFloat(prestamos) - parseFloat(devoluciones)) + parseFloat(gastos)).toFixed(2);
            let saldo = (parseFloat(ingresos) - parseFloat(egresos)).toFixed(2);
            //let saldo = ( parseFloat(ingresos) + parseFloat(montoInicial) + parseFloat(devoluciones) - parseFloat(prestamos) - parseFloat(gastos) ).toFixed(2);
            let montoSaldo = (parseFloat(montoInicial) + parseFloat(saldo)).toFixed(2);
            let cantIngresos = datosTabla["ingresos"][0].cant;
            let cantDevoluciones = datosTabla["devoluciones"][0].cant;
            let cantPrestamos = datosTabla["prestamo"][0].cant;
            let cantGastos = datosTabla["gasto"][0].cant;

            //* Asignando valores al card
            $("#montoInicialCard").text("S/ " + montoInicial);
            $("#ingresoCard").text("S/ " + ingresos);
            $("#devolucionCard").text("S/ " + devoluciones);
            $("#prestamoCard").text("S/ " + prestamos);
            $("#gastoCard").text("S/ " + gastos);
            $("#egresosCard").text("S/ " + egresos);
            $("#saldoCard").text("S/ " + saldo);
            $("#montoSaldo").text("S/ " + montoSaldo);
            $("#ingresosTotales").text("S/ " + ingresos);
            $("#cantIngresos").text(cantIngresos);
            $("#cantDevoluciones").text(cantDevoluciones);
            $("#cantPrestamos").text(cantPrestamos);
            $("#cantGastos").text(cantGastos);
            // CREAR TORTA ESTADISTICA DE MOVIMIENTO DE CAJA
            let chartStatus = Chart.getChart("myChart");
            if (chartStatus != undefined) {
                chartStatus.destroy();
            }
            torta(montoInicial, ingresos, devoluciones, prestamos, gastos);
        },
    });
}

function torta(montoInicial, ingresos, devoluciones, prestamos, gastos) {
    let myChar = new Chart(ctx, {
        type: "pie",
        data: {
            labels: [
                "Monto Inicial",
                "Ingresos",
                "Devoluciones",
                "Prestamos",
                "Gastos",
            ],
            datasets: [
                {
                    label: "My First Dataset",
                    data: [montoInicial, ingresos, devoluciones, prestamos, gastos],
                    backgroundColor: [
                        "rgb(0, 0, 0)",
                        "rgb(0, 255, 54)",
                        "rgb(255, 0, 0)",
                        "rgb(255, 195, 0)",
                        "rgb(0, 228, 255)",
                    ],
                    hoverOffset: 4,
                },
            ],
        },
    });
}

function tablaIngresos() {
    let ingresosTable = $("#tablaIngresos").DataTable({
        ajax: {
            url: "../controllers/CajaController.php?method=listarIngresos",
            method: "GET",
        },
        columns: [{data: "indice"}, {data: "descripcion"}, {data: "monto"}],
        language: español,
    });
    return ingresosTable;
}

function tablaDevoluciones() {
    if ($.fn.DataTable.isDataTable('#tablaDevolucion') == false) {
        devolucionesTable = $("#tablaDevolucion").DataTable({
            ajax: {
                url: "../controllers/CajaController.php?method=listarDevoluciones",
                method: "GET",
            },
            columns: [{data: "indice"}, {data: "descripcion"}, {data: "monto"}],
            language: español,
        });
    } else {
        devolucionesTable.ajax.reload()
    }
}

function tablaPrestamos() {
    if ($.fn.DataTable.isDataTable('#tablaPrestamo') == false) {
        prestamoTable = $("#tablaPrestamo").DataTable({
            ajax: {
                url: "../controllers/CajaController.php?method=listarPrestamos",
                method: "GET",
            },
            columns: [{data: "indice"}, {data: "descripcion"}, {data: "monto"}],
            language: español,
        });
    } else {
        prestamoTable.ajax.reload()
    }
}

function tablaGastos() {
    if ($.fn.DataTable.isDataTable('#tablaGasto') == false) {
        gastosTable = $("#tablaGasto").DataTable({
            ajax: {
                url: "../controllers/CajaController.php?method=listarGastos",
                method: "GET",
            },
            columns: [{data: "indice"}, {data: "descripcion"}, {data: "monto"}],
            language: español,
        });
    } else {
        gastosTable.ajax.reload()
    }
}

function consultarCajaAbierta() {
    window.$.ajax({
        type: "get",
        url: "CajaController.php?method=consultarCajaAbierta",
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
            data = JSON.parse(response);
            if (data.estado == "abrir") {
                $("#modalAbrirCaja").modal("show");
            } else {
                cargarTorta();
                let ingresosTable = tablaIngresos();
                tablaDevoluciones();
                tablaPrestamos();
                tablaGastos();
                $("#btnImprimir").css("display", "block");
                $("#btnOpciones").css("display", "block");
                $("#btnMovimiento").css("display", "block");
            }
        },
    });
}

$(document).ready(function () {
    consultarCajaAbierta();
});

// ************************ Abrir Caja *********************************
$("#btnAbrirCaja").on("click", function () {
    let montoCajaApertura = $("#montoCajaApertura").val();
    let formData = new FormData();
    formData.append("montoApertura", montoCajaApertura);
    window.$.ajax({
        type: "post",
        url: "CajaController.php?method=abrirCaja",
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
                $("#montoCajaApertura").val("");
                $("#btnAbrirCaja").prop('disabled', true);
                $("#modalAbrirCaja").modal("hide");
                Swal.fire({
                    text: data.mensaje,
                    icon: "success",
                });
                cargarTorta();
                tablaIngresos();
                tablaDevoluciones();
                tablaPrestamos();
                tablaGastos();
                $("#btnImprimir").css("display", "block");
                $("#btnOpciones").css("display", "block");
                $("#btnMovimiento").css("display", "block");
            } else {
                Swal.fire({
                    text: data.mensaje,
                    icon: "error",
                });
            }
        },
    });
});
$("#montoCajaApertura").blur(function () {
    if ($("#montoCajaApertura").val() != "") {
        $("#btnAbrirCaja").prop("disabled", false);
    } else {
        $("#btnAbrirCaja").prop("disabled", true);
    }
});
// *********************** Fin de abrir Caja *****************************

// ************************ Mostrar tabla de ingresos *********************************
$("#btnIngresos").click(function () {
    $("#divTablaPrestamo").css("display", "none");
    $("#divTablaGastos").css("display", "none");
    $("#divTablaDevolucion").css("display", "none");
    $("#divTablaIngresos").css("display", "block");
});
// ************************ Mostrar tabla de devoluciones ******************************
$("#btnDevoluciones").click(function () {
    $("#divTablaIngresos").css("display", "none");
    $("#divTablaPrestamo").css("display", "none");
    $("#divTablaGastos").css("display", "none");
    $("#divTablaDevolucion").css("display", "block");
});
// ************************ Mostrar tabla de prestamos *********************************
$("#btnPrestamos").click(function () {
    $("#divTablaIngresos").css("display", "none");
    $("#divTablaGastos").css("display", "none");
    $("#divTablaDevolucion").css("display", "none");
    $("#divTablaPrestamo").css("display", "block");
});
// ************************ Mostrar tabla de gastos *********************************
$("#btnGastos").click(function () {
    $("#divTablaIngresos").css("display", "none");
    $("#divTablaPrestamo").css("display", "none");
    $("#divTablaDevolucion").css("display", "none");
    $("#divTablaGastos").css("display", "block");
});
// ************************* No Abrir Caja *********************************************

// ************************** Proceso de editar monto inicial ****************************
$("#montoInicial").keyup(function () {
    if ($("#montoInicial").val().length != 0) {
        $("#btnEditarMontoInicial").prop("disabled", false);
    } else {
        $("#btnEditarMontoInicial").prop("disabled", true);
    }
});
$("#btnEditarMontoInicial").click(function () {
    let monto = $("#montoInicial").val();
    let formData = new FormData();
    formData.append("monto", monto);
    window.$.ajax({
        type: "post",
        url: "CajaController.php?method=editarMontoInicial",
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
                $("#modaMontoInicial").modal("hide");
                Swal.fire({
                    text: data.mensaje,
                    icon: "success",
                });
                setTimeout(() => {
                    Swal.close();
                }, 750);
                cargarTorta();
            } else {
                $("#modaMontoInicial").modal("hide");
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
// ************************** Fin del proceso editar monto inicial ***********************

// ************************** Proceso de ingresar nuevo movimiento de caja ***************************
setInterval(() => {
    if ($("#modalMovCaja").hasClass("show")) {
        let descripcion = $("#descripcion").val();
        let monto = $("#montoMov").val();
        let tipoMov = $("#tipoMov").val();
        if (descripcion != "" && monto != "" && tipoMov != "" && tipoMov != "0") {
            $("#btnIngresarMov").prop("disabled", false);
        } else {
            $("#btnIngresarMov").prop("disabled", true);
        }
    } else {
        $("#descripcion").val("");
        $("#montoMov").val("");
    }
}, 100);
$('#btnMovDevo').click(function () {
    $('#tipoMov').val("devol")
})
$('#btnMovPresta').click(function () {
    $('#tipoMov').val("prest")
})
$('#btnMovGasto').click(function () {
    $('#tipoMov').val("gasto")
})
// registrar
$('#btnIngresarMov').click(function () {
    let descripcion = $("#descripcion").val();
    let monto = $("#montoMov").val();
    let tipoMov = $("#tipoMov").val();
    let formData = new FormData();
    formData.append('descripcion', descripcion);
    formData.append('monto', monto);
    formData.append('tipoMov', tipoMov);
    window.$.ajax({
        type: "post",
        url: "CajaController.php?method=registrarMovimiento",
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
                $("#modalMovCaja").modal("hide");
                Swal.fire({
                    text: data.mensaje,
                    icon: "success",
                });
                cargarTorta();
                tablaDevoluciones();
                tablaPrestamos();
                tablaGastos();
            } else {
                Swal.fire({
                    text: data.mensaje,
                    icon: "error",
                });
            }
        },
    });

})
// ************************** Fin del proceso de ingresar nuevos movimientos de caja ********************

// ************************** Proceso de cerrar caja *************************************
$('#btnModalCerrarCaja').click(function () {
    console.log("click");
    window.$.ajax({
        type: "post",
        url: "CajaController.php?method=cerrarCaja",
        beforeSend: function () {
            Swal.fire({
                allowOutsideClick: false,
                title: 'Cargando',
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                    const b = Swal.getHtmlContainer().querySelector('b')
                    timerInterval = setInterval(() => {
                    }, 100)
                }
            })
        },
        success: function (response) {
            setTimeout(() => {
                Swal.close()
            }, 2000);
            let data = JSON.parse(response);
            if (data.estado == "ok") {
                Swal.fire({
                    text: data.mensaje,
                    icon: "success",
                });
                setTimeout(() => {
                    Swal.close();
                    window.location.href = "/views/home.php";
                }, 2000);
            } else {
                $("#modalAgregarCliente").modal("hide");
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
// *************************** Fin del proceso de Cerrar Caja ****************************

// *************************** Proceso de imprimir movimiento de caja ******************************
$('#btnImprimir').click(function () {
    window.$.ajax({
        type: "post",
        url: "ReportesController.php?method=movimientoCaja",
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
            window.open("../views/reportes/movimientoCaja.php", "_blank");
        },
    });
})



