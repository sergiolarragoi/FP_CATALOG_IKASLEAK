<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>LANBIDE ARLOAK</title>
    </head>
    <body>
        <h2>LANBIDE ARLOAK /FAMILIAS PROFESIONALES</h2><br>
        <?php
        $lista = true;
        foreach ($listaSchool as $school) {
            if ($lista == true) {
                ?>
                <h2><?php echo $school->getFamilyObject()->getNom_familia_eu(); ?> / <?php echo $school->getFamilyObject()->getNom_familia_es(); ?></h2>
                <h3><?php echo $school->getCycleObject()->getNom_ciclo_eu(); ?> / <?php echo $school->getCycleObject()->getNom_ciclo_es(); ?></h3><br>
                <?php
                $lista = false;
            }
        }
        ?> 
        <table name="table" style="border: 1px solid;">
            <tr style="border: 1px solid;">
                <th style="border: 1px solid;">Scholl</th>
                <th style="border: 1px solid;">Town</th>
                <th style="border: 1px solid;">Territory</th>
                <th style="border: 1px solid;">Model</th>
                <th style="border: 1px solid;">Turn</th>
            </tr>
            <?php
            foreach ($listaSchool as $school) {
                ?>

                <tr style="border: 1px solid;">
                    <td style="border: 1px solid;"><a href="../controller/offerController.php?codCentro=<?php echo $school->getCod_centro(); ?>"</a><?php echo $school->getNom_centro(); ?></td>
                    <td style="border: 1px solid;"><?php echo $school->getMunicipio(); ?></td>
                    <td style="border: 1px solid;"><?php echo $school->getTerritorio(); ?></td>
                    <td style="border: 1px solid;"><?php echo $school->getOfferObject()->getModelo(); ?></td>
                    <td style="border: 1px solid;"><?php echo $school->getOfferObject()->getTurno(); ?></td> 
                </tr>
            <?php } ?>
        </table>
    </body>
</html>