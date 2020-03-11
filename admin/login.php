<?php
    require_once("../libs/configs/configuracoes.php")
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="utf-8">
    <link rel="stylesheet" href="../css/main.css">
    <title>Login de Acesso</title>
</head>

<body>
    <div class="login-page">
        <div class="form">
            <form class="login-form" action="" method="post">
                <input type="text" name="user" placeholder="username"/>
                <input type="password" name="pass" placeholder="password"/>
                <input type="submit" name="login" value="login">
                <!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
            </form>
        </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST["login"])){
        $user = addslashes($_POST["user"]);
        $senha = addslashes($_POST["pass"]);
        
        if($user == "" || $senha == ""){
            echo "<script>alert('Preencha todos os campos!');</script>";
        }
        
        openConection();
        
        $sql = $mysqli->query("SELECT id FROM usuarios WHERE user='$user'");
        if($sql->num_rows == true){
            $sql2 = $mysqli->query("SELECT email, senha FROM usuarios WHERE user='$user' AND senha='".md5($senha)."'");
            if($sql2->num_rows == true){
                header("Location: index.php");
            }else{
                echo "<script> alert('Senha incorreta!'); </script>";
            }
        }else{
            echo "<script> alert('Este usuário não existe!'); </script>";
        }
    }
?>