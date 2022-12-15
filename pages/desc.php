<?php
    include('../inc/fonction.php');
    $indice=$_GET['id'];
    $images=getImages($indice);
    $liste=ListHabitatById($indice);
?>

<div class="div1">
    <?php for($i=0;$i<count($images['nom_p']);$i++) { ?>
        <img src="../assets/img/<?php echo $images['nom_p'][$i]; ?>">
    <?php } ?>
    <div class="div2">
        <h1><?php echo $liste['nom'][0]; ?> <?php echo $liste['quartier'][0]; ?></h1>
        <p><label>Tarif par nuit: </label> <?php echo $liste['montant'][0] ?>0 Ar</p>
        <p><?php echo $liste['descriptions'][0] ?></p>
    </div>
</div>