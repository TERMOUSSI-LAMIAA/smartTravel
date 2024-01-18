<?php
require_once 'Model/connexion.php';
require_once 'Model\route\ModelRoute.php';
class RouteDAO
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_route()
    {
        $query = "SELECT * FROM route ";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $routeData = $stmt->fetchAll();
        $routes = array();
        foreach ($routeData as $B) {
            $routes[] = new Route($B["vil_dep"], $B["vil_arv"], $B["dist"], $B["duree"]);
        }
        return $routes;
    }
    public function insert_route()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vil_dep = $_POST["vil_dep"];
            $vil_arv = $_POST["vil_arv"];
            $dist = $_POST["dist"];
            $dure = $_POST["dure"];
            $error = "";
            try {
                if ($vil_dep == $vil_arv) {
                    $error="Error: Departure and arrival cities cannot be the same.";
                    return $error;     
                }
                $query = "INSERT INTO route (vil_dep, vil_arv, dist, duree) VALUES (:vil_dep, :vil_arv, :dist, :dure)";
                $stmt = $this->db->prepare($query);

                $stmt->bindParam(':vil_dep', $vil_dep);
                $stmt->bindParam(':vil_arv', $vil_arv);
                $stmt->bindParam(':dist', $dist);
                $stmt->bindParam(':dure', $dure);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                $error="Error: " . $e->getMessage();
                return $error;
            }
        }

        return false;
    }

    public function getRouteByVilles($vil_dep, $vil_arv)
    {
        $query = "SELECT * FROM route WHERE vil_dep = :vil_dep and vil_arv=:vil_arv";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":vil_dep", $vil_dep, PDO::PARAM_STR);
        $stmt->bindParam(":vil_arv", $vil_arv, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Route($result["vil_dep"], $result["vil_arv"], $result["dist"], $result["duree"]);
        } else {
            return null;
        }
    }

    public function updateRoute()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $vil_dep = $_POST["vil_dep"];
            $vil_arv = $_POST["vil_arv"];
            $dist = $_POST["dist"];
            $dure = $_POST["dure"];

            try {
                $query = "update route set dist=:dist, duree=:dure WHERE vil_arv=:vil_arv and   vil_dep=:vil_dep";
                $stmt = $this->db->prepare($query);

                $stmt->bindParam(':vil_dep', $vil_dep);
                $stmt->bindParam(':vil_arv', $vil_arv);
                $stmt->bindParam(':dist', $dist);
                $stmt->bindParam(':dure', $dure);
                $stmt->execute();

                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
    function deleteRoute($vil_dep, $vil_arv)
    {
        try {
            $query = "delete from route where vil_dep=:vil_dep and vil_arv=:vil_arv";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':vil_dep', $vil_dep);
            $stmt->bindParam(':vil_arv', $vil_arv);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}



