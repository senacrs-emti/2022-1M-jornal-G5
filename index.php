<?php
    include_once './includes/_header.php';
?>
        <?php
            function imprimir($page){
                include_once './includes/_config.php';
                if($page == 'index'){
                    echo"
                    <main class='col-12 col-lg-9 p-3'>
                        <div class='row d-flex justify-content-around px-0'>";
                    $sql = "SELECT * FROM posts ORDER BY Data_e_hora DESC";
                    $result = $conexao->query($sql);
                    $counter = 1;
                    while($user_data = mysqli_fetch_assoc($result)){
                        if($counter == 1){
                            echo"
                            <div class='col-12 col-sm-6 col-lg-12 my-2 pointer' onclick='redirect($user_data[Id])'>
                                <div class='d-flex flex-column flex-lg-row m-0 row row'>
                                    <img class='d-none d-sm-block col-12 col-lg-4' src='$user_data[Imagem_capa]' alt=''>
                                    <div class='col-12 col-lg-8 d-flex flex-column justify-content-center align-items-sm-center align-items-lg-start'>
                                        <h3 class='my-2 text-light'>$user_data[Titulo]</h3>
                                    </div>
                                </div>
                            </div>";
                        }else{
                            echo"
                            <div class='col-12 col-sm-6 my-2 pointer' onclick='redirect($user_data[Id])'>
                                <div class='d-flex flex-column border p-2'>

                                    <img class='d-none d-sm-block col-12' src='$user_data[Imagem_capa]' alt=''>
                                    <div class='col-12 d-flex flex-column align-items-sm-center'>
                                        <h3 class='my-2 text-light'>$user_data[Titulo]</h3>
                                    </div>
                                </div>
                            </div>";
                        };
                        $counter++;        
                    };
                    
                    echo "  
                    </div>
                    </main>
                    <aside class='d-none d-lg-flex col-3 flex-column align-items-center py-3'>
                    <h3 class='text-light'>Mais lidos:</h3>";

                    $sql = "SELECT * FROM posts ORDER BY Views DESC";
                    $result = $conexao->query($sql);
                    $counter = 0;
                    while($user_data = mysqli_fetch_assoc($result) and ($counter < 6)){
                        echo"
                        <div class='w-100 d-flex flex-column align-items-center my-2  p-1 pointer border-bottom' onclick='redirect($user_data[Id])'>
                            <h5 class='text-light'>$user_data[Titulo]</h5>
                        </div>";
                        $counter++;
                    };
                    echo"
                        </aside>
                        <div class='row w-100 mx-3 p-2 border text-light'>
                            Ads where
                        </div>
                    ";

                }else{
                    $sql = "SELECT * FROM posts WHERE `Categoria` = '$page' ORDER BY Data_e_hora DESC";
                    $result = $conexao->query($sql);
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo"
                        <div class='my-2 mx-3 pointer border row w-100' onclick='redirect($user_data[Id])'>
                            <div class='d-none d-sm-block col-3'>
                                <img width='100%' src='$user_data[Imagem_capa]'>
                            </div>
                            <div class='col-12 col-sm-9 d-flex flex-column align-items-center justify-content-center'>
                                <h4 class='text-light'>$user_data[Titulo]</h4>
                            </div>
                        </div>";
                    };
                };
            };


            if (isset($_GET['page'])) {
                $page = $_GET['page'];
                if (($page == 'Notícia') or ($page == 'Artigo de opinião') or ($page == 'Crônica') or ($page == 'Entrevistas')){
                    imprimir($page);
                }else{
                    imprimir('index');
                };
            }else{
                imprimir('index');
            }
        ?>
<?php
    include_once './includes/_footer.php'
?>