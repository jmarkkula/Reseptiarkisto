<?php

class KayttajaController extends BaseController{
  public static function login(){
      self::render_view('kayttaja/login.html');
  }

  public static function handle_login(){
    $params = $_POST;

    $user = Kayttaja::authenticate($params['kayttajatunnus'], $params['salasana']);

    if(!$user){
      self::redirect_to('/login', array('error' => 'Väärä käyttäjätunnus tai salasana.'));
    }else{
      $_SESSION['kayttaja'] = $kayttaja->id;

      self::redirect_to('/', array('message' => 'Tervetuloa takaisin' . $user->name . '.'));
    }
  }
}
