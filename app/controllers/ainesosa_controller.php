<?php

class AinesosaController extends BaseController {


    
    public static function create($ainesosa) {
        Ainesosa::destroy($ainesosa);
        
        $reseptitunnus = $ainesosa['reseptitunnus'];
        
        self::redirect_to('/resepti/' . $reseptitunnus . '/muokkaa');
    }
    
     public static function destroy($ainesosa) {
        Ainesosa::destroy($ainesosa);
        
        $reseptitunnus = $ainesosa['reseptitunnus'];
        
        self::redirect_to('/resepti/' . $reseptitunnus . '/muokkaa');
    }
}
