<?php
use Acelaya\Controller\UserController;
use Slim\Slim;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

$sm = new ServiceManager(new Config(include __DIR__ . '/../config/services.php'));
$app = new Slim([
    'templates.path' => __DIR__ . '/../templates'
]);
// Inject the app object in views
$app->view()->set('app', $app);
// Register application as a service
$sm->setService('app', $app);

/** @var UserController $userController */
$userController = $sm->get('user_controller');

$app->get('/', function () use ($app) {
    $app->render('home.php');
});
$app->group('/users', function () use ($app, $userController) {
    $app->get('/list', [$userController, 'listAction'])
        ->name('users-list');
});

return $app;