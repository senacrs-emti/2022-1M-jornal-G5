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
                if($post == ''){
                    echo "<h1>Inexistente</h1>";
                }else{
                    $views = $post['Views'];
                    $views_novas = $views + 1;
                    $sql = "UPDATE posts SET Views=$views_novas WHERE `Id` = $Id";
                    $result = $conexao->query($sql);

                    echo "
                        <h6>$post[Autor] | $post[Data_e_hora] | $post[Categoria] | $views_novas</h6>
                        <h2>$post[Titulo]</h2>
                        <h4>$post[Subtitulo]</h4>
                        <hr>
                        <p>$post[Postagem]</p>
                    ";
                };
            };
        ?>
    </div>
    <div class="ads">
        ADS AQUI
    </div>
</main>

<?php
    include_once './includes/_footer.php'
?>