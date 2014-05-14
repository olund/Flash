<?php

require __DIR__.'/config_with_app.php';

// Start session.
// If you use MY version of Anax-MVC use:
$app->withSession();
// Otherwise, use: $app->session;

// Set flash.
$di->setShared('flash', function () {
    $flash = new \olund\Flash\CFlash();
    return $flash;
});

$app->router->add('', function () use ($app) {
    $app->theme->setTitle('Flash');

    $app->flash->success('This is a success message');
    $app->flash->error('Error message');
    $app->flash->notice('Notice message');
    $app->flash->warning('Warning message');
    $app->flash->success('Success again');

    $app->views->addString($app->flash->get(), 'main');

});


$app->router->handle();
$app->theme->render();
