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
        <div class="content">
            <div class="category-area">
                <h3><?php echo "$nome_tema"; ?>:</h3>
            </div>
            <div class="enigma-area">
                <h3><?php echo "$nome_enigma"; ?></h3>
            </div>
            <div class="dicas-area">
                <?php 
                    $num = 1;
                    while ($linha = mysqli_fetch_assoc($dados_dica)){
                        $desc_dica = $linha['desc_dica'];
                        $id_dica = $linha['id_dica'];

                        echo "
                            <form action='dicaPage.php' method='POST'>
                                <input class='dica-item' type='submit' value='$num'>
                                <input type='hidden' name='id_enigma' value='$id_enigma'>
                                <input type='hidden' name='desc_dica' value='$desc_dica'>
                            </form>";
                        $num++;
                    }
                ?> 
                
            </div>
        </div>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>
</html>