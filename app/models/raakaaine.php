<?php

/**
 * Description of raakaaine
 *
 * @author juma
 */
class Raakaaine extends BaseModel {

    public $nimi, $kuvaus;

    public function __construct($attributes) {
        parent::__construct($attributes);
        
        $this->validators = array('validate_nimi');
    }

    public static function create($attributes) {
        $palautus = DB::query('INSERT INTO Raakaaine (nimi, kuvaus) VALUES (:nimi, :kuvaus) RETURNING nimi', $attributes);

        return $palautus;
    }

    public function validate_nimi() {
        $errors = array();

        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Nimi ei saa olla tyhjä.';
        }

        if (strlen($this->nimi) < 2) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kaksi merkkiä.';
        }
        
        return $errors;
    }

    public static function all() {
        $raakaaineet = array();

        $rows = DB::query('SELECT * FROM Raakaaine');

        foreach ($rows as $row) {
            $raakaaineet[] = new Raakaaine(array(
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus']
            ));
        }

        return $raakaaineet;
    }

    public static function find($nimi) {
        $rows = DB::query('SELECT * FROM Raakaaine WHERE nimi = :nimi LIMIT 1', array('nimi' => $nimi));

        if (count($rows) > 0) {
            $row = $rows[0];

            $raakaaine = new Raakaaine(array(
                'nimi' => $row['nimi'],
                'kuvaus' => $row['kuvaus']
            ));

            return $raakaaine;
        }

        return null;
    }

}