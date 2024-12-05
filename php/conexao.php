<?php 
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "perfil";

    if ($conn = mysqli_connect($server, $username, $password, $database) ) {
        // echo "Conectado!";
    } else {
        echo "Error: " . mysqli_connect_error();
    }

    function mensagem($texto,$tipo) {
        echo "<div class='alert alert-$tipo' role='alert'>$texto</div>";
    }
?>
