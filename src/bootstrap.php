<?php
use Acelaya\Controller\ItemController;
use Acelaya\Controller\UserController;
use SlimController\Slim;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

$sm = new ServiceManager(new Config(include __DIR__ . '/../config/services.php'));

/** @var Slim $app */
$app = $sm->get('app');

// Homepage
$app->get('/', function () use ($app) {
    $app->render('home.phtml');
})->name('home');

// Users pages
$app->group('/users', function () use ($app, $sm) {
    $app->addControllerRoute('/list', UserController::class . ':list')
        ->name('users-list')
        ->via('GET');
    $app->addControllerRoute('/create', UserController::class . ':create')
        ->name('create-user')
        ->via('GET', 'POST');
    $app->addControllerRoute('/edit/:id', UserController::class . ':update')
        ->name('edit-user')
        ->via('GET', 'POST');
    $app->addControllerRoute('/delete/:id', UserController::class . ':delete')
        ->name('delete-user')
        ->via('GET', 'POST');
});

// Items pages
$app->group('/items', function () use ($app, $sm) {
    $app->addControllerRoute('/list', ItemController::class . ':list')
        ->name('items-list')
        ->via('GET');
    $app->addControllerRoute('/create', ItemController::class . ':create')
        ->name('create-item')
        ->via('GET', 'POST');
    $app->addControllerRoute('/edit/:id', ItemController::class . ':update')
        ->name('edit-item')
        ->via('GET', 'POST');
    $app->addControllerRoute('/delete/:id', ItemController::class . ':delete')
        ->name('delete-item')
        ->via('GET', 'POST');
});

return $app;