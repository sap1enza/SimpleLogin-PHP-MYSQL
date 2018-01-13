<?php
    $reg_err = "";
    $connect = mysqli_connect("localhost","root","senha") or die("Erro");
    $db = mysqli_select_db($connect, "arrayenterprises") or die("Erro");

  if(isset($_POST['registrar'])){
        $nome = $_POST['nome'];
        $email = $_POST['email_registrar'];
        $password = md5($_POST['password_registrar']);
                
        $verificar = mysqli_query($connect, "SELECT * FROM TB_USUARIO WHERE EMAIL='$email'");
        if(mysqli_num_rows($verificar)>0) {
            $reg_err = "Conta já registrada com este email";
        } else {
            $insert = mysqli_query($connect, "INSERT INTO TB_USUARIO (NOME,EMAIL,SENHA) VALUES ('$nome','$email','$password')");
            echo "Conta registrada";
               
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
            <h2>Registrar</h2>
            
            <div class="form-group"><input type="text" name="nome" class="form-control" placeholder="Nome" required></div>
            <div class="form-group"><input type="email" name="email_registrar" class="form-control" placeholder="Email" required></div>
            <div class="form-group"><input type="password" name="password_registrar" class="form-control" placeholder="Senha" required></div>
            <span class="help-block"><?php echo $reg_err; ?></span>
            <input type="submit" name="registrar" class="btn btn-primary" value="Enviar">  
            <p id="underbutton"><a href="index.php">Voltar</a></p>
        </form>
        
    </body>
    
</html>


    