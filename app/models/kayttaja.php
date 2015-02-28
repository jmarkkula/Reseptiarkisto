<?php

class Kayttaja extends BaseModel {
    public $nimimerkki, $email, $salasana;
    
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function authenticate($nimimerkki, $salasana) {
        $row = DB::query('SELECT email, salasana FROM Kayttaja WHERE nimimerkki = :nimimerkki LIMIT 1', array('nimimerkki' => $nimimerkki));
        /*$row = array(
            "salasana" => "rahkapulla",
            "email" => "testi@hotmail.com"
        );*/
        if ($row['salasana'] == $salasana) {
            $kayttaja = new Kayttaja(array(
                'nimimerkki' => $nimimerkki,
                'email' => $row['email'],
                'salasana' => $row['salasana']        
            ));
            
            return $kayttaja;
        }
        
        return null;
  }
}