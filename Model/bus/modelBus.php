<?php



class Bus
{
        private $immat;
        private $numbus;
        private $capacite;
        private $fk_idEn;
        private $enterpriseName;

        public function __construct($immat, $numbus, $capacite, $fk_idEn)
        {
                $this->immat = $immat;
                $this->numbus = $numbus;
                $this->capacite = $capacite;
                $this->fk_idEn = $fk_idEn;
        }

        public function setEnterpriseName($enterpriseName)
        {
                $this->enterpriseName = $enterpriseName;
        }
        /**
         * Get the value of immat
         */
        public function getImmat()
        {
                return $this->immat;
        }

        /**
         * Get the value of numbus
         */
        public function getNumbus()
        {
                return $this->numbus;
        }

        /**
         * Get the value of capacite
         */
        public function getCapacite()
        {
                return $this->capacite;
        }
        public function getFk_idEn()
        {
                return $this->fk_idEn;
        }
        public function getEnterpriseName()
        {
                return $this->enterpriseName;
        }
}
?>