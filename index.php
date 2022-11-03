<?php
    include_once './includes/_header.php';
?>

<main>
    <div class="noticias">
        <?php
            function imprimir($page){
                include_once './includes/_config.php';

                if($page == 'index'){
                    $sql = "SELECT * FROM posts ORDER BY Data_e_hora DESC";
                }else{
                    $sql = "SELECT * FROM posts WHERE `Categoria` = '$page' ORDER BY Data_e_hora DESC";
                }

                $result = $conexao->query($sql);
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<article onclick='redirect($user_data[Id])'>
                        <p>$user_data[Categoria]</p>
                        <h2>$user_data[Titulo]</h2>
                        <small>$user_data[Subtitulo]</small>
                    </article>";
                };
            };

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if (($page == 'Notícia') or ($page == 'Artigo de opinião') or ($page == 'Crônica') or ($page == 'Charge')){
                    imprimir($page);
                }else{
                    imprimir('index');
                };
            }else{
                imprimir('index');
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