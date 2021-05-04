<?php

namespace App\Clients;

use DateTimeImmutable;
use Illuminate\Http\Client\Response;

abstract class AbstractClient
{
    abstract public function trackContainer(string $containerNumber): array;

    abstract public function resolveResult(Response $response): array;

    public function prepareResponse(string $containerNumber, DateTimeImmutable $date): array
    {
        return [
            'container' => $containerNumber,
            'date'      => $date
        ];
    }
}
