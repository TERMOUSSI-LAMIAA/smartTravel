<?php
include "Controller/villeController.php";
include "Controller/busController.php";
include "Controller/routeController.php";
include "Controller/horaireController.php";
include "Controller/entrepriseController.php";

// $contoller_villes = new contoller_Ville() ; 
// $contoller_villes->getVilleController() ;
$controllerBus = new contoller_bus();
$controllerBus->getBusController();

// $controllerBus->addBusController();
// $controllerBus->addBusController();
// Create an instance of the controller and handle the request


// $controllerEntreprise = new contoller_entreprise();
// $controllerEntreprise->getEntrepriseController();
// $controllerRoute=new contoller_route();
// $controllerRoute->getRouteController();
// $controllerHoraire =new contoller_horaire();
// $controllerHoraire->getHoraireController();
// $controllerBus = new contoller_bus();
// $controllerEntreprise = new contoller_entreprise();
// Instantiate other controllers as needed

// Check for the 'action' parameter in the URL

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'addBusform':
            $controllerBus->addBusController();
        case 'addBus':
            $controllerBus->addBusControllerAction();
            break;
        case 'updateBusShow':
            $controllerBus->updtBusController();
        case 'updtBus':
            $controllerBus->updtBusControllerAction();
            break;
        case 'deleteBus':
            $controllerBus->deleteBusControllerAction();

    }

} else {
    // $controllerBus->getBusController();
}
?>