<?php
    include("../inc/fonction.php");
    $type=getAllType();
?>
<form action="ajouter.php" method="post" enctype="multipart/form-data">
            <div class="login2">
                <h2>Ajouter un nouveau lieu</h2>
                <div class="input-group input-group-sm">
                    <select name="type" id="select">
                        <?php for($i=0;$i<count($type['id_t']);$i++){ ?>
                            <option value="<?php echo $type['id_t'][$i]; ?>"><?php echo $type['nom'][$i]; ?></option>
                        <?php }  ?>
                    </select>
                    <p><input type="text" class="form-control" placeholder="Quartier" aria-describedby="sizing-addon3" name="quartier"></p>
                    <p><input type="number" class="form-control" placeholder="Nombre de Chambre" aria-describedby="sizing-addon3" name="chambre"></p>
                    <p><input type="text" class="form-control" placeholder="Little description" aria-describedby="sizing-addon3" name="descri"></p>
                    <p><input type="number" class="form-control" placeholder="Loyer" aria-describedby="sizing-addon3" name="loyer"></p>
                    <p><input type="date" class="form-control" name="daty"></p>
                    <p><input type="file" name="avatar"></p>
                    <p><input type="file" name="avatar1"></p>
                    <p><input type="file" name="avatar2"></p>
                </div>    
                <p class="input2"><input type="submit" value="Ajouter" class="btn btn-success"></p>                 

            </div>
</form>   