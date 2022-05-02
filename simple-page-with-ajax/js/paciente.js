$(document).ready(function () {
    $("#pacienteFiltro").change(function (e) {
      e.preventDefault();
      $("#pacienteInput").attr(
        "placeholder",
        $("#pacienteFiltro option:selected").text()
      );
      $("#pacienteInput").val("");
  
      let value = $("#pacienteFiltro").val();
      if (value === "2") {
        $("#pacienteInput").unmask();
      } else if (value === "1") {
        $("#pacienteInput").mask("999.999.999-99");
      } else {
        $("#pacienteInput").unmask();
      }
    });
});
  