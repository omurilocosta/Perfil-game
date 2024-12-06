<?php 
    $dica = $_POST['desc_dica'];
    $id_enigma = $_POST['id_enigma']

?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="../css/encurt.css?v=<?php echo time(); ?>">

        <title>Perfil</title>
    </head>
    <body class="back">
        <div class="content u-flex u-flex-col u-items-center">
            <div class="tip-area">
                <h3><?php echo "$dica"; ?></h3>
            </div>
            <div class="buttons-group">
                <div class="button-check">
                    <a href="#"><box-icon name='check' size="md" color='white'></box-icon></a>
                </div>
                <div class="button-error">
                    <?php 
                        echo "<a href='tela_jogo.php?id=$id_enigma'><box-icon name='x' size='md' color='white'></box-icon></a>"
                    ?>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>
</html>