<?php

//Etusivu

$app->get('/', function() {
    HelloWorldController::etusivu();
});

$app->get('/etusivu', function() {
    HelloWorldController::etusivu();
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
    UserController::login();
});

$app->post('/login', function() {
    UserController::handle_login();
});

//Resepti TODO

$app->get('/resepti', function() {
    HelloWorldController::resepti_lista();
});

$app->get('/resepti/appelsiinimehu', function() {
    HelloWorldController::resepti_esittely();
});

$app->get('/resepti/appelsiinimehu/muokkaa', function() {
    HelloWorldController::resepti_muokkaus();
});



//Hiekkalaatikko

$app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});
