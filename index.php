<?php
include "Controller/villeController.php";
include "Controller/busController.php";
include "Controller/routeController.php";
include "Controller/horaireController.php";
include "Controller/entrepriseController.php";

// $contoller_villes = new contoller_Ville() ; 
// $contoller_villes->getVilleController() ;
$controllerBus = new contoller_bus();


// $controllerBus->addBusController();
// $controllerBus->addBusController();
// Create an instance of the controller and handle the request


// $controllerEntreprise = new contoller_entreprise();
// $controllerEntreprise->getEntrepriseController();
$controllerRoute = new contoller_route();
// 
$controllerHoraire = new contoller_horaire();
// $controllerHoraire->getHoraireController();
// $controllerBus = new contoller_bus();
// $controllerEntreprise = new contoller_entreprise();
// Instantiate other controllers as needed

// Check for the 'action' parameter in the URL

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'showBus':
            $controllerBus->getBusController();
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
        case 'showRoute':
            $controllerRoute->getRouteController();
        case 'addRouteform':
            $controllerRoute->addRouteController();
        case 'addRoute':
            $controllerRoute->addRouteControllerAction();
        case 'updateRouteShow':
            $controllerRoute->updtRouteController();
        case 'updtRoute':
            $controllerRoute->updtRouteControllerAction();
        case 'deleteRouteShow':
            $controllerRoute->deleteRouteControllerAction();
        case 'showHoraire':
            $controllerHoraire->getHoraireController();
        case 'addHoraireform':
            $controllerHoraire->addHoraireController();
        case 'addHoraire':
            $controllerHoraire->addHoraireControllerAction();

    }

} else {
    $controllerBus->getBusController();
}
?>