<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        form{
            width: 25%;
            border: 2px solid black;
            padding: 2%;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        form div{
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <?php
    
        if (isset($_GET['page'])) {
            $page = $_GET['page'];

            echo '<form action="';
            if (($page == 'Cadastro') or ($page == 'Cadastro existente')){
                echo'./db_entrar.php?page=Novo%20usuario';
            }else{
                echo'./db_entrar.php?page=Verificar%20login';
            };
            echo '" method="post">';
            
            if (($page == 'Cadastro') or ($page == 'Cadastro existente')){
                echo '<h3>Cadastro de Usuario:</h3>
                <div>
                    <label for="nome">Nome completo:</label>
                    <input type="text" name="nome">
                </div>
                <div>
                    <label for="data">Data de nascimento:</label>
                    <input type="date" name="data">
                </div>
                <div>';
                if($page == 'Cadastro'){
                    echo '<label for="email">Melhor Email:</label>';
                }else{
                    echo '<label for="email">Melhor Email: (Email já cadastrado)</label>';
                };
            }else{
                echo '<h3>Login</h3>';
                if($page == 'Login errado'){
                    echo '<Small>Email ou senha errados</Small>';
                };
                echo '<div><label for="email">Email:</label>';
            }
            echo '<input type="email" name="email"></div>
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha">
                </div>';
            if(($page == 'Login errado') or ($page == 'Login')){
                echo '<div>
                <a href="./entrar.php?page=Cadastro">Não tem um cadastro? Cadastre-se!</a>
                </div>';
            }else{
                echo '<div>
                <a href="./entrar.php?page=Login">Já tem um cadastro? Faça o login!</a>
                </div>';
            }
            echo '<div>
                <input type="submit" name="submit" id="submit">
                </div>
            </form>';
        };
    
    ?>
</body>
</html>