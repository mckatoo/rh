function post(url, dados, action) {
    $.post(url, dados)
        .done(function() {
            if (typeof action == "undefined") {
                window.location.reload();
            } else {
                $('#bind').load(action);
            }
        });
}

function preencheCheckbox(checkbox, dados){
    $(checkbox).each(
        function(){
            $(this).prop("checked", false);
        }
    );
    for (var i = dados.length - 1; i >= 0; i--) {
        var el = checkbox+dados[i];
        $(checkbox+dados[i]).prop("checked", true);
    }
}

function preencheForm(elementos, dados) {
    for (var i = dados.length - 1; i >= 0; i--) {
        $(elementos[i]).val(dados[i]);
    }
    $("input:submit").val("Atualizar");
    $("input:submit").removeClass("btn-block");
    $(".cancelar").removeClass("hidden");
}

$("input:reset").on("click",function(){
    $("#id").val("");
    $("input:submit").val("Cadastrar");
    $("input:submit").addClass("btn-block");
    $(".cancelar").addClass("hidden");
})

function fecharModal(modal) {
    $(modal).modal('hide');
}

$(function() {
    $("input:file").change(function() { //ou Id do input 
        var fileInput = $(this);
        var maxSize = $(this).data('max-size') * 1000;

        if (fileInput.get(0).files.length > 0) {
            var fileSize = fileInput.get(0).files[0].size;
            if (fileSize > maxSize) {
                alert('O arquivo é maior que ' + maxSize / 1000 + 'kB');
                fileInput.val('');
                return false;
            }
        } else {
            alert('Escolha um arquivo, por favor.');
            return false;
        }
    });
});

setTimeout(function() {
    $('.alert').fadeOut();
}, 6000);

$('[data-toggle="tooltip"]').tooltip();