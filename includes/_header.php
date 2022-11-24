<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="./assets/js/script.js"></script>
    <title>Jornal da ciência</title>
</head>
<body class="container-fluid bg-dark" onresize="resize()">
    <div class="row">
    <header class="col-12">
      <div class="row d-flex justify-content-between pt-2 pb-1 px-3">
        <h3 class='text-light'>Jornal da Ciência</h3>
        <div class="d-flex">
        <?php
            session_start();
            $conectado = false;
            $admin = false;
            if((!isset($_SESSION['verify']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['nome']) == true)){
                session_destroy();
            }else{
                if($_SESSION['verify'] == 'admin'){
                  $admin = true;
                };
                $conectado = true;
            };

            if($conectado){
              if($admin){
                echo'<h5 class="mx-2" id="botaointerno">
                    <a href="./postar.php?page=postar" class="text-primary text-uppercase">Interno</a>
                    </h5>';
              };
              echo'<h5 class="mx-2" id="botaosair">
                <a href="./db_entrar.php?page=Sair" class="text-danger text-uppercase">Sair</a>
                </h5>';
            }else{
              echo'<h5 class="mx-2" id="botaologin">
              <a href="./entrar.php?page=Login" class="text-success text-uppercase">Login</a>
              </h5>';
            };

            echo'<a class="d-none" id="botaomenu" onclick="botao_menu()">
            <img width="40px" src="https://cdn-icons-png.flaticon.com/512/16/16033.png" alt="botão-menu">
            </a>';
        ?>
        </div>
      </div>
      <nav class="row d-flex justify-content-center py-2 pb-3" id="menu_nav">
        <div class="col-12 col-md-8 d-flex flex-column flex-md-row justify-content-around border">
          <a href="./index.php">Home</a>
          <a href="./index.php?page=Notícia">Notícias</a>
          <a href="./index.php?page=Artigo de opinião">Opiniões</a>
          <a href="./index.php?page=Crônica">Crônicas</a>
          <a href="./index.php?page=Charge">Charges</a>
          <?php
            if($conectado){
              if($admin){
                echo'<a class="d-none" id="botaointerno2" href="./postar.php?page=postar">Interno</a>';
              };
              echo'<a class="d-none" id="botaosair2" href="./db_entrar.php?page=Sair">Sair</a>';
            }else{
              echo'<a class="d-none" id="botaologin2" href="./entrar.php?page=Login">Login</a>';
            };
          ?>
        </div>
      </nav>
    </header>