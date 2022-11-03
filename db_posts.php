<?php
    session_start();
    function user_out(){
        unset($_SESSION['email']);
        unset($_SESSION['veriify']);
        unset($_SESSION['nome']);
        header("location: index.php");   
    };

    function redirect_intern(){
        header("location: postar.php?page=postar");
    };

    if((!isset($_SESSION['verify']) == true) and (!isset($_SESSION['email']) == true) and (!isset($_SESSION['nome']) == true)){
        user_out();
    }else{
        if($_SESSION['verify'] == 'admin'){
            if (isset($_GET['page'])){
                $page = $_GET['page'];
                include_once('./includes/_config.php');

                if($page == 'adicionar'){
                    if(isset($_POST['submit'])){                
                        date_default_timezone_set('America/Sao_Paulo');
                
                        $id_sql = "SELECT MAX(Id) FROM posts";
                        $id = $conexao->query($id_sql);
                        $id2 = mysqli_fetch_assoc($id);
                        $id_new = $id2['MAX(Id)'] + 1;
                        $categoria = $_POST['categoria'];
                        $titulo = $_POST['titulo'];
                        $subtitulo = $_POST['subtitulo'];
                        $postagem = $_POST['postagem'];
                
                        $autor = $_POST['autor'];
                        $data_e_hora = date('d/m/Y H:i:s');
                     
                        $sql = "INSERT INTO posts VALUES";
                        $sql .= "('$id_new', '$titulo', '$subtitulo', '$postagem', '$autor', '$categoria', '$data_e_hora', '0')";
                        $result = $conexao->query($sql);
                    };
                    redirect_intern();
                }elseif($page == 'atualizar'){
                    if(isset($_POST['submit'])){
                        $titulo = $_POST['titulo'];
                        $subtitulo = $_POST['subtitulo'];
                        $postagem = $_POST['postagem'];
                        $autor = $_POST['autor'];
                     
                        $sql = "UPDATE posts SET Titulo='$titulo', Subtitulo='$subtitulo', Postagem='$postagem', Autor='$autor'";
                        $result = $conexao->query($sql);
                    };
                    redirect_intern();
                }elseif($page == 'excluir'){
                    if (isset($_GET['id'])) {
                        $Id = $_GET['id'];
                        $sql = "DELETE FROM `posts` WHERE `Id` = $Id;";
                        $result = $conexao->query($sql);
                    };
                    redirect_intern();
                };
                redirect_intern();
            };
            redirect_intern();
        }else{
            user_out();
        };
    };

?>