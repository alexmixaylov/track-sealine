<?php

namespace App\Modules\Resolver;

use App\Modules\Common\Dto\ResponseDto;
use App\Modules\Common\ResponseHandlerInterface;
use Exception;
use Illuminate\Http\Client\Response;

class XmlResolver implements ResponseHandlerInterface
{
    /**
     * @throws \Exception
     */
    public function resolveResult(Response $response): ResponseDto
    {
        $normalized = $this->parseXml($response->body());

        try {
            $item = $normalized['channel']['item'][0];

            $date  = new \DateTimeImmutable($item['pubDate']);
            $query = parse_url($item['link'])['query'];
            parse_str($query, $output);

            return new ResponseDto($output['ContainerNumber'], $date);
        } catch (Exception $e) {
            //TODO need help
            throw new Exception('Информация о контейнере не найдена ');
        }
    }

    private function parseXml(string $xml): array
    {
        $json = json_encode(simplexml_load_string($xml));

        return json_decode($json, true);
    }
}
