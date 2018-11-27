<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LANBIDE ARLOAK</title>
    </head>
    <body>
        <h2>LH ZENTRUA /CENTRO FP</h2>

        <?php echo $school->getNom_Centro(); ?>

        <table name="table" style="border: 1px solid;">
            <tr style="border: 1px solid;">
                <th colspan="2" style="border: 1px solid;">Cycle Name</th>
                <th colspan="2" style="border: 1px solid;">Family</th>

            </tr>
            <?php foreach ($listCentro as $centro) { ?>

                <tr style="border: 1px solid;">
                    <td style="border: 1px solid;"><a href="../index.php"><?php echo $centro->getCycleObject()->getNom_ciclo_eu(); ?></a></td>
                    <td style="border: 1px solid;"><a href="../index.php"><?php echo $centro->getCycleObject()->getNom_ciclo_es(); ?></a></td>
                    <td style="border: 1px solid;"><?php echo $centro->getFamilyObject()->getNom_familia_eu(); ?></td>
                    <td style="border: 1px solid;"><?php echo $centro->getFamilyObject()->getNom_familia_es(); ?></td>

                </tr>
            <?php } ?>
        </table>
    </body>
</html>