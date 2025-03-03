<?php

namespace MP\CoreBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use MP\CoreBundle\Service\CoreBundleService;

class CoreBundleLoader extends Loader
{
    private bool $isLoaded = false;

    public function __construct() {}

    public function load(mixed $resource, string $type = null): RouteCollection
    {
        dump('✅ CoreBundleLoader загружен!');

        if ($this->isLoaded) {
            throw new \RuntimeException('Do not add the "CoreBundleLoader" twice');
        }

        $routes = new RouteCollection();

        if (class_exists('MP\CoreBundle\Controller\DefaultController')) {
            dump('✅ Контроллер найден!');
            $route = new Route(
                '/core/home',
                ['_controller' => 'MP\CoreBundle\Controller\DefaultController::index']
            );
            $routes->add('core_home', $route);
        } else {
            dump('❌ Контроллер не найден! Маршруты не загружены.');
        }

        $this->isLoaded = true;

        return $routes;
    }

    public function supports(mixed $resource, ?string $type = null): bool
    {
        return 'core_bundle' === $type;
    }
}
