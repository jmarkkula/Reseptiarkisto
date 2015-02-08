<?php

class RaakaaineController extends BaseController {

    public static function index() {

        $raakaaineet = Raakaaine::all();

        self::render_view('raakaaine/index.html', array('raakaaineet' => $raakaaineet));
    }

    public static function show($nimi) {
        $raakaaine = Raakaaine::find($nimi);

        self::render_view('raakaaine/show.html', array('raakaaine' => $raakaaine));
    }

    public static function create() {
        self::render_view('raakaaine/new.html');
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

            self::redirect_to('/raakaaineet/' . $nimi, array('message' => 'Raaka-aine lisätty.'));
        } else {
            self::render_view('raakaaine/new.html', array('errors' => $errors, 'attributes' => $attributes));
        }
    }

    public static function redirect_to($location, $message) {
        parent::redirect_to($location, $message);
    }

}
