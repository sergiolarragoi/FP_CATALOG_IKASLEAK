<?php

//include_once '../model/myClases.php';
include_once '../model/connect_data.php';
include_once '../model/cycleClass.php';
include_once '../model/familyClass.php';
include_once '../model/cycleModel.php';
include_once '../model/familyModel.php';

$cycle = new cycleModel();
$codFamily = filter_input(INPUT_GET, 'cmbFamily');
$cycle->setCod_familia($codFamily);
$cycle->getCyclesByFamily($codFamily);
$listCycle = $cycle->getList();

$family = new familyModel();
$family->selectTitulos($codFamily);





include_once "../view/viewCycles.php";