<?php

use MelisPlatformFrameworkSilex\Provider\MelisServiceProvider;
use MelisPlatformFrameworkSilexDemoSite\Provider\MelisSilexDemoSiteServiceProvider;
use MelisPlatformFrameworkSilexDemoToolLogic\Provider\MelisSilexDemoTooolLogicServiceProvider;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\DoctrineServiceProvider;
use Silex\Provider\LocaleServiceProvider;
use Silex\Provider\RoutingServiceProvider;
use Silex\Provider\TranslationServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\VarDumperServiceProvider;

$app = new Application();
$app->register(new MelisSilexDemoTooolLogicServiceProvider());
$app->register(new MelisServiceProvider());
$app->register(new ServiceControllerServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new DoctrineServiceProvider());
$app->register(new LocaleServiceProvider ());
$app->register(new TranslationServiceProvider());
$app->register(new RoutingServiceProvider());
$app->register(new VarDumperServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...
    return $twig;
});

//setting silex translations from this module.
$enPath =  file_exists(__DIR__ .  '/../translations/en_EN.interface.php') ? require __DIR__ .  '/../translations/en_EN.interface.php' : [];
$frPath =  file_exists(__DIR__ .  '/../translations/fr_FR.interface.php') ? require __DIR__ .  '/../translations/fr_FR.interface.php' : [];
$app['translator.domains'] = array(
    'messages' => array(
        'en' =>  $enPath,
        'fr' => $frPath
    )
);

return $app;
