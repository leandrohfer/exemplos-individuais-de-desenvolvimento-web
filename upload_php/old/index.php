<!-- <html>

<head>
    <title>Envio de arquivo</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="nome"><strong>Nome do Documento</strong></label>
        <input type="text" name="nome" id="nome" placeholder="Nome">
        <br><br>
        <label for="file" class="form-label"><strong>Documento:</strong></label>
        <input type="file" name="arquivo[]" id="file" multiple="multiple"/>
        <br><br>
        <input type="submit" value="Enviar" />
    </form>
</body>

</html> -->



<form class="col-lg-10 offset-lg-1" id="formulario-atividade-extra">
    <!--Departamento -->

    <!-- CAMPO DETALHES -->

    <label>Detalhes</label>
    <textarea name="detalhes-da-atividade-modal" id="detalhes-da-atividade-modal" placeholder="Descreva detalhes sobre a atividade que será realizada"></textarea>


    <label for="arquivo-modal">Insira o arquivo:</label>
    <input type="file" name="arquivo-cliente[]" id="arquivo-cliente" multiple />

    <input name="salvar-atividade-extra" id="salvar-atividade-extra" class="btn btn-md btn-primary" type="submit" value="Criar Atividade">

</form>