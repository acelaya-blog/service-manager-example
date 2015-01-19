<?php
use Acelaya\Controller\UserController;
use Acelaya\Middleware\ParamConverterMiddleware;
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

// Add our middleware
$app->add($sm->get(ParamConverterMiddleware::class));

$app->get('/', function () use ($app) {
    $app->render('home.phtml');
});
$app->group('/users', function () use ($app, $sm) {
    /** @var UserController $userController */
    $userController = $sm->get('user_controller');

    $app->get('/list', [$userController, 'listAction'])
        ->name('users-list');
});

return $app;