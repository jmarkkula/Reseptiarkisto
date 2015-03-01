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
  
  public static function register() {
        $params = $_POST;

        $attributes = array(
            'nimimerkki' => $params['nimimerkki'],
            'salasana' => $params['salasana'],
            'email' => $params['email']
        );

        $user = new Kayttaja($attributes);
        $errors = $user->errors();

        if (count($errors) == 0) {
            $nimi = Kayttaja::registertosql($attributes);
            self::redirect_to('/', array('message' => 'Voit nyt kirjautua sisään'));
            //self::redirect_to('/' . $nimi, array('message' => 'Voit nyt kirjautua sisään!'));
            //self::redirect_to('/', array('message' => 'Voit nyt kirjautua sisään!'));
        } else {
            self::redirect_to('/resepti', array('message' => 'tietokantahulluus'));
            //self::render_view('/login', array('errors' => $errors));
        }
    }
    
    public static function register_form() {
        self::render_view('/kayttaja/rekisteroidy.html');
    }
}
