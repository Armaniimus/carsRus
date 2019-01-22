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
        return $this->keuring([$id]);
    }

    public function browse() {
        $klant = $this->Datahandler->readData(
            "SELECT `klantID`, `voorletter`, `achternaam` FROM `klant` "
        );

        // gen table
        $table = $this->CustomTableGen->browseTable($klant);
        $main = file_get_contents("view/partials/browse.html");

        $this->TemplatingSystem->setTemplateData("main", $main);
        $this->TemplatingSystem->setTemplateData("table", $table);
        $this->TemplatingSystem->setTemplateData("appdir", APP_DIR);
        return $this->TemplatingSystem->getParsedTemplate();
    }

    public function zoek() {

    }

    public function keuring(array $params) {
        $id = $params[0];

        $klant = $this->Datahandler->readData(
            "SELECT `klantID`, `voorletter`, `achternaam`, `postcode`, `plaats`, `straat`, `huisnummer` FROM `klant` WHERE klantID= :id",
            [
                "id"=> $id,
            ],
            false
        );

        $autos = $this->Datahandler->readData(
            "SELECT `keuringID`, `klantID`, `kenteken`, `datumApk` FROM `autokeuring` WHERE klantID= :id",
            [
                "id"=> $id,
            ]
        );

        // gen table
        $table = $this->CustomTableGen->genTable($klant, $autos);
        $main = file_get_contents("view/partials/main.html");

        $this->TemplatingSystem->setTemplateData("main", $main);
        $this->TemplatingSystem->setTemplateData("table", $table);
        $this->TemplatingSystem->setTemplateData("appdir", APP_DIR);
        return $this->TemplatingSystem->getParsedTemplate();
    }
}


 ?>
