<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="verifier.php" method="post">
            <div class="login">
                <h2>Connectez-vous</h2>
                <div class="input-group input-group-sm">
                    <p><input type="email" class="form-control" placeholder="Enter your email" aria-describedby="sizing-addon3" required></p>
                    <p><input type="password" class="form-control" placeholder="Enter your password" aria-describedby="sizing-addon3" required></p>
                </div>
                    <p class="input"><input type="submit" value="Se connecter" class="btn btn-success"></p>  
                
                <div class="btn-group" role="group">
                    <p class="input"><a href="">Créer un nouveau compte</a></p>    
                </div>                
                
            </div>
        </form>
    </div>
</body>
</html>