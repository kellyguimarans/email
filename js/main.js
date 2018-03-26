



// Retira a função de envio do form
jQuery("form").submit(function(){
  return false;
});



// inclui texto no pré-header.
jQuery('#addpreheader').click(function (){
  var textopreheader = jQuery('#textopreheader').val();

  jQuery('#preheader').text(textopreheader);
});


// Montando a view do que foi selecionado
// Adiciona linha
function adicionaLinha(){
  jQuery('#addLinha').click(function(){
    jQuery('table#first').append(
      '<tr> <td> <table align="center" border="0" cellpadding="0" cellspacing="0" width="600" style="border-collapse: collapse;"> <tr>'+
        // após adicionar a linha, incluir a coluna.
      '</tr> </table> </td> </tr>');
  });
}
adicionaLinha();

// Excluir linha
function removeLinha(){
  jQuery('#excluiLinha').click(function (){
    jQuery('table#first tr:last').remove();
  });
}
removeLinha();



// Variavel Global Imagens
var imgThumbnail, widthImg, heightImg;

// Verifica o tamanho da imagem
function verificaImagem(){
  jQuery('.imgSelected').change(function(){
    // Verifica a thumb selecionada
    imgThumbnail    = jQuery("input[name=imagemSelecionada]:checked");

    // Pega o caminho da imagem
    var srcImagem   = imgThumbnail.parent().find('img').attr('src');

    // Clona a imagem em uma tag img do html
    var cloneImg    = jQuery('#fullimage').attr('src', srcImagem);

    // tamanho e altura real da imagem clonada
    widthImg        = cloneImg.width();
    heightImg       = cloneImg.height();
  });
}
verificaImagem();

function adicionaColuna(){
  jQuery('#addtexto').click(function(){

    var texto = jQuery('textarea').froalaEditor('html.get', true);

    var width = jQuery('#colLargura').val();
    var height = jQuery('#colAltura').val();
    
    var radio = jQuery("input[name=imagemSelecionada]:checked").val();

    jQuery('table#first tr:last-child td table tr').append(
      '<td '
      + ( width ? 'width ="' + width + '" ' : "" ) 
      + ( height ? 'height ="' + height + '" ' : "" )
      +'>'
      +  (texto ? texto : "")
      +  (radio ? '<img src="'+ radio +'" width="'+widthImg+'" height="'+heightImg+'" border="0" style="display:block;" />' : '')
      +'</td>');

    radio = jQuery("input:radio").removeAttr("checked");
  });
}
adicionaColuna();

// Exluir coluna
function removeColuna(){
  jQuery('#excluirColuna').click(function(){
    jQuery('table#first tr:last td table tr td').remove();
  });
}
removeColuna();




// jQuery UI
// Muda linha de lugar
jQuery( "table tbody" ).sortable( {
  update: function( event, ui ) {
    jQuery(this).children().each(function(index) {
      jQuery(this).find('td').last(index + 1);
    });
  }
});


// API de texto
// puxa o editor de texto.
jQuery(function () { 
  jQuery('textarea').froalaEditor({
    enter: jQuery.FroalaEditor.ENTER_BR,
  });
});



// AJAX

// Função que Cria o MKDIR
function criarPasta(nomePasta){
  var page  = 'mkdir.php';

  jQuery.ajax(
      {
        type:       'POST',
        dataType:   'html',
        url:        page,
        data:       {nomePasta: nomePasta },
        success: function(msg){
          alert("Pasta "+ nomePasta +" criada com sucesso");
        }
      }
    );
}
// Dispara a função criarPasta
jQuery('#adicionaPasta').click(function(){
  criarPasta(jQuery('#pasta').val());
});

// Função de upload de imagens
function uploadImagem(nomePasta, form){

  var page = 'upload.php';
  var blobFile = jQuery('#fileUpload')[0].files[0];
  var fd = new FormData();

  fd.append('fileUpload', blobFile);
  fd.append('nomePasta', nomePasta);

  jQuery.ajax({
    url        : page,
    type       : 'POST',
    data       : fd,
    contentType: false,
    processData: false,
    success: function (data) {
      alert("Imagem "+form+ " armazenada na pasta " +nomePasta);
    }      
  });
}

jQuery('#adicionaImagens').click(function(){
  uploadImagem(jQuery('#pasta').val(), jQuery('#fileUpload').val());
});






