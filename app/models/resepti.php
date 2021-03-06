<?php

class Resepti extends BaseModel {

    public $tunnus, $nimi, $valmistusohje, $lisaaja, $ainesosat;

    public function __construct($attributes) {
        parent::__construct($attributes);

        $this->validators = array('validate_nimi');
    }

    public function validate_nimi() {
        $errors = array();

        if ($this->nimi == '' || $this->nimi == null) {
            $errors[] = 'Nimi ei saa olla tyhjä.';
        } else if (strlen($this->nimi) < 2) {
            $errors[] = 'Nimen pituuden tulee olla vähintään kaksi merkkiä.';
        }
        
        if (strlen($this->nimi) > 50) {
            $errors[] = 'Nimen pituus saa olla korkeintaan 50 merkkiä';
        }

        return $errors;
    }

    public static function create($attributes) {
        $rows = DB::query("INSERT INTO Resepti (nimi, valmistusohje, lisaaja) VALUES (:nimi, '', :lisaaja) RETURNING tunnus", $attributes);
        
        if (count($rows) > 0) {
            $row = $rows[0];

            return $row['tunnus'];
        }

        return null;
    }

    public static function all() {
        $reseptit = array();

        $rows = DB::query('SELECT * FROM Resepti ORDER BY nimi ASC');

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
    
    public static function update($attributes) {
        DB::query('UPDATE Resepti SET nimi = :nimi, valmistusohje = :valmistusohje WHERE tunnus = :tunnus', $attributes);
    }

    public static function destroy($tunnus) {
        DB::query('DELETE FROM Resepti WHERE tunnus = :tunnus', array('tunnus'=>$tunnus));
    }
}
