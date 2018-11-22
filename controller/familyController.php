<?php

//include_once 'model/myClases.php';
include_once 'model/connect_data.php';
include_once 'model/familyClass.php';
include_once 'model/familyModel.php';

$family = new familyModel();
$family->getListFamily();
$listFamily = $family->getList();






include_once "index.php";
