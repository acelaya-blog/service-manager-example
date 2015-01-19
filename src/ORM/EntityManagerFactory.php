<?php
namespace Acelaya\ORM;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class EntityManagerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var EntityManagerOptions $emOptions */
        $emOptions = $serviceLocator->get(EntityManagerOptions::class);

        $config = Setup::createAnnotationMetadataConfiguration(
            $emOptions->getEntitiesDirs(),
            true,
            $emOptions->getProxiesDir(),
            null,
            false
        );
        return EntityManager::create($emOptions->getConnection(), $config);
    }
}
