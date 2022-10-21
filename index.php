<?php
    include_once './includes/_header.php';
    include_once('config.php');

    $sql = "SELECT * FROM posts ORDER BY Data_e_hora DESC";
    $result = $conexao->query($sql);

    while($user_data = mysqli_fetch_assoc($result)){
        echo "<main class='main'>
            <div style='border: 1px solid red'>
                <h5>$user_data[Categoria]</h5><br>
                <h1>$user_data[Titulo]</h1><br>
                <h3>$user_data[Subtitulo]</h3>
            </div>";
    }
?>

<?php
    include_once './includes/_footer.php'
?>