
<?php 
	$nomePasta	= $_POST['nomePasta'];

	mkdir(__DIR__.'/emails/'.$nomePasta.'/images/', 0777, true);
?>