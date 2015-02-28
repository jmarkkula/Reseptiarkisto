<?php

class KayttajaController extends BaseController{
  public static function login(){
      self::render_view('kayttaja/login.html');
  }

  public static function handle_login(){
    $params = $_POST;

    $kayttaja = Kayttaja::authenticate($params['nimimerkki'], $params['salasana']);

    if(!$kayttaja){
      self::redirect_to('/login', array('error' => 'Väärä käyttäjätunnus tai salasana.'));
    } else{
      $_SESSION['nimimerkki'] = $kayttaja->nimimerkki;

      self::redirect_to('/', array('message' => 'Tervetuloa takaisin ' . $kayttaja->nimimerkki . '.'));
    }
  }
  
  public static function logout() {
    $_SESSION['nimimerkki'] = null;
    
    self::redirect_to('/', array('message' => 'Hyvää päivän jatkoa!'));
  }
}
