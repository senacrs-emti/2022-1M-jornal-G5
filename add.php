<?php

    if(isset($_POST['submit'])){
        include_once('./includes/_config.php');

        date_default_timezone_set('America/Sao_Paulo');

        $id_sql = "SELECT MAX(Id) FROM posts";
        $id = $conexao->query($id_sql);
        $id2 = mysqli_fetch_assoc($id);
        $id_new = $id2['MAX(Id)'] + 1;
        $categoria = $_POST['categoria'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $postagem = $_POST['postagem'];

        echo "$postagem";
        $autor = $_POST['autor'];
        $data_e_hora = date('d/m/Y H:i:s');
     
        $sql = "INSERT INTO posts VALUES";
        $sql .= "($id_new', '$titulo', '$subtitulo', '$postagem', '$autor', '$categoria', '$data_e_hora', '0')";
        $result = $conexao->query($sql);
    }

    header("location: intern.php");

?>