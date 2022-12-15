<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/inscription.css">
    <title>Document</title>
</head>
<body>
        <form action="inscri.php" method="post">
            <div class="login">
                <h2>Inscrivez-vous</h2>
                <div class="input-group input-group-sm">
                    <p><input type="email" class="form-control" placeholder="Enter your email" aria-describedby="sizing-addon3" name="email" required></p>
                    <p><input type="text" class="form-control" placeholder="Enter your name" aria-describedby="sizing-addon3" name="name" required></p>
                    <p><input type="password" class="form-control" placeholder="Enter your password" aria-describedby="sizing-addon3" name="pass" required></p>
                    <p><input type="text" class="form-control" placeholder="Enter your password" aria-describedby="sizing-addon3" name="tel" required></p>
                </div>
                    <p class="input"><input type="submit" value="S'inscrire" class="btn btn-success"></p>  
                
                <div class="btn-group" role="group">
                    <p class="input"><a href="login.php">Retour a la page de login</a></p>    
                </div>                
                
            </div>
        </form>   
</body>
</html>