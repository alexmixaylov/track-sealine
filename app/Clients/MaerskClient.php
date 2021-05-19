<?php

namespace App\Clients;

use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class MaerskClient extends AbstractClient
{
    /**
     * @throws \Exception
     */
    public function trackContainer(string $containerNumber): array
    {
        $url = config('app.sea_line_providers.maersk') . $containerNumber;

        return $this->resolveResult(Http::get($url));
    }

    /**
     * @throws \Exception
     */
    public function resolveResult(Response $response): array
    {
        $rawData = json_decode($response->body(), true);

        try {
            $containers      = $rawData['containers'];
            $date            = $containers[0]['eta_final_delivery'];
            $containerNumber = $containers[0]['container_num'];

            return parent::prepareResponse($containerNumber, new \DateTimeImmutable($date));
        } catch (Exception $e) {
            throw new Exception('Container not found');
        }
    }
}
