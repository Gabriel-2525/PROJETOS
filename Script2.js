// Seleciona elementos principais
const estrelas = document.querySelectorAll('.estrela');
const notaEscolhida = document.getElementById('notaEscolhida');
const btnEnviar = document.getElementById('btnEnviarAvaliacao');
const mensagem = document.getElementById('mensagemAgradecimento');
let nota = 0;

// Selecionar estrelas

    // envia automaticamente o formulário
    document.getElementById('avaliacaoForm').submit();



// Enviar avaliação
btnEnviar.addEventListener('click', () => {
  if (nota > 0) {
    // Passa a nota para o input do formulário
    document.getElementById('inputNota').value = nota;
    // Envia para PHP
    document.getElementById('formAvaliacao').submit();
  } else {
    notaEscolhida.textContent = "Por favor, selecione uma nota antes de enviar.";
    notaEscolhida.style.color = "red";
  }
});

