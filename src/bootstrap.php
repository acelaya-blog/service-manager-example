<?php
use Acelaya\Controller\UserController;
use SlimController\Slim;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

error_reporting(E_ALL);
ini_set('display_errors', 1);

$sm = new ServiceManager(new Config(include __DIR__ . '/../config/services.php'));

/** @var Slim $app */
$app = $sm->get('app');

$app->get('/', function () use ($app) {
    $app->render('home.phtml');
})->name('home');
$app->group('/users', function () use ($app, $sm) {
    /** @var UserController $userController */
    $userController = $sm->get('user_controller');

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

return $app;