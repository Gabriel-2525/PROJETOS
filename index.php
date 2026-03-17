
<?php
$mensagem = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nota = $_POST["nota"] ?? null;
    if ($nota) {
        $arquivo = fopen("avaliacoes.txt", "a");
        fwrite($arquivo, "Nota: $nota estrelas - " . date("d/m/Y H:i:s") . PHP_EOL);
        fclose($arquivo);
        $mensagem = "💬 Obrigado pela sua avaliação de $nota estrelas!";
    } else {
        $mensagem = "⚠️ Por favor, selecione uma nota antes de enviar.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Avaliação - ALFA X</title>
  <link rel="stylesheet" href="style3.css">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Inter:wght@400&display=swap" rel="stylesheet">
  <style>
    /* só um estilo mínimo pra não depender do arquivo css */
    body{font-family:Inter,Arial;margin:30px}
    .estrela{cursor:pointer;font-size:26px;margin:2px;color:#ccc}
    .hidden{display:none}
    .btn-link{margin-left:10px}
    .mensagem-php{margin-top:20px;color:green}
  </style>
</head>
<body>

  <div class="container-avaliacao">
    <div class="logo">
      <h1 class="logo-title">ALFA <span>X</span></h1>
      <p class="logo-subtitle">Sua opinião é importante pra nós!</p>
    </div>

    <div id="avaliacao">
      <h2>Avalie nossa loja</h2>
      <p>Deixe sua nota de 1 a 10 ⭐</p>

      <form id="avaliacaoForm" method="POST" action="avaliacao.php">
        <div id="estrelas" class="estrelas">
          <?php for ($i = 1; $i <= 10; $i++): ?>
            <label>
              <input type="radio" name="nota" value="<?php echo $i; ?>" style="display:none;">
              <span class="estrela">★</span>
            </label>
          <?php endfor; ?>
        </div>

        <p id="notaEscolhida"></p>

        <div class="links-avaliacao">
          <button type="submit" class="avaliar-btn">Enviar Avaliação</button>
          <a href="index.html" class="btn-link">Voltar para Loja</a>
          <a href="index2.html" class="btn-link">Ver Produtos</a>
        </div>
      </form>

      <?php if ($mensagem): ?>
        <p class="mensagem-php"><?php echo htmlspecialchars($mensagem); ?></p>
      <?php endif; ?>
    </div>
  </div>

  <script>
    const estrelas = document.querySelectorAll('.estrela');
    const notaEscolhida = document.getElementById('notaEscolhida');
    const radios = document.querySelectorAll('input[name="nota"]');

    estrelas.forEach((estrela, index) => {
      estrela.addEventListener('click', () => {
        radios[index].checked = true;
        estrelas.forEach((e, i) => e.style.color = i <= index ? '#FFD700' : '#ccc');
        notaEscolhida.textContent = `Você selecionou ${index + 1} de 10 estrelas.`;
      });
    });
  </script>

<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
