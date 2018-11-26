
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LANBIDE ARLOAK</title>

    </head>
    <body>
        <h2>LANBIDE-ARLOAK / FAMILIAS PROFESIONALES</h2>
        <h2><?php echo $family->getNom_familia_eu(); ?> / <?php echo $family->getNom_familia_es(); ?> </h2>

        <h3>HEZIKETA-ZIKLOAK / CICLOS FORMATIVOS</h3><br>
        <form name="formContinent" action="../controller/schoolsController.php" method="GET">
            <select name ='cmbCycle'>
                <?php
                foreach ($listCycle as $cycle) {
                    ?>      
                    <option value="<?php echo $cycle->getCod_ciclo(); ?>"><?php echo $cycle->getNom_ciclo_eu(); ?> / <?php echo $cycle->getNom_ciclo_es(); ?></option>
                    <?php
                }
                ?>
            </select>
            <br/><br/><input type="submit" value="Schools View" name="btnOkCycles" />
        </form>













    </body>
</html>