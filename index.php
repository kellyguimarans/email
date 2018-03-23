<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Icones -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Editor de texto -->
    <link rel="stylesheet" type="text/css" href="css/froala_editor.min.css">
    <link rel="stylesheet" type="text/css" href="css/froala_editor.pkgd.min.css">
    <link rel="stylesheet" href="css/plugins/colors.min.css">

    <!-- Sorteble -->
    <link href="http://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" rel="stylesheet">

    <title>Email marketing</title>
  </head>
  <body>

    <main class="container">
      <div class="row">
        <h1 class="col-12 text-center">Santander</h1>
      </div>
      
      <form enctype="multipart/form-data" name="fileUpload">
        <!-- Cria uma pasta para cada email -->

        <div class="form-group row">
          <label for="pasta" class="col-sm-2 col-form-label">Criar Pasta</label>
          <div class="col-sm-8">
            <input type="text" name="pasta" id="pasta" class="form-control" placeholder="Digite o texto" />
          </div>
          <div class="col-sm-2">
            <button type="button" id="adicionaPasta" class="btn btn-secondary form-control"> Adicionar </button>
          </div>
        </div>

        <div class="form-group row">
          <label for="pasta" class="col-sm-2 col-form-label">Upload Imagens</label>
          <div class="col-sm-8">
            <input type="file" name="fileUpload" id="fileUpload" class="form-control" placeholder="Digite o texto" multiple />
          </div>
          <div class="col-sm-2">
            <button type="button" id="adicionaImagens" class="btn btn-secondary form-control"> Adicionar </button>
          </div>
        </div>

        <hr />

        <div class="form-group row">
          <label for="preheader" class="col-sm-2 col-form-label">Pré-Header</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="textopreheader" placeholder="Digite o texto">
          </div>
          <div class="col-sm-2">
            <button type="button" class="btn btn-secondary form-control" id="addpreheader">Adicionar</button>
          </div>
        </div>

        <hr />

        <!-- Campo de texto personalizado -->
        <div class="form-group row">
          <label for="froala-editor" class="col-2 col-form-label">Texto</label>
          <div class="col-10">
            <textarea class="col-sm-10 fr-view" id="#froala-editor"></textarea>
          </div>
        </div>

        <hr />

        <!-- Puxa tds as imagens e cria uma amostra pra selecionar -->
        <div class="form-group row">

        <?php 
          $files = glob("emails/images/*.*");

          for ($i=0; $i<count($files); $i++) { 
          $num = $files[$i]; 
        ?>

          <div class="col-4 d-block">
            <label class="form-check-label">
              <input type="radio" class="form-check-input imgSelected" name="imagemSelecionada" id="imagemPasta<?php echo $i; ?>" value="<?php echo $num; ?>">
              <img src="<?php echo $num ?>" class="img-thumbnail d-block" />
            </label>
          </div>
        <?php } ?>
          <!-- Adiciona a imagem aqui sempre que selecionado o radio -->
          <!-- pra pegar o tamanho real da iamgem -->
          <img id="fullimage" class="invisible" src=""  style="display: none;" />
        </div>
        <!-- Fim de todas as imagens -->

        <!-- Botão de adicionar linha <TR></TR> -->
        <div class="form-group row">
          <div class="col-sm-12">
            <button type="button" id="addLinha" class="btn btn-secondary col-5 pull-left">Adicionar linha</button>
            <button type="button" id="excluiLinha" class="btn btn-secondary col-5 pull-right">Excluir linha</button>
          </div>
        </div>

        <!-- Tamanho da coluna -->
        <div class="form-group row">
          <label for="colLargura" class="col-2 col-form-label">Width</label>
          <div class="col-3">
            <input type="text" class="form-control" id="colLargura" placeholder="Digite a Largura" />
          </div>
          <!-- Altura da coluna -->
          <label for="colAltura" class="col-2 col-form-label">Height</label>
          <div class="col-3">
            <input type="text" class="form-control" id="colAltura" placeholder="Digite a Altura" />
          </div>
        </div>

        <!-- Botão de coluna -->
        <div class="form-group row">
          <div class="col-12">
            <button type="button" class="btn btn-secondary form-control col-5 pull-left" id="addtexto">Adicionar Coluna / Texto</button>
            <button type="button" class="btn btn-secondary form-control col-5 pull-right" id="excluirColuna">Excluir Coluna / Texto</button>
          </div>
        </div>


      </form>   

      <!-- Cria o html do email -->
      <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" id="first">
        <tbody> </tbody>
      </table>  

    </main>

    <!-- jQuery first, then Tether, then Bootstrap JS. -->
    <script src="http://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- Editor de texto -->
    <script src="js/froala_editor.min.js"></script>
    <script src="js/plugins/colors.min.js"></script>
    <script src="js/plugins/code_view.min.js"></script>
    <!-- Plugin do editor de texto -->
    <script type="text/javascript" src="js/plugins/code_beautifier.min.js"></script>
    <script type="text/javascript" src="js/plugins/font_family.min.js"></script>
    <script type="text/javascript" src="js/plugins/font_size.min.js"></script>
    <script type="text/javascript" src="js/plugins/align.min.js"></script>
    <!-- jquery ui -->
    <script src="http://code.jquery.com/ui/1.11.1/jquery-ui.js"></script>


    <script src="js/main.js"></script>
  </body>
</html>