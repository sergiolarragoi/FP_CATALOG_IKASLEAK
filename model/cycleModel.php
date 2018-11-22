<?php

class cycleModel extends cycleClass {

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

    public function getCyclesByFamily($codFamily) {
        $this->OpenConnect();
        $sql = "CALL spGetCyclesByFamily('$codFamily')";
        $this->list = array();

        $result = $this->link->query($sql);

        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            $newCycle = new cycleModel();
            $newCycle->setCod_ciclo($row['cod_ciclo']);
            $newCycle->setCod_familia($row['cod_familia']);
            $newCycle->setTipo($row['tipo']);
            $newCycle->setNom_ciclo_es($row['nom_ciclo_es']);
            $newCycle->setNom_ciclo_eu($row['nom_ciclo_eu']);
            array_push($this->list, $newCycle);
        }

        mysqli_free_result($result);

        $this->CloseConnect();
    }

}
