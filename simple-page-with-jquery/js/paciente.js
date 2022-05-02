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

  let dados = [
    ["1", "LEANDRO HENRIQUE AUGUSTO BERTOS", "754.185.468-59", "teste@email.santa.gov.br"],
    ["2", "MENINA FERRÃO BASTOS VALENTE", "549.312.416-48", "victoria.valente@teste.email.com"],
    ["3", "JORGE AUGUSTO CÉZAR COELHO", "085.468.545-98", "jorge.coelho@teste.email.com"],
    ["1", "LEANDRO HENRIQUE AUGUSTO BERTOS", "754.185.468-59", "teste@email.santa.gov.br"],
    ["2", "MENINA FERRÃO BASTOS VALENTE", "549.312.416-48", "victoria.valente@teste.email.com"],
    ["3", "JORGE AUGUSTO CÉZAR COELHO", "085.468.545-98", "jorge.coelho@teste.email.com"],
    ["1", "LEANDRO HENRIQUE AUGUSTO BERTOS", "754.185.468-59", "teste@email.santa.gov.br"],
    ["2", "MENINA FERRÃO BASTOS VALENTE", "549.312.416-48", "victoria.valente@teste.email.com"],
    ["3", "JORGE AUGUSTO CÉZAR COELHO", "085.468.545-98", "jorge.coelho@teste.email.com"],
    ["1", "LEANDRO HENRIQUE AUGUSTO BERTOS", "754.185.468-59", "teste@email.santa.gov.br"],
    ["2", "MENINA FERRÃO BASTOS VALENTE", "549.312.416-48", "victoria.valente@teste.email.com"],
    ["3", "JORGE AUGUSTO CÉZAR COELHO", "085.468.545-98", "jorge.coelho@teste.email.com"],
    ["1", "LEANDRO HENRIQUE AUGUSTO BERTOS", "754.185.468-59", "teste@email.santa.gov.br"],
    ["2", "MENINA FERRÃO BASTOS VALENTE", "549.312.416-48", "victoria.valente@teste.email.com"],
    ["3", "JORGE AUGUSTO CÉZAR COELHO", "085.468.545-98", "jorge.coelho@teste.email.com"],
    ["1", "LEANDRO HENRIQUE AUGUSTO BERTOS", "754.185.468-59", "teste@email.santa.gov.br"],
    ["2", "MENINA FERRÃO BASTOS VALENTE", "549.312.416-48", "victoria.valente@teste.email.com"],
    ["3", "JORGE AUGUSTO CÉZAR COELHO", "085.468.545-98", "jorge.coelho@teste.email.com"],
    ["1", "LEANDRO HENRIQUE AUGUSTO BERTOS", "754.185.468-59", "teste@email.santa.gov.br"],
    ["2", "MENINA FERRÃO BASTOS VALENTE", "549.312.416-48", "victoria.valente@teste.email.com"],
    ["3", "JORGE AUGUSTO CÉZAR COELHO", "085.468.545-98", "jorge.coelho@teste.email.com"]
  ];

  if (dados.length != 0) {
    $("table > tbody > tr").remove();
    let tbody = $("table > tbody");
    for (let i = 0; i < dados.length; i++) {
      tbody.append(
        $("<tr>")
          .append($("<th>").append("<div class='custom-control custom-checkbox'><input type='checkbox' class='custom-control-input' id='marcarTodos'><label class='custom-control-label' for='marcarTodos'></label></div>"))
          .append($("<th>").append(i + 1))
          .append($("<td>").append(dados[i][1]))
          .append($("<td>").append(dados[i][2]))
          .append($("<td>").append(dados[i][3]))
      );
    }
  }
});
