<?php
    include_once './includes/_header.php';
?>

<main class = "row m-2">
    <div class="col-12 col-md-9 text-white text-justify mt-2">
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
                        echo "<article role='button' onclick='redirect($user_data[Id])' class='my-3 p-2' style='background-color: #607d8b; border-radius: 15px; box-shadow: 0px 0px 10px 2px rgba(0,0,0,0.7);'>
                        <h4 class='m-0'>$user_data[Titulo]</h4>
                        </article>";
                        $cont = $cont + 1;
                    };

                    echo"
                        <hr><h3>Comentários:</h3>
                    ";

                    if((!isset($_SESSION['verify']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['nome']) == true)){
                        echo'<h4><a href="entrar.php?page=Login" class="text-white">Faça login para comentar</a></h4><hr>';
                    }else{
                        $nome = $_SESSION['nome']['Nome'];
                        echo "
                        <form action='db_posts.php?page=comentario' method='post' id='formulario'>
                        <h5>$nome</h5>
                        <input type='hidden' name='Id da postagem' value=$Id>
                        <textarea name='Comentario' style='width:100%; border-radius:15px; background: #607d8b; color: white;'class='p-2   ' required></textarea>
                        <input type='submit' name='submit' id='submit' value='Comentar' style='border-radius:15px; background: #607d8b; color: white; outline-offset: 0px; border: none;' class='px-3 py-2'>
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
    <div class="d-none d-md-block col-3 text-light p-2">
        <img width='100%' src="http://4.bp.blogspot.com/-1BTg5fGw2zE/Upt-gxPlwcI/AAAAAAAAaqE/7nn2bnk0nb8/s1600/i+want+you+uncle+sam+tio+sam.jpg" alt="">
        <img class='mt-3' width='100%' src="http://4.bp.blogspot.com/-1BTg5fGw2zE/Upt-gxPlwcI/AAAAAAAAaqE/7nn2bnk0nb8/s1600/i+want+you+uncle+sam+tio+sam.jpg" alt="">
        <img class='mt-3' width='100%' src="http://4.bp.blogspot.com/-1BTg5fGw2zE/Upt-gxPlwcI/AAAAAAAAaqE/7nn2bnk0nb8/s1600/i+want+you+uncle+sam+tio+sam.jpg" alt="">
    </div>
</main>

<?php
    include_once './includes/_footer.php'
?>