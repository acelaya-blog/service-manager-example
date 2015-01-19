<?php
use Acelaya\Controller\UserController;
use Acelaya\Controller\UserControllerFactory;
use Acelaya\Middleware\ParamConverterMiddleware;

return [

    'invokables' => [
        ParamConverterMiddleware::class => ParamConverterMiddleware::class
    ],

    'factories' => [
        UserController::class => UserControllerFactory::class
    ],

    'abstract_factories' => [

    ],

    'aliases' => [
        'user_controller' => UserController::class
    ]

];
