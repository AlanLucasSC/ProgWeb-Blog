<?php
require_once('funcoes.php');
valida();
?>
<!DOCTYPE html>
<head>
  <title> Alterar senha</title>
</head>
<body>
  <h3>Seu merda,altere seu Nome</h3><br>
  <form name="Alteracao_Nome" action="alterarnome.php" method="POST">
    <label>Nome: </label>
    <input type="password" name="Nome" size="30"><br>
    <input type="submit" name="enviar" value="Enviar">
  </form>
</body>
</html>