<?php
    include_once './includes/_header.php';
?>

<main>
    <div class="noticias">
        <?php
            include_once('config.php');

            $sql = "SELECT * FROM posts ORDER BY Data_e_hora DESC";
            $result = $conexao->query($sql);

            while($user_data = mysqli_fetch_assoc($result)){
                echo "<article>
                    <p>$user_data[Categoria]</p>
                    <h2>$user_data[Titulo]</h2>
                    <small>$user_data[Subtitulo]</small>
                </article>";
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