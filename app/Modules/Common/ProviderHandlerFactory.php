<?php

namespace App\Modules\Common;

use App\Modules\Maersk\ProviderHandler as MaerskHandler;
use App\Modules\Msc\ProviderHandler as MscHandler;
use Exception;

class ProviderHandlerFactory
{
    /**
     * @param string $providerType
     *
     * @return \App\Modules\Common\AbstractProviderHandler
     * @throws \Exception
     */
    public static function createHandler(string $providerType): AbstractProviderHandler
    {
        return match ($providerType) {
            'msc' => new MscHandler(),
            'maersk' => new MaerskHandler(),
            default => throw new Exception('Provider ' . mb_strtoupper($providerType) . ' not found'),
        };
    }
}
