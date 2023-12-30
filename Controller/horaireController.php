<?php 
 include "Model/horaire/horaireDAO.php" ;



class contoller_horaire{

 
function getHoraireController(){
    $horaireDAO=new HoraireDAO();
    $horaires=$horaireDAO->get_horaire();
    include "Vue\admin\showHoraire.php";
}

 




}
?>