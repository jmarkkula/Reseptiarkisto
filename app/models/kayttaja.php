<?php

class Kayttaja extends BaseModel {
    public $nimi, $email, $salasana;
    
    public function __construct($attributes) {
        parent::__construct($attributes);

        $this->validators = array('validate_nimi');
    }

    public static function authenticate($nimimerkki, $salasana) {
        $row = DB::query('SELECT email, salasana FROM Kayttaja WHERE nimimerkki = :nimimerkki LIMIT 1', array('nimimerkki' => $nimimerkki));
        
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