<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema de jogos</title>
  <link rel="stylesheet" href="estilos/style.css">
  <?php
  // O que for necessário despejar de funções php.
    require_once "banco.php";
    require_once 'includes/pathImages.php';
  ?>
</head>

<body>
  <div id="corpo">

    <h1>Sistema de Jogos</h1>
    <table class="listagem">
      <?php
      //Busca de todos os jogos.
      $busca = $banco->query("select * from jogos order by nome");
      if (!$busca) {
        echo '<tr><td> Infelismente a busca deu errado';
      } else {
        if ($busca->num_rows == 0) {
          echo "<tr><td>Nenhum registro encontrado.";
        } else {
          while ($reg = $busca->fetch_object()) {
            $caminho = thumb($reg->capa);
            echo "
            <tr> <td><img src='$caminho' class ='mini' />
            <td> <a href='detalhes.php?cod=$reg->cod'>$reg->nome<a>
            <td> ADM
            ";
          }
        }
      }
      ?>
    </table>
  </div>
  <?php $banco->close(); ?>
</body>

</html>