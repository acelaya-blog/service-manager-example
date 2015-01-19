<?php
namespace Acelaya\Mvc;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RequestAwareInitializer implements InitializerInterface
{
    /**
     * Initialize
     *
     * @param $instance
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if ($instance instanceof RequestAwareInterface) {
            $app = $serviceLocator->get('app');
            $instance->setRequest($app->request);
        }
    }
}
