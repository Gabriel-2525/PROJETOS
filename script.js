const form = document.getElementById('cadastroForm');
const popup = document.getElementById('popup-sucesso');

form.addEventListener('submit', function(e) {
  e.preventDefault();

  const nome = document.getElementById('nome').value.trim();
  const email = document.getElementById('email').value.trim();
  const senha = document.getElementById('senha').value.trim();

  if(nome && email && senha) {
    // Mostrar popup
    popup.classList.remove('hidden');
    setTimeout(() => {
      popup.classList.add('show');
    }, 10); // animação de entrada

    // Fecha o popup depois de 2,5s
    setTimeout(() => {
      popup.classList.remove('show');
      setTimeout(() => popup.classList.add('hidden'), 300);
    }, 2500);

    // Resetar formulário
    form.reset();

    // Redireciona para página de compra depois do popup
    setTimeout(() => {
      window.location.href = "index2.html";
    }, 2700);

  } else {
    alert("Por favor, preencha todos os campos.");
  }
});
