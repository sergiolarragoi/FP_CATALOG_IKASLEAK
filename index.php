
<?php
    include_once "./controller/familyController.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LANBIDE ARLOAK</title>

    </head>
    <body>
        <h2>LANBIDE ARLOAK / FAMILIAS PROFESIONALES</h2>
        <form name="formContinent" action="./controller/cyclesController.php" method="GET">
            <select name ='cmbFamily'>
                <?php
                foreach ($listFamily as $family) {
                    ?>      
                    <option value="<?php echo $family->getCod_familia(); ?>"><?php echo $family->getNom_familia_eu(); ?> / <?php echo $family->getNom_familia_es(); ?></option>
                    <?php
                }
                ?>
            </select>
            <br/><br/><input type="submit" value="Cycles View" name="btnOkContinent" />
        </form> 

    </body>
</html>
