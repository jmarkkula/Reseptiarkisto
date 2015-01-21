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
  
    $app->get('/reseptit', function() {
    HelloWorldController::resepti_lista();
  });
  
      $app->get('/reseptit/hummus', function() {
    HelloWorldController::resepti_esittely();
  });
