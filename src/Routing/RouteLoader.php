<?php

namespace MPCoreBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\RouteCollection;

class RouteLoader extends Loader
{
    private bool $isLoaded = false;

    public function load($resource, ?string $type = null): RouteCollection
    {
        $routes = new RouteCollection();

        if (!$this->isLoaded) {
            $resource = '@MPCoreBundle/config/routes.yaml';
            $type = 'yaml';

            $importedRoutes = $this->import($resource, $type);

            $routes->addCollection($importedRoutes);

            $this->isLoaded = true;
        }

        return $routes;
    }

    public function supports(mixed $resource, ?string $type = null): bool
    {
        return 'attribute' === $type || 'core_bundle' === $type;
    }
}