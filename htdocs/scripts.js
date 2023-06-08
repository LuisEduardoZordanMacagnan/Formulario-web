let senha1 = document.getElementById('senha1');
let senha2 = document.getElementById('senha2');
let botao = document.getElementById('submit');

function compararSenha() {
    if ((senha1.value != senha2.value) || senha1.value == "") {
        botao.disabled = true;
    } else {
        botao.disabled = false;
    }
}