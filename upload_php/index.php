<html>

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

</html>