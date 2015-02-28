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

    public static function register() {
        $params = $_POST;

        $attributes = array(
            'nimimerkki' => $params['nimimerkki'],
            'salasana' => $params['salasana'],
            'email' => $params['email']
        );

        $raakaaine = new Kayttaja($attributes);
        $errors = $raakaaine->errors();

        if (count($errors) == 0) {
            $nimi = Kayttaja::registertosql($attributes);

            self::redirect_to('/' . $nimi, array('message' => 'Voit nyt kirjautua sisään!'));
        } else {
            self::render_view('/login', array('errors' => $errors));
        }
    }
    
    public static function registersql($attributes) {
        DB::query('INSERT INTO Kayttaja (nimimerkki, email, salasana) VALUES (:nimimerkki, :email, :salasana) RETURNING nimimerkki', $attributes);

        return $attributes['nimimerkki'];
    }
}
