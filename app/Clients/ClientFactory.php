<?php

namespace App\Clients;

use App\Clients\AbstractClient;
use App\Clients\MaerskClient;
use App\Clients\MscClient;
use Exception;

class ClientFactory
{
    /**
     * @param string $providerType
     *
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
