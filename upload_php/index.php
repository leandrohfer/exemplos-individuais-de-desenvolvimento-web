<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // evento de "submit"
        $("#documento").click(function (e) {
            // parar o envio para que possamos faze-lo manualmente.
            e.preventDefault();
            // captura o formulário
            var form = $('#form_docs')[0];
            // cria um FormData {Object}
            var data = new FormData(form);
            // desabilitar o botão de "submit" para evitar multiplos envios até receber uma resposta
            $("#documento").prop("disabled", true);
            // processar
            $.ajax({
                type: "POST",
                enctype: 'multipart/form-data',
                url: "arquivo.php",
                data: data,
                processData: false, // impedir que o jQuery tranforma a "data" em querystring
                contentType: false, // desabilitar o cabeçalho "Content-Type"
                cache: false, // desabilitar o "cache"
                // manipular o sucesso da requisição
                success: function (data) {
                    $("#documento_e").html(data);
                    // reativar o botão de "submit"
                    $("#documento").prop("disabled", false);
                },
                // manipular erros da requisição
                error: function (e) {
                    $("#documento_e").html(e);
                    // reativar o botão de "submit"
                    $("#documento").prop("disabled", false);
                }
            });
        });
    });
</script>

<form id="form_docs" method="post" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>            
            <td>
            Tipo de Arquivo:<br />
            <input type="text" name="arqnome" id="arqnome">              
            </td>
            <td>
            Selecionar Arquivo:<br />
            <input type="file" name="arq[]" id="arq" multiple>
            </td>
            <td>
            <button type="button" id="documento" name="documento">Gravar</button>
            </td>
          </tr>
        </tbody>
      </table>
</form>
<div id="documento_e"></div> 