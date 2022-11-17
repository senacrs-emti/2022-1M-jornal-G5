<?php
    include_once './includes/_header.php';
?>
        <?php
            function imprimir($page){
                include_once './includes/_config.php';
                if($page == 'index'){
                    echo"
                    <main class='col-12 col-lg-9 p-2'>
                        <div class='row d-flex justify-content-around px-0'>";
                    $sql = "SELECT * FROM posts ORDER BY Data_e_hora DESC";
                    $result = $conexao->query($sql);
                    $counter = 1;
                    while($user_data = mysqli_fetch_assoc($result)){
                        if($counter == 1){
                            echo"
                            <div class='col-12 col-sm-6 col-lg-12 my-2 pointer' onclick='redirect($user_data[Id])'>
                                <div class='d-flex flex-column flex-lg-row m-0 row border'>
                                    <img class='d-none d-sm-block col-12 col-lg-4' src='https://cdn.mos.cms.futurecdn.net/2XH7NjPrk9Gr9UaydoEVcH.jpg' alt=''>
                                    <div class='col-12 col-lg-8 d-flex flex-column justify-content-center align-items-sm-center align-items-lg-start'>
                                        <h2 class='my-2 text-light'>$user_data[Titulo]</h2>
                                        <p class='text-justify text-light'>$user_data[Subtitulo]</p>
                                    </div>
                                </div>
                            </div>";
                        }else{
                            echo"
                            <div class='col-12 col-sm-6 my-2 pointer' onclick='redirect($user_data[Id])'>
                                <div class='d-flex flex-column border'>
                                    <img class='d-none d-sm-block col-12' src='https://blog.fortestecnologia.com.br/wp-content/uploads/2020/01/fortes-tecnologia-inteligencia-artificial.png' alt=''>
                                    <div class='col-12 d-flex flex-column align-items-sm-center'>
                                        <h2 class='my-2 text-light'>$user_data[Titulo]</h2>
                                        <p class='text-justify text-light'>$user_data[Subtitulo]</p>
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
                    <h3 class='text-light'>Artigos mais lidos:</h3>";

                    $sql = "SELECT * FROM posts ORDER BY Views DESC";
                    $result = $conexao->query($sql);
                    $counter = 0;
                    while($user_data = mysqli_fetch_assoc($result) and ($counter < 4)){
                        echo"
                        <div class='w-100 d-flex flex-column align-items-center my-2 pointer border' onclick='redirect($user_data[Id])'>
                            <h4 class='text-light'>$user_data[Titulo]</h4>
                            <p class='text-justify text-light'>$user_data[Subtitulo]</p>
                        </div>";
                        $counter++;
                    };
                    echo"</aside>";

                }else{
                    //$sql = "SELECT * FROM posts WHERE `Categoria` = '$page' ORDER BY Data_e_hora DESC";
                    echo"aqui";
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
<?php
    include_once './includes/_footer.php'
?>