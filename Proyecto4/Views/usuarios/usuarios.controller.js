//archivo de donde llamar al procedimiento
//controlador

function init() {
  $("#form_usuarios").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$().ready(() => {
  //detecta carga de la pagina
  todos_controlador();
});

var todos_controlador = () => {
  var todos = new Usuarios_Model("", "", "", "", "", "", "", "", "todos");
  todos.todos();
}

var guardaryeditar = (e)=>{
    e.preventDefault();
    var formData = new FormData($("#form_usuarios")[0]);
   
    //var usuarios = new Usuarios_Model('',formData.get("Cedula"), formData.get("Nombres"), formData.get("Apellidos"), formData.get("Telefono"), formData.get("Correo"), formData.get("Contrasenia"), formData.get("Rol"),'insertar');
    var usuarios = new Usuarios_Model('','','','','','','',formData,'insertar');
    usuarios.insertar();
}

;init();
