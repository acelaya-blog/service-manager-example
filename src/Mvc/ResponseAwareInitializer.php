<?php
namespace Acelaya\Mvc;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ResponseAwareInitializer implements InitializerInterface
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
        if ($instance instanceof ResponseAwareInterface) {
            $app = $serviceLocator->get('app');
            $instance->setResponse($app->response);
        }
    }
}
