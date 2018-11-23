<?php

class familyModel extends familyClass {

    private $link;
    private $list;

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

    public function getListFamily() {
        $this->OpenConnect();
        $sql = "CALL spGetListFamily()";
        $this->list = array();

        $result = $this->link->query($sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $newFamily = new familyModel();
            $newFamily->setCod_familia($row['cod_familia']);
            $newFamily->setNom_familia_eu($row['nom_familia_eu']);
            $newFamily->setNom_familia_es($row['nom_familia_es']);
            array_push($this->list, $newFamily);
        }

        mysqli_free_result($result);

        $this->CloseConnect();
    }

    public function selectTitulos($codFamily) {

        $this->OpenConnect();
        $sql = "CALL spGetNameFamily('$codFamily')";

        $result = $this->link->query($sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $this->setNom_familia_eu($row['nom_familia_eu']);
            $this->setNom_familia_es($row['nom_familia_es']);
        }
        mysqli_free_result($result);

        $this->CloseConnect();
    }

}
