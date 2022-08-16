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
$(document).ready(function () {
    let dataTable = $("#suspencionesTable").DataTable({
        ajax: {
            url: "../controllers/ServiciosController.php?method=listarSuspenciones",
            method: "GET",
        },
        columns: [
            {data: "indice"},
            {data: "cliente"},
            {data: "servicio"},
            {data: "motivo"},
            {
                data: "estado",
                render: function (data, type, row) {
                    if(row.estado == 'porActivar'){
                        return `<span class="badge bg-warning text-dark">Por Activar</i></span>`;
                    }else{
                        return `<span class="badge bg-warning text-dark">Por Suspender</i></span>`;
                    }
                },
            },
            {
                data: "estado",
                render: function (data, type, row) {
                    if(row.estado == 'porActivar'){
                        return `<button type="button" class="activar btn btn-success btn-sm"><i class="fas fa-check-circle"></i>`;
                    }else{
                        return `<button type="button" class="suspender btn btn-success btn-sm"><i class="fas fa-check-circle"></i></button> <button type="button" class="cancelar btn btn-danger btn-sm"><i class="fas fa-ban"></i></button>`;
                    }
                },
            },
        ],
        language: español,
    });
    // Modal SUSPENDER servicio con datos correspondientes
    $("#suspencionesTable tbody").on("click", ".suspender", function () {
        let data = dataTable.row($(this).parents()).data();
        let formData = new FormData();
        formData.append("idClienteServicio", data.idClienteServicio);
        Swal.fire({
            title: '¿Se procedio a suspender el sistema?',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
        })
            .then((result) => {
                if (result.isConfirmed) {
                    window.$.ajax({
                        type: "post",
                        url: "ServiciosController.php?method=suspencion",
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
                            Swal.close()
                            let data = JSON.parse(response);
                            if (data.estado == "ok") {
                                dataTable.ajax.reload();
                                Swal.fire({
                                    text: data.mensaje,
                                    icon: "success",
                                });
                                setTimeout(() => {
                                    Swal.close();
                                    dataTable.ajax.reload();
                                }, 1000);
                            } else {
                                Swal.fire({
                                    text: data.mensaje,
                                    icon: "error",
                                });
                                setTimeout(() => {
                                    Swal.close();
                                }, 1000);
                            }
                        },
                    });

                }
            })
    });
    // Modal CANCELAR SUSPENCION servicio con datos correspondientes
    $("#suspencionesTable tbody").on("click", ".cancelar", function () {
        let data = dataTable.row($(this).parents()).data();
        let formData = new FormData();
        formData.append("idClienteServicio", data.idClienteServicio);
        Swal.fire({
            title: '¿Deseas cancelar la suspencion programada?',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
        })
            .then((result) => {
                if (result.isConfirmed) {
                    window.$.ajax({
                        type: "post",
                        url: "ServiciosController.php?method=cancelarSuspencionSoporte",
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
                                }
                            })
                        },
                        success: function (response) {
                            Swal.close()
                            let data = JSON.parse(response);
                            if (data.estado == "ok") {
                                dataTable.ajax.reload();
                                Swal.fire({
                                    text: data.mensaje,
                                    icon: "success",
                                });
                                setTimeout(() => {
                                    Swal.close();
                                    dataTable.ajax.reload();
                                }, 1000);
                            } else {
                                Swal.fire({
                                    text: data.mensaje,
                                    icon: "error",
                                });
                                setTimeout(() => {
                                    Swal.close();
                                }, 1000);
                            }
                        },
                    });

                }
            })
    });
    // Modal ACTIVAR SERVICIO con datos correspondientes
    $("#suspencionesTable tbody").on("click", ".activar", function () {
        let data = dataTable.row($(this).parents()).data();
        let formData = new FormData();
        formData.append("idClienteServicio", data.idClienteServicio);
        Swal.fire({
            title: '¿Deseas activar el servicio?',
            showCancelButton: true,
            confirmButtonText: 'Confirmar',
        })
            .then((result) => {
                if (result.isConfirmed) {
                    window.$.ajax({
                        type: "post",
                        url: "ServiciosController.php?method=cancelarSuspencionSoporte",
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
                                }
                            })
                        },
                        success: function (response) {
                            Swal.close()
                            let data = JSON.parse(response);
                            if (data.estado == "ok") {
                                dataTable.ajax.reload();
                                Swal.fire({
                                    text: data.mensaje,
                                    icon: "success",
                                });
                                setTimeout(() => {
                                    Swal.close();
                                    dataTable.ajax.reload();
                                }, 1000);
                            } else {
                                Swal.fire({
                                    text: data.mensaje,
                                    icon: "error",
                                });
                                setTimeout(() => {
                                    Swal.close();
                                }, 1000);
                            }
                        },
                    });

                }
            })
    });
});