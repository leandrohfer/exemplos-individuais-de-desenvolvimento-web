<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BootstrapCSS e Ícones Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/paciente.js" type="text/javascript"></script>
    <script src="js/jquery.mask.js" type="text/javascript"></script>

    <title>Envio de Certificados</title>

</head>

<body>
    <div class="container-fluid mt-3">
        <div align="center">
            <span class="h3">Envio de Certificados &nbsp<i class="bi bi-envelope-check"></i></span>
        </div>
        <div class="mt-1 px-5 py-3 shadow-sm rounded">
            <span class="h6">Filtro</span>
            <form id="formPaciente">
                <div class="form-group-sm row mb-1">
                    <div class="col-md-4 mb-2">
                        <select class="form-select" id="pacienteFiltro">
                            <optgroup label="Pesquisar por ...">
                                <option selected value="0">Nome do Participante</option>
                                <option value="1">CPF do Participante</option>
                                <option value="2">Endereço de E-mail</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-4 mb-2">
                        <input autocomplete="off" id="pacienteInput" name="pacienteInput" placeholder="Nome do Participante" type="text" class="form-control">
                    </div>
                    <div class="col-md-2 mb-2" style="display:flex;align-items:center;">
                        <button id="botao" type="submit" class="btn btn-outline-dark">Pesquisar</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="float-left mt-2 mb-2" style="text-align: right;">
            <button type="button" class="btn btn-outline-dark btn-lg"> Enviar Certificado por E-mail <i class="bi bi-send-check-fill"></i></button>
        </div>
        <div class=" container-fluid">
            <table class="table table-hover table-striped">
                <thead class="bg-light">
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Nome Completo</th>
                        <th scope="col">CPF</th>
                        <th scope="col">E-mail</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <tr>
                        <td colspan="4" align="center">Nenhum dado ainda...</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <div vw class="enabled">
        <div vw-access-button class="active"></div>
        <div vw-plugin-wrapper>
            <div class="vw-plugin-top-wrapper"></div>
        </div>
    </div>
    <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
    <script>
        new window.VLibras.Widget('https://vlibras.gov.br/app');
    </script>
</body>

</html>