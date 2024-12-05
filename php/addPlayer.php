<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/encurt.css">
    <title>Perfil</title>
</head>
<body class="u-flex u-justfy-center u-items-center">
    <?php 
        include 'conexao.php';

        $sql = "SELECT * FROM jogadores";
        $dados = mysqli_query($conn,$sql);
    ?>
    <div class="display_mobile">
        <header class="header-add"><h1>ADICIONAR JOGADORES</h1></header>
        <div class="content">
            <div class="player-area">
                <?php 
                    while ($linha = mysqli_fetch_assoc($dados)){
                        $id = $linha['id_jgd'];
                        $nome = $linha['nome_jgd'];

                        echo "
                            <div class='player-item'>
                                <form action='excluirPlayer.php' method='POST'>
                                    <input type='submit' name='excluir_player' value='x'>
                                    <input type='hidden' name='id_jgd' value='$id'>
                                </form>
                                <div class='player-item--img'></div>
                                <div class='player-item--name'>$nome</div>
                            </div>";
                    }
                ?>         
                <div class="player-item">
                    <a href="#"><div class="player-item--add u-flex u-justfy-center u-items-center u-mt-4" data-bs-toggle="modal" data-bs-target="#addPlayerModal"><box-icon name='plus-medical' color='#a6a6a6'></box-icon></div></a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" id="addPlayerModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Adicionar Jogador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="addPlayer_script.php" method="POST">
                        <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" name="nome_jgd" placeholder="Nome">
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>        
    </div>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>