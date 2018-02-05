// Retira a função de envio do form
jQuery("form").submit(function(){
  return false;
});

// inclui texto no pré-header.
jQuery('#addpreheader').click(function (){
  var textopreheader = jQuery('#textopreheader').val();

  jQuery('#preheader').text(textopreheader);
});

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

function verificaImagem(){
  jQuery('.imgSelected').change(function(){
    var id         = jQuery("input[name=imagemSelecionada]:checked").parent().find('img').attr('id');
    var widthImg   = jQuery("input[name=imagemSelecionada]:checked").parent().find('img').width();
    var heightImg  = jQuery("input[name=imagemSelecionada]:checked").parent().find('img').height();

    console.log(id);
    console.log(widthImg);
    console.log(heightImg);
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
      '<td width="'+width+'" height="'+height+'"'
      +'>'
      +  (texto ? texto : "")
      +  (radio ? '<img src="'+ radio +'" width="'+width+'" height="'+height+'" border="0" style="display:block;" />' : '')
      +'</td>');
  });
}
adicionaColuna();

// Exluir coluna
function removeColuna(){
  jQuery('#excluirColuna').click(function(){
    jQuery('table#first tr:last td table tr td:last').remove();
  });
}
removeColuna();


// Lógica de tamanho da imagem pra criar duas tds na hora de gerar o html.
// Não funciona
// Pensar em uma forma de puxar em ajax.
jQuery('img').change(function(e){
  var file, imagem, width, height;

    if ((file = this.files[0])) {
      var imagem = new Image();
      // evento disparado quando
      // a imagem terminou o carregamento
      imagem.onload = function() {
       var height = this.height,
           width = this.width,
           qnt   = this.length;
        
        depois();
      } 
      imagem.src = jQuery('img').attr('src');
    }

    function depois(){
      console.log('Width: ', width);
      console.log('Height: ', height);
    }
});

// Muda linha de lugar
jQuery( "table tbody" ).sortable( {
  update: function( event, ui ) {
    jQuery(this).children().each(function(index) {
      jQuery(this).find('td').last(index + 1);
    });
  }
});


// puxa o editor de texto.
jQuery(function () { 
  jQuery('textarea').froalaEditor({
    enter: jQuery.FroalaEditor.ENTER_BR,
  });
});
