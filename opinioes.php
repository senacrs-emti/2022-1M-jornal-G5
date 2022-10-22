<?php
    include_once './includes/_header.php';
?>

<main>
    <div class="noticias">
        <?php
            include_once('./includes/_config.php');

            $sql = "SELECT * FROM posts WHERE `Categoria` = 'Artigo de opinião' ORDER BY Data_e_hora DESC";
            $result = $conexao->query($sql);

            if($result == ''){
                echo "Página Inexistente";
            }else{
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<article onclick='redirect($user_data[Id])'>
                        <p>$user_data[Categoria]</p>
                        <h2>$user_data[Titulo]</h2>
                        <h4>$user_data[Subtitulo]</h4>
                        </article>";
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