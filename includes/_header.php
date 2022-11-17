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
<body class="container-fluid bg-dark">
    <div class="row">
    <header class="col-12">
      <div class="row d-flex justify-content-between pt-2 pb-1 px-3">
        <h3 class='text-light'>Jornal da Ciência</h3>
        <div class="d-flex">
        <?php
            session_start();
            if((!isset($_SESSION['verify']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['nome']) == true)){
                session_destroy();
                echo'<h4 class="mx-2">
                <a href="./entrar.php?page=Login" class="text-success text-uppercase">Login</a>
                </h4>';
            }else{
                if($_SESSION['verify'] == 'admin'){
                    echo'<h4 class="mx-2">
                    <a href="./postar.php?page=postar" class="text-primary text-uppercase">Interno</a>
                    </h4>';
                };
                    
                echo'<h4 class="mx-2">
                <a href="./db_entrar.php?page=Sair" class="text-danger text-uppercase">Sair</a>
                </h4>';
            };
        ?>
        </div>
      </div>
      <nav class="row d-flex justify-content-center py-2 pb-3">
        <div class="col-8 d-flex justify-content-around">
          <a href="./index.php" class='text-light text-uppercase font-weight-bold'>Home</a>
          <a href="./index.php?page=Notícia" class='text-light text-uppercase font-weight-bold'>Notícias</a>
          <a href="./index.php?page=Artigo de opinião" class='text-light text-uppercase font-weight-bold'>Opiniões</a>
          <a href="./index.php?page=Crônica" class='text-light text-uppercase font-weight-bold'>Crônicas</a>
          <a href="./index.php?page=Charge" class='text-light text-uppercase font-weight-bold'>Charges</a>
        </div>
      </nav>
    </header>