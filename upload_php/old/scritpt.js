$('#formulario-atividade-extra').submit(function(e) {
    e.preventDefault();
    var formulario_extra = $(this);
    var retorno = inserirFormulario(formulario_extra);
  
  });

function inserirFormulario(dados) {

    //VERIFICANDO O TAMANHO DO ARQUIVO
    arquivo = $("#arquivo-cliente");
    arquivo = arquivo[0];
    file = arquivo.files;
    var impedir_upload;
    //file = file[0];
  
    if (file.length > 9) {
      alert("quantidade de arquivos excede o limite");
      return false;
    }
  
    ///Vericando o tamanho dos arquivos para validar seu upload
    for (var i = 0; i < file.length; i++) {
      if (validarArquivo(file[i]) != "ok")
        impedir_upload = true;
    };
  
    if (impedir_upload == true) {
      alert('Tipo de arquivo ou tamanho inválido');
      return false;
    }
  
  
    var formul = $('#formulario-atividade-extra-cliente')[0];
    var data = new FormData(formul);
  
  
    $.ajax({
      //dataType: "json",
      type: "POST",
      enctype: 'multipart/form-data',
      data: data,
      url: "../banco/banco-crm/pagina-atividade-extra-cliente/update-cliente.php",
      processData: false,
      contentType: false,
      cache: false,
      timeout: 600000
  
    }).done(function(data) {
  
      alert("Sucesso");
  
    }).fail(function() {
      alert("Falha");
  
    }).always(function(data) {
  
  
    });
  
  }
  
  
  //Função que  faz a validação dos arquivos
  function validarArquivo(file) {
  
    var pega_extensao = file.name.split(".");
    var extensao = pega_extensao[pega_extensao.length - 1];
  
    // Tipos permitidos
    var mime_types = [
      'xls',
      'csv',
      'txt',
      'pdf',
      'rar',
      'zip',
      'jpg',
      'jpeg',
      'jpg',
      'png'
    ];
  
  
    // Validar os tipos
    if (mime_types.indexOf(extensao) == -1) {
      console.log("Tipo inválido");
      return "Tipo inválido";
    }
  
    // Apenas 2MB é permitido
    if (file.size > 2 * 1024 * 1024) {
      console.log("Tamanho inválido");
      return "Tamanho inválido";
    }
  
    // Se der tudo certo
    return "ok";
  }