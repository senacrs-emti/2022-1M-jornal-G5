<?php

    function user_out(){
        session_start(); 
        session_destroy();
    };

    if (isset($_GET['page'])){
        $page = $_GET['page'];
        include_once('./includes/_config.php');
        if($page == 'Novo usuario'){
            if(isset($_POST['submit'])){
                $nome = $_POST['nome'];
                $nascimento = $_POST['data'];
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $senha_segura = password_hash($senha, PASSWORD_DEFAULT);
        
                $email_existe = "SELECT Email FROM usuarios WHERE Email='$email'";
                $email_existe = $conexao->query($email_existe);
                $email_existe = mysqli_fetch_assoc($email_existe);
                if(empty($email_existe)){
                    $sql = "INSERT INTO usuarios VALUES";
                    $sql .= "('$nome', '$nascimento', '$email', '$senha_segura', 'user')";
                    $result = $conexao->query($sql);
                    header("location: entrar.php?page=Login");
                }else{
                    header("location: entrar.php?page=Cadastro%20existente");
                };
            }else{
                header("location: entrar.php?page=Cadastro");
            };
        }elseif($page == 'Verificar login'){
            if(isset($_POST['submit'])){
                session_start();        
                $email = $_POST['email'];
                $senha = $_POST['senha'];
                $nome = "SELECT Nome FROM usuarios WHERE Email='$email'";
                $nome = $conexao->query($nome); 
                $nome = mysqli_fetch_assoc($nome);
                
                $senha_db = "SELECT Senha FROM usuarios WHERE Email='$email'";
                $senha_db = $conexao->query($senha_db);
                $senha_db = mysqli_fetch_assoc($senha_db);
        
                if(password_verify($senha, $senha_db['Senha'])){
                    $_SESSION['nome'] = $nome;
                    $_SESSION['email'] = $email;
                    $verify = "SELECT Permissão FROM usuarios WHERE Email='$email'";
                    $verify = $conexao->query($verify);
                    $verify = mysqli_fetch_assoc($verify);
                    $_SESSION['verify'] = $verify['Permissão'];
                    header("location: index.php");
                }else{
                    user_out();
                    header("location: entrar.php?page=Login%20errado");
                };
            }else{
                header("location: entrar.php?page=Login");
            };
        }elseif($page == 'Sair'){
            user_out();
            header("location: index.php");
        }elseif($page == 'Mudar permissao'){
            session_start();
            if((!isset($_SESSION['verify']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['nome']) == true)){
                user_out();
            }else{
                if (isset($_GET['email'])){
                    $email = $_GET['email'];
                    $permissao = "SELECT Permissão FROM usuarios WHERE Email='$email'";
                    $permissao = $conexao->query($permissao);
                    $permissao = mysqli_fetch_assoc($permissao);

                    if($permissao['Permissão'] == 'admin'){
                        $permissao = "UPDATE usuarios SET `Permissão` = 'user' WHERE Email='$email'";
                        $permissao = $conexao->query($permissao);
                    }else{
                        $permissao = "UPDATE usuarios SET `Permissão` = 'admin' WHERE Email='$email'";
                        $permissao = $conexao->query($permissao);
                    }
                    header("location: postar.php?page=postar");
                }else{
                    header("location: index.php");
                };
            };
        }else{
            header("location: index.php");
        };
    }else{
        header("location: index.php"); 
    };

?>