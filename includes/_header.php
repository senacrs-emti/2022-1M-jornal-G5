<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets/js/script.js"></script>
    <title>Jornal da ciência</title>
</head>
<body-container-fluid>
    
    <header>
        <h1>Jornal ciência</h1>
        <nav>
            <div>
                <a href="./index.php">Home</a>
            </div>
            <div>
                <a href="./index.php?page=Notícia">Notícias</a>
            </div>
            <div>
                <a href="./index.php?page=Artigo de opinião">Opiniões</a>
            </div>
            <div>
                <a href="./index.php?page=Crônica">Crônicas</a>
            </div>
            <div>
                <a href="./index.php?page=Charge">Charges</a>
            </div>
            <?php
                session_start();
                if((!isset($_SESSION['verify']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['nome']) == true)){
                    unset($_SESSION['nome']);
                    unset($_SESSION['email']);
                    unset($_SESSION['veriify']);
                    echo'<div>
                    <a href="./entrar.php?page=Login">Login</a>
                    </div>';
                }else{
                    echo'<div>
                    <a href="./db_entrar.php?page=Sair">Sair</a>
                    </div>';
                };
            ?>
        </nav>
    </header>