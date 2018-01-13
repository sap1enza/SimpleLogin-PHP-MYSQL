<?php
    $login_err = "";
    $connect = mysqli_connect("localhost","root","senha") or die("Erro");
    $db = mysqli_select_db($connect, "arrayenterprises") or die("Erro");

    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);        
        $verificar = mysqli_query($connect, "SELECT * FROM TB_USUARIO WHERE EMAIL='$email' and SENHA='$password'");
        
        if(mysqli_num_rows($verificar)<= 0) {
            $login_err = "Login ou senha inválidos";
        } else {
            session_start();            
            $_SESSION['usuario'] = $email;  
            header("Location: entrou.php");   
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link href="style.css" rel="stylesheet">
    <title>Login e registro</title>
</head>

    <body>
    
        <form method="POST">
            <h2>Entrar</h2>
            <div class="form-group"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
            <div class="form-group"><input type="password" name="password" class="form-control" placeholder="Senha" required></div>
            <input type="submit" name="login" class="btn btn-primary" value="Enviar">
            <span class="help-block"><?php echo $login_err; ?></span>
            <p id="underbutton">Não tem conta? <a href="registro.php">Registre-se</a></p>
        </form>
        
        
    </body>
    
</html>