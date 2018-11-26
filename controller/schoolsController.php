<?php

include_once '../model/myClases.php';

$school = new schoolModel();
$codCiclo = filter_input(INPUT_GET, 'cmbCycle');


$school->getTabla($codCiclo);
$listaSchool = $school->getList();


include_once "../view/viewSchools.php";