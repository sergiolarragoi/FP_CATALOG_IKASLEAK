<?php

//include_once '../model/myClases.php';
include_once '../model/connect_data.php';
include_once '../model/cycleClass.php';
include_once '../model/cycleModel.php';

$cycle = new cycleModel();
$codFamily = filter_input(INPUT_GET, 'cmbFamily');
$cycle->setCod_familia($codFamily);
$cycle->getCyclesByFamily($codFamily);
$listCycle = $cycle->getList();







include_once "../view/viewCycles.php";