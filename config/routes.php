<?php

//Etusivu

$app->get('/', function() {
    HelloWorldController::etusivu();
});

$app->get('/etusivu', function() {
    HelloWorldController::etusivu();
});

//Kirjautuminen ulos
$app->get('/logout', function() {
    KayttajaController::logout();
});

//Raaka-aineen lisäys 
$app->post('/raakaaine', function() {
    RaakaaineController::store();
});

$app->get('/raakaaine/uusi', function() {
    RaakaaineController::create();
});


//Raaka-aine listaus
$app->get('/raakaaine', function() {
    RaakaaineController::index();
});


//Raaka-aine esittelysivu
$app->get('/raakaaine/:nimi', function($nimi) {
    RaakaaineController::show($nimi);
});


//Raaka-aine muokkaus
$app->get('/raakaaine/:nimi/muokkaa', function($nimi) {
    RaakaaineController::edit($nimi);
});

$app->post('/raakaaine/:nimi', function($nimi) {
    RaakaaineController::update($nimi);
});

//Raaka-aineen poisto
$app->post('/raakaaine/:nimi/poista', function($nimi) {
    RaakaaineController::destroy($nimi);
});


//Kirjautuminen (todo)
$app->get('/login', function() {
    KayttajaController::login();
});

$app->post('/login', function() {
    KayttajaController::handle_login();
});

//Reseptin luominen
$app->post('/resepti', function() {
    ReseptiController::store();
});

$app->get('/resepti/uusi', function() {
    ReseptiController::create();
});
//Reseptien listaus
$app->get('/resepti', function() {
    ReseptiController::index();
});

//Reseptin esittely 
$app->get('/resepti/:tunnus', function($tunnus) {
    ReseptiController::show($tunnus);
});

//Reseptin muokkaus
$app->get('/resepti/:tunnus/muokkaa', function($tunnus) {
    ReseptiController::edit($tunnus);
});

$app->post('/resepti/:tunnus', function($tunnus) {
    ReseptiController::update($tunnus);
});

//Ainesosien poisto
$app->post('/resepti/:reseptitunnus/:ainesosa.raakaaine/poista', function($ainesosa) {
    AinesosaController::poista($ainesosa);
});





//Hiekkalaatikko

$app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});
