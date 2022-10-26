<?php

    if(isset($_POST['submit'])){
        include_once('./includes/_config.php');

        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $postagem = $_POST['postagem'];
        $autor = $_POST['autor'];
     
        $sql = "UPDATE posts SET Titulo='$titulo', Subtitulo='$subtitulo', Postagem='$postagem', Autor='$autor'";
        $result = $conexao->query($sql);
    }

    header("location: intern.php");
?>