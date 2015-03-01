<?php

//Etusivu

$app->get('/', function() {
    HelloWorldController::etusivu();
});

$app->get('/etusivu', function() {
    HelloWorldController::etusivu();
});

//Kirjautuminen ulos
$app->post('/logout', function() {
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


//Kirjautuminen
$app->get('/login', function() {
    KayttajaController::login();
});

$app->post('/login', function() {
    KayttajaController::handle_login();
});

$app->get('/rekisteroidy', function() {
    KayttajaController::register_form();
});

$app->post('/rekisteroidy/luo', function() {
    KayttajaController::register();
});

//Reseptin ainesosan lisäys
$app->post('/resepti/:reseptitunnus/ainesosat/lisaa', function($reseptitunnus) {
    AinesosaController::create($reseptitunnus);
});

//Reseptin ainesosien poisto
$app->post('/resepti/:reseptitunnus/ainesosat/poista', function($reseptitunnus) {
    AinesosaController::destroy($reseptitunnus);
});

//Reseptin nimen ja ohjeen muokkaus
$app->post('/resepti/:reseptitunnus/tiedot', function($reseptitunnus) {
    ReseptiController::update($reseptitunnus);
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







//Hiekkalaatikko

$app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});
