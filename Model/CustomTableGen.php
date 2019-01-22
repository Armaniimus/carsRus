<?php
    /**
     *
     */
    class CustomTableGen {
        public function genTable(array $klant, array $autos) {
            $id = $klant["klantID"];
            $naam = $klant["voorletter"] . ". " . $klant["achternaam"];
            $straat = $klant["straat"] . " " . $klant["huisnummer"];
            $postcode = $klant["postcode"] . " " . $klant["plaats"];

            $head = "<thead>
                <tr>
                    <th colspan='2'>Klant</th>
                    <th>Kenteken</th>
                    <th>Datum Apk</th>
                </tr>
            </thead>";

            for ($i=0; $i < 3; $i++) {
                if (!isset($autos[$i]) ) {
                    $autos[$i] = ["kenteken" => "", "datumApk" => ""];
                }
            }

            $body = "<tbody>
                <tr>
                    <td colspan='4'>$id</td>
                </tr>
                <tr>
                    <td style='width: 25%'></td>
                    <td style='width: 25%'>$naam</td>
                    <td style='width: 25%'>" . $autos[0]["kenteken"] . "</td>
                    <td style='width: 25%'>" . $autos[0]["datumApk"] . "</td>
                </tr>
                <tr>
                    <td></td>
                    <td>$straat</td>
                    <td>" . $autos[1]["kenteken"] . "</td>
                    <td>" . $autos[1]["datumApk"] . "</td>
                </tr>
                <tr>
                    <td></td>
                    <td>$postcode</td>
                    <td>" . $autos[2]["kenteken"] . "</td>
                    <td>" . $autos[2]["datumApk"] . "</td>
                </tr>
            ";

            for ($i=3; $i < count($autos); $i++) {
                if (isset($autos[$i]) ) {
                    $body .= "<tr>
                        <td></td>
                        <td></td>
                        <td>" . $autos[$i]["kenteken"] . "</td>
                        <td>" . $autos[$i]["datumApk"] . "</td>
                    </tr>";
                }
            }

            $body .= "<tr>
                <td colspan='4'>Totaal aantal autos: " . count($autos) . "</td>
            </tr>";

            $table = "<table border='1'>
                $head
                $body
                </tbody>
            </table>";

            return $table;
        }

        public function browseTable($klant) {
            $head = "<thead>
                <tr>
                    <th>Voorletter</th>
                    <th>Achternaam</th>
                    <th></th>
                </tr>
            </thead>";

            $body = "<tbody>";
            foreach ($klant as $key => $value) {

                $row = "<tr>";
                foreach ($value as $name => $v) {
                    if ($name == "klantID") {
                        $id = $v;
                        continue;
                    }

                    $row .= "<td>$v</td>";
                }
                $row .= "<td><a href='" . APP_DIR . "/main/keuring/$id" . "'>Bekijk keuringen</td>";
                $row .= "</tr>";
                $body .= $row;
            }
            $body.= "</tbody>";

            $table = "<table border='1'>
            $head
            $body
            </table>";
            return $table;
        }
    }

?>
