
<?php 


 
    class Ville{
        private $nomVil;
      
        public function __construct($nomVil){
            $this->nomVil = $nomVil;
     
        }

        /**
         * Get the value of nomVil
         */ 
        public function getNomVil()
        {
                return $this->nomVil;
        }
}
?>