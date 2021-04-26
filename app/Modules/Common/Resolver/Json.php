<?php

namespace App\Modules\Common\Resolver;

use App\Modules\Common\Dto\ResponseDto;
use function json_decode;

class Json extends ResolverFactory implements ResolverInterface
{

    public function resolveResult($data): ResponseDto
    {
        $rawData = json_decode($data, true);

        try {
            $containers = $rawData['containers'];
            $date      = $containers[0]['eta_final_delivery'];
            $container = $containers[0]['container_num'];

            return new ResponseDto($container, new \DateTimeImmutable($date));

        } catch (\Exception $e) {
            //TODO need to make error handler
            return 'Информация о контейнере не найдена ';
        }
    }
}
