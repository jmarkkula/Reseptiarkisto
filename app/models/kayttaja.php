<?php

class Kayttaja extends BaseModel {

    public $nimimerkki, $email, $salasana;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function authenticate($nimimerkki, $salasana) {
        $rows = DB::query('SELECT nimimerkki, email, salasana FROM Kayttaja WHERE nimimerkki = :nimimerkki LIMIT 1', array('nimimerkki' => $nimimerkki));
        /* $row = array(
          "salasana" => "rahkapulla",
          "email" => "testi@hotmail.com"
          ); */

        if (count($rows) > 0) {
            $row = $rows[0];

            if ($salasana == $row['salasana']) {
                $kayttaja = new Kayttaja(array(
                    'nimimerkki' => $row['nimimerkki'],
                    'email' => $row['email'],
                    'salasana' => $row['salasana']
                ));

                return $kayttaja;
            }
        }
        return null;
    }

    public static function find($nimimerkki) {
        $rows = DB::query('SELECT * FROM Kayttaja WHERE nimimerkki = :nimimerkki LIMIT 1', array('nimimerkki' => $nimimerkki));

        if (count($rows) > 0) {
            $row = $rows[0];
            $kayttaja = new Kayttaja(array(
                'nimimerkki' => $row['nimimerkki'],
                'email' => $row['email'],
                'salasana' => $row['salasana']
            ));

            return $kayttaja;
        }
        return null;
    }

}
