//archivo de donde llamar al procedimiento
//controlador

$().ready(()=>{
    todos();
});

var todos = ()=>{
    var todos = new Usuarios_Model('','','','','','','','','todos');
    var html = todos.todos(); 
}