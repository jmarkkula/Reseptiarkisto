<?php

$app->get('/', function() {
    HelloWorldController::etusivu();
});

$app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

$app->get('/etusivu', function() {
    HelloWorldController::etusivu();
});


$app->get('/raakaaineet', function() {
    RaakaaineController::index();
});

$app->get('/raakaaineet/appelsiini', function() {
    HelloWorldController::raakaaine_esittely();
});

$app->get('/raakaaineet/appelsiini/muokkaa', function() {
    HelloWorldController::raakaaine_muokkaus();
});

$app->get('/reseptit', function() {
    HelloWorldController::resepti_lista();
});

$app->get('/reseptit/appelsiinimehu', function() {
    HelloWorldController::resepti_esittely();
});

$app->get('/reseptit/appelsiinimehu/muokkaa', function() {
    HelloWorldController::resepti_muokkaus();
});


