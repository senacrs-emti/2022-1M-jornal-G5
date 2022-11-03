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
    session_start();
        if((!isset($_SESSION['verify']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['nome']) == true)){
            unset($_SESSION['nome']);
            unset($_SESSION['email']);
            unset($_SESSION['veriify']);
            header("location: index.php");
        }else{
            if($_SESSION['verify'] == 'admin'){
                if (isset($_GET['page'])){
                    $page = $_GET['page'];
                    include_once('./includes/_config.php');

                    if($page == 'postar'){
                        $nome = $_SESSION['nome']['Nome'];
                        echo "<form action='db_posts.php?page=adicionar' method='post' id='formulario'>
                            <div>
                                <label for='categoria'>Selecione a categoria:</label>
                                <select name='categoria'>
                                    <option value='Notícia'>Notícia</option>
                                    <option value='Artigo de opinião'>Artigo de Opinião</option>
                                    <option value='Crônica'>Crônica</option>
                                    <option value='Charge'>Charge</option>
                                </select>
                            </div>
                            <div>
                                <label for='titulo'>Digite o título:</label>
                                <input type='text' name='titulo' id='titulo' required>
                            </div>
                            <div>
                                <label for='subtitulo'>Digite o subtítulo:</label>
                                <input type='text' name='subtitulo' id='subtitulo' required>
                            </div>
                            <div>
                                <label for='postagem'>Digite sua postagem aqui:</label>
                                <textarea name='postagem' id='postagem' cols='30' rows='10' required></textarea>
                            </div>
                            <div>
                                <label for='autor'>Autor:</label>
                                <input type='text' name='autor' id='autor' value='$nome' required>
                            </div>        
                            <input type='submit' name='submit' id='submit'>
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
                            <tbody>";

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
                                <td><a href='postar.php?page=editar&id=$user_data[Id]'>Editar</a></td>
                                <td><a href='db_posts.php?page=excluir&id=$user_data[Id]'>Excluir</a></td>
                                </tr>
                                ";
                            };
                        echo '</tbody></table>';
                    }elseif($page == 'editar'){
                        if (isset($_GET['id'])) {
                            $Id = $_GET['id'];
                            $sql = "SELECT * FROM posts WHERE `Id` = $Id";
                            $result = $conexao->query($sql);
                            $post = mysqli_fetch_assoc($result);

                            echo "
                                <form action='db_posts.php?page=atualizar' method='post' id='formulario'>
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
                                        <input type='text' name='autor' id='autor' value='$post[Autor]' required>
                                    </div>        
                                    <input type='submit' name='submit' id='submit'>
                                </form>";
                        }else{
                            header("location: postar.php?page=postar");
                        };
                    }else{
                        header("location: index.php");
                    };
                }else{
                    header("location: index.php");
                };
            }elseif($_SESSION['verify'] == 'user'){
                header("location: index.php");
                // levar para postagem do forum
            }else{
                header("location: index.php");
            };
        }; 

?>