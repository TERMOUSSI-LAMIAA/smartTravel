<?php 
 require_once "Model/bus/busDAO.php" ; 
 require_once "Model/entreprise/entrepriseDAO.php" ; 



class contoller_bus {

 
function getBusController(){
    $busDAO=new BusDAO();
    $buses=$busDAO->get_bus();
    include "Vue/admin/ShowBus.php";
  
}

function addBusController(){
$entrepriseDAO=new EntrepriseDAO();
$entreprises=$entrepriseDAO->get_entreprise();
include "Vue\admin\addBus.php";  
}

// public function addBusControllerAction() {
//     $busDAO = new busDAO();
//     $busDAO->insert_bus();
//     header("location: index.php?action=addBus");
//     exit;
// }
function addBusControllerAction(){

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
        $busDAO = new BusDAO();

        // Call the addBus method to add the bus to the database
        $busDAO->insert_bus();

        // Redirect to the page showing buses or display a success message
        header('Location: index.php?action=showBuses');
        echo 'yes!!!';
        exit();
    } else {
        echo 'no';
       // include "Vue\admin\addBus.php";
    }
 
} 




}