var init = ()=>{
   $('#frm_productos').on("submit",(e)=>{
    guardaryeditar(e);
   }) 
}
$().ready(()=>{
    todos();
});
var todos = ()=>{
    var html = '';
    $.get("../../Controllers/productos.controller.php?op=todos",(res)=>{
        console.log(res);
        res = JSON.parse(res);
        
        $.each(res,(index, valor)=>{
            html+=`<tr>
            <td>${index + 1} </td>
            <td><img src="${valor.Imagen}" class="card-img-top"></td>
            <td>${valor.Nombre}</td>
            <td>${valor.Precio_Venta}</td>
            <td>${valor.cantidad}</td>
            <td>${valor.Unidad_Medida}</td>
            <td>
            <button class='btn btn-success' onclick='editar(${
              valor.PaisId
            })'>Editar</button>
            <button class='btn btn-danger' onclick='eliminar(${
              valor.PaisId
            })'>Eliminar</button>
            <button class='btn btn-info' onclick='ver(${
              valor.PaisId
            })'>Ver</button>
            </td></tr>
                `;
            
        })

        $("#tabla_productos").html(html);

    })
}