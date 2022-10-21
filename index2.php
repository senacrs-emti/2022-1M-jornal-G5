<?php

    if(isset($_POST['submit'])){
        include_once('config.php');

        date_default_timezone_set('America/Sao_Paulo');

        $categoria = $_POST['categoria'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $categoria = $_POST['categoria'];
        $postagem = $_POST['postagem'];
        $autor = $_POST['autor'];
        $data_e_hora = date('d/m/Y H:i:s');

        $sql = "INSERT INTO posts VALUES";
        $sql .= "('$titulo', '$subtitulo', '$postagem', '$autor', '$categoria', '$data_e_hora', '0')";
        mysqli_query($conexao,$sql);
        mysqli_close($conexao);

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <style>
        *{
            margin: 0px;
            padding: 0px;
        }

        body{
            width: 100%;
            display: flex;
            padding-top: 2%;
            justify-content: center;
        }

        form{
            width: 70%;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form div{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        form label{
            font-size: 1.5em;
        }

        form button{
            width: 10%;
            aspect-ratio: 1.6/1;
        }
    </style>
</head>
<body>
    <form action="index2.php" method="post" id="formulario">
        <div>
            <label for="categoria">Selecione a categoria:</label>
            <select name="categoria">
                <option value="noticia">Notícia</option>
                <option value="opiniao">Artigo de Opinião</option>
                <option value="cronica">Crônica</option>
                <option value="charge">Charge</option>
            </select>
        </div>
        <div>
            <label for="titulo">Digite o título:</label>
            <input type="text" name="titulo" id="titulo">
        </div>
        <div>
            <label for="subtitulo">Digite o subtítulo:</label>
            <input type="text" name="subtitulo" id="subtitulo">
        </div>
        <div>
            <label for="postagem">Digite sua postagem aqui:</label>
            <textarea name="postagem" id="postagem" cols="30" rows="10"></textarea>
        </div>
        <div>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor">
        </div>        
        <input type="submit" name="submit" id="submit">
    </form>
    <script src="./assets/js/script.js"></script>
</body>
</html>

