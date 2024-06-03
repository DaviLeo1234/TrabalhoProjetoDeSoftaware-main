<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,
initial-scale=1.0">
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
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<title>Dados</title>
</head>
<body>
<div class="container">
<div class="border p-3">
<?php
$resultadoSelect = 0;
$resultadoDelete = 0;
//dados de conexão
$hostname = "localhost";
$username = "root";
$password = "";
$database = "ProjetoSoftware";
//Conectar ao banco de dados
try {
$conn = new mysqli($hostname, $username, $password, $database);

} catch (Exception $e) {
die("<div class='alert alert-danger' role='alert'>Erro

ao conectar: " . $e->getMessage() . "</div>");

}
if (isset($_GET['id'])) {
$id = $_GET['id'];
try {
//Criar o comando
$sql = "SELECT * FROM cadastro WHERE id = '$id'";
//Executar o comando
$resultadoSelect = $conn->query($sql);
} catch (Exception $e) {
echo "<div class='alert alert-danger' role='alert'>
Erro ao deletar
</div>";
}
}
if (isset($_POST['submit'])) {
//Criar o comando
$sql = "DELETE FROM cadastro WHERE id = {$_POST['id']}";
try {
//Executar o comando
$resultadoDelete = $conn->query($sql);
} catch (Exception $e) {
echo "<div class='alert alert-danger' role='alert'>
Erro ao processar: {$e->getMessage()}
</div>";
}
}
?>
<?php if ($resultadoDelete) : ?>
<div class='alert alert-success' role='success'>
Dado deletado com sucesso!
</div>
<div>
<a href="dados.php" class="btn btn-primary">Ver

dados</a>

<a href="index.php" class="btn

btn-primary">Início</a>
</div>
<?php else : ?>
<h1>Dados</h1>
<?php foreach ($resultadoSelect as $r) : ?>
<p>ID: <?= $r['id'] ?></p>
<p>Nome: <?= $r['nome'] ?></p>
<p>E-mail: <?= $r['email'] ?></p>
<p>Senha: <?= $r['senha'] ?></p>
<p>Cpf: <?= $r['cpf'] ?></p>
<p>Rua: <?= $r['rua'] ?></p>
<p>Numero: <?= $r['numero'] ?></p>
<p>Bairro: <?= $r['bairro'] ?></p>
<p>Cidade: <?= $r['cidade'] ?></p>
<form action="<?= $_SERVER['PHP_SELF'] ?>"

method="post">

<input type="hidden" name="id" value="<?=

$r['id'] ?>">

<input type="submit" class="btn btn-primary"

name="submit" value="Deletar">

<a href="dados.php" class="btn btn-primary">Ver

dados</a>

<a href="index.php" class="btn
btn-primary">Início</a>
</form>
<?php endforeach; ?>
<?php endif; ?>
</div>
</div>
<?php
$conn->close();
?>
</body>
</html>
