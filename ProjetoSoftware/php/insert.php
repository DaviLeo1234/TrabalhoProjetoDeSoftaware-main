<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Insert</title>
</head>
<style>
    *{
    color: white;
}
body{
    background-image: url(https://tm.ibxk.com.br/2023/11/29/29113309050122.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-color: rgb(0,0,0);
    background-color: rgba(0,0,0,0.4);

 

}
</style>
<body>
    
    <?php
    //dados de conexão

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $database = "ProjetoSoftware";

    //conectar ao banco de dados

    try {
        $conn = new mysqli($hostname, $username, $password, $database);
    } catch (Exception $e) {
        die("Erro ao conecar: " . $e->getMessage());
    }
    //Recebendo variáveis do formulário 
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];


    if (empty($nome) || empty($email) || empty($senha) || empty($cpf) || empty($rua) || empty($numero) || empty($bairro) || empty($cidade)):

    ?>

        <div class="alert alert-warning" role="alert">
            Dados não podem ficar vazios!
        </div>

    <?php
    endif;



    //criar comando
    $sql = "INSERT INTO cadastro VALUES(NULL, '$nome', '$email','$senha','$cpf','$rua','$numero','$bairro','$cidade')";
    //executar comando
    $resultado = $conn->query($sql);
    if ($resultado != 0) :
    ?>
        <div class="alert alert-success" role="alert">
            A simple success alert—check it out!
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            Erro ao Inserir Dados!
        </div>
    <?php endif; ?>
    <button type="button" class="btn btn-danger" onclick="history.back()">Danger</button>
</body>
</html>