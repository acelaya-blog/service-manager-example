<?php
namespace Acelaya\Service;

use Doctrine\ORM\EntityManager;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ServiceAbstractFactory implements AbstractFactoryInterface
{
    /**
     * Determine if we can create a service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return bool
     */
    public function canCreateServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        // This abstract factory can create only objects extinding AbstractService
        return class_exists($requestedName) && is_subclass_of($requestedName, AbstractService::class);
    }

    /**
     * Create service with name
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @param $name
     * @param $requestedName
     * @return mixed
     */
    public function createServiceWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName)
    {
        $em = $serviceLocator->get(EntityManager::class);
        $logger = $serviceLocator->get(Logger::class);

        return new $requestedName($em, $logger);
    }
}
