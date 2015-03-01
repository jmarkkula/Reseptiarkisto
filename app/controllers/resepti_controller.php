<?php

class ReseptiController extends BaseController {

    //Listaus

    public static function index() {

        $reseptit = Resepti::all();

        self::render_view('resepti/listaus.html', array('reseptit' => $reseptit));
    }

    //Esittely

    public static function show($tunnus) {
        $resepti = Resepti::find($tunnus);

        self::render_view('resepti/esittely.html', array('resepti' => $resepti));
    }

    //Lisäys TODO

    public static function create() {
        self::render_view('resepti/uusi.html');
    }

    public static function store() {
        $params = $_POST;

        $attributes = array(
            'nimi' => $params['nimi'],
            'lisaaja' => $params['kayttaja']
        );

        $resepti = new Resepti($attributes);
        $errors = $resepti->errors();

        if (count($errors) == 0) {
            $tunnus = Resepti::create($attributes);
            $resepti = Resepti::find($tunnus);

            self::redirect_to('/resepti/' . $tunnus . '/muokkaa', array('message' => 'Resepti lisätty.', 'resepti' => $resepti));
        } else {
            self::render_view('/resepti/uusi.html', array('errors' => $errors, 'resepti' => $attributes));
        }
    }

    //Muokkaaminen

    public static function edit($tunnus) {
        $resepti = Resepti::find($tunnus);

        self::render_view('/resepti/muokkaus.html', array('resepti' => $resepti));
    }

    public static function update($tunnus) {
        $params = $_POST;

        $attributes = array('nimi' => $params['nimi'], 'valmistusohje' => $params['valmistusohje'], 'tunnus' => $tunnus);

        $validointiresepti = new Resepti($attributes);
        $errors = $validointiresepti->errors();

        if (count($errors) == 0) {
            Resepti::update($attributes);
            $resepti = Resepti::find($tunnus);
            
            self::redirect_to('/resepti/' . $tunnus . '/muokkaa', array('message' => 'Tiedot tallennettu.', 'resepti' => $resepti));
        } else {
            self::render_view('/resepti/' . $tunnus . '/muokkaa', array('errors' => $errors, 'resepti' => $attributes));
        }
    }

    public static function poista_ainesosa() {
        $params = $_POST;

        self::render_view('/resepti/muokkaus.html', array('resepti' => $resepti));
    }

//    //Poistaminen TODO
//    
//    public static function destroy($nimi) {
//        Raakaaine::destroy($nimi);
//        
//        self::redirect_to('/raakaaine', array('message' => 'Raaka-aine poistettu onnistuneesti!'));
//    }
//
//    public static function redirect_to($location, $message) {
//        parent::redirect_to($location, $message);
//    }
//
}
