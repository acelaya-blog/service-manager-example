<?php
namespace Acelaya\Mvc;

use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RendererAwareInitializer implements InitializerInterface
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
        if ($instance instanceof RendererAwareInterface) {
            $app = $serviceLocator->get('app');
            $instance->setRenderer($app->view());
        }
    }
}
