<?php 
 include "Model/route/routeDAO.php" ;



class contoller_route {

 
function getRouteController(){
    $routeDAO=new RouteDAO();
    $routes=$routeDAO->get_route();
    include "Vue/admin/showRoute.php";
}

 




}
?>