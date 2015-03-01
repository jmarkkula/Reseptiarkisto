<?php

class Kayttaja extends BaseModel {

    public $nimimerkki, $email, $salasana;

    public function __construct($attributes) {
        parent::__construct($attributes);

        $this->validators = array('validate_nimimerkki', 'validate_salasana', 'validate_email');
    }

    public static function authenticate($nimimerkki, $salasana) {
        $rows = DB::query('SELECT nimimerkki, email, salasana FROM Kayttaja WHERE nimimerkki = :nimimerkki LIMIT 1', array('nimimerkki' => $nimimerkki));
    

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

    public static function create($attributes) {
        $rows = DB::query('INSERT INTO Kayttaja (nimimerkki, email, salasana) VALUES (:nimimerkki, :email, :salasana) RETURNING nimimerkki', $attributes);
        if (count($rows) > 0) {
            $row = $rows[0];
            return $row['nimimerkki'];
        }
        return null;
    }

    public function validate_nimimerkki() {
        $errors = array();


        if (Kayttaja::find($this->nimimerkki) != NULL) {
            $errors[] = 'Käyttäjä samalla nimimerkillä on jo olemassa';
        }

        if ($this->nimimerkki == '' || $this->nimimerkki == null) {
            $errors[] = 'Nimimerkki ei saa olla tyhjä.';
        } else if (strlen($this->nimimerkki) < 2) {
            $errors[] = 'Nimimerkin pituuden tulee olla vähintään kaksi merkkiä.';
        }

        if (strlen($this->nimimerkki) > 20) {
            $errors[] = 'Nimimerkin pituus saa olla korkeintaan 20 merkkiä';
        }

        return $errors;
    }
    
    public function validate_email() {
        $errors = array();

        if (strlen($this->email) > 320) {
            $errors[] = 'Sähköpostiosoitteen pituus saa olla korkeintaan 320 merkkiä';
        }

        return $errors;
    }
      
    public function validate_salasana() {
        $errors = array();

        if ($this->salasana == '' || $this->salasana == null) {
            $errors[] = 'Salasana ei saa olla tyhjä.';
        } else if (strlen($this->salasana) < 2) {
            $errors[] = 'Salasanan pituuden tulee olla vähintään kaksi merkkiä.';
        }

        if (strlen($this->salasana) > 20) {
            $errors[] = 'Salasanan pituus saa olla korkeintaan 20 merkkiä';
        }

        return $errors;
    }


}
