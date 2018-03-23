<?php
  $nomePasta  = $_POST['nomePasta'];
 
  $nome_tmp = $_FILES['fileUpload']['tmp_name'];

  $nome_real = basename($_FILES['fileUpload']['name']);
  
  $destino = 'emails/'.$nomePasta.'/images/';

  // copy ($nome_tmp, $destino);
  move_uploaded_file( $_FILES['fileUpload']['tmp_name'], __DIR__."emails/'.$nomePasta.'/images/".$_FILES['fileUpload']['name']) 
?>

