<?php
  $nomePasta  = $_POST['nomePasta'];
 
  $nome_tmp = $_FILES['fileUpload']['tmp_name'];
  
  $destino = 'emails/'.$nomePasta.'/images/';

  $nome_real = $destino.basename($_FILES['fileUpload']['name']);

  var_dump($nomePasta);
  var_dump($nome_tmp);
  var_dump($destino);
  var_dump($nome_real);

  // copy ($nome_tmp, $nome_real);
  move_uploaded_file($nome_tmp, $nome_real);

?>

