<?php

ini_set('display_errors', 1);
use Symfony\Component\HttpFoundation\Request;
$app = include __DIR__.'/../src/app.php';
require __DIR__.'/../config/dev.php';
require __DIR__.'/../src/controllers.php';

//return $app;
$response = $app->handle(REQUEST::createFromGlobals());
$content = $response->getContent();
$statusCode = $response->getStatusCode();
return ['statusCode' => $statusCode, 'content' => $content];
