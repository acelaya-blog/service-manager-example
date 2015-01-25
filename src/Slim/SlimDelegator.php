<?php
namespace Acelaya\Slim;

use Slim\Slim;
use Zend\ServiceManager\DelegatorFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class SlimDelegator implements DelegatorFactoryInterface
{
    /**
     * A factory that creates delegates of a given service
     *
     * @param ServiceLocatorInterface $serviceLocator the service locator which requested the service
     * @param string $name the normalized service name
     * @param string $requestedName the requested service name
     * @param callable $callback the callback that is responsible for creating the service
     *
     * @return mixed
     */
    public function createDelegatorWithName(ServiceLocatorInterface $serviceLocator, $name, $requestedName, $callback)
    {
        /** @var Slim $app */
        $app = call_user_func($callback);

        // Set templates path
        $app->config('templates.path', __DIR__ . '/../../templates');
        // Inject the app object in views
        $app->view()->set('app', $app);

        return $app;
    }
}
