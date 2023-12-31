<?php
include "Model/horaire/horaireDAO.php";



class contoller_horaire
{


    function getHoraireController()
    {
        $horaireDAO = new HoraireDAO();
        $horaires = $horaireDAO->get_horaire();
        include "Vue\admin\showHoraire.php";
    }

    function addHoraireController()
    {
        $villeDAO = new VilleDAO();
        $villes = $villeDAO->get_ville();
        $busDAO = new BusDAO();
        $buses = $busDAO->get_bus();
        include "Vue\admin\addHoraire.php";
    }

    function addHoraireControllerAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $horDAO = new HoraireDAO();
            $inserted = $horDAO->insert_horaire();
            if ($inserted) {
                header('Location: index.php?action=showHoraire');
                exit();
            } else {
                echo 'Adding error';
            }
        }


    }
    public function updtBusController()
    {
        if (isset($_GET['immat'])) {
            $immat = $_GET['immat'];
            $entrepriseDAO = new EntrepriseDAO();
            $entreprises = $entrepriseDAO->get_entreprise();
            $busDAO = new BusDAO();
            $bus = $busDAO->getBusByImmat($immat);
            include("Vue\admin\updtBus.php");
        }
    }

    public function updtBusControllerAction()
    {
        $busDAO = new BusDAO();
        $busDAO->updateBus();
        header('Location: index.php');
        exit;
    }

    public function deleteBusControllerAction()
    {
        $immat = $_GET["immat"];
        $busDAO = new BusDAO();
        $busDAO->deleteBus($immat);
        header('Location: index.php');
        exit;
    }





}
?>