<?php
    include_once './includes/_header.php';
    echo"<main class='w-100 py-4 d-flex justify-content-center'>";
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];

        echo '<form action="';
        if (($page == 'Cadastro') or ($page == 'Cadastro existente')){
            echo'./db_entrar.php?page=Novo%20usuario';
        }else{
            echo'./db_entrar.php?page=Verificar%20login';
        };
        echo '" method="post" class="m-4 w-100 w-sm-75 w-md-50 w-lg-25 p-3 d-flex flex-column text-white" style="border-radius: 15px; background-color: #607d8b;">';
            
        if (($page == 'Cadastro') or ($page == 'Cadastro existente')){
            echo '<h3 class="align-self-center">Cadastro:</h3>
            <div class="d-flex flex-column my-1">
                <label for="nome">Nome completo:</label>
                <input type="text" name="nome">
            </div>
            <div class="d-flex flex-column my-1">
                <label for="data">Data de nascimento:</label>
                <input type="date" name="data">
            </div>
            <div class="d-flex flex-column my-1">';
            if($page == 'Cadastro'){
                echo '<label for="email">Melhor Email:</label>';
            }else{
                echo '<label for="email" class="text-warning">Melhor Email:(Email já cadastrado)</label>';
            };
        }else{
            echo '<h3 class="align-self-center">Login</h3>';
            if($page == 'Login errado'){
                echo '<Small class="text-center text-warning">Email ou senha errados</Small>';
            };
            echo '<div class="d-flex flex-column my-1"><label for="email">Email:</label>';
        }
        echo '<input type="email" name="email"></div>
            <div class="d-flex flex-column my-1">
                <label for="senha">Senha:</label>
                <input type="password" name="senha">
            </div>';
        if(($page == 'Login errado') or ($page == 'Login')){
            echo '<div class="d-flex justify-content-center my-1">
            <a href="./entrar.php?page=Cadastro" class="text-white">Não tem um cadastro? Cadastre-se!</a>
            </div>';
        }else{
            echo '<div class="d-flex justify-content-center my-1">
            <a href="./entrar.php?page=Login" class="text-white">Já tem um cadastro? Faça o login!</a>
            </div>';
        }
        echo '<div class="mb-1 mt-2">
            <input type="submit" name="submit" id="submit" class="w-100">
            </div>
        </form>';
    };    
?>
</main>
</body>
</html>