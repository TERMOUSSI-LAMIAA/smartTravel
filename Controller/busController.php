<?php 
 include "Model\bus\busDAO.php" ;



class contoller_bus {

 
function getBusController(){
    $busDAO=new BusDAO();
    $buses=$busDAO->get_bus();
    include "Vue\admin\ShowBus.php";
}

 




}