<?php
require_once "Model/ville/villeDAO.php";
require_once "Model/horaire/horaireDAO.php";



class contoller_details
{

    public function getEntrepDetailController()
    {
        $EntrepDAO = new EntrepriseDAO();
        $entreprises = $EntrepDAO->get_entreprise();
        include "details.php";
    }





}