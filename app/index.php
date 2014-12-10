<?php

// Cargamos el n�cleo de lo que va a ser la aplicaci�n
require 'libs/application.php';
require 'libs/controller.php';
require 'kint/Kint.class.php';
require 'libs/Session.php';
//require 'libs/autorizacion.php';
require 'libs/configuration.php';

// Cargamos la configuración de la aplicaci�n
require 'config.php';

// Cargamos el motor de plantillas Twig
require 'Twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

// carga controlador frontal
$app = new Application();

// Ejecuta la aplicación
$app->appStart();







