<?php

class AinesosaController extends BaseController {

    public static function create($reseptitunnus) {
        $params = $_POST;

        $raakaaineennimi = ucfirst(strtolower($params['raakaaine']));

        $attributes = array(
            'raakaaine' => $raakaaineennimi,
            'maara' => $params['maara'],
            'reseptitunnus' => $reseptitunnus);

        $ainesosa = new Ainesosa($attributes);

        $errors = $ainesosa->errors();

        if (count($errors) == 0 || $errors == null) {
            if (Raakaaine::find($raakaaineennimi) == null) {
                Raakaaine::create(array('nimi' => $raakaaineennimi,
                    'kuvaus' => ''));
            }
            
            Ainesosa::create($attributes);
            
            self::redirect_to('/resepti/' . $reseptitunnus . '/muokkaa', array('message' => 'Ainesosa lisätty.'));
        } else {
            self::redirect_to('/resepti/' . $reseptitunnus . '/muokkaa', array('errors' => $errors));
        }
    }

    public static function destroy($reseptitunnus) {
        $params = $_POST;
        
        $attributes = array(
            'raakaaine' => $params['raakaaine'],
            'maara' => $params['maara'],
            'reseptitunnus'=> $reseptitunnus
        );
        
        Ainesosa::destroy($attributes);

        self::redirect_to('/resepti/' . $reseptitunnus . '/muokkaa', array('message' => $attributes['raakaaine'] . ' ' . $attributes['maara'] . ' poistettu.'));
    }

}
