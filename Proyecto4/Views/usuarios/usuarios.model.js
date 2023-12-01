
class Usuarios_Model {
  constructor(
    UsuarioId,
    Cedula,
    Nombres,
    Apellidos,
    Telefono,
    Correo,
    Contrasenia,
    Rol,
    Ruta
  ) {
    this.UsuarioId = UsuarioId;
    this.Cedula = Cedula;
    this.Nombres = Nombres;
    this.Apellidos = Apellidos;
    this.Telefono = Telefono;
    this.Correo = Correo;
    this.Contrasenia = Contrasenia;
    this.Rol = Rol;
    this.Ruta = Ruta;
  }
  todos() {
    var html = "";
    $.get("../../Controllers/usuario.controller.php?op=" + this.Ruta, (res) => {
      res = JSON.parse(res);
      $.each(res, (index, valor) => {
        var fondo;
        if(valor.Rol == "Administrador") fondo ="bg-primary"
        else if(valor.Rol == "Vendedor") fondo = "bg-success"
        else if(valor.Rol == "Cliente") fondo = "bg-warning"
        else if(valor.Rol == "Gerente") fondo = "bg-danger"
        else if(valor.Rol == "Cajero") fondo = "bg-info"
        html += `<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombres}</td>
                <td>${valor.Apellidos}</td>
                <td><div class="d-flex align-items-center gap-2">
                <span class="badge ${fondo} rounded-3 fw-semibold">${
                  valor.Rol
                }</span>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.UsuarioId
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.UsuarioId
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.UsuarioId
            })'>Ver</button>
            </td></tr>
                `;
      });
      $("#tabla_usuarios").html(html);
    });
  }

  insertar() {
    var dato = new FormData();
    dato = this.Rol;
   $.ajax({
    url: "../../Controllers/usuario.controller.php?op=insertar",
    type: "POST",
    data: dato,
    contentType: false,
    processData: false,
    success: function (res) {
        res = JSON.parse(res);
        if(res === "ok"){
            Swal.fire("usuarios", "Usuario Registrado", "success");
            todos_controlador();
        }else{
            Swal.fire("Error", res, "error"); 
        }
    }
   });
   this.limpia_Cajas();    
  }

  limpia_Cajas(){
    document.getElementById("Cedula").value = "";
    document.getElementById("Nombres").value = "";  
    document.getElementById("Apellidos").value = "";
    document.getElementById("Telefono").value = "";
    document.getElementById("Correo").value = "";
    document.getElementById("Contrasenia").value = "";
    document.getElementById("Contrasenia2").value = "";
    $("#Modal_usuario").modal("hide");
  }
}
