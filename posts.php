<?php
    include_once './includes/_header.php';
?>

<main>
    <div class="noticias">
        <?php
            include_once('./includes/_config.php');

            if (isset($_GET['id'])) {
                $Id = $_GET['id'];

                $sql = "SELECT * FROM posts WHERE `Id` = $Id";
                $result = $conexao->query($sql);
                $post = mysqli_fetch_assoc($result);

                if(empty($post)){
                    echo "<h1>Inexistente</h1>";
                }else{
                    $views = $post['Views'];
                    $views_novas = $views + 1;
                    $sql = "UPDATE posts SET Views=$views_novas WHERE `Id` = $Id";
                    $result = $conexao->query($sql);

                    echo "
                        <h6>$post[Autor] | $post[Data_e_hora] | $post[Categoria] | $views_novas</h6>
                        <h2>$post[Titulo]</h2>
                    ";
                    
                    if(!empty($post['Subtitulo'])){
                        echo "<h4>$post[Subtitulo]</h4>";
                    };

                    echo"
                        <hr>
                        $post[Postagem]
                        <hr>
                        <h3>Mais Artigos:</h3>
                    ";

                    $sql = "SELECT * FROM posts WHERE `Id` != '$Id' ORDER BY Id DESC";
                    $result = $conexao->query($sql);
                    $cont = 0;
                    while(($user_data = mysqli_fetch_assoc($result)) and ($cont < 4)){
                        echo "<article onclick='redirect($user_data[Id])'>
                        <h2>$user_data[Titulo]</h2>
                        </article>";
                        $cont = $cont + 1;
                    };

                    echo"
                        <hr><h3>Comentários:</h3>
                    ";

                    if((!isset($_SESSION['verify']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['nome']) == true)){
                        session_destroy();
                        echo'<h4><a href="entrar.php?page=Login" style="color:blue;">Faça login para comentar</a></h4><hr>';
                    }else{
                        $nome = $_SESSION['nome']['Nome'];
                        echo "
                        <form action='db_posts.php?page=comentario' method='post' id='formulario'>
                        <h5>$nome</h5>
                        <input type='hidden' name='Id da postagem' value=$Id>
                        <textarea name='Comentario' style='width:100%' required></textarea>
                        <input type='submit' name='submit' id='submit' value='Comentar'>
                        </form>
                        <hr>
                        ";
                    };

                    $sql = "SELECT * FROM comentarios WHERE `Id da postagem` = '$Id' ORDER BY Id DESC";
                    $result = $conexao->query($sql);
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo 
                        "<div class='comentario'>
                        <h5>$user_data[Autor]</h5>
                        $user_data[Comentario]
                        <hr>
                        </div>";
                    };
                };
            }else{
                header("location: index.php");
            }
        ?>
    </div>
    <div class="ads">
        ADS AQUI
    </div>
</main>

<?php
    include_once './includes/_footer.php'
?>