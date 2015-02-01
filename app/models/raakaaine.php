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
    }
    
    public static function create($nimi, $kuvaus) {
        $palautus = DB::query('INSERT INTO Raakaaine (nimi, kuvaus) VALUES (:nimi, :kuvaus) RETURNING nimi', 
                array('nimi' => $nimi, 'kuvaus' => $kuvaus));
        
        return $palautus;
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
