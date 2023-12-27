<?php
require_once 'Model/connexion.php';
require_once 'Model/ville/ModelVille.php';
class VilleDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_ville(){
        $query = "SELECT * FROM ville";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $villeData = $stmt->fetchAll();
        $villes = array();
        foreach ($villeData as $B) {
            $villes[] = new Ville($B["nomVil"]);
        }
        return $villes;

    }




}