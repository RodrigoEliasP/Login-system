<?php
//Conexão
require_once 'dbconnect.php';
//Sessão
session_start();
//Botão clicar
if(isset($_POST['btn-entrar'])):
    $erros =  array();
    $login = mysqli_escape_string($connect, $_POST['login']);
    $senha= md5(mysqli_escape_string($connect, $_POST['senha']));
    if(empty($login) or empty($senha)):
        $erros[] = "<li> o campo login/senha está vazio </li>";
    else:
        $sql = "SELECT LOGIN FROM USERS WHERE LOGIN = '$login';";
        $resultado = mysqli_query($connect, $sql);
        if(mysqli_num_rows($resultado)>0):
            $sql = "SELECT * FROM USERS WHERE LOGIN = '$login' AND SENHA = '$senha'";
            $resultado = mysqli_query($connect, $sql);

            if(mysqli_num_rows($resultado) == 1):
                $dados = mysqli_fetch_array($resultado);
                mysqli_close($connect);
                $_SESSION['ID_user'] = $dados['ID'];

                header('Location: home.php');

            else:
                $erros[]= "<li>A senha incorreta</li>";
            endif;
        else:
            $erros[]= "<li>ususuário inexistente</li>";
        endif;

    endif;

endif;
?>

<html>
<head>
    <title>Login</title>
    <meta charset="utf-8">
</head>
<body>
<h1>Bem vindo Ao login</h1>
<?php
if(!empty($erros)):
    foreach($erros as $erro):
        echo $erro;
    endforeach;
endif;

?>
<hr>
<form action="<?= $_SERVER['PHP_SELF']?>" method="post">
Login:<input type="text" name="login"><br>
Senha: <input type="password" name="senha"><br>
<button type="submit" name="btn-entrar">Logar</button>
</form>
</body>
</html>
