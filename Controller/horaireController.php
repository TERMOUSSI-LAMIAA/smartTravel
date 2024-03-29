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

    // function addHoraireController()
    // {
    //     $villeDAO = new VilleDAO();
    //     $villes = $villeDAO->get_ville();
    //     $busDAO = new BusDAO();
    //     $buses = $busDAO->get_bus();
    //     include "Vue\admin\addHoraire.php";
    // }
    function addHoraireController()
    {
        // $villeDAO = new VilleDAO();
        // $villes = $villeDAO->get_ville();
        $routeDAO = new RouteDAO();
        $routes = $routeDAO->get_route();
        $busDAO = new BusDAO();
        $buses = $busDAO->get_bus();
        include "Vue\admin\addHoraire.php";
    }

    function addHoraireControllerAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $horDAO = new HoraireDAO();
            $inserted = $horDAO->insert_horaire();
            if ($inserted === true) {
                header('Location: index.php?action=showHoraire');
                exit();
            } else {
                header('Location: index.php?status=' .$inserted );
                exit();
            }
        }
    }
    public function updtHorController()
    {
        if (isset($_GET['idHor'])) {
            $idHor = $_GET['idHor'];
            $villeDAO = new VilleDAO();
            $villes = $villeDAO->get_ville();
            $busDAO = new BusDAO();
            $buses = $busDAO->get_bus();
            $horDAO = new HoraireDAO();
            $hor = $horDAO->get_horairebyID($idHor);

            include("Vue\admin\updtHoraire.php");
        }
    }

    public function updtHorControllerAction()
    {
        try {
            $horDAO = new HoraireDAO();
            $horDAO->updateHoraire();
            header('Location: index.php?action=showHoraire');
            exit;
        } catch (Exception $e) {
            error_log('Error in updtHorControllerAction:' . $e->getMessage(), 0);
        }

    }
    public function deleteHorControllerAction()
    {
        $idHor = $_GET["idHor"];
        $horDAO = new HoraireDAO();
        $horDAO->deleteHoraire($idHor);
        header('Location: index.php?action=showHoraire');
        exit;
    }





}
?>