<?php
  $nomePasta  = $_POST['nomePasta'];

  $pasta      = 'emails/'.$nomePasta.'/images/';
    
    $images_arr = array();

    foreach ($_FILES["fileUpload"]["error"] as $key => $val) {

        $tmp_name   = $_FILES["fileUpload"]["tmp_name"][$key];
        $nome       = $_FILES["fileUpload"]["name"][$key];
        $uploadfile = $pasta.basename($nome);

        if (move_uploaded_file($tmp_name, $uploadfile)) {
          
          $images_arr[] = $uploadfile;

          echo "<script> alert('Todas as imagens foram salvas na pasta ".$nomePasta."'); </script>";

        } else {
          
          echo "<script> alert('Erro ao enviar o arquivo " . $nome . "! Por favor tente outra vez!'); </script>";

        }
    }
?>
