<?php
namespace Acelaya\Controller;

use Slim\Slim;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class UserControllerFactory
 * @author
 * @link
 */
class UserControllerFactory implements FactoryInterface
{
    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        /** @var Slim $app */
        $app = $serviceLocator->get('app');
        return new UserController($app->request, $app->response);
    }
}
