<?php

namespace MP\CoreBundle\Service;

class CoreBundleService
{
    public function isEnabled(): bool
    {
        return class_exists(\MP\CoreBundle\CoreBundle::class);
    }
}
