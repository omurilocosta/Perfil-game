<?php 
    include 'conexao.php';
    $nome = $_POST['nome_jgd'];
    $sql = "INSERT INTO jogadores (nome_jgd) VALUES ('$nome')";
    mysqli_query($conn, $sql);

    header('Location: addPLayer.php');
    exit;
?>