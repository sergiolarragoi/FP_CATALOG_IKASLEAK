<?php

include_once '../model/myClases.php';

$codCentro = filter_input(INPUT_GET, 'codCentro');

$offer = new offerModel();
$offer->getTablaCentro($codCentro);
$listCentro = $offer->getList();


$school = new schoolModel();
$school->getNameCenter($codCentro);

include_once '../view/viewOffer.php';
