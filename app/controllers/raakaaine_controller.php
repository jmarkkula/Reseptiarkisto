<?php

class RaakaaineController extends BaseController {

    //Listaus
    
    public static function index() {

        $raakaaineet = Raakaaine::all();

        self::render_view('raakaaine/index.html', array('raakaaineet' => $raakaaineet));
    }

    //Esittely
    
    public static function show($nimi) {
        $raakaaine = Raakaaine::find($nimi);

        self::render_view('raakaaine/show.html', array('raakaaine' => $raakaaine));
    }

    //Lisäys
    
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

            self::redirect_to('/raakaaine/' . $nimi, array('message' => 'Raaka-aine lisätty!', 'raakaaine' => $attributes));
        } else {
            self::render_view('/raakaaine/new.html', array('errors' => $errors, 'raakaaine' => $attributes));
        }
    }
    
    //Muokkaaminen
    
    public static function edit($nimi) {
        $raakaaine = Raakaaine::find($nimi);
        
        self::render_view('/raakaaine/edit.html', array('attributes' => $raakaaine));
    }
    
    public static function update($nimi) {
        
    }
    
    //Poistaminen 
    
    public static function destroy($nimi) {
        Raakaaine::destroy($nimi);
        
        self::redirect_to('/raakaaine', array('message' => 'Raaka-aine poistettu onnistuneesti!'));
    }

    public static function redirect_to($location, $message) {
        parent::redirect_to($location, $message);
    }

}
