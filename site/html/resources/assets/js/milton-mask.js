$(document).ready(function(){
    $(".input-nome").keyup(function()
    {
        var valor = $(".input-nome").val().toUpperCase().replace(/[^A-Z.ÃÁÀÂÄÊÉÈÊËĨÍÌÎÏÕÓÒÔÖŨÚÙÛÜÇ ]+/g,'')
        $(".input-nome").val(valor);
    });
    $(".input-curso").keyup(function()
    {
        var valor = $(".input-curso").val().toUpperCase().replace(/[^A-Z.ÃÁÀÂÄÊÉÈÊËĨÍÌÎÏÕÓÒÔÖŨÚÙÛÜÇ ]+/g,'')
        $(".input-curso").val(valor);
    });
    $(".input-mae").keyup(function()
    {
		var valor = $(".input-mae").val().toUpperCase().replace(/[^A-Z.ÃÁÀÂÄÊÉÈÊËĨÍÌÎÏÕÓÒÔÖŨÚÙÛÜÇ ]+/g,'');
		$(".input-mae").val(valor);
	});
    $(".input-pai").keyup(function()
    {
		var valor = $(".input-pai").val().toUpperCase().replace(/[^A-Z.ÃÁÀÂÄÊÉÈÊËĨÍÌÎÏÕÓÒÔÖŨÚÙÛÜÇ ]+/g,'');
		$(".input-pai").val(valor);
	});
    $(".input-endereco").keyup(function()
    {
		var valor = $(".input-endereco").val().toUpperCase().replace(/[^A-Z.ÃÁÀÂÄÊÉÈÊËĨÍÌÎÏÕÓÒÔÖŨÚÙÛÜºª°Ç,0-9 ]+/g,'');
		$(".input-endereco").val(valor);
	});

    $(".input-calc_total").mask("###.###.###.###.##0,0", {reverse: true});
    $(".input-calc_compl").mask("###.###.###.###.##0,0", {reverse: true});
    $(".input-nro_discip").mask("###.###.###.###.##0", {reverse: true});
    $(".input-tempo_mag").mask("###.###.###.###.##0", {reverse: true});
    $(".input-tempo_fora_mag").mask("###.###.###.###.##0", {reverse: true});
    $(".input-data").mask('00/00/0000');
    $('.input-cpf').mask('00000000000');
    $('.input-telefone').keydown(function(event) {
       if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
          $('.input-telefone').mask('(00) 00000-0009');
       } else {
          $('.input-telefone').mask('(00) 0000-00009');
       }
    });
});
