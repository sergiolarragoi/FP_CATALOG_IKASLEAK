
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LANBIDE ARLOAK</title>

    </head>
    <body>
        <h2>LANBIDE-ARLOAK / FAMILIAS PROFESIONALES</h2>
        <h3><?php ?></h3>
        
        <h3>HEZIKETA-ZIKLOAK / CICLOS FORMATIVOS</h3>
        <form name="formContinent" action="#" method="GET">
            <select name ='cmbFamily'>
                <?php
                foreach ($listCycle as $cycle) {
                    ?>      
                    <option value="<?php echo $cycle->getCod_ciclo(); ?>"><?php echo $cycle->getNom_ciclo_eu(); ?> / <?php echo $cycle->getNom_ciclo_es(); ?></option>
                    <?php
                }
                ?>
            </select>
            <br/><br/><input type="submit" value="Cycles View" name="btnOkContinent" />
        </form>













    </body>
</html>