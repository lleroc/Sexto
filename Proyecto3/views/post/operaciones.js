
var post = (operacion)=>{
    var numero1 = document.getElementById('numero1').value;
    var numero2 = document.getElementById('numero2').value;
    var url =`../../Controllers/post.controller.php?operacion=${operacion}`;
   
    var form_Data = new FormData(); 
    form_Data.append('numero1',numero1);
    form_Data.append('numero2',numero2);

   $.ajax({
    url:url,
    type:'POST',
    data:form_Data,
    contentType:false,
    processData:false,
    success:(resultado)=>{
        console.log(resultado);
        resultado = JSON.parse(resultado);
        document.getElementById('res').value = resultado;
    }
   });
}

