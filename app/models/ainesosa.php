<?php

class Ainesosa extends BaseModel {

    public $raakaaine, $maara, $reseptitunnus;

    public function __construct($attributes) {
        parent::__construct($attributes);
        
        $this->validators = array('validate_maara', 'validate_raakaaine');
    }
    
    public function validate_raakaaine() {
        $errors = array();
        
        
        if($this->raakaaine=='' || $this->raakaaine == null) {
            $errors[]='Raaka-aine ei saa olla tyhjä.';
        }
        
        return $errors;
    }
    
    public function validate_maara() {
        $errors = array();
        
        if($this->maara == '' || $this->maara == null) {
            $errors[]='Määrä ei saa olla tyhjä.';
        }
        
        return $errors;
    }

    public static function find($attributes) {
        $rows = DB::query('SELECT * FROM Ainesosa WHERE raakaaine = :raakaaine AND maara = :maara AND reseptitunnus = :reseptitunnus LIMIT 1', array('raakaaine' => $attributes['raakaaine'], 'maara' => $attributes['maara'], 'reseptitunnus' => $attributes['reseptitunnus']));

        if (count($rows) > 0) {
            $row = $rows[0];

            $ainesosa = new Ainesosa(array(
                'raakaaine' => $row['raakaaine'],
                'maara' => $row['maara'],
                'reseptitunnus' => $row['reseptitunnus']
            ));

            return $ainesosa;
        }

        return null;
    }

    public static function destroy($attributes) {
        DB::query('DELETE FROM Ainesosa WHERE raakaaine = :raakaaine AND maara = :maara AND reseptitunnus = :reseptitunnus', $attributes);
    }

    public static function create($attributes) {
        DB::query('INSERT INTO Ainesosa (raakaaine, maara, reseptitunnus) VALUES (:raakaaine, :maara, :reseptitunnus)', array('raakaaine' => $attributes['raakaaine'], 'maara' => $attributes['maara'], 'reseptitunnus' => $attributes['reseptitunnus']));
    }

    public static function reseptin_ainesosat($reseptitunnus) {
        $ainesosat = array();

        $rows = DB::query('SELECT * FROM Ainesosa WHERE reseptitunnus = :reseptitunnus', array('reseptitunnus' => $reseptitunnus));

        foreach ($rows as $row) {
            $ainesosat[] = new Ainesosa(array(
                'raakaaine' => $row['raakaaine'],
                'maara' => $row['maara'],
                'reseptitunnus' => $row['reseptitunnus']
            ));
        }

        return $ainesosat;
    }

    public static function ainesosat_joissa_raakaainetta($raakaaine) {
        $ainesosat = array();

        $rows = DB::query('SELECT * FROM Ainesosa WHERE raakaaine = :raakaaine', array('raakaaine' => $raakaaine));

        if (count($rows) > 0) {
            foreach ($rows as $row) {
                $ainesosat[] = new Ainesosa(array(
                    'raakaaine' => $row['raakaaine'],
                    'maara' => $row['maara'],
                    'reseptitunnus' => $row['reseptitunnus']
                ));
            }

            return $ainesosat;
        }

        return null;
    }

}
