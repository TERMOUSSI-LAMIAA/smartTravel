
<?php 


 
    class Route{
        private $vil_dep;
        private $vil_arv;
        private $dist;
        private $duree;
      
        public function __construct($vil_dep,$vil_arv,$dist,$duree){
            $this->vil_dep = $vil_dep;
            $this->vil_arv = $vil_arv;
            $this->dist = $dist;
            $this->duree = $duree;
     
        }
        public function getVil_dep()
        {
                return $this->vil_dep;
        }

        public function getVil_arv()
        {
                return $this->vil_arv;
        }

        public function getDist()
        {
                return $this->dist;
        }

       
        public function getDuree()
        {
                return $this->duree;
        }
}
?>