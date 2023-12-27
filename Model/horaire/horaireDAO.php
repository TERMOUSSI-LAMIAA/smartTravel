<?php
require_once 'Model/connexion.php';
require_once 'Model\route\ModelRoute.php';
class HoraireDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_horaire(){
        $query = "SELECT * FROM route";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $routeData = $stmt->fetchAll();
        $routes = array();
        foreach ($routeData as $B) {
            $routes[] = new Route($B["vil_dep"],$B["vil_arv"],$B["dist"],$B["duree"]);
        }
        return $routes;

    }




}



