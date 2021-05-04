<?php

namespace App\Clients;

use Exception;

class ClientFactory
{
    /**
     * @param string $providerType
     *
     * @return \App\Clients\AbstractClient
     * @throws \Exception
     */
    public static function create(string $providerType): AbstractClient
    {
        return match ($providerType) {
            'msc' => new MscClient(),
            'maersk' => new MaerskClient(),
            default => throw new Exception('Provider ' . mb_strtoupper($providerType) . ' not found'),
        };
    }
}
