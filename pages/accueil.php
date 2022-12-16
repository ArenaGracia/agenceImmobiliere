<?php
    $page = (!isset($_GET['p']))?"liste":$_GET['p'];
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/bootstrap.css">
    <link href="../assets/fonts/glyphicons-halflings-regular.woff">
    <link rel="stylesheet" href="../assets/css/accueil.css">
    <link rel="stylesheet" href="../assets/css/login.css">
    <title>Document</title>
</head>
<body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav" id="ul1">
                           <li role="presentation" class="<?php if($page == "liste") echo "active"; ?>"><a href="accueil.php?p=liste"><span class="glyphicon glyphicon-list" aria-hidden="true" id="icon"></span></a></a></li>
                            <li role="presentation" class="<?php if($page == "deconnect") echo "active"; ?>"><a href="accueil.php?p=deconnect"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true" id="icon"></span></a></li>        
                    </ul>
                    <?php
                        if($_SESSION['user'] == 0){ ?>
                        <a href="nombre_HBO_p_Jour.php"><button>Nombre d`habilitation occup&eacute;es par jour</button></a>
                        <a href="evolution_MTL_p_Jour.php"><button>Evolution montant loyer par jour</button></a>
                    <?php } ?>
                    
                    <form class="navbar-form navbar-left" role="search" action="accueil?p=search" method="post" id="search">
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
        
        <!-- <div class="row" id="div4">

        </div> -->
   
</body>
</html>
