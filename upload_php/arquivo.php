<?php

if(isset($_POST)){

        var_dump($_FILES['arq']);
        echo '<br>';
        echo '<br>';

        for ($indice=0; $indice < count($_FILES['arq']['name']); $indice++) { 
            echo '<br>';
            echo $_FILES['arq']['name'][$indice];
            echo '<br>';
        }
        $img = $_FILES['arq']['name'];
        $arqnome = $_POST['arqnome'];
        $imgt="pasta";

        $ext = strtolower(strrchr($img, '.'));  
        $imgn = str_replace(' ','_',$arqnome).$ext; 
        $dest = $imgt . '_tmp/' . $imgn;        

        if (move_uploaded_file( $_FILES['arq']['tmp_name'], 'teste/' . $img )) {
             echo "Upload efetuado com sucesso!"; 
        }  else {
             echo "Não foi possível realizar o upload, tente novamente";
        }


        //codigo
        //código

}
?>