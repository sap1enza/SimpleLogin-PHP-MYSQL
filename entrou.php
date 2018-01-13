<?php
    session_start();

    if(isset($_COOKIE['login'])){
        
    } else {
        header ("Location: ./");
    }

    if(isset($_POST['logout'])){
      header("Location: index.php");
      exit();
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
            <center><h4>Olá <b><?php echo $_SESSION['usuario']; ?></b><br>Você está logado(a).</h4></center>
            
            <input type="submit" name="logout" class="btn btn-danger" value="Sair"> 
            
        </form>
        
        
    </body>
    
</html>