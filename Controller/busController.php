<?php
require_once "Model/bus/busDAO.php";
require_once "Model/entreprise/entrepriseDAO.php";



class contoller_bus
{


    function getBusController()
    {
        $busDAO = new BusDAO();
        $buses = $busDAO->get_bus();
        include "Vue/admin/ShowBus.php";

    }

    function addBusController()
    {
        $entrepriseDAO = new EntrepriseDAO();
        $entreprises = $entrepriseDAO->get_entreprise();
        include "Vue\admin\addBus.php";
    }

    function addBusControllerAction()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $busDAO = new BusDAO();

            // Call the addBus method to add the bus to the database
            $busDAO->insert_bus();

            // Redirect to the page showing buses or display a success message
            header('Location: index.php?action=showBuses');
            echo 'Ajout avec succés';
            exit();
        } else {
            echo 'Adding error';
            // include "Vue\admin\addBus.php";
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
        header('Location: index.php?action=showBuses');
        echo 'Modification avec succés';
        exit;
    }

    public function deleteBusControllerAction()
    {
        $immat=$_GET["immat"];
        $busDAO = new BusDAO();
        $busDAO->deleteBus($immat);
        header('Location: index.php?action=showBuses');
        echo 'Suppression avec succés';
        exit;
    }

}