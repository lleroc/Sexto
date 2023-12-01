class Usuarios_Model{
    constructor(UsuarioId,Cedula, Nombres, Apellidos,Telefono, Correo, Contrasenia, Rol,Ruta){
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
    todos(){  
        var html='';
        $.get('../../Controllers/usuario.controller.php?op=' + this.Ruta, (res)=>{
            console.log(res);
            res = JSON.parse(res);
            $.each(res,(index, valor)=>{
                html+=`<tr>
                <td>${index + 1}</td>
                <td>${valor.Nombres}</td>
                <td>${valor.Apellidos}</td>
                <td><div class="d-flex align-items-center gap-2">
                <span class="badge bg-primary rounded-3 fw-semibold">${valor.Rol}</span>
            </div></td>
            <td>
            <button class='btn btn-success' onclick='editar(${valor.UsuarioId})'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${valor.UsuarioId})'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${valor.UsuarioId})'>Ver</button>
            </td></tr>
                `;
            })
            $('#tabla_usuarios').html(html);
        })
    }
}