<?php


namespace App\Modules\Common\Resolver;

use App\Modules\Common\Dto\ResponseDto;
use function json_encode;
use function parse_str;
use function parse_url;
use function simplexml_load_string;

class Xml extends ResolverFactory implements ResolverInterface
{

    public function resolveResult($data): ResponseDto
    {
        $normalized = $this->parseXml($data);

        try {
            $item = $normalized['channel']['item'][0];

            $date  = new \DateTimeImmutable($item['pubDate']);
            $query = parse_url($item['link'])['query'];
            parse_str($query, $output);

            return new ResponseDto($output['ContainerNumber'], $date);
        } catch (\Exception $e) {
            //TODO need to make error handler
            return 'Информация о контейнере не найдена ';
        }

    }

    private function parseXml(string $xml): array
    {
        $json = json_encode(simplexml_load_string($xml));

        return json_decode($json, true);
    }
}
