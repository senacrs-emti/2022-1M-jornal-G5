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
            flex-direction: column;
            padding-top: 2%;
            align-items: center;
            gap: 40px;
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

        table{
            width: 80%;
            aspect-ratio: 5/1;
        }
    </style>
</head>
<body>
    <?php

        include_once('./includes/_config.php');

        if (isset($_GET['id'])) {
            $Id = $_GET['id'];
            $sql = "SELECT * FROM posts WHERE `Id` = $Id";
            $result = $conexao->query($sql);
            $post = mysqli_fetch_assoc($result);

            echo "
                <form action='atualizar.php' method='post' id='formulario'>
                    <div>
                        <label for='titulo'>Digite o título:</label>
                        <input type='text' name='titulo' id='titulo' value='$post[Titulo]' required>
                    </div>
                    <div>
                        <label for='subtitulo'>Digite o subtítulo:</label>
                        <input type='text' name='subtitulo' id='subtitulo' value='$post[Subtitulo]' required>
                    </div>
                    <div>
                        <label for='postagem'>Digite sua postagem aqui:</label>
                        <textarea name='postagem' id='postagem' cols='30' rows='10' required>$post[Postagem]</textarea>
                    </div>
                    <div>
                        <label for='autor'>Autor:</label>
                        <input type='text' name='autor' id='autor' value='$post[Postagem]' required>
                    </div>        
                    <input type='submit' name='submit' id='submit'>
                </form>";
        }
    ?>
    <script src="./assets/js/script.js"></script>
</body>
</html>