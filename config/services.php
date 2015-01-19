<?php
use Acelaya\Controller\UserController;
use Acelaya\Controller\UserControllerFactory;
use Acelaya\Middleware\ParamConverterMiddleware;
use Acelaya\Mvc\RequestAwareInitializer;
use Acelaya\Mvc\ResponseAwareInitializer;
use Acelaya\Service\Logger;
use Acelaya\Service\LoggerFactory;
use Acelaya\Service\ServiceAbstractFactory;

return [

    'services' => [
        'Config' => [
            'database_config' => include __DIR__ . '/database_config.php',
            'log_config' => include __DIR__ . '/log_config.php'
        ]
    ],

    'invokables' => [
        ParamConverterMiddleware::class => ParamConverterMiddleware::class
    ],

    'factories' => [
        UserController::class => UserControllerFactory::class,
        Logger::class => LoggerFactory::class
    ],

    'abstract_factories' => [
        ServiceAbstractFactory::class
    ],

    'initializers' => [
        RequestAwareInitializer::class,
        ResponseAwareInitializer::class,
    ],

    'aliases' => [
        'user_controller' => UserController::class
    ]

];
