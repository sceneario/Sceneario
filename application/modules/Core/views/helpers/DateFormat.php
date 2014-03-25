<?php

/*
 * Helper de formattage de date
 * 
 * @todo refondre les fonctions obsolêtes et bidouillées
 * @todo sur exemple de FormatageDD_MM_YYYY
 */
class Zend_View_Helper_DateFormat{
    
    public function dateFormat($date, $option)
    {
        switch($option){
            case 'month_year':
                return $this->FormatageD($date);
                break;
            case 'day_month_year_with_slash':
                return $this->FormatageDD_MM_YYYY($date);
                break;
        }
    }
    
    // ex : 2008-01-xx => janvier 2008
    function FormatageD ($dateaf)
    {
        $annee  = substr ($dateaf, 0, 4);
        $moisaf = substr ($dateaf, 5, 2);

        if ($annee == "1900"){
            $resultat = "NC";
        }
        else {
            $moisFr = array('01' => 'Janvier',
                            '02' => 'Février',
                            '03' => 'Mars',
                            '04' => 'Avril',
                            '05' => 'Mai',
                            '06' => 'Juin',
                            '07' => 'Juillet',
                            '08' => 'Ao&ucirc;t',
                            '09' => 'Septembre',
                            '10' => 'Octobre',
                            '11' => 'Novembre',
                            '12' => 'Décembre',
                            ) ;
            $resultat = $moisFr[$moisaf]." ".$annee;
        }
        return $resultat;
    }
    
     /*
     * retourne une date mm/yyyy
     */
    function FormatageDMMYYYY ($dateaf)
    {
        if (strlen($dateaf) >= 10) {
            $annee    = substr ($dateaf, 0, 4);
            $mois     = substr ($dateaf, 5, 2);
            $resultat = $mois ."/". $annee;
        }
        else{
            $resultat = $dateaf;
        }
        return $resultat;
    }
    
    /*
     * Retourne une date dd/mm/YYYY
     * à partir d'un format YYYY-MM-DD
     * 
     * @author <contact@madeforweb.fr>
     * @var string $dateBrut
     */
    function FormatageDD_MM_YYYY ($dateBrut = '2012-01-01') 
    {
        if($dateBrut == '0000-00-00'){
            return 'NC';
        }
        $date = DateTime::createFromFormat('Y-m-d', $dateBrut);
        return $date->format('d/m/Y');
    }
    
    /*
     * retourne une date dd moisentoutelettre yyyy
     */
    function FormatageDD_MMM_YYYY($dateaf) 
    {
        $resultat = substr ($dateaf, 8 ,2) ." ". $this->FormatageD($dateaf);
        return $resultat;
    }

    function FormatageDDMMYYYY($dateaf) 
    {
        $resultat = substr ($dateaf, 8, 2) ."/". $this->FormatageDMMYYYY($dateaf);
        return $resultat;
    }

    // ex : 25 janvier 2008
    function FormatageDateLong($date)
    {
        $date = explode('-', $date);

        $mois['01'] = 'janvier';
        $mois['02'] = 'février';
        $mois['03'] = 'mars';
        $mois['04'] = 'avril';
        $mois['05'] = 'mai';
        $mois['06'] = 'juin';
        $mois['07'] = 'juillet';
        $mois['08'] = 'août';
        $mois['09'] = 'septembre';
        $mois['10'] = 'octobre';
        $mois['11'] = 'novembre';
        $mois['12'] = 'décembre';

        return $date[2].' '.$mois[$date[1]].' '.$date[0];
    }
}