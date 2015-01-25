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
    /** @var UserController $userController */
    $userController = $sm->get(UserController::class);

    $app->get('/list', [$userController, 'listAction'])
        ->name('users-list');
    $app->map('/create', [$userController, 'createAction'])
        ->name('create-user')
        ->via('GET', 'POST');
    $app->map('/edit/:id', [$userController, 'updateAction'])
        ->name('edit-user')
        ->via('GET', 'POST');
    $app->map('/delete/:id', [$userController, 'deleteAction'])
        ->name('delete-user')
        ->via('GET', 'POST');

//    $app->addControllerRoute('/list', UserController::class . ':list')
//        ->name('users-list')
//        ->via('GET');
//    $app->addControllerRoute('/create', UserController::class . ':create')
//        ->name('create-user')
//        ->via('GET', 'POST');
//    $app->addControllerRoute('/edit/:id', UserController::class . ':update')
//        ->name('edit-user')
//        ->via('GET', 'POST');
//    $app->addControllerRoute('/delete/:id', UserController::class . ':delete')
//        ->name('delete-user')
//        ->via('GET', 'POST');
});

// Items pages
$app->group('/items', function () use ($app, $sm) {
    /** @var ItemController $itemController */
    $itemController = $sm->get(ItemController::class);

    $app->get('/list', [$itemController, 'listAction'])
        ->name('items-list');
    $app->map('/create', [$itemController, 'createAction'])
        ->name('create-item')
        ->via('GET', 'POST');
    $app->map('/edit/:id', [$itemController, 'updateAction'])
        ->name('edit-item')
        ->via('GET', 'POST');
    $app->map('/delete/:id', [$itemController, 'deleteAction'])
        ->name('delete-item')
        ->via('GET', 'POST');

//    $app->addControllerRoute('/list', ItemController::class . ':list')
//        ->name('items-list')
//        ->via('GET');
//    $app->addControllerRoute('/create', ItemController::class . ':create')
//        ->name('create-item')
//        ->via('GET', 'POST');
//    $app->addControllerRoute('/edit/:id', ItemController::class . ':update')
//        ->name('edit-item')
//        ->via('GET', 'POST');
//    $app->addControllerRoute('/delete/:id', ItemController::class . ':delete')
//        ->name('delete-item')
//        ->via('GET', 'POST');
});

return $app;