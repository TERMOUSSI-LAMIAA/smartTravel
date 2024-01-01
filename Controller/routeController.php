<?php
require_once "Model/route/routeDAO.php";
require_once "Model/route/routeDAO.php";


class contoller_route
{


    function getRouteController()
    {
        $routeDAO = new RouteDAO();
        $routes = $routeDAO->get_route();
        include "Vue/admin/showRoute.php";
    }
    function addRouteController()
    {
        $villeDAO = new VilleDAO();
        $villes = $villeDAO->get_ville();
        include "Vue\admin\addRoute.php";
    }

    function addRouteControllerAction()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $routeDAO = new RouteDAO();
            $inserted = $routeDAO->insert_route();
            if ($inserted) {
                header('Location: index.php?action=showRoute');
                exit();
            } else {
                echo 'Adding error';
            }
        }


    }
    public function updtRouteController()
    {
        if (isset($_GET['vil_dep']) && isset($_GET['vil_arv'])) {
            $vil_dep = $_GET['vil_dep'];
            $vil_arv = $_GET['vil_arv'];
            $villeDAO = new VilleDAO();
            $villes = $villeDAO->get_ville();
            $routeDAO = new RouteDAO();
            $route = $routeDAO->getRouteByVilles($vil_dep, $vil_arv);
            include("Vue\admin\updtRoute.php");
        }
    }

    public function updtRouteControllerAction()//!!!!!!!!!!!!
    {
        try{
            $routeDAO = new RouteDAO();
            $routeDAO->updateRoute();
            header('Location: index.php?action=showRoute');
            exit;
        }
        catch (Exception $e) {
            error_log('Error in updtBusControllerAction:' . $e->getMessage(), 0);
        }

    }

    public function deleteRouteControllerAction()
    {
        $vil_dep = $_GET['vil_dep'];
        $vil_arv = $_GET['vil_arv'];
        $routeDAO = new RouteDAO();
        $routeDAO->deleteRoute($vil_dep,$vil_arv);
        header('Location: index.php?action=showRoute');
        exit;
    }






}
?>