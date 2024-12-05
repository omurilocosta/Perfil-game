<?php 
    include 'conexao.php';
    $id_jgd = $_POST['id_jgd'] ?? '';
    $sql = "DELETE FROM `jogadores` WHERE `id_jgd` = '$id_jgd'";
    mysqli_query($conn, $sql);

    header('Location: addPLayer.php');
    exit;
?>