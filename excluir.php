<?php
    include_once('./includes/_config.php');

    if (isset($_GET['id'])) {
        $Id = $_GET['id'];
        $sql = "DELETE FROM `posts` WHERE `Id` = $Id;";
        $result = $conexao->query($sql);
    };

    header("location: intern.php");
?>