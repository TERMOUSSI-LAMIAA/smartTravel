<?php
include "Controller/villeController.php";
include "Controller/busController.php";
include "Controller/routeController.php";
include "Controller/horaireController.php";
include "Controller/entrepriseController.php";
include "Controller/homeController.php";
include "Controller/detailsController.php";


$controllerBus = new contoller_bus();
$controllerHome = new contoller_Home();
$controllerDetail = new contoller_details();


$controllerRoute = new contoller_route();
// 
$controllerHoraire = new contoller_horaire();


if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'showBus':
            $controllerBus->getBusController();
            break;
        case 'addBusform':
            $controllerBus->addBusController();
            break;
        case 'addBus':
            $controllerBus->addBusControllerAction();
            break;
        case 'updateBusShow':
            $controllerBus->updtBusController();
            break;
        case 'updtBus':
            $controllerBus->updtBusControllerAction();
            break;
        case 'deleteBus':
            $controllerBus->deleteBusControllerAction();
            break;
        case 'showRoute':
            $controllerRoute->getRouteController();
            break;
        case 'addRouteform':
            $controllerRoute->addRouteController();
            break;
        case 'addRoute':
            $controllerRoute->addRouteControllerAction();
            break;
        case 'updateRouteShow':
            $controllerRoute->updtRouteController();
            break;
        case 'updtRoute':
            $controllerRoute->updtRouteControllerAction();
            break;
        case 'deleteRouteShow':
            $controllerRoute->deleteRouteControllerAction();
            break;
        case 'showHoraire':
            $controllerHoraire->getHoraireController();
            break;
        case 'addHoraireform':
            $controllerHoraire->addHoraireController();
            break;
        case 'addHoraire':
            $controllerHoraire->addHoraireControllerAction();
            break;
        case 'updateHorShow':
            $controllerHoraire->updtHorController();
            break;
        case 'deleteHor':
            $controllerHoraire->deleteHorControllerAction();
        case 'admin':
            $controllerBus->getBusController();
            break;
        case 'homePage':
            $controllerHome->getVilleHomeController();
            break;
        case 'mainSearch':
            $controllerHome->getSearchedHoraireController();

            break;
        case 'entrepFilter':
            $controllerDetail->filterController();
            break;
        case 'priceFilter':
            $controllerDetail->filterController();
            break;
    }

} else {
    $controllerHome->getVilleHomeController();
}
?>