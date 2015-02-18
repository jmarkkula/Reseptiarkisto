<?php

require 'app/models/raakaaine.php';

class HelloWorldController extends BaseController {

    public static function index() {
        echo 'Miau';
    }

    public static function sandbox() {
        // Testaa koodiasi täällä	
        $raakaaineet = Raakaaine::all();
        
        print_r($raakaaineet);

    }
    
      public static function etusivu(){
    self::render_view('home.html');
  }
  
       public static function resepti_lista(){
    self::render_view('suunnitelmat/resepti_lista.html');
  }
  
        public static function resepti_esittely(){
    self::render_view('suunnitelmat/resepti_esittely.html');
  }
  
          public static function resepti_muokkaus(){
    self::render_view('suunnitelmat/resepti_muokkaus.html');
  }
  
            public static function raakaaine_lista(){
    self::render_view('suunnitelmat/raakaaine_lista.html');
  }
  
          public static function raakaaine_esittely(){
    self::render_view('suunnitelmat/raakaaine_esittely.html');
  }
  
            public static function raakaaine_muokkaus(){
    self::render_view('suunnitelmat/raakaaine_muokkaus.html');
  }

}
