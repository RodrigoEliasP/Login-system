<?php
//Conexão
require_once 'dbconnect.php';
//Sessão
session_start();
//Verificação
if(!isset($_SESSION['ID_user'])):
    header('Location: index.php');
endif;

$id = $_SESSION['ID_user'];
$sql = "SELECT * FROM USERS WHERE ID = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
mysqli_close($connect);
?>
<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Olá <?= $dados['NOME']?></h1>
<a href="logout.php">Sair</a>
</body>
</html>