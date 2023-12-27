
<?php 


 
    class Entreprise{
        private $idEn;
        private $nomEn;
        private $imgEn;

       
        public function __construct($idEn, $nomEn, $imgEn){
            $this->idEn = $idEn;
            $this->nomEn = $nomEn;
            $this->imgEn = $imgEn;
         
        }
 
        public function getIdEn()
        {
                return $this->idEn;
        }
        public function getNomEn()
        {
                return $this->nomEn;
        }
        public function getImgEn()
        {
                return $this->imgEn;
        }
}
?>