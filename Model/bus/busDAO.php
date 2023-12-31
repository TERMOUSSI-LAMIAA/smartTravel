<?php
require_once 'Model/connexion.php';
require_once 'Model/bus/modelBus.php';
require_once 'Model/entreprise/entrepriseDAO.php';
class BusDAO
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_bus()
    {
        $query = "SELECT * FROM bus";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $busData = $stmt->fetchAll();
        $buses = array();
        $entrepriseDAO = new EntrepriseDAO();
        foreach ($busData as $B) {
            $entrepriseName = $entrepriseDAO->getEntrepriseNameById($B["fk_idEn"]);
            $buses[] = new Bus($B["immat"], $B["numbus"], $B["capacite"], $B["fk_idEn"]);
            $buses[count($buses) - 1]->setEnterpriseName($entrepriseName);
        }
        return $buses;
    }
    public function insert_bus()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get values from $_POST
            $immat = $_POST["immatriculation"];
            $numbus = $_POST["numero_bus"];
            $capacite = $_POST["capacite"];
            $fk_idEn = $_POST["fk_idEn"];

            try {
                // Prepare the SQL statement
                $query = "INSERT INTO bus (immat, numbus, capacite, fk_idEn) VALUES (:immat, :numbus, :capacite, :fk_idEn)";
                $stmt = $this->db->prepare($query);

                // Bind parameters
                $stmt->bindParam(':immat', $immat);
                $stmt->bindParam(':numbus', $numbus);
                $stmt->bindParam(':capacite', $capacite);
                $stmt->bindParam(':fk_idEn', $fk_idEn);
                // Execute the statement
                $stmt->execute();
                // Return true on success
                return true;
            } catch (PDOException $e) {
                // Handle the exception (e.g., log error, return false)
                // You might want to handle the error more gracefully in a production environment
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        // Return false if the form is not submitted
        return false;
    }
    public function getBusByImmat($immat)
    {
        $query = "SELECT * FROM bus WHERE immat = :immat";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":immat", $immat, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Create a Bus object using the fetched data
            return new Bus($result["immat"], $result["numbus"], $result["capacite"], $result["fk_idEn"]);
        } else {
            // Return null or handle the case where the bus with given immat is not found
            return null;
        }
    }

    public function updateBus()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get values from $_POST
            $immat = $_POST["immatriculation"];
            $numbus = $_POST["numero_bus"];
            $capacite = $_POST["capacite"];
            $fk_idEn = $_POST["fk_idEn"];

            try {
                // Prepare the SQL statement
                $query = "update bus set  numbus=:numbus, capacite=:capacite, fk_idEn=:fk_idEn WHERE immat=:immat";
                $stmt = $this->db->prepare($query);
                // Bind parameters
                $stmt->bindParam(':immat', $immat);
                $stmt->bindParam(':numbus', $numbus);
                $stmt->bindParam(':capacite', $capacite);
                $stmt->bindParam(':fk_idEn', $fk_idEn);
                $stmt->execute();
                // Return true on success
                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
    function deleteBus($immat)
    {
        try {
            $query = "delete from bus where immat=:immat";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':immat', $immat);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}

?>