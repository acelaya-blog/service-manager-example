<?php
namespace Acelaya\Service;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoggerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $logConfig = $serviceLocator->get('Config')['log_config'];

        $filesystem = null;
        // TODO Add support for other adapters, maybe by using an AbstractFactory
        if ($logConfig['adapter'] === Local::class) {
            $adapter = new Local($logConfig['dir']);
            $filesystem = new Filesystem($adapter);
        }

        return new Logger($filesystem, $logConfig['filename']);
    }
}
