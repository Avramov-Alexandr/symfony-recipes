<?php

namespace MP\CoreBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class CoreBundleLoader extends Loader
{
    private bool $isLoaded = false;

    public function load(mixed $resource, string $type = null): RouteCollection
    {
        if ($this->isLoaded) {
            throw new \RuntimeException('Do not add the "extra" loader twice');
        }

        $routes = new RouteCollection();

        $route = new Route(
            '/core/home',
            ['_controller' => 'MP\CoreBundle\Controller\DefaultController::index']
        );

        $routeName = 'coreRoute';
        $routes->add('core_home', $route);

        $this->isLoaded = true;

        return $routes;
    }

    public function supports(mixed $resource, ?string $type = null): bool
    {
        return 'core_bundle' === $type;
    }
}
