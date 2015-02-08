<?php

//Etusivu

$app->get('/', function() {
    HelloWorldController::etusivu();
});

$app->get('/etusivu', function() {
    HelloWorldController::etusivu();
});


//Raaka-aineen lisäys 
$app->post('/raakaaineet', function() {
    RaakaaineController::store();
});

$app->get('/raakaaineet/uusi', function() {
    RaakaaineController::create();
});


//Raaka-aine listaus
$app->get('/raakaaineet', function() {
    RaakaaineController::index();
});


//Raaka-aine esittelysivu
$app->get('/raakaaineet/:nimi', function($nimi) {
    RaakaaineController::show($nimi);
});



//Raaka-aine muokkaus TODO
$app->get('/raakaaineet/appelsiini/muokkaa', function() {
    HelloWorldController::raakaaine_muokkaus();
});


//Resepti

$app->get('/reseptit', function() {
    HelloWorldController::resepti_lista();
});

$app->get('/reseptit/appelsiinimehu', function() {
    HelloWorldController::resepti_esittely();
});

$app->get('/reseptit/appelsiinimehu/muokkaa', function() {
    HelloWorldController::resepti_muokkaus();
});



//Hiekkalaatikko

$app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});
