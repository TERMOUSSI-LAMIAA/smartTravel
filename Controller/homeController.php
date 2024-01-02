<?php
require_once "Model/ville/villeDAO.php";
require_once "Model/horaire/horaireDAO.php";


class contoller_Home
{

    public function getVilleHomeController()
    {
        $VilleDAO = new VilleDAO();
        $villes = $VilleDAO->get_ville();
        include "home.php";
    }
    // function getSearchedHoraire()
    // {
    //     $horDAO = new HoraireDAO();
    //     $hor = $horDAO->search_Horaire();
    //     // print_r($hor);
    //     if ($hor) {
    //         // Process and display the results
    //         // include "home.php";
    //         // print_r($hor);
    //     } else {
    //         // Handle the case when the query fails
    //         echo "Error in searching Horaire.";
    //     }
    // }

    public function getSearchedHoraireController()
    {
        session_start();
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $fk_vil_dep = $_POST["fk_vil_dep"];
            $fk_vil_arv = $_POST["fk_vil_arv"];
            $date_ = $_POST["date_"];

            $_SESSION["fk_vil_dep"] = $fk_vil_dep;
            $_SESSION["fk_vil_arv"] = $fk_vil_arv;
            $_SESSION["date_"] = $date_;

            $entrepDAO = new EntrepriseDAO();
            $entreprises = $entrepDAO->get_entreprise();

            $horDAO = new HoraireDAO();
            $horaires = $horDAO->search_Horaire($fk_vil_dep, $fk_vil_arv, $date_);
            if (!empty($horaires)) {
                include("details.php");
            } else {
                echo "No results found.";
            }
        }
    }




}