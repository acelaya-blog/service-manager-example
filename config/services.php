<?php
use Acelaya\Controller\UserController;
use Acelaya\Controller\UserControllerFactory;
use Acelaya\Middleware\ParamConverterMiddleware;
use Acelaya\Middleware\ParamConverterMiddlewareFactory;
use Acelaya\Mvc\RendererAwareInitializer;
use Acelaya\Mvc\RequestAwareInitializer;
use Acelaya\Mvc\ResponseAwareInitializer;
use Acelaya\ORM\EntityManagerFactory;
use Acelaya\ORM\EntityManagerOptions;
use Acelaya\ORM\EntityManagerOptionsFactory;
use Acelaya\Service\Logger;
use Acelaya\Service\LoggerFactory;
use Acelaya\Service\ServiceAbstractFactory;
use Doctrine\ORM\EntityManager;

return [

    'services' => [
        'Config' => [
            'database_config' => include __DIR__ . '/database_config.php',
            'log_config' => include __DIR__ . '/log_config.php'
        ]
    ],

    'invokables' => [],

    'factories' => [
        UserController::class => UserControllerFactory::class,
        Logger::class => LoggerFactory::class,
        EntityManagerOptions::class => EntityManagerOptionsFactory::class,
        EntityManager::class => EntityManagerFactory::class
    ],

    'abstract_factories' => [
        ServiceAbstractFactory::class
    ],

    'initializers' => [
        RequestAwareInitializer::class,
        ResponseAwareInitializer::class,
        RendererAwareInitializer::class,
    ],

    'aliases' => [
        'user_controller' => UserController::class
    ]

];
