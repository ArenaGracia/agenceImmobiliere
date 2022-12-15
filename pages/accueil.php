<?php
    $page = (!isset($_GET['p']))?"liste":$_GET['p'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="../assets/fonts/glyphicons-halflings-regular.woff">
    <link rel="stylesheet" href="../assets/css/accueil.css">
    <title>Document</title>
</head>
<body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="ul1">
                            <li role="presentation" class="<?php if($page == "home") echo "active"; ?>"><a href="accueil.php?p=home"><span class="glyphicon glyphicon-home" aria-hidden="true" id="icon"></span></a></li>
                            <li role="presentation" class="<?php if($page == "profile") echo "active"; ?>"><a href="accueil.php?p=profile"><span class="glyphicon glyphicon-user" aria-hidden="true" id="icon"></span></a></li>
                            <li role="presentation" class="<?php if($page == "liste") echo "active"; ?>"><a href="accueil.php?p=liste"><span class="glyphicon glyphicon-list" aria-hidden="true" id="icon"></span></a></a></li>
                            <li role="presentation" class="<?php if($page == "deconnect") echo "active"; ?>"><a href="accueil.php?p=deconnect"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true" id="icon"></span></a></li>        
                    </ul>
                    
                    <form class="navbar-form navbar-left" role="search" action="" method="get">
                        <div class="form-group" id="input1">
                            <input type="text" class="form-control" placeholder="Search" name="search" required>
                        </div>
                            <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true" id="icon1"></span></button>
                    </form>
                </div>
            </div>
        </nav>

       <div class="row">
			<?php include($page.'.php'); ?>
        </div>       
   
</body>
</html>