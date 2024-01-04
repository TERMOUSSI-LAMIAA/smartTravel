<?php
require_once "Model/ville/villeDAO.php";
require_once "Model/horaire/horaireDAO.php";



class contoller_details
{


    public function filterController()
    {
        session_start();
        $errors = [];
        $fk_vil_dep = isset($_SESSION["fk_vil_dep"]) ? $_SESSION["fk_vil_dep"] : null;
        $fk_vil_arv = isset($_SESSION["fk_vil_arv"]) ? $_SESSION["fk_vil_arv"] : null;
        $date_ = isset($_SESSION["date_"]) ? $_SESSION["date_"] : null;

        $idEn = isset($_GET["idEn"]) ? $_GET["idEn"] : null;
        $maxprice = isset($_GET["maxprice"]) ? $_GET["maxprice"] : null;
        $hor = isset($_GET["hor"]) ? $_GET["hor"] : null;

        $entrepDAO = new EntrepriseDAO();
        $entreprises = $entrepDAO->get_entreprise();
        $horDAO = new HoraireDAO();

        $results = array();

        // $idEn=3;
        //entreprise filter
        if (!empty($idEn)) {
            $horaires = $horDAO->search_Horaire($fk_vil_dep, $fk_vil_arv, $date_, $idEn);

            if (!empty($horaires)) {
                // include("details.php");
                $results = array_merge($results, $horaires);

                // var_dump($horaires);
            } else {
                $errors[] = "No results found.";
            }
        } else {
            $errors[] = "idEn is empty";
        }
        // price filter
        if (!empty($maxprice)) {
            $horaires = $horDAO->search_Horaire($fk_vil_dep, $fk_vil_arv, $date_, "", $maxprice);

            if (!empty($horaires)) {
                $results = array_merge($results, $horaires);
                //include("details.php");
                // $results += $horaires;
                // var_dump($horaires);
            } else {
                $errors[] = "No results found.";
            }
        } else {
            $errors[] = "maxprice is empty";
        }
        // horaire filtre
        if (!empty($hor)) {
            $horaires = $horDAO->search_Horaire($fk_vil_dep, $fk_vil_arv, $date_, "", "", $hor);

            if (!empty($horaires)) {
                $results = array_merge($results, $horaires);
                // include("details.php");
                // $results += $horaires;

                // var_dump($horaires);
            } else {
                $errors[] = "No results found.";
            }
        } else {
            $errors[] = "hor is empty";
        }


        echo json_encode(array("data" => $results, "errors" => $errors));

    }


}


