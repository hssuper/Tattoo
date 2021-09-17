function cadastrarContato() {
    dados = {
        'email': $('#email').val(),
        'senha': $('#senha').val(),
        'nome': $('#nome').val(),
        'sobrenome': $('#sobrenome').val(),
        'cadastrar': $('#cadastrar').val()
    }

    // Mostra o Loading
}

function carregarModalLoading() {
    $('#modalLoading').css({
        "display": "block"
    });
}