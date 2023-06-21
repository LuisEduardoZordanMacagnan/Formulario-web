let senha1 = document.getElementById('senha1');
let senha2 = document.getElementById('senha2');
let botao = document.getElementById('submit');

let senhaAntiga = document.getElementById('senha').value;
let campoSenhaAntiga = document.getElementById('campoSenhaAntiga');
let campoSenhaNova = document.getElementById('campoSenhaNova');
let submitSenha = document.getElementById('submitSenha');

function compararSenha() {
    if ((senha1.value != senha2.value) || senha1.value == "") {
        botao.disabled = true;
    } else {
        botao.disabled = false;
    }
}

function compararSenhaAntiga(){
    if(campoSenhaNova.value == ""){
        submitSenha.disabled = false;
    } else {
        if(campoSenhaAntiga.value != senhaAntiga){
            submitSenha.disabled = true;
        } else {
            submitSenha.disabled = false;
        }
    }
}