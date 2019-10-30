<?php
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

//Request::setTrustedProxies(array('127.0.0.1'));

$app->get('/silex-home', function () use ($app) {
    return $app['twig']->render('index.html.twig', array());
})->bind('homepage');

$app->get('/melis-news-albums', function () use ($app) {
    #using MELIS PLATFORM SERVICES;
    $newsNewsService = $app['melis.services']->getService("MelisCmsNewsService");
    $news = $newsNewsService->getNewsList();

    #using Melis Database;
    $sql = "SELECT * FROM album ";
    $albums = $app['dbs']['melis']->fetchAll($sql);
    return $app['twig']->render('demo.template.html.twig',array("albums" => $albums,"news"=>$news));
});

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/'.$code.'.html.twig',
        'errors/'.substr($code, 0, 2).'x.html.twig',
        'errors/'.substr($code, 0, 1).'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});