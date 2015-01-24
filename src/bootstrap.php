<?php
use Acelaya\Controller\UserController;
use Acelaya\Middleware\ParamConverterMiddleware;
use Slim\Slim;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

$sm = new ServiceManager(new Config(include __DIR__ . '/../config/services.php'));

/** @var Slim $app */
$app = $sm->get('app');
$app->config('templates.path', __DIR__ . '/../templates');
// Inject the app object in views
$app->view()->set('app', $app);

$app->get('/', function () use ($app) {
    $app->render('home.phtml');
});
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
    $app->map('/delete/:id', [$userController, 'DeleteAction'])
        ->name('delete-user')
        ->via('GET', 'POST');
});

return $app;