<?php
require_once 'Model/connexion.php';
require_once 'Model/horaire/ModelHoraire.php';
class HoraireDAO
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get_horaire()
    {
        $query = "SELECT * FROM horaire";
        $stmt = $this->db->query($query);
        $stmt->execute();
        $horaireData = $stmt->fetchAll();
        $horaires = array();
        foreach ($horaireData as $B) {
            $horaires[] = new Horaire($B["idHor"], $B["hr_dep"], $B["hr_arv"], $B["sieg_dispo"], $B["prix"], $B["date_"], $B["fk_immat"], $B["fk_vil_dep"], $B["fk_vil_arv"]);
        }
        return $horaires;
    }

    public function insert_horaire()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get values from $_POST
            $hr_dep = $_POST["hr_dep"];
            $hr_arv = $_POST["hr_arv"];
            $sieg_dispo = $_POST["sieg_dispo"];
            $prix = $_POST["prix"];
            $date_ = $_POST["date_"];
            $fk_immat = $_POST["fk_immat"];
            $fk_vil_dep = $_POST["fk_vil_dep"];
            $fk_vil_arv = $_POST["fk_vil_arv"];

            try {
                // Prepare the SQL statement
                $query = "INSERT INTO horaire (hr_dep, hr_arv, sieg_dispo, prix,date_,fk_immat,fk_vil_dep,fk_vil_arv) VALUES (:hr_dep, :hr_arv, :sieg_dispo, :prix,:date_,:fk_immat,:fk_vil_dep,:fk_vil_arv)";
                $stmt = $this->db->prepare($query);

                // Bind parameters
                $stmt->bindParam(':hr_dep', $hr_dep);
                $stmt->bindParam(':hr_arv', $hr_arv);
                $stmt->bindParam(':sieg_dispo', $sieg_dispo);
                $stmt->bindParam(':prix', $prix);
                $stmt->bindParam(':date_', $date_);
                $stmt->bindParam(':fk_immat', $fk_immat);
                $stmt->bindParam(':fk_vil_dep', $fk_vil_dep);
                $stmt->bindParam(':fk_vil_arv', $fk_vil_arv);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                // Handle the exception (e.g., log error, return false)
                // You might want to handle the error more gracefully in a production environment
                echo "Error: " . $e->getMessage();
                return false;
            }
        }



    }
}


