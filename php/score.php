<?php 
    $ptsPlayer = (int)$_POST['ptsPlayer'];

    $ptsDealer = 20 - $ptsPlayer;

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
    <body>
        <div class="mobile">
            <div class="content-mobile back">
                <div class="mensage">
                    <h2>Você deve andar <?php echo "$ptsDealer" ?> casas.</h2>
                    <h2>Jogador que acertou anda <?php echo "$ptsPlayer" ?> casas.</h2>
                </div>
                <div class="button-continue">
                    <a href="../html/attention.html">CONTINUAR</a>
                </div>
            </div>
        </div>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    </body>
</html>