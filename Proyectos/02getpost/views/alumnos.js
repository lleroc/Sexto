var init = () => {
  $("#frm_alumnos").on("submit", (e) => {
    guardaryeditar(e);
  });
};

$().ready(() => {
  cargaTabla();
});

var cargaTabla = () => {
  $.get("../controllers/alumnos.controller.php?op=todos", (listaAlumnos) => {
    var html = "";
    console.log(listaAlumnos);
    listaAlumnos = JSON.parse(listaAlumnos);
    console.log(listaAlumnos);
    $.each(listaAlumnos, (index, alumno) => {
      html += `<tr>
                <td>${index + 1}</td>
                <td>${alumno.Nombre}</td>
                <td>${alumno.Apellido}</td>
                <td>${alumno.Edad}</td>
                <td><button class="btn btn-primary">Editar</button> <button class="btn btn-danger">Eliminar</button></td>
                </tr>
                `;
    });
    $("#cuerpoalumnos").html(html);
  });
};

var guardaryeditar = (e) => {
  e.preventDefault();
  var formData = new FormData($("#frm_alumnos")[0]);
  $.ajax({
    url: "../controllers/alumnos.controller.php?op=insertar",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
      $("#frm_alumnos")[0].reset();
      $("#modal").modal("hide");
      cargaTabla();
    },
  });
};

init();
