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
    public function get_horairebyID($idHor)
    {
        $query = "SELECT * FROM horaire WHERE idHor = :idHor";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(":idHor", $idHor, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            return new Horaire($result["idHor"], $result["hr_dep"], $result["hr_arv"], $result["sieg_dispo"], $result["prix"], $result["date_"], $result["fk_immat"], $result["fk_vil_dep"], $result["fk_vil_arv"]);
        } else {
            return null;
        }
    }

    public function insert_horaire()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $hr_dep = $_POST["hr_dep"];
            $hr_arv = $_POST["hr_arv"];
            $sieg_dispo = $_POST["sieg_dispo"];
            $prix = $_POST["prix"];
            $date_ = $_POST["date_"];
            $fk_immat = $_POST["fk_immat"];
            if (isset($_POST['route'])) {
                list($fk_vil_dep, $fk_vil_arv) = explode(',', $_POST['route']);
            }
            $error = "";
            try {
                if ($this->isDuplicateEntry($hr_dep, $hr_arv, $date_, $fk_immat, $fk_vil_dep, $fk_vil_arv)) {
                    $error = "Horaire is duplicated";
                    return $error;
                } else {
                    $query = "INSERT INTO horaire (hr_dep, hr_arv, sieg_dispo, prix,date_,fk_immat,fk_vil_dep,fk_vil_arv) VALUES (:hr_dep, :hr_arv, :sieg_dispo, :prix,:date_,:fk_immat,:fk_vil_dep,:fk_vil_arv)";
                    $stmt = $this->db->prepare($query);
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
                }
            } catch (PDOException $e) {
                $error = "Error: " . $e->getMessage();
                return $error;
            }
        }
    }
    public function updateHoraire()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $idHor = $_POST["id"];
            $hr_dep = $_POST["hr_dep"];
            $hr_arv = $_POST["hr_arv"];
            $sieg_dispo = $_POST["sieg_dispo"];
            $prix = $_POST["prix"];
            $date_ = $_POST["date_"];
            $fk_immat = $_POST["fk_immat"];
            $fk_vil_dep = $_POST["fk_vil_dep"];
            $fk_vil_arv = $_POST["fk_vil_arv"];
            try {
                $query = "update  horaire set hr_dep=:hr_dep, hr_arv=:hr_arv, sieg_dispo=:sieg_dispo, prix=:prix,date_=:date_,fk_immat=:fk_immat,fk_vil_dep=:fk_vil_dep,fk_vil_arv=:fk_vil_arv where idHor=:idHor";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':idHor', $idHor);
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
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    }
    private function isDuplicateEntry($hr_dep, $hr_arv, $date_, $fk_immat, $fk_vil_dep, $fk_vil_arv)
    {
        try {
            $query = "SELECT COUNT(*) FROM horaire WHERE hr_dep = :hr_dep AND hr_arv = :hr_arv and date_=:date_  AND fk_immat = :fk_immat  AND fk_vil_dep = :fk_vil_dep AND fk_vil_arv = :fk_vil_arv";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':hr_dep', $hr_dep);
            $stmt->bindParam(':hr_arv', $hr_arv);
            $stmt->bindParam(':fk_vil_dep', $fk_vil_dep);
            $stmt->bindParam(':fk_vil_arv', $fk_vil_arv);
            $stmt->bindParam(':fk_immat', $fk_immat);
            $stmt->bindParam(':date_', $date_);
            $stmt->execute();
            if ($stmt->fetchColumn() > 0) {
                return true;
            }
        } catch (PDOException $e) {
            echo "Error  duplicate entry: " . $e->getMessage();
            return false;
        }
    }
    function deleteHoraire($idHor)
    {
        try {
            $query = "delete from horaire where idHor=:idHor ";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':idHor', $idHor);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    public function search_Horaire($fk_vil_dep, $fk_vil_arv, $date_, $idEn = "", $maxprice = "", $hor = "")
    {
        $date = date('Y-m-d', strtotime($date_));
        $query = "SELECT horaire.*, route.duree,entreprise.nomEn, entreprise.imgEn AS entrepImage
        FROM horaire
        INNER JOIN route ON horaire.fk_vil_dep = route.vil_dep and horaire.fk_vil_arv = route.vil_arv
        INNER JOIN Bus ON horaire.fk_immat= Bus.immat
        INNER JOIN entreprise ON Bus.fk_idEn = entreprise.idEn
        WHERE horaire.date_ = :date_
        AND horaire.fk_vil_dep = :fk_vil_dep
        AND horaire.fk_vil_arv = :fk_vil_arv";
        if (!empty($idEn)) {
            $query .= " AND entreprise.idEn = :idEn";
        }
        if (!empty($maxprice)) {
            $query .= " AND horaire.prix <= :maxprice";
        }
        if (!empty($hor)) {
            switch ($hor) {
                case "morning":
                    $query .= " AND horaire.hr_dep between '00:00' AND '12:00'";
                    break;
                case "afternoon":
                    $query .= " AND horaire.hr_dep between '12:00' AND '17:00'";
                    break;
                case "evening":
                    $query .= " AND  horaire.hr_dep between '17:00' AND '23:59'";
                    break;
            }
        }
        // var_dump($query);
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':date_', $date, PDO::PARAM_STR);
        $stmt->bindParam(':fk_vil_arv', $fk_vil_arv, PDO::PARAM_STR);
        $stmt->bindParam(':fk_vil_dep', $fk_vil_dep, PDO::PARAM_STR);
        
        if (!empty($idEn)) {
            $stmt->bindParam(':idEn', $idEn, PDO::PARAM_INT);
        }
        if (!empty($maxprice)) {
            $stmt->bindParam(':maxprice', $maxprice, PDO::PARAM_INT);
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $horaires = array();
        foreach ($result as $row) {
            $base64Image = base64_encode($row['entrepImage']);

            $horaires[] = [
                'idHor' => $row['idHor'],
                'hr_dep' => $row['hr_dep'],
                'hr_arv' => $row['hr_arv'],
                'sieg_dispo' => $row['sieg_dispo'],
                'prix' => $row['prix'],
                'date_' => $row['date_'],
                'fk_immat' => $row['fk_immat'],
                'fk_vil_dep' => $row['fk_vil_dep'],
                'fk_vil_arv' => $row['fk_vil_arv'],
                'duree' => $row['duree'],
                'nomEn' => $row['nomEn'],
                'base64Image' => $base64Image,
            ];

        }

        // var_dump($result);
        // var_dump($horaires);

        return $horaires;
    }

}


