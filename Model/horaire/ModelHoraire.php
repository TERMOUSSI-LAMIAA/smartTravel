<?php



class Horaire
{
    private $idHor;
    private $hr_dep;
    private $hr_arv;
    private $sieg_dispo;
    private $prix;
    private $date_;
    private $fk_immat;
    private $fk_vil_dep;
    private $fk_vil_arv;

    public function __construct($idHor, $hr_dep, $hr_arv, $sieg_dispo, $prix, $date_, $fk_immat, $fk_vil_dep, $fk_vil_arv)
    {
        $this->idHor = $idHor;
        $this->hr_dep = $hr_dep;
        $this->hr_arv = $hr_arv;
        $this->sieg_dispo = $sieg_dispo;
        $this->prix = $prix;
        $this->date_ = $date_;
        $this->fk_immat = $fk_immat;
        $this->fk_vil_dep = $fk_vil_dep;
        $this->fk_vil_arv = $fk_vil_arv;

    }



    /**
     * Get the value of idHor
     */
    public function getIdHor()
    {
        return $this->idHor;
    }

    /**
     * Get the value of hr_dep
     */
    public function getHr_dep()
    {
        return $this->hr_dep;
    }

    /**
     * Get the value of hr_arv
     */
    public function getHr_arv()
    {
        return $this->hr_arv;
    }

    /**
     * Get the value of sieg_dispo
     */
    public function getSieg_dispo()
    {
        return $this->sieg_dispo;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Get the value of date_
     */
    public function getDate_()
    {
        return $this->date_;
    }

    /**
     * Get the value of fk_immat
     */
    public function getFk_immat()
    {
        return $this->fk_immat;
    }

    /**
     * Get the value of fk_vil_dep
     */
    public function getFk_vil_dep()
    {
        return $this->fk_vil_dep;
    }

    public function getFk_vil_arv()
    {
        return $this->fk_vil_arv;
    }
}
?>