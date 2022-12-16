<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/log.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="../traitement/verifierClient.php" method="post">
            <div class="login">
                <h2>Connectez-vous cher Client</h2>
                <div class="input-group input-group-sm">
                    <p><input type="email" class="form-control" placeholder="Enter your email" aria-describedby="sizing-addon3" name="email" required></p>
                    <p><input type="password" class="form-control" placeholder="Enter your password" aria-describedby="sizing-addon3" name="pass" required></p>
                </div>
                    <p class="input"><input type="submit" value="Se connecter" class="btn btn-success"></p>  
                
                <div class="btn-group" role="group">
                <p class="input"><?php if(isset($_GET['retour'])) { echo "<label>veuillez vérifier vos identifiants<label>"; } ?></p>
                    <p class="input"><a href="inscription.php">Créer un nouveau compte</a></p>   
                    <p class="input"><a href="loginAdmin.php">Se connecter en tant qu'administrateur</a></p>  
                </div>                
                
            </div>
        </form>
    </div>
</body>
</html>