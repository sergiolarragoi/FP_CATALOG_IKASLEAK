
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LANBIDE ARLOAK</title>

    </head>
    <body>
        <h2>LANBIDE ARLOAK /FAMILIAS PROFESIONALES</h2><br>
        <?php
        $total = 0;
        $lista = true;
        foreach ($listaSchool as $school) {
            if ($lista == true) {
                ?>
                <h2><?php echo $school->getFamilyObject()->getNom_familia_eu(); ?> / <?php echo $school->getFamilyObject()->getNom_familia_es(); ?></h2>
                <h3><?php echo $school->getCycleObject()->getNom_ciclo_eu(); ?> / <?php echo $school->getCycleObject()->getNom_ciclo_es(); ?></h3><br>

            </tr>
            <?php
            $lista = false;
        }
    }
    ?> 
    <table name="tableBooks" border="1">
        <tr>
            <th>centro</th>
            <th>municipio</th>
            <th>territorio</th>
            <th>modelo</th>
            <th>turno</th>

        </tr>
        <?php
        foreach ($listaSchool as $school) {
            ?>

            <tr>
                <td><a href="../controller/offerController.php?codCentro=<?php echo $school->getCod_centro(); ?>"<a/><?php echo $school->getNom_centro(); ?></td>
                <td><?php echo $school->getMunicipio(); ?></td>
                <td><?php echo $school->getTerritorio(); ?></td>
                <td><?php echo $school->getOfferObject()->getModelo(); ?></td>
                <td><?php echo $school->getOfferObject()->getTurno(); ?></td> 
            </tr>
        <?php } ?>
    </table>

</body>
</html>