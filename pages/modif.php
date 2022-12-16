<?php
    include('../inc/fonction.php');
    $id=$_GET['id'];
    $type=getAllType();
    $info=getInfo($id);
    $t=getTypes($info['id_t'][0]);
    $descri=getDescri($id);
    $loyer=getLoyer($id);
    $img=getImages($id);
?>
<form action="../traitement/modifier.php" method="post" enctype="multipart/form-data">
            <div class="login2">
                <h2>Modification du lieu</h2>
                <div class="input-group input-group-sm">
                    <select name="type" id="select">
                        <option value="<?php echo $info['id_t'][0]; ?>"><?php echo $t; ?></option>
                        <?php for($i=0;$i<count($type['id_t']);$i++){ ?>
                            <option value="<?php echo $type['id_t'][$i]; ?>"><?php echo $type['nom'][$i]; ?></option>
                        <?php }  ?>
                    </select>
                    <p><input type="hidden" name="idh" value="<?php echo $id; ?>"></p>
                    <p><input type="text" class="form-control" placeholder="Quartier" aria-describedby="sizing-addon3" name="quartier" value="<?php echo $info['quartier'][0]; ?>"></p>
                    <p><input type="number" class="form-control" placeholder="Nombre de Chambre" aria-describedby="sizing-addon3" name="chambre" value="<?php echo $info['nb_chambre'][0]; ?>"></p>
                    <p><input type="text" class="form-control" placeholder="Little description" aria-describedby="sizing-addon3" name="descri" value="<?php echo $descri ; ?>"></p>
                    <p><input type="number" class="form-control" placeholder="Loyer" aria-describedby="sizing-addon3" name="loyer" value="<?php echo $loyer['montant'][0] ; ?>"></p>
                    <p><input type="date" class="form-control" name="daty" value="<?php echo $loyer['daty'][0] ; ?>"></p>
                </div>    
                <p class="input2"><input type="submit" value="Modifier" class="btn btn-success"></p>                 
            </div>
</form>   