


var operacion = (operacion)=>{
    var numero1 = document.getElementById('numero1').value;
    var numero2 = document.getElementById('numero2').value;
    var url =`../Controllers/operaciones.controller.php?operacion=${operacion}&numero1=${numero1}&numero2=${numero2}`;
    var url2="../Controllers/operaciones.controller.php?operacion="+operacion+"&numero1="+numero1+"&numero2="+numero2;
    $.get(url,(resultado)=>{
        console.log(resultado);
        resultado = JSON.parse(resultado);
        document.getElementById('res').value = resultado;
    })
}

