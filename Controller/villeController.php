<?php 
 include "Model/ville/villeDAO.php" ;



class contoller_Ville {

    function getVilleController()  {
        
   $VilleDAO = new VilleDAO() ;
   $villes = $VilleDAO-> get_ville();

   include "Vue/admin/addRoute.php" ; 


    }


 




}