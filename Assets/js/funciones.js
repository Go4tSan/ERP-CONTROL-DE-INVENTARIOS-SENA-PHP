let tblUsuarios;
let tblUsuariosTelefonos;
let tblTelefonos;
let tblSwitches;
let tblAccessPoint;
let tblImpresora;
document.addEventListener("DOMContentLoaded", function() {
    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "RegistrarUsuario/listar",
            dataSrc: ''
        },
        columns: [{ 'data': 'id_usuario' },
            { 'data': 'Tipo_Usuario' },
            { 'data': 'correo' },
            { 'data': 'nombre' },
            { 'data': 'Opciones' }
        ]


    });

    tblUsuariosTelefonos = $('#tblUsuariosTelefonos').DataTable({
        ajax: {
            url: base_url + "UsuariosTelefonos/listar",
            dataSrc: ''
        },
        columns: [
            { 'data': 'ID_Usuario' },
            { 'data': 'Nombre' },
            { 'data': 'Ubicacion' },
            { 'data': 'Observacion' },
            { 'data': 'Fecha_Observacion' },
            { 'data': 'Extencion' },
            { 'data': 'Estado' },
            { 'data': 'Opciones' }
        ]


    });


    tblTelefonos = $('#tblTelefonos').DataTable({
        ajax: {
            url: base_url + "Telefonos/listar",
            dataSrc: ''
        },
        columns: [
            { 'data': 'Id_Telefono' },
            { 'data': 'MAC' },
            { 'data': 'Nombre' },
            { 'data': 'Ambiente' },
            { 'data': 'Piso' },
            { 'data': 'Seria' },
            { 'data': 'Placa_Telefonica' },
            { 'data': 'Foto_Objeto' },
            { 'data': 'Foto_Ambiente' },
            { 'data': 'Marca' },
            { 'data': 'Observacion' },
            { 'data': 'Fecha_Observacion' },
            { 'data': 'Extencion' },
            { 'data': 'Asignacion' },
            { 'data': 'Opciones' }
        ]


    });

    tblSwitches = $('#tblSwitches').DataTable({
        ajax: {
            url: base_url + "Switches/listar",
            dataSrc: ''
        },
        columns: [
            { 'data': 'Id_Switch' },
            { 'data': 'MAC' },
            { 'data': 'IDF' },
            { 'data': 'Marquilla_Telefonica' },
            { 'data': 'Puertos_Switch' },
            { 'data': 'Lugar' },
            { 'data': 'Piso' },
            { 'data': 'Seria' },
            { 'data': 'Placa_Telefonica' },
            { 'data': 'Foto_Objeto' },
            { 'data': 'Foto_Ambiente' },
            { 'data': 'Marca' },
            { 'data': 'Observacion' },
            { 'data': 'Fecha_Observacion' },
            { 'data': 'Estado' },
            { 'data': 'Opciones' }
        ]


    });

    tblAccessPoint = $('#tblAccessPoint').DataTable({
        ajax: {
            url: base_url + "AccessPoint/listar",
            dataSrc: ''
        },
        columns: [
            { 'data': 'Id_Access' },
            { 'data': 'MAC' },
            { 'data': 'Switch' },
            { 'data': 'Ambiente' },
            { 'data': 'Piso' },
            { 'data': 'Seria' },
            { 'data': 'Placa_Telefonica' },
            { 'data': 'Foto_Objeto' },
            { 'data': 'Foto_Ambiente' },
            { 'data': 'Marca' },
            { 'data': 'Observacion' },
            { 'data': 'Fecha_Observacion' },
            { 'data': 'Estado' },
            { 'data': 'Opciones' }
        ]


    });

    tblImpresora = $('#tblImpresora').DataTable({
        ajax: {
            url: base_url + "Impresoras/listar",
            dataSrc: ''
        },
        columns: [
            { 'data': 'Id_Impresora' },
            { 'data': 'MAC' },
            { 'data': 'Ip' },
            { 'data': 'Modelo' },
            { 'data': 'Ambiente' },
            { 'data': 'Piso' },
            { 'data': 'Seria' },
            { 'data': 'Placa_Telefonica' },
            { 'data': 'Foto_Objeto' },
            { 'data': 'Foto_Ambiente' },
            { 'data': 'Marca' },
            { 'data': 'Observacion' },
            { 'data': 'Fecha_Observacion' },
            { 'data': 'Estado' },
            { 'data': 'Opciones' }
        ]


    });

})

setTimeout(() => {
    location.href = "VistaRapida/salir";
}, 3600000);


function frmUsuarios() {
    document.getElementById("id").value = "";
    document.getElementById("title").innerHTML = "Registrar usuario";
    document.getElementById("titleM").innerHTML = "Creación de usuario";
    document.getElementById("editarU").innerHTML = "📁 Registrar";
    document.getElementById("contras").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevoUsuario").modal("show");
}

function registrarUser(e) {
    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const usuario = document.getElementById("correo");
    const tipo = document.getElementById("Tipo");
    const clave = document.getElementById("clave");
    const repetir = document.getElementById("repetir");

    if (nombre.value == "" || usuario.value == "" || tipo.value == "" || repetir == "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        const url = base_url + "RegistrarUsuario/registrar";
        const frm = document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Usuario registrado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevoUsuario").modal("hide");
                    tblUsuarios.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Usuario modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevoUsuario").modal("hide");
                    tblUsuarios.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        }
    }



}

function btnEditarUser(id_usuario) {
    document.getElementById("title").innerHTML = "Editar usuario";
    document.getElementById("titleM").innerHTML = "Actualización de usuario";
    document.getElementById("editarU").innerHTML = "✒ Actualizar";
    const url = base_url + "RegistrarUsuario/editar/" + id_usuario;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("id").value = res.id_usuario;
            document.getElementById("nombre").value = res.nombre;
            document.getElementById("correo").value = res.correo;
            document.getElementById("Tipo").value = res.Tipo_Usuario;
            document.getElementById("contras").classList.add("d-none");
            $("#nuevoUsuario").modal("show");
        }
    }
}

function btnEliminarUser(id_usuario) {
    Swal.fire({
        title: '¿Desea eliminar?',
        text: "¡El usuario se eliminará de forma permanente!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "RegistrarUsuario/eliminar/" + id_usuario;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            '¡Eliminado!',
                            'El usuario ha sido eliminado.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function frmUsuariosTelefonos() {
    document.getElementById("title").innerHTML = "Registrar usuario de teléfono";
    document.getElementById("titleM").innerHTML = "Creación de usuario de teléfono";
    document.getElementById("editarUT").innerHTML = "📁 Registrar";
    document.getElementById("frmUsuarioTelefono").reset();
    $("#nuevoUsuarioTelefono").modal("show");
}

function frmUsuariosTelefonos() {
    document.getElementById("title").innerHTML = "Registrar usuario de teléfono";
    document.getElementById("titleM").innerHTML = "Creación de usuario de teléfono";
    document.getElementById("editarUT").innerHTML = "📁 Registrar";
    document.getElementById("frmUsuarioTelefono").reset();
    $("#nuevoUsuarioTelefono").modal("show");
}

function registrarUserTelefono(e) {
    e.preventDefault();
    const Nombre = document.getElementById("Nombre");
    const Ubicacion = document.getElementById("Ubicacion");
    const Observacion = document.getElementById("Observacion");
    const Fecha_Observacion = document.getElementById("Fecha_Observacion");
    const Extencion = document.getElementById("Extencion");

    if (Nombre.value == "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'El campo Nombre es obligatorio',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        const url = base_url + "UsuariosTelefonos/registrar";
        const frm = document.getElementById("frmUsuarioTelefono");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Usuario registrado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevoUsuarioTelefono").modal("hide");
                    tblUsuariosTelefonos.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Usuario modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevoUsuarioTelefono").modal("hide");
                    tblUsuariosTelefonos.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        }
    }



}

function btnEditarUserTelefono(ID_Usuario) {
    document.getElementById("title").innerHTML = "Editar usuario de teléfono";
    document.getElementById("titleM").innerHTML = "Actualización de usuario de teléfono";
    document.getElementById("editarUT").innerHTML = "✒ Actualizar";
    const url = base_url + "UsuariosTelefonos/editar/" + ID_Usuario;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("ID_Usuario").value = res.ID_Usuario;
            document.getElementById("Nombre").value = res.Nombre;
            document.getElementById("Ubicacion").value = res.Ubicacion;
            document.getElementById("Observacion").value = res.Observacion;
            document.getElementById("Extencion").value = res.Extencion;
            $("#nuevoUsuarioTelefono").modal("show");
        }
    }
}

function btnEliminarUserTelefono(ID_Usuario) {
    Swal.fire({
        title: '¿Desea deshabilitar el usuario?',
        text: "¡El usuario se deshabilitará y solo podra activarse nuevamente cuando se edite nuevamente el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Deshabilitar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "UsuariosTelefonos/eliminar/" + ID_Usuario;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            '¡Eliminado!',
                            'El usuario ha sido deshabilitado.',
                            'success'
                        )
                        tblUsuariosTelefonos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function recuperarUser(e) {
    e.preventDefault();
    const correo = document.getElementById("correo");
    const contra = document.getElementById("contra");
    if (correo.value == "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'El campo es obligatorio',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        const url = base_url + "RecuperarContra/recuperar";
        const frm = document.getElementById("frmUsuarioRecuperar");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            console.log(this.responseText);
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Usuario modificado con éxito ',
                        title: res,
                        showConfirmButton: true
                    })
                } else if (res == "El usuario digitado no existe") {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'El usuario no existe',
                        showConfirmButton: true
                    })
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: res,
                        showConfirmButton: true,

                    })
                }
            }
        }
    }



}

function frmTelefonos() {
    document.getElementById("Id_Telefono").value = "";
    document.getElementById("Label"). innerHTML = "📷 Foto del teléfono: ☎ ";
    document.getElementById("Label1").innerHTML =  "📸 Foto del Ambiente: 🏢";
    document.getElementById("img-preview").src = "";
    document.getElementById("img-preview1").src = "";
    document.getElementById("title").innerHTML = "Registrar Telefono";
    document.getElementById("titleM").innerHTML = "Creación de nuevo registro";
    document.getElementById("editarT").innerHTML = "📁 Registrar";
    document.getElementById("frmTelefonos").reset();
    $("#nuevoTelefono").modal("show");
}

function registrarTelefono(e) {
    e.preventDefault();
    const MAC = document.getElementById("MAC");
    const Serial = document.getElementById("Serial");
    const Placa_Telefonica = document.getElementById("Placa_Telefonica");
    const Marca = document.getElementById("Marca");

    if (MAC.value == "" || Serial.value == "" || Placa_Telefonica.value == "" || Marca == "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Los campos MAC, Serial, Placa teléfonica y Marca son obligatorios',
            showConfirmButton: false,
            timer: 1500
        })
    } else {
        const url = base_url + "Telefonos/registrar";
        const frm = document.getElementById("frmTelefonos");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            console.log(this.responseText);
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Teléfono registrado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevoTelefono").modal("hide");
                    tblTelefonos.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Teléfono modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevoTelefono").modal("hide");
                    tblTelefonos.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        }
    }



}

function btnEditarTelefono(Id_Telefono) {
    document.getElementById("title").innerHTML = "Editar teléfono";
    document.getElementById("titleM").innerHTML = "Actualización de teléfono";
    document.getElementById("editarT").innerHTML = "✒ Actualizar";
    const url = base_url + "Telefonos/editar/" + Id_Telefono;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("Id_Telefono").value = res.Id_Telefono;
            document.getElementById("MAC").value = res.MAC;
            document.getElementById("Ambiente").value = res.Ambiente;
            document.getElementById("Usuario").value = res.Usuarios;
            document.getElementById("Piso").value = res.Piso;
            document.getElementById("Serial").value = res.Seria;
            document.getElementById("Placa_Telefonica").value = res.Placa_Telefonica;
            document.getElementById("img-preview").src = base_url + 'ImagenesSistem/Telefonos/FotoObjeto/' + res.Foto_Objeto;
            document.getElementById("img-preview1").src = base_url + 'ImagenesSistem/Telefonos/FotoAmbiente/' + res.Foto_Ambiente;
            document.getElementById("Marca").value = res.Marca;
            document.getElementById("Observacion").value = res.Observacion;
            document.getElementById("Label").innerHTML = value = res.Foto_Objeto;
            document.getElementById("Label1").innerHTML = value = res.Foto_Ambiente;
            document.getElementById("foto_actual").value = res.Foto_Objeto;
            document.getElementById("foto_actual2").value = res.Foto_Ambiente;
            $("#nuevoTelefono").modal("show");
        }
    }
}

function btnEliminarTelefono(Id_Telefono) {
    Swal.fire({
        title: '¿Desea inhabilitar el elemento?',
        text: "¡El teléfono será inhabilitado hasta que se edite nuevamente el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Inhabilitar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Telefonos/eliminar/" + Id_Telefono;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            '¡Inhabilitado!',
                            'El Telefono ha sido inhabilitado.',
                            'success'
                        )
                        tblTelefonos.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function frmSwitches() {
    document.getElementById("Id_Switch").value = "";
    document.getElementById("Label"). innerHTML = "📷 Foto del switch: 📻";
    document.getElementById("Label1").innerHTML =  "📸 Foto del Ambiente: 🏢";
    document.getElementById("img-preview").src = "";
    document.getElementById("img-preview1").src = "";
    document.getElementById("title").innerHTML = "Registrar switch";
    document.getElementById("titleM").innerHTML = "Creación de nuevo registro";
    document.getElementById("editarS").innerHTML = "📁 Registrar";
    document.getElementById("frmSwitches").reset();
    $("#nuevoSwitch").modal("show");
}

function registrarSwitch(e) {
    e.preventDefault();
    const MAC = document.getElementById("MAC");
    const Serial = document.getElementById("Serial");
    const Placa_Telefonica = document.getElementById("Placa_Telefonica");
    const Marca = document.getElementById("Marca");
    const Marquilla = document.getElementById("Marquilla_Telefonica");

    if (MAC.value == "" || Serial.value == "" || Placa_Telefonica.value == "" || Marca == "" || Marquilla == "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Los campos MAC, Serial, Placa teléfonica, Marca, y Marquilla teléfonica son obligatorios',
            showConfirmButton: false,
            timer: 2500
        })
    } else {
        const url = base_url + "Switches/registrar";
        const frm = document.getElementById("frmSwitches");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Switch registrado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevoSwitch").modal("hide");
                    tblSwitches.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Switch modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevoSwitch").modal("hide");
                    tblSwitches.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        }
    }



}

function btnEditarSwitch(Id_Switch) {
    document.getElementById("title").innerHTML = "Editar ";
    document.getElementById("titleM").innerHTML = "Actualización de Switch";
    document.getElementById("editarS").innerHTML = "✒ Actualizar";
    const url = base_url + "Switches/editar/" + Id_Switch;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("Id_Switch").value = res.Id_Switch;
            document.getElementById("MAC").value = res.MAC;
            document.getElementById("IDF").value = res.IDF;
            document.getElementById("Marquilla_Telefonica").value = res.Marquilla_Telefonica;
            document.getElementById("Puertos_switch").value = res.Puertos_Switch;
            document.getElementById("Ubicacion").value = res.Lugar;
            document.getElementById("Piso").value = res.Piso;
            document.getElementById("Serial").value = res.Seria;
            document.getElementById("Placa_Telefonica").value = res.Placa_Telefonica;
            document.getElementById("img-preview").src = base_url + 'ImagenesSistem/Switches/FotoObjeto/' + res.Foto_Objeto;
            document.getElementById("img-preview1").src = base_url + 'ImagenesSistem/Switches/FotoAmbiente/' + res.Foto_Ambiente;
            document.getElementById("Marca").value = res.Marca;
            document.getElementById("Observacion").value = res.Observacion;
            document.getElementById("Label").innerHTML = value = res.Foto_Objeto;
            document.getElementById("Label1").innerHTML = value = res.Foto_Ambiente;
            document.getElementById("foto_actual").value = res.Foto_Objeto;
            document.getElementById("foto_actual2").value = res.Foto_Ambiente;
            $("#nuevoSwitch").modal("show");
        }
    }
}

function btnEliminarSwitch(Id_Switch) {
    Swal.fire({
        title: '¿Desea inhabilitar el elemento?',
        text: "¡El switch será inhabilitado hasta que se edite nuevamente el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Inhabilitar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Switches/eliminar/" + Id_Switch;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            '¡Inhabilitado!',
                            'El switch ha sido inhabilitado.',
                            'success'
                        )
                        tblSwitches.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function frmAccessPoint() {
    document.getElementById("Id_Access").value = "";
    document.getElementById("Label"). innerHTML = "📷 Foto del Access Point: 📡";
    document.getElementById("Label1").innerHTML =  "📸 Foto del Ambiente: 🏢";
    document.getElementById("img-preview").src = "";
    document.getElementById("img-preview1").src = "";
    document.getElementById("title").innerHTML = "Registrar Access point";
    document.getElementById("titleM").innerHTML = "Creación de nuevo registro";
    document.getElementById("editarA").innerHTML = "📁 Registrar";
    document.getElementById("frmAccessPoint").reset();
    $("#nuevoAccessPoint").modal("show");
}

function registrarAccessPoint(e) {
    e.preventDefault();
    const MAC = document.getElementById("MAC");
    const Serial = document.getElementById("Serial");
    const Placa_Telefonica = document.getElementById("Placa_Telefonica");
    const Marca = document.getElementById("Marca");
    const Switch = document.getElementById("Switch");

    if (MAC.value == "" || Serial.value == "" || Placa_Telefonica.value == "" || Marca == "" || Switch == "") {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Los campos MAC, Serial, Placa teléfonica, Marca, y Switch son obligatorios',
            showConfirmButton: false,
            timer: 2500
        })
    } else {
        const url = base_url + "AccessPoint/registrar";
        const frm = document.getElementById("frmAccessPoint");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Access point registrado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevoAccessPoint").modal("hide");
                    tblAccessPoint.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Access point modificado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevoAccessPoint").modal("hide");
                    tblAccessPoint.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        }
    }



}

function btnEditarAccessPoint(Id_Access) {
    document.getElementById("title").innerHTML = "Editar ";
    document.getElementById("titleM").innerHTML = "Actualización de AccessPoint";
    document.getElementById("editarA").innerHTML = "✒ Actualizar";
    const url = base_url + "AccessPoint/editar/" + Id_Access;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("Id_Access").value = res.Id_Access;
            document.getElementById("MAC").value = res.MAC;
            document.getElementById("Switch").value = res.Switch;
            document.getElementById("Ambiente").value = res.Ambiente;
            document.getElementById("Piso").value = res.Piso;
            document.getElementById("Serial").value = res.Seria;
            document.getElementById("Placa_Telefonica").value = res.Placa_Telefonica;
            document.getElementById("img-preview").src = base_url + 'ImagenesSistem/AccessPoint/FotoObjeto/' + res.Foto_Objeto;
            document.getElementById("img-preview1").src = base_url + 'ImagenesSistem/AccessPoint/FotoAmbiente/' + res.Foto_Ambiente;
            document.getElementById("Marca").value = res.Marca;
            document.getElementById("Observacion").value = res.Observacion;
            document.getElementById("Label").innerHTML = value = res.Foto_Objeto;
            document.getElementById("Label1").innerHTML = value = res.Foto_Ambiente;
            document.getElementById("foto_actual").value = res.Foto_Objeto;
            document.getElementById("foto_actual2").value = res.Foto_Ambiente;
            $("#nuevoAccessPoint").modal("show");
        }
    }
}

function btnEliminarAccessPoint(Id_Access) {
    Swal.fire({
        title: '¿Desea inhabilitar el elemento?',
        text: "¡El Access point será inhabilitado hasta que se edite nuevamente el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Inhabilitar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "AccessPoint/eliminar/" + Id_Access;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            '¡Inhabilitado!',
                            'El Access point ha sido inhabilitado.',
                            'success'
                        )
                        tblAccessPoint.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function frmImpresora() {
    document.getElementById("Id_Impresora").value = "";
    document.getElementById("Label"). innerHTML = "📷 Foto de la Impresora: 🖨";
    document.getElementById("Label1").innerHTML =  "📸 Foto del Ambiente: 🏢";
    document.getElementById("img-preview").src = "";
    document.getElementById("img-preview1").src = "";
    document.getElementById("title").innerHTML = "Registrar Impresora";
    document.getElementById("titleM").innerHTML = "Creación de nuevo registro";
    document.getElementById("editarI").innerHTML = "📁 Registrar";
    document.getElementById("frmImpresora").reset();
    $("#nuevoImpresora").modal("show");
}

function registrarImpresora(e) {
    e.preventDefault();
    const MAC = document.getElementById("MAC");
    const Serial = document.getElementById("Serial");
    const Placa_Telefonica = document.getElementById("Placa_Telefonica");
    const Marca = document.getElementById("Marca");

    if (MAC.value == "" || Serial.value == "" || Placa_Telefonica.value == "" || Marca == "" ) {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Los campos MAC, Serial, Placa teléfonica y Marca son obligatorios',
            showConfirmButton: false,
            timer: 2500
        })
    } else {
        const url = base_url + "Impresoras/registrar";
        const frm = document.getElementById("frmImpresora");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const res = JSON.parse(this.responseText);
                if (res == "si") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Impresora registrada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    frm.reset();
                    $("#nuevoImpresora").modal("hide");
                    tblImpresora.ajax.reload();
                } else if (res == "modificado") {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Impresora modificada con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    $("#nuevoImpresora").modal("hide");
                    tblImpresora.ajax.reload();
                } else {
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            }
        }
    }



}

function btnEditarImpresora(Id_Impresora) {
    document.getElementById("title").innerHTML = "Editar ";
    document.getElementById("titleM").innerHTML = "Actualización de Impresora";
    document.getElementById("editarI").innerHTML = "✒ Actualizar";
    const url = base_url + "Impresoras/editar/" + Id_Impresora;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const res = JSON.parse(this.responseText);
            document.getElementById("Id_Impresora").value = res.Id_Impresora;
            document.getElementById("MAC").value = res.MAC;
            document.getElementById("Ip").value = res.Ip;
            document.getElementById("Modelo").value = res.Modelo;
            document.getElementById("Ambiente").value = res.Ambiente;
            document.getElementById("Piso").value = res.Piso;
            document.getElementById("Serial").value = res.Seria;
            document.getElementById("Placa_Telefonica").value = res.Placa_Telefonica;
            document.getElementById("img-preview").src = base_url + 'ImagenesSistem/Impresoras/FotoObjeto/' + res.Foto_Objeto;
            document.getElementById("img-preview1").src = base_url + 'ImagenesSistem/Impresoras/FotoAmbiente/' + res.Foto_Ambiente;
            document.getElementById("Marca").value = res.Marca;
            document.getElementById("Observacion").value = res.Observacion;
            document.getElementById("Label").innerHTML = value = res.Foto_Objeto;
            document.getElementById("Label1").innerHTML = value = res.Foto_Ambiente;
            document.getElementById("foto_actual").value = res.Foto_Objeto;
            document.getElementById("foto_actual2").value = res.Foto_Ambiente;
            $("#nuevoImpresora").modal("show");
        }
    }
}

function btnEliminarImpresora(Id_Impresora) {
    Swal.fire({
        title: '¿Desea inhabilitar el elemento?',
        text: "¡La impresora será inhabilitada hasta que se edite nuevamente el registro!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Inhabilitar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const url = base_url + "Impresoras/eliminar/" + Id_Impresora;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    const res = JSON.parse(this.responseText);
                    if (res == "ok") {
                        Swal.fire(
                            '¡Inhabilitado!',
                            'La impresora ha sido inhabilitada.',
                            'success'
                        )
                        tblImpresora.ajax.reload();
                    } else {
                        Swal.fire(
                            'Mensaje',
                            res,
                            'error'
                        )
                    }
                }
            }
        }
    })
}

function ImpresoraE() {
             Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Reporte de impresora generado con éxito',
                showConfirmButton: false,
                timer: 1500   
            })
            window.location = base_url + "ImpreExcel/excel";

}

function TelefonoE() {
    Swal.fire({
       position: 'center',
       icon: 'success',
       title: 'Reporte de teléfono generado con éxito',
       showConfirmButton: false,
       timer: 1500   
   })
   window.location = base_url + "TelefonosExcel/excel";

}

function UserTE() {
    Swal.fire({
       position: 'center',
       icon: 'success',
       title: 'Reporte de usuario de teléfono generado con éxito',
       showConfirmButton: false,
       timer: 2000   
   })
   window.location = base_url + "UsuariosTelExcel/excel";

}

function AccessE() {
    Swal.fire({
       position: 'center',
       icon: 'success',
       title: 'Reporte del access point generado con éxito',
       showConfirmButton: false,
       timer: 2000   
   })
   window.location = base_url + "AccessExcel/excel";

}

function SwitchE() {
    Swal.fire({
       position: 'center',
       icon: 'success',
       title: 'Reporte del switch generado con éxito',
       showConfirmButton: false,
       timer: 2000   
   })
   window.location = base_url + "SwitchExcel/excel";

}


function preview(e) {
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview").src = urlTmp;
    document.getElementById("Label").innerHTML = `${url['name']}`;
}


function preview1(e) {
    const url = e.target.files[0];
    const urlTmp = URL.createObjectURL(url);
    document.getElementById("img-preview1").src = urlTmp;
    document.getElementById("Label1").innerHTML = `${url['name']}`;
}