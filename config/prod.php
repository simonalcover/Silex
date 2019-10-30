<?php

// configure your app for the production environment


//$dbConfig = include __DIR__ .  '/../../../../config/autoload/platforms/' . getenv('MELIS_PLATFORM') . '.php';
//$dsn = str_getcsv($dbConfig['db']['dsn'],";");
//foreach ($dsn as $key => $config){
//    if(strpos($config, ':') !== false)
//        $data = explode("=",explode(":",$config)[1]);
//    else
//        $data = explode("=",$config);
//
//    $dbConfig['db'][$data[0]] = $data[1];
//}
//
//$app['db.options'] = array(
//    'driver'   => 'pdo_mysql',
//    'host'      => $dbConfig['db']['host'],
//    'dbname'    => "silex",
//    'user'      => $dbConfig['db']['username'],
//    'password'  => $dbConfig['db']['password'],
//    'charset'   => $dbConfig['db']['charset'],
//);
$app['twig.path'] = array(__DIR__.'/../templates');
//$app['twig.options'] = array('cache' => __DIR__.'/../var/cache/twig');
