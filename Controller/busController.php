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
            $inserted = $busDAO->insert_bus();
            if ($inserted) {
                header('Location: index.php?action=admin');
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
        try {
            $busDAO = new BusDAO();
            $busDAO->updateBus();
            header('Location: index.php?action=admin');
            exit;
        } catch (Exception $e) {
            error_log('Error in updtBusControllerAction: ' . $e->getMessage(), 0);
        }
    }
    public function deleteBusControllerAction()
    {
        $immat = $_GET["immat"];
        $busDAO = new BusDAO();
        $busDAO->deleteBus($immat);
        header('Location: index.php?action=admin');
        exit;
    }

}