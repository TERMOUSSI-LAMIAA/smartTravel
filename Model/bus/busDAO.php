<?php
require_once 'Model/connexion.php';
require_once 'Model/bus/modelBus.php';
class BusDAO{
    private $db;
    public function __construct(){
        $this->db = Database::getInstance()->getConnection(); 
    }

    public function get_bus(){
        $query = "SELECT * FROM bus";
        $stmt = $this->db->query($query);
        $stmt -> execute();
        $busData = $stmt->fetchAll();
        $buses = array();
        foreach ($busData as $B) {
            $buses[] = new Bus($B["immat"],$B["numbus"],$B["capacite"], $B["fk_idEn"]);
        }
        return $buses;

    }

    // public function update_book($book){
    //     $query = "UPDATE `BOOK` SET `Title`='".$book->getTitle()."',`Genra`='".$book->getGenre()."' where `ISBN`='".$book->getISBN()."'";
    //     // echo $query;
    //     $stmt = $this->db->query($query);
    //     $stmt -> execute();
    // }

    // function getBookByID($isbn) {
    //     $query = "SELECT * FROM BOOK where ISBN = $isbn";
    //     $stmt = $this->db->query($query);
    //     $stmt -> execute();
    //     $B = $stmt->fetch();
     
    //         $Book = new Book($B["ISBN"],$B["Title"],$B["Genra"], $B["NbrofPages"],$B["Price"],$B["Author"]);
        
    //     return $Book;
          
    // }



}



