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

    <?php
      require_once 'includes/busca.php';
    ?>
    
    <table class="listagem">
      <?php

      //Busca de todos os jogos.
      // aula 06 consulta utilizando join.
      $q = 
      "
      SELECT j.cod, j.nome, j.genero, j.capa, g.genero, p.produtora
      FROM jogos j JOIN generos as g
      ON j.genero = g.cod
      JOIN produtoras p on j.produtora = p.cod
      ORDER BY g.cod;
      ";

      $busca = $banco->query($q);
      if (!$busca) {
        echo '<tr><td> Infelismente a busca deu errado';
      } else {
        if ($busca->num_rows == 0) {
          echo "<tr><td>Nenhum registro encontrado.";
        } else {
          while ($reg = $busca->fetch_object()) {
            $caminho = thumb($reg->capa);
            echo 
            "
              <tr> 
              <td><img src='$caminho' class ='mini' />
              <td> 
              <a href='detalhes.php?cod=$reg->cod'> 
                $reg->nome
              </a>
              <br>
              $reg->produtora
              <td> $reg->genero
              <td> ADM
            ";
          }
        }
      }
      ?>
    </table>
  </div>
  <?php $banco->close(); 
  require_once 'includes/footer.php';
  ?>
</body>

</html>