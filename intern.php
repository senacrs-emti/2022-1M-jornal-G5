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
    <form action="add.php" method="post" id="formulario">
        <div>
            <label for="categoria">Selecione a categoria:</label>
            <select name="categoria">
                <option value="Notícia">Notícia</option>
                <option value="Artigo de opinião">Artigo de Opinião</option>
                <option value="Crônica">Crônica</option>
                <option value="Charge">Charge</option>
            </select>
        </div>
        <div>
            <label for="titulo">Digite o título:</label>
            <input type="text" name="titulo" id="titulo" required>
        </div>
        <div>
            <label for="subtitulo">Digite o subtítulo:</label>
            <input type="text" name="subtitulo" id="subtitulo" required>
        </div>
        <div>
            <label for="postagem">Digite sua postagem aqui:</label>
            <textarea name="postagem" id="postagem" cols="30" rows="10" required></textarea>
        </div>
        <div>
            <label for="autor">Autor:</label>
            <input type="text" name="autor" id="autor" required>
        </div>        
        <input type="submit" name="submit" id="submit">
    </form>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Data</th>
                <th>Título</th>
                <th>Categoria</th>
                <th>Views</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <?php
                include_once('./includes/_config.php');
                $sql = "SELECT * FROM posts ORDER BY ID DESC";
                $result = $conexao->query($sql);
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "
                        <tr>
                        <td>$user_data[Id]</td>
                        <td>$user_data[Data_e_hora]</td>
                        <td>$user_data[Titulo]</td>
                        <td>$user_data[Categoria]</td>
                        <td>$user_data[Views]</td>
                        <td><a href='editar.php?id=$user_data[Id]'>Editar</a></td>
                        <td><a href='excluir.php?id=$user_data[Id]'>Excluir</a></td>
                        </tr>
                    ";
                };
            ?>
        </tbody>    
    </table>
    <script src="./assets/js/script.js"></script>
</body>
</html>

