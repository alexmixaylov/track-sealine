<?php

namespace App\Modules\Resolver;

use App\Modules\Common\Dto\ResponseDto;
use App\Modules\Common\ResponseHandlerInterface;
use Exception;
use Illuminate\Http\Client\Response;

class Json implements ResponseHandlerInterface
{
    /**
     * @param \Illuminate\Http\Client\Response $response
     *
     * @return \App\Modules\Common\Dto\ResponseDto
     * @throws \Exception
     */
    public function resolveResult(Response $response): ResponseDto
    {
        $rawData = json_decode($response->body(), true);

        try {
            $containers = $rawData['containers'];
            $date       = $containers[0]['eta_final_delivery'];
            $container  = $containers[0]['container_num'];

            return new ResponseDto($container, new \DateTimeImmutable($date));

        } catch (Exception $e) {
            //TODO need help
            throw new Exception('Информация о контейнере не найдена ');
        }
    }
}
