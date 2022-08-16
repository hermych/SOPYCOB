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
function pintarRoles(datos) {
    let rolUsuario = document.getElementById("rolUsuario");
    contenido = '<option value="0">Seleccion Cargo</option>';
    datos.forEach((rol) => {
        contenido += `<option value=${rol.idRol}>${rol.nombre}</option>`;
    });
    rolUsuario.innerHTML = contenido;
}
function validarDatos(datos) {
    respuesta = {};
    datos.forEach((dato) => {
        if (dato.value == "" || dato.value == "0") {
            respuesta[dato.name] = `El campo ${dato.name} es obligatorio`;
        }
        if (dato.name == "celular" || dato.name == "editCelUsuario") {
            if (dato.value.length < 9) {
                respuesta["cantDigitosCelular"] = "El campo tiene que tener 9 digitos";
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
function listarSucursalesFormEdit(idSucursal) {
    window.$.ajax({
        type: "GET",
        url: "SucursalController.php?method=listarSucursalesActivos",
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
            let sucursales = document.getElementById(`editSucursalUsuario`);
            contenido = '<option value="0">Seleccion Sucursal</option>';
            data.forEach((sucursal) => {
                contenido += `<option value=${sucursal.idSucursal}>${sucursal.nombre}</option>`;
            });
            sucursales.innerHTML = contenido;
            $("#editSucursalUsuario").val(idSucursal);
        },
    });
}

// ############# MODAL PARA GUARDAR USUARIOS ################
$("#btnAbrirModalGuardarUsuario").click(() => {
    let nombres = document.getElementById("nombreUsuario");
    let apellidos = document.getElementById("apellidoUsuario");
    let tipoDoc = document.getElementById("tipoDocUsuario");
    let nroDoc = document.getElementById("nroDocUsuario");
    let celular = document.getElementById("celUsuario");
    let email = document.getElementById("emailUsuario");
    let direccion = document.getElementById("direcUsuario");
    let rol = document.getElementById("rolUsuario");
    let sucursal = document.getElementById("sucursalUsuario");
    let password = document.getElementById("contraUsuario");
    datosArray = [
        nombres,
        apellidos,
        tipoDoc,
        nroDoc,
        celular,
        email,
        direccion,
        rol,
        sucursal,
        password,
    ];
    setInterval(() => {
        let respuesta = validarDatos(datosArray);
        if (Object.keys(respuesta).length == 0) {
            if (tipoDoc.value == 1) {
                if (nroDoc.value.length == 8) {
                    $("#btnGuardarUsuario").prop("disabled", false);
                } else {
                    $("#btnGuardarUsuario").prop("disabled", true);
                }
            } else if (tipoDoc.value == 2) {
                if (nroDoc.value.length == 11) {
                    $("#btnGuardarUsuario").prop("disabled", false);
                } else {
                    $("#btnGuardarUsuario").prop("disabled", true);
                }
            } else {
                $("#btnGuardarUsuario").prop("disabled", true);
            }
        } else {
            $("#btnGuardarUsuario").prop("disabled", true);
        }
    }, 200);
    window.$.ajax({
        type: "GET",
        url: "UsuarioController.php?method=listarRoles",
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
            pintarRoles(data);
        },
    });
});
$('#rolUsuario').change(function () {
    window.$.ajax({
        type: "GET",
        url: "SucursalController.php?method=listarSucursalesActivos",
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
            let sucursales = document.getElementById("sucursalUsuario");
            contenido = '<option value="0">Seleccion Sucursal</option>';
            data.forEach((sucursal) => {
                contenido += `<option value=${sucursal.idSucursal}>${sucursal.nombre}</option>`;
            });
            sucursales.innerHTML = contenido;
        },
    });
})
// *******************************************************

// ************* MODAL PARA EDITAR USUARIO ********************************
$("#tbody").on("click", "#btnAbriModalEditarUsuario", function () {
    let idUsuario = document.getElementById("idUsuarioEditar");
    let nombres = document.getElementById("editNombreUsuario");
    let apellidos = document.getElementById("editApellidosUsuario");
    let tipoDoc = document.getElementById("editTipoDocUsuario");
    let nroDoc = document.getElementById("editNroDocUsuario");
    let celular = document.getElementById("editCelUsuario");
    let email = document.getElementById("editEmailUsuario");
    let direccion = document.getElementById("editDirecUsuario");
    let rol = document.getElementById("editRolUsuario");
    let password = document.getElementById("editContrUsuario");
    datosArray = [
        nombres,
        apellidos,
        tipoDoc,
        nroDoc,
        celular,
        email,
        direccion,
        rol,
        password,
    ];
    setInterval(() => {
        let respuesta = validarDatos(datosArray);
        if (Object.keys(respuesta).length == 0) {
            if (tipoDoc.value == 1) {
                if (nroDoc.value.length == 8) {
                    $("#btnEditarUsuario").prop("disabled", false);
                } else {
                    $("#btnEditarUsuario").prop("disabled", true);
                }
            } else if (tipoDoc.value == 2) {
                if (nroDoc.value.length == 11) {
                    $("#btnEditarUsuario").prop("disabled", false);
                } else {
                    $("#btnEditarUsuario").prop("disabled", true);
                }
            } else {
                $("#btnEditarUsuario").prop("disabled", true);
            }
        } else {
            $("#btnEditarUsuario").prop("disabled", true);
        }
    }, 300);
});
// ************************************************************************

// ######## LLENAR DATA TABLE ############
$(document).ready(function () {
    let dataTable = $("#example").DataTable({
        ajax: {
            url: "../controllers/UsuarioController.php?method=listarUsuarios",
            method: "GET",
        },
        columns: [
            {data: "indice"},
            {data: "sucursal"},
            {data: "nombreApellido"},
            {data: "nroDocumento"},
            {data: "celular"},
            {data: "email"},
            {
                data: "estado",
                render: function (data, type, row) {
                    if (row.estado == 'activo') {
                        return `<button type="button" id="btnAbriModalEditarUsuario" class="editar btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button><button type="button" class="inhabilitar btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalInhabilitarUsuario"><i class="fas fa-trash-alt"></i></button>`;
                    }
                    if (row.estado == 'inhabilitado') {
                        return `<button type="button" id="btnAbriModalEditarUsuario" class="editar btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button><button type="button" class="habilitar btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#modalHabilitarUsuario"><i class="fas fa-check-circle"></i></button>`;
                    }
                }
            },
            /*{
                defaultContent: `
        <button type="button" id="btnAbriModalEditarUsuario" class="editar btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#modalEditarUsuario"><i class="fas fa-edit"></i></button>
        <button type="button" class="inhabilitar btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalInhabilitarUsuario"><i class="fas fa-trash-alt"></i></button>
        `,
            },*/
        ],
        language: español,
    });
    // Modal Editar con datos correspondientes
    $("#example tbody").on("click", ".editar", function () {
        let data = dataTable.row($(this).parents()).data();
        idSucursal = data.idSucursal;
        listarSucursalesFormEdit(idSucursal);
        window.$.ajax({
            type: "GET",
            url: "UsuarioController.php?method=listarRoles",
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
                let datos = JSON.parse(response);
                let rolUsuario = document.getElementById("editRolUsuario");
                contenido = "";
                datos.forEach((rol) => {
                    contenido += `<option value=${rol.idRol}>${rol.nombre}</option>`;
                });
                rolUsuario.innerHTML = contenido;
                $("#editRolUsuario").val(data.idRol);
            },
        });
        $("#editNombreUsuario").val(data.nombre);
        $("#editApellidosUsuario").val(data.apellido);
        if (data.documento == "DNI") {
            $("#editTipoDocUsuario").val("1");
        } else {
            $("#editTipoDocUsuario").val("2");
        }
        $("#editNroDocUsuario").val(data.nroDocumento);
        $("#editCelUsuario").val(data.celular);
        $("#editEmailUsuario").val(data.email);
        $("#editDirecUsuario").val(data.direccion);
        $("#editContrUsuario").val(data.contrasena);
        $("#idUsuarioEditar").val(data.idUsuario);
    });
    // Modal Inhabilitar usuario con datos correspondientes
    $("#example tbody").on("click", ".inhabilitar", function () {
        let data = dataTable.row($(this).parents()).data();
        $("#nombreUsuarioInhabilitarP").text(data.nombre);
        $("#idUsuarioInhabilitar").val(data.idUsuario);
    });
    // Modal habilitar usuario con datos correspondientes
    $("#example tbody").on("click", ".habilitar", function () {
        let data = dataTable.row($(this).parents()).data();
        $("#nombreUsuarioHabilitarP").text(`${data.nombre}, ${data.apellido}`);
        $("#idUsuarioHabilitar").val(data.idUsuario);
    });
    // Proceso de guardar usuario
    $("#btnGuardarUsuario").click(function (e) {
        let formData = new FormData();
        formData.append("nombres", ($('#nombreUsuario').val()).toUpperCase());
        formData.append("apellidos", ($('#apellidoUsuario').val()).toUpperCase());
        formData.append("tipoDoc", $('#tipoDocUsuario').val());
        formData.append("nroDoc", $('#nroDocUsuario').val());
        formData.append("celular", $('#celUsuario').val());
        formData.append("email", $('#emailUsuario').val());
        formData.append("direccion", ($('#direcUsuario').val()).toUpperCase());
        formData.append("rol", $('#rolUsuario').val());
        formData.append("sucursal", $('#sucursalUsuario').val());
        formData.append("password", $('#contraUsuario').val());
        window.$.ajax({
            type: "post",
            url: "UsuarioController.php?method=guardarUsuario",
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
                    $("#guardaUsuario").modal("hide");
                    $('#nombreUsuario').val("");
                    $('#apellidoUsuario').val("");
                    $('#tipoDocUsuario').val("0");
                    $('#nroDocUsuario').val("");
                    $('#celUsuario').val("");
                    $('#emailUsuario').val("");
                    $('#direcUsuario').val("");
                    $('#rolUsuario').val("0");
                    $('#sucursalUsuario').val("0");
                    $('#contraUsuario').val("");
                    Swal.fire({
                        text: data.mensaje,
                        icon: "success",
                    });
                    setTimeout(() => {
                        Swal.close();
                        dataTable.ajax.reload();
                    }, 1000);
                } else if (data.estado == 'existeEmail') {
                    Swal.fire({
                        text: data.mensaje,
                        icon: "error",
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
                    }, 1500);
                }
            },
        });
    });
    // Proceso de editar usuario
    $("#btnEditarUsuario").click(function (e) {
        let idUsuario = document.getElementById("idUsuarioEditar");
        let nombres = document.getElementById("editNombreUsuario");
        let apellidos = document.getElementById("editApellidosUsuario");
        let tipoDoc = document.getElementById("editTipoDocUsuario");
        let nroDoc = document.getElementById("editNroDocUsuario");
        let celular = document.getElementById("editCelUsuario");
        let email = document.getElementById("editEmailUsuario");
        let direccion = document.getElementById("editDirecUsuario");
        let rol = document.getElementById("editRolUsuario");
        let password = document.getElementById("editContrUsuario");
        let formData = new FormData();
        formData.append("nombres", (nombres.value).toUpperCase());
        formData.append("apellidos", (apellidos.value).toUpperCase());
        formData.append("tipoDoc", tipoDoc.value);
        formData.append("nroDoc", nroDoc.value);
        formData.append("celular", celular.value);
        formData.append("email", email.value);
        formData.append("direccion", (direccion.value).toUpperCase());
        formData.append("rol", rol.value);
        formData.append("password", password.value);
        formData.append("idUsuario", idUsuario.value);
        window.$.ajax({
            type: "post",
            url: "UsuarioController.php?method=editarUsuario",
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
                if ((data.estado = "ok")) {
                    nombres.value = "";
                    apellidos.value = "";
                    tipoDoc.value = "0";
                    nroDoc.value = "";
                    celular.value = "";
                    email.value = "";
                    direccion.value = "";
                    rol.value = "0";
                    password.value = "";
                    $("#modalEditarUsuario").modal("hide");
                    Swal.fire({
                        // title: 'Realizado!',
                        text: data.mensaje,
                        icon: "success",
                    });
                    setTimeout(() => {
                        Swal.close();
                        dataTable.ajax.reload();
                    }, 900);
                }
            },
        });
    });
    // Proceso de inhabilitar usuario
    $("#btnInhabilitarUsuario").click(function (e) {
        let idUsuario = document.getElementById("idUsuarioInhabilitar");
        let formData = new FormData();
        formData.append("idUsuario", idUsuario.value);
        window.$.ajax({
            type: "post",
            url: "UsuarioController.php?method=inhabilitarUsuario",
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
                    $("#modalInhabilitarUsuario").modal("hide");
                    Swal.fire({
                        text: data.mensaje,
                        icon: "success",
                    });
                    setTimeout(() => {
                        Swal.close();
                        dataTable.ajax.reload();
                    }, 900);
                }
            },
        });
    });
    // Proceso de habilitar categoria
    $('#btnHabilitarUsuario').click(function (e) {
        let formData = new FormData;
        formData.append("idUsuario", $('#idUsuarioHabilitar').val());
        window.$.ajax({
            type: "post",
            url: "UsuarioController.php?method=habilitarUsuario",
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
                if (data.estado == 'ok') {
                    $("#modalHabilitarUsuario").modal("hide");
                    Swal.fire({
                        text: data.mensaje,
                        icon: 'success',
                    })
                    setTimeout(() => {
                        Swal.close()
                        dataTable.ajax.reload();
                        $('#modalLoading').modal("hide");
                    }, 1000);
                }
            },
        });
    })
});
// Limpiar inputs de modal de agregar
setInterval(() => {
    if (!($("#guardaUsuario").hasClass("show"))) {
        $("#nombreUsuario").val('')
        $("#apellidoUsuario").val('')
        $("#tipoDocUsuario").val('0')
        $("#nroDocUsuario").val('')
        $("#celUsuario").val('')
        $("#emailUsuario").val('')
        $("#direcUsuario").val('')
        $("#rolUsuario").val('0')
        $("#contraUsuario").val('')
    }
}, 500);