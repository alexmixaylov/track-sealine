<?php

namespace App\Clients;

use DateTimeImmutable;
use Exception;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class MscClient extends AbstractClient
{
    /**
     * @throws \Exception
     */
    public function trackContainer(string $containerNumber): array
    {
        $url = config('app.sea_line_providers.msc') . $containerNumber;

        return $this->resolveResult(Http::get($url));
    }

    /**
     * @throws \Exception
     */
    public function resolveResult(Response $response): array
    {
        $normalized = $this->xmlToArray($response->body());

        try {
            $item = $normalized['channel']['item'][0];

            $date  = new DateTimeImmutable($item['pubDate']);
            $query = parse_url($item['link'])['query'];
            parse_str($query, $output);

            return parent::prepareResponse($output['ContainerNumber'], $date);
        } catch (Exception $e) {
            throw new Exception('Container not found');
        }
    }

    private function xmlToArray(string $xml): array
    {
        $json = json_encode(simplexml_load_string($xml));
        // это точно так работает? через джейсон
        // вроде работает норм

        return json_decode($json, true);
    }
}
