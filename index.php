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
                    $publicacoes = [];
                    while($user_data = mysqli_fetch_assoc($result)){
                        if($counter == 1){
                            echo"
                            <div role='button' class='w-100 px-3 px-lg-5 mb-lg-3 mt-1' onclick='redirect($user_data[Id])'>
                                <div class='d-flex flex-column flex-lg-row m-1 py-3 row' style='background-color: #607d8b; border-radius: 15px; box-shadow: 0px 0px 10px 4px rgba(0,0,0,0.7);'>
                                    <img class='d-none d-sm-block col-12 col-lg-4' src='$user_data[Imagem_capa]' alt=''>
                                    <div class='col-12 col-lg-8 d-flex flex-column justify-content-center align-items-center'>
                                        <h3 class='my-2 text-light'>$user_data[Titulo]</h3>
                                    </div>
                                </div>
                            </div>";
                        }else{
                            array_push($publicacoes, $user_data);
                        };
                        $counter++;        
                    };
                    $rows = ceil(count($publicacoes)/2)*2;
                    for($i = 0; $i < count($publicacoes); $i++){

                        if($rows > 0 and $i%2 == 0){
                            echo"<div class='row w-100 mx-3 my-0 my-lg-3 d-flex justify-content-around'>";
                        }
                        $noticia = $publicacoes[$i];
                        echo"
                        <div role='button' class='col-12 col-lg-5 px-0 py-3 mt-3 mt-lg-0 d-flex flex-column justify-content-around noticia' onclick='redirect($noticia[Id])' style='background-color: #607d8b; border-radius: 15px; box-shadow: 0px 0px 10px 4px rgba(0,0,0,0.7);'>
                            <div class='teste'>
                                <img class='d-none d-sm-block col-12' src='$noticia[Imagem_capa]' alt=''>
                            </div>
                            <div class='row m-2 d-flex flex-column align-items-sm-center'>
                                <h3 class='my-2 text-light text-center'>$noticia[Titulo]</h3>
                            </div>
                        </div>
                        ";
                        if($i%2 != 0 and $i != 0){
                            echo"</div>";
                        };
                        $rows--;
                    };
                    
                    echo "  
                    </div>
                    </main>
                    <aside class='d-none d-lg-flex col-3 flex-column align-items-center py-3'>
                    <h3 class='text-light'>Mais lidos:</h3>";

                    $sql = "SELECT * FROM posts ORDER BY Views DESC";
                    $result = $conexao->query($sql);
                    $counter = 0;
                    while($user_data = mysqli_fetch_assoc($result) and ($counter < 10)){
                        echo"
                        <div role='button' class='w-100 d-flex flex-column align-items-center my-2  p-1 border-bottom' onclick='redirect($user_data[Id])'>
                            <h5 class='text-light'>$user_data[Titulo]</h5>
                        </div>";
                        $counter++;
                    };
                    echo"
                        </aside>
                        <div class='row w-100 mx-3 p-2 text-light d-flex justify-content-around'>
                        <img class='w-100 d-sm-none' src='http://4.bp.blogspot.com/-1BTg5fGw2zE/Upt-gxPlwcI/AAAAAAAAaqE/7nn2bnk0nb8/s1600/i+want+you+uncle+sam+tio+sam.jpg' alt=''>
                        <img class='d-none w-25 d-sm-block' src='http://4.bp.blogspot.com/-1BTg5fGw2zE/Upt-gxPlwcI/AAAAAAAAaqE/7nn2bnk0nb8/s1600/i+want+you+uncle+sam+tio+sam.jpg' alt=''>
                        <img class='d-none w-25 d-sm-block' src='http://4.bp.blogspot.com/-1BTg5fGw2zE/Upt-gxPlwcI/AAAAAAAAaqE/7nn2bnk0nb8/s1600/i+want+you+uncle+sam+tio+sam.jpg' alt=''>
                        <img class='d-none w-25 d-sm-block' src='http://4.bp.blogspot.com/-1BTg5fGw2zE/Upt-gxPlwcI/AAAAAAAAaqE/7nn2bnk0nb8/s1600/i+want+you+uncle+sam+tio+sam.jpg' alt=''>
                        </div>
                    ";

                }else{
                    $sql = "SELECT * FROM posts WHERE `Categoria` = '$page' ORDER BY Data_e_hora DESC";
                    $result = $conexao->query($sql);
                    while($user_data = mysqli_fetch_assoc($result)){
                        echo"
                        <div role='button' class='mt-3 mx-3 py-2 row w-100' onclick='redirect($user_data[Id])' style='background-color: #607d8b; border-radius: 15px; box-shadow: 0px 0px 10px 4px rgba(0,0,0,0.7);'>
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