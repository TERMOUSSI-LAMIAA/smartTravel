<?php
require_once 'Model/connexion.php';
require_once 'Model/horaire/ModelHoraire.php';
class HoraireDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_horaire(){
        $query = "SELECT * FROM horaire";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $horaireData = $stmt->fetchAll();
        $horaires = array();
        foreach ($horaireData as $B) {
            $horaires[] = new Horaire($B["idHor"],$B["hr_dep"],$B["hr_arv"],$B["sieg_dispo"],$B["prix"],$B["date_"],$B["fk_immat"],$B["fk_vil_dep"],$B["fk_vil_arv"]);
        }
        return $horaires;

    }




}



