<?php

class schoolModel extends schoolClass {

    private $link;
    private $list;
    private $offerObject;
    private $familyObject;
    private $cycleObject;

    public function OpenConnect() {
        $konDat = new connect_data();
        try {
            $this->link = new mysqli($konDat->host, $konDat->userbbdd, $konDat->passbbdd, $konDat->ddbbname);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta 
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }

    public function CloseConnect() {
        try {
            $this->link->close();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    function getList() {
        return $this->list;
    }

    function setList($list) {
        $this->list = $list;
    }

    function getOfferObject() {
        return $this->offerObject;
    }

    function getFamilyObject() {
        return $this->familyObject;
    }

    function getCycleObject() {
        return $this->cycleObject;
    }

    function setOfferObject($offerObject) {
        $this->offerObject = $offerObject;
    }

    function setFamilyObject($familyObject) {
        $this->familyObject = $familyObject;
    }

    function setCycleObject($cycleObject) {
        $this->cycleObject = $cycleObject;
    }

    public function getTabla($codCiclo) {

        $this->OpenConnect();
        $sql = "CALL spSelectTabla('$codCiclo')";
        //echo $sql;
        $this->list = array();

        $result = $this->link->query($sql);

        //var_dump($result);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


            $new = new schoolModel();
            $new->setCod_centro($row['cod_centro']);
            $new->setNom_centro($row['nom_centro']);
            $new->setMunicipio($row['municipio']);
            $new->setTerritorio($row['territorio']);

            include_once 'offerClass.php';
            include_once 'offerModel.php';

            $new->offerObject = new offerClass();
            $new->offerObject->setModelo($row['modelo']);
            $new->offerObject->setTurno($row['turno']);

            include_once 'familyClass.php';
            include_once 'familyModel.php';

            $new->familyObject = new familyClass();
            $new->familyObject->setNom_familia_eu($row['nom_familia_eu']);
            $new->familyObject->setNom_familia_es($row['nom_familia_es']);

            include_once 'cycleClass.php';
            include_once 'cycleModel.php';

            $new->cycleObject = new cycleClass();
            $new->cycleObject->setNom_ciclo_eu($row['nom_ciclo_eu']);
            $new->cycleObject->setNom_ciclo_es($row['nom_ciclo_es']);



            array_push($this->list, $new);
        }
        //var_dump($new);
        mysqli_free_result($result);
        $this->CloseConnect();
    }

    public function getNameCenter($codCentro) {

        $this->OpenConnect();
        $sql = "CALL spGetNameCenter($codCentro)";


        $result = $this->link->query($sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

            $this->setNom_centro($row['nom_centro']);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }

}
