<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descrição do Game</title>
    <link rel="stylesheet" href="estilos/style.css">
    <?php
        require_once 'banco.php';
        require_once 'includes/pathImages.php';
    ?>
</head>
<body>
    <div id="corpo">
        <h1>Descrição do Jogo</h1>

        <?php
            $url_cod_game = $_GET['cod'] ?? 0;
        ?>

        <?php
            $busca = $banco->query(
            "
                select * from jogos
                where cod = $url_cod_game
            "
            )->fetch_object();
        ?>

        <table class="detalhes">
            <tr><td rowspan='3'><?php
                echo '<img class="detalhesImg" src="estudonauta/fotos/' .   $busca->capa . '"/>'; 
            ?>
                <td id="descricaoTitle"><?php echo $busca->nome . ' ' . '<span id="nota">'. 'nota: '. $busca->nota . '/10.00</span>'?>
            <tr><td id="descricaoDesc"><?php echo $busca->descricao; ?>
            <tr><td>Adm
        </table>
        <a href="/index.php"><img src="estudonauta/icones/icoback.png"></a>
    </div>
</body>
</html>