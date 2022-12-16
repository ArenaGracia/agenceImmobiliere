<?php
    include('../inc/fonction.php');
    $string=$_POST['search'];
    $liste=searchHabitat($string);
    $v=count($liste['nom']);
?>

<div class="maison">
    <h2>Resultat de votre recherche: <?php echo $v ;?> correspondant(s)</h2>
    <div class="row">
        <?php for($i=0;$i<$v;$i++) { ?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="../assets/img/fond.png" id="img">
                    <div class="caption">
                        <label><?php echo $liste['nom'][$i]; ?> <?php echo $liste['quartier'][$i]; ?></label>
                        <p><?php echo $liste['descriptions'][$i]; ?></p>
                        <p><?php echo $liste['montant'][$i] ?>0 Ar</p>
                        <p><a href="accueil.php?p=desc&&id=<?php echo $liste['id_h'][$i]; ?>" class="btn btn-primary" role="button">Voir plus</a></p>
                        <?php if($_SESSION['user']==0) { ?>
                            <p><a href="accueil.php?p=supp&&id=<?php echo $liste['id_h'][$i]; ?>" class="btn btn-success" role="button">Modifier</a></p>
                            <p><a href="accueil.php?p=supp&&id=<?php echo $liste['id_h'][$i]; ?>" class="btn btn-danger" role="button">Suppress</a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

