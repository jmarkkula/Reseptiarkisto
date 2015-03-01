<?php

class RaakaaineController extends BaseController {

    //Listaus

    public static function index() {

        $raakaaineet = Raakaaine::all();

        self::render_view('raakaaine/listaus.html', array('raakaaineet' => $raakaaineet));
    }

    //Esittely

    public static function show($nimi) {
        $raakaaine = Raakaaine::find($nimi);

        self::render_view('raakaaine/esittely.html', array('raakaaine' => $raakaaine));
    }

    //Lisäys

    public static function create() {
        self::render_view('raakaaine/uusi.html');
    }

    public static function store() {
        $params = $_POST;

        $attributes = array(
            'nimi' => $params['nimi'],
            'kuvaus' => $params['kuvaus']
        );

        $raakaaine = new Raakaaine($attributes);
        $errors = $raakaaine->errors();

        if (count($errors) == 0) {
            $nimi = Raakaaine::create($attributes);

            self::redirect_to('/raakaaine/' . $nimi, array('message' => 'Raaka-aine lisätty.', 'raakaaine' => $attributes));
        } else {
            self::render_view('/raakaaine/uusi.html', array('errors' => $errors, 'raakaaine' => $attributes));
        }
    }

    //Muokkaaminen

    public static function edit($nimi) {
        $raakaaine = Raakaaine::find($nimi);

        self::render_view('/raakaaine/muokkaus.html', array('raakaaine' => $raakaaine));
    }

    public static function update($nimi) {
        $params = $_POST;

        $raakaaine = array('nimi' => $nimi, 'kuvaus' => $params['kuvaus']);

        Raakaaine::update($raakaaine);

        self::redirect_to('/raakaaine/' . $nimi, array('message' => 'Raaka-ainetta muokattu.', 'raakaaine' => $raakaaine));
    }

    //Poistaminen 

    public static function destroy($nimi) {
        if(!Ainesosa::onko_kaytossa($nimi)) {
            Raakaaine::destroy($nimi);

        self::redirect_to('/raakaaine', array('message' => 'Raaka-aine poistettu onnistuneesti!'));
        } else {
            self::redirect_to('/raakaaine/'. $nimi, array('message' => 'Raaka-ainetta käytetään reseptissä, et voi poistaa sitä.'));
        }
        
    }

    public static function redirect_to($location, $message) {
        parent::redirect_to($location, $message);
    }

}
