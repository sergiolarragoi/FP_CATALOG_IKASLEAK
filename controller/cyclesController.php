<?php

include_once '../model/myClases.php';


$cycle = new cycleModel();
$codFamily = filter_input(INPUT_GET, 'cmbFamily');
$cycle->setCod_familia($codFamily);
$cycle->getCyclesByFamily($codFamily);
$listCycle = $cycle->getList();

$family = new familyModel();
$family->selectTitulos($codFamily);





include_once '../view/viewCycles.php';