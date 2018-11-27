<?php

include_once '../model/myClases.php';

$codCiclo = filter_input(INPUT_GET, 'cmbCycle');

$school = new schoolModel();
$school->getTabla($codCiclo);
$listaSchool = $school->getList();

include_once '../view/viewSchools.php';
