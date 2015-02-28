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
                    'nimi' => $params['nimi']
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
    
    //Muokkaaminen TODO
    
    public static function edit($tunnus) {
        $resepti = Resepti::find($tunnus);
        
        self::render_view('/resepti/muokkaus.html', array('resepti' => $resepti));
    }
    
    //EI VALMIS
    public static function update($tunnus) {
        $params = $_POST;
        
        $resepti = array('nimi' => $nimi, 'valmistusohje'=>$params['valmistusohje']);
        Raakaaine::update($resepti);
        
//       $alkup_ainesosat = Ainesosa::reseptin_ainesosat($tunnus);
//       $uudet_ainesosat = $params['ainesosat'];
//       
//        foreach($alkup_ainesosat as $alkup_ainesosa) {
//            if(!in_array($alkup_ainesosa, $uudet_ainesosat)) {
//                Ainesosa::destroy($alkup_ainesosa);
//                
//            }
//        }
//        
//        foreach($uudet_ainesosat as $uusi_ainesosa) {
//            if(!in_array($uusi_ainesosa, $alkup_ainesosat)) {
//                Ainesosa::create($uusi_ainesosa);
//            }
//        }
        
        self::redirect_to('/resepti/' . $tunnus, array('message' => 'Reseptiä muokattu.', 'resepti' => $resepti));
        
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
