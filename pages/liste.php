<?php
    include('../inc/fonction.php');
    $liste=ListHabitat();
    $v=count($liste['nom']);
?>

<div class="maison">
    <div class="row">
        <?php for($i=0;$i<$v;$i++) { ?>
            <div class="col-sm-6 col-md-3">
                <div class="thumbnail">
                    <img src="../assets/img/fond.png" width="500px" heigth="200px">
                    <div class="caption">
                        <label><?php echo $liste['nom'][$i]; ?> <?php echo $liste['quartier'][$i]; ?></label>
                        <p><?php echo $liste['descriptions'][$i] ?></p>
                        <p><?php echo $liste['montant'][$i] ?>0 Ar</p>
                        <p><a href="accueil.php?p=desc&&id=<?php echo $liste['id_h'][$i]; ?>" class="btn btn-primary" role="button">Voir plus</a></p>
                        <?php if($_SESSION['user']==0) { ?>
                            <p><a href="accueil.php?p=modif&&id=<?php echo $liste['id_h'][$i]; ?>" class="btn btn-success" role="button">Modify</a></p>
                            <p><a href="accueil.php?p=supp&&id=<?php echo $liste['id_h'][$i]; ?>" class="btn btn-danger" role="button">Suppress</a></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    
    <?php if($_SESSION['user']==0) { ?>
        <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <a href="accueil.php?p=ajout">
                        <img src="../assets/img/fond.png" alt="...">
                                <div class="caption">
                                    <label>Ajouter un nouveau lieu</label>
                                    <p>Cliquez ici pour en ajouter</p>
                                </div>
                        </a>
                    </div>
        </div>
    <?php } ?>
    
    </div>
</div>

