<?php

/**
 *
 */
class Controller_main {
    function __construct() {
        $this->TemplatingSystem = new TemplatingSystem("view/templates/default.tpl");
        $this->Datahandler = new Datahandler(DB_HOST, DB_NAME, DB_USERNAME, DB_PASS);
        $this->CustomTableGen = new CustomTableGen();
    }

    public function mydefault() {
        $id = 4;
        $klant = $this->Datahandler->readData(
            "SELECT `klantID`, `voorletter`, `achternaam`, `postcode`, `plaats`, `straat`, `huisnummer` FROM `klant` WHERE klantID= :id",
            [
                "id"=> $id,
            ],
            false
        );
    }

    public function toevoegen() {

    }

    public function update() {

    }

    public function verwijderen() {

    }
}


 ?>
