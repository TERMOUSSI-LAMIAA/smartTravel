<?php
require_once 'Model/connexion.php';
require_once 'Model/entreprise/ModelEntreprise.php';
class EntrepriseDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_entreprise(){
        $query = "SELECT * FROM entreprise";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $entrepriseData = $stmt->fetchAll();
        $entreprises = array();
        foreach ($entrepriseData as $B) {
            $entreprises[] = new Entreprise($B["idEn"],$B["nomEn"],$B["imgEn"]);
        }
        return $entreprises;

    }




}



