<?php

// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'imagens/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif', 'pdf');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = false;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

var_dump(json_encode($_FILES['arquivo']));
echo '<br><br>';

$arquivo = $_FILES['arquivo'];

for ($indice = 0; $indice < count($arquivo['name']); $indice++) {
    // Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
    if ($arquivo['error'][$indice] != 0) {
        echo "Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$arquivo['error'][$indice]];
        // die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
        die(); // Para a execução do script
    }

    // Faz a verificação da extensão do arquivo
    // $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    $extensao = strtolower(pathinfo($arquivo['name'][$indice], PATHINFO_EXTENSION));
    if (array_search($extensao, $_UP['extensoes']) === false) {
        echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
    }

    // Faz a verificação do tamanho do arquivo
    else if ($_UP['tamanho'] < $arquivo['size'][$indice]) {
        echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    }

    // O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
    else {
        // Primeiro verifica se deve trocar o nome do arquivo
        if ($_UP['renomeia'] == true) {
            // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
            $nome_final = time() . '.jpg';
        } else {
            // Mantém o nome original do arquivo
            $nome_final = $arquivo['name'][$indice];
        }
    }


    if (move_uploaded_file($arquivo['tmp_name'][$indice], $_UP['pasta'] . $arquivo["name"][$indice])) {
        echo "Upload realizado com sucesso<br>";
    } else {
        echo "Erro ao realizar upload";
    }
}
