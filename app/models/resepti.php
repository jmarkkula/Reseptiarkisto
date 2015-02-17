<?php

class Resepti extends BaseModel {

    public $tunnus, $nimi, $valmistusohje, $lisaaja, $ainesosat;

    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    public static function all() {
        $reseptit = array();

        $rows = DB::query('SELECT * FROM Resepti');

        foreach ($rows as $row) {
            $reseptit[] = new Resepti(array(
                'tunnus' => $row['tunnus'],
                'nimi' => $row['nimi'],
                'valmistusohje' => $row['valmistusohje'],
                'lisaaja' => $row['lisaaja']
            ));
        }

        return $reseptit;
    }

    public static function find($tunnus) {
        $rows = DB::query('SELECT * FROM Resepti WHERE tunnus = :tunnus LIMIT 1', array('tunnus' => $tunnus));

        if (count($rows) > 0) {
            $row = $rows[0];

            $resepti = new Resepti(array(
                'tunnus' => $row['tunnus'],
                'nimi' => $row['nimi'],
                'valmistusohje' => $row['valmistusohje'],
                'lisaaja' => $row['lisaaja'],
                'ainesosat' => Ainesosa::reseptin_ainesosat($row['tunnus'])
            ));

            return $resepti;
        }

        return null;
    }



}
