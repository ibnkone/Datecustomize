<?php

/**
 * 
 */
namespace Ibnkone\Datecustomize;

class Datecustomize
{


	public static function getMois(){

		return array(
			1=>"janvier", 
			2=>"février", 
			3=>"mars", 
			4=>"avril", 
			5=>"mai", 
			6=>"juin", 
			7=>"juillet", 
			8=>"août", 
			9=>"septembre", 
			10=>"octobre", 
			11=>"novembre", 
			12=>"décembre"
		);

	}

	public static function getSemaine(){

		return array(
			1=>"lundi", 
			2=>"mardi", 
			3=>"mercredi", 
			4=>"jeudi", 
			5=>"vendredi", 
			6=>"samedi", 
			7=>"dimanche"
		);
	}


	public function getFrenchDate($date){

		$mois_annee = self::getMois();
		$jour_semaine = self::getSemaine();
        

        if (strlen($date) < 11) {
            # code...
            if(stristr($date, '-') === FALSE) {
               list($jour,$mois, $annees) = explode('/', $date);
            }else{
                list($annees,$mois,$jour) = explode('-', $date);
            }
     
            if (substr($mois,0,1)==0) { $mois=substr($mois,1); }

        }else{

            list($annee, $heure) = explode(" ", $date);
            list($annees, $mois, $jour)=explode('/', $annee);
         
            if (substr($mois,0,1)==0) { $mois=substr($mois,1); }
        }
     
        $timestamp = mktime(0,0,0, date($mois), date($jour), date($annees));
        $njour = date("N",$timestamp);
         
        return $jour_semaine[$njour].' '.$jour.' '.$mois_annee[$mois].' '.$annees;  
	}
}