<?php 
    include 'conexao.php';

    if ($id_enigma = $_GET['id'] ?? ''){
        $sql = "SELECT * FROM enigma WHERE `id_enigma` = '$id_enigma'";
        $dados = mysqli_query($conn,$sql);
        $linha = mysqli_fetch_assoc($dados);
        $nome_enigma = $linha['nome_enigma'];
        $id_fk = $linha['id_tema_fk'];

        $sql = "SELECT * FROM temas WHERE `id_tema` = '$id_fk'";
        $dados = mysqli_query($conn,$sql);
        $linha = mysqli_fetch_assoc($dados);
        $nome_tema = $linha['nome_tema'];

        $sql_dica = "SELECT * FROM dicas WHERE `id_enigma_fk` = '$id_enigma' LIMIT 20" ;
        $dados_dica = mysqli_query($conn, $sql_dica);
    } else {
        $sql = "SELECT * FROM temas ORDER BY RAND() LIMIT 1";
        $dados = mysqli_query($conn, $sql);
        $linha = mysqli_fetch_assoc($dados);
        $id_tema = $linha['id_tema'];
        $nome_tema = $linha['nome_tema'];

        $sql_enig = "SELECT * FROM enigma WHERE `id_tema_fk` = '$id_tema' ORDER BY RAND() LIMIT 1";
        $dados_enig = mysqli_query($conn, $sql_enig);
        $linha2 = mysqli_fetch_assoc($dados_enig);
        $id_enigma = $linha2['id_enigma'];
        $nome_enigma = $linha2['nome_enigma'];

        $sql_dica = "SELECT * FROM dicas WHERE `id_enigma_fk` = '$id_enigma' LIMIT 20" ;
        $dados_dica = mysqli_query($conn, $sql_dica);
    }

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
        <title>Perfil</title>
    </head>
    <body>
        <div class="mobile">
            <div class="content-mobile">
                <div class="category-area">
                    <h1>CATEGORIA: </h1>
                    <?php echo "<h1>$nome_tema</h1>" ?>
                </div>
                <div class="enigma-area">
                    <h1><?php echo "$nome_enigma" ?></h1>
                </div>
                <div class="dica-area">
                    <?php 
                        $num = 1;
                        while ($linha = mysqli_fetch_assoc($dados_dica)){
                            $desc_dica = $linha['desc_dica'];
                            $id_dica = $linha['id_dica'];
                            $ptsPlayer = $_GET['pts'] ?? 20;

                            echo "
                                <form action='dicaPage.php' method='POST'>
                                    <input class='dica-item' type='submit' value='$num'>
                                    <input type='hidden' name='id_enigma' value='$id_enigma'>
                                    <input type='hidden' name='desc_dica' value='$desc_dica'>
                                    <input type='hidden' name='id_dica' value='$id_dica'>
                                    <input type='hidden' name='ptsPlayer' value='$ptsPlayer'>
                                </form>";
                            $num++;
                        }
                    ?> 
                </div>
                <div class="button-finish">
                    <form action="score.php" method="POST">
                        <?php 
                            $ptsPlayer = $_GET['pts'] ?? '';
                            echo "
                                <input type='hidden' name='ptsPlayer' value='$ptsPlayer'>
                                <input type='submit' value='FINALIZAR'>"
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>