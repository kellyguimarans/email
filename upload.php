<?php
  $nomePasta  = $_POST['nomePasta'];
 
  $nome_tmp = $_FILES['fileUpload']['tmp_name'];
  
  $destino = 'emails/'.$nomePasta.'/images/';

  $nome_real = $destino.$_FILES['fileUpload']['name'];

  // copy ($nome_tmp, $nome_real);
  move_uploaded_file($nome_tmp, $nome_real);

?>

