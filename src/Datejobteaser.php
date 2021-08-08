<?php 

class Datejobteaser{
    public static function setdate($offer){
                    $publisheddate = explode(" ",$offer);
                    if(strtolower($publisheddate[1]) == 'dec'){$publisheddate[1] = 12;}else{echo "la date n'est pas bonne"; return die;}
                    $publisheddate = $publisheddate[5].'-'.$publisheddate[1].'-'.$publisheddate[2].' '.$publisheddate[3];
                    $publisheddate = new DateTime($publisheddate);
                    $offer = date_format($publisheddate, 'Y-m-d H:i:s');

                    return $offer;
    } 
}
?>