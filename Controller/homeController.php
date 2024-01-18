<?php
require_once "Model/ville/villeDAO.php";
require_once "Model/horaire/horaireDAO.php";


class contoller_Home
{

    public function getVilleHomeController()
    {
        $VilleDAO = new VilleDAO();
        $villes = $VilleDAO->get_ville();
        include "Vue/home.php";
    }

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
                include("Vue\details.php");
            } else {
                include("Vue\details.php");
            }
        }
    }




}