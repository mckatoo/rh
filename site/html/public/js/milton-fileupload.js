$('.file_tempo_mag').change(function(){
    var arq = this.files; // SELECIONA OS ARQUIVOS
    var qtde = arq.length; // CONTA QUANTOS TEM
    var tamanhoArquivo = [
        arq[0].size,
        arq[1].size,
        arq[2].size,
    ];

    if(qtde > 3) { // VERIFICA SE É MAIOR DO QUE 5
        alert("VOCÊ PODE SELECIONAR NO MÁXIMO 3 ARQUIVOS.");
        $(this).val("");
        return false;
    } else { // SE NÃO FOR MAIS DO QUE 5 ELE CONTINUA.
        for (var i = 0; i < tamanhoArquivo.length; i++) {
            if (tamanhoArquivo[i] > 2097152) { //MAX_FILE_SIZE = 2097152 Bytes
                alert("CADA ARQUIVO PODE TER NO MÁXIMO 2MB!");
                return false;
            }
        }
        return true;
    }
});
$('.file_tempo_exp').change(function(){
    var arq = this.files; // SELECIONA OS ARQUIVOS
    var qtde = arq.length; // CONTA QUANTOS TEM
    var tamanhoArquivo = [
        arq[0].size,
        arq[1].size,
        arq[2].size,
    ];

    if(qtde > 3) { // VERIFICA SE É MAIOR DO QUE 5
        alert("VOCÊ PODE SELECIONAR NO MÁXIMO 3 ARQUIVOS.");
        $(this).val("");
        return false;
    } else { // SE NÃO FOR MAIS DO QUE 5 ELE CONTINUA.
        for (var i = 0; i < tamanhoArquivo.length; i++) {
            if (tamanhoArquivo[i] > 2097152) { //MAX_FILE_SIZE = 2097152 Bytes
                alert("CADA ARQUIVO PODE TER NO MÁXIMO 2MB!");
                return false;
            }
        }
        return true;
    }
});
