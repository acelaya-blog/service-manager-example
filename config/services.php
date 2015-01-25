<?php
use Acelaya\Controller\ItemController;
use Acelaya\Controller\ItemControllerFactory;
use Acelaya\Controller\UserController;
use Acelaya\Controller\UserControllerFactory;
use Acelaya\Mvc\RendererAwareInitializer;
use Acelaya\Mvc\RequestAwareInitializer;
use Acelaya\Mvc\ResponseAwareInitializer;
use Acelaya\ORM\EntityManagerFactory;
use Acelaya\ORM\EntityManagerOptions;
use Acelaya\ORM\EntityManagerOptionsFactory;
use Acelaya\Service\Logger;
use Acelaya\Service\LoggerFactory;
use Acelaya\Service\ServiceAbstractFactory;
use Acelaya\Slim\SlimDelegator;
use Doctrine\ORM\EntityManager;
use Slim\Slim;
use SlimController\Slim as SlimController;

return [

    'services' => [
        'Config' => [
            'database_config' => include __DIR__ . '/database_config.php',
            'log_config' => include __DIR__ . '/log_config.php'
        ]
    ],

    'invokables' => [
        Slim::class => SlimController::class
    ],

    'factories' => [
        // Controllers
        UserController::class => UserControllerFactory::class,
        ItemController::class => ItemControllerFactory::class,

        // Others
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

    'delegators' => [
        Slim::class => [
            SlimDelegator::class
        ]
    ],

    'aliases' => [
        'app' => Slim::class,
        SlimController::class => Slim::class,
    ]

];
