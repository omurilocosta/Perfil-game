<?php 
    $dica = $_POST['desc_dica'];
    $id_enigma = $_POST['id_enigma'];
    $id_dica = $_POST['id_dica'];
    $ptsPlayer = $_POST['ptsPlayer'];
    $ptsPlayer--;

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
            <div class="content-mobile back">
                <div class="tip-area">
                    <h3><?php echo "$dica"; ?></h3>
                </div>
                <div class="buttons-group">
                    <div class="button-check">
                        <form action="score.php" method="POST">
                            <?php echo "<input type='hidden' name='ptsPlayer' value='$ptsPlayer'>" ?>
                            <input type="submit" value="✓">
                        </form>
                    </div>
                    <div class="button-error">
                        <?php 
                            echo "<a id='error' href='tela_jogo.php?id=$id_enigma&pts=$ptsPlayer'><box-icon name='x' size='md' color='white'></box-icon></a>"
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>
</html>