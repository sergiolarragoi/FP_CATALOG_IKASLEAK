<?php

class offerModel extends offerClass {

    //put your code here
    private $link;
    private $list;
    private $familyObject;
    private $cycleObject;
    private $schoolObject;

    function getFamilyObject() {
        return $this->familyObject;
    }

    function getCycleObject() {
        return $this->cycleObject;
    }

    function getOfferObject() {
        return $this->offerObject;
    }

    function getList() {
        return $this->list;
    }

    function getSchoolObject() {
        return $this->schoolObject;
    }

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

    public function getTablaCentro($codCentro) {

        $this->OpenConnect();
        $sql = "CALL spViewCenters($codCentro)";
        $this->list = array();

        $result = $this->link->query($sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {


            $offer = new offerModel();

            include_once 'familyClass.php';
            include_once 'familyModel.php';

            $offer->familyObject = new familyClass();
            $offer->familyObject->setNom_familia_eu($row['nom_familia_eu']);
            $offer->familyObject->setNom_familia_es($row['nom_familia_es']);

            include_once 'cycleClass.php';
            include_once 'cycleModel.php';

            $offer->cycleObject = new cycleClass();
            $offer->cycleObject->setNom_ciclo_eu($row['nom_ciclo_eu']);
            $offer->cycleObject->setNom_ciclo_es($row['nom_ciclo_es']);



            array_push($this->list, $offer);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
    }

}
