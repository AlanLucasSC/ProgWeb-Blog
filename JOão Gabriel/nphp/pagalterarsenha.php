<?php
require_once('funcoes.php');
valida();
?>
<!DOCTYPE html>
<head>
  <title> Alterar senha</title>
</head>
<body>
  <h3>Seu merda,altere sua Senha</h3><br>
  <form name="Alteracao_senha" action="alterarsenha.php" method="POST">
    <label>Senha: </label>
    <input type="password" name="Senha" size="30"><br>
    <input type="submit" name="enviar" value="Enviar">
  </form>
</body>
</html>