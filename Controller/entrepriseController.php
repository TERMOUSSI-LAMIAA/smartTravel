<?php 
include_once "Model/entreprise/entrepriseDAO.php" ;



class contoller_entreprise{

 
function getEntrepriseController(){
    $entrepriseDAO=new EntrepriseDAO();
    $entreprises=$entrepriseDAO->get_entreprise();
    // include "Vue\admin\addBus.php";

}

 




} 
?>