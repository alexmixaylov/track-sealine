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

            // ты пробрасываешь в респонс ДТО текущую дату. зачем? зачем тебе дата вообще?
            // дата - это как раз та информация которую нам нужно получить
            // мы знаем номер контейнера - нужно узнать когда он прибудет
            return parent::prepareResponse($containerNumber, $date);

        } catch (Exception $e) {
            //TODO need help// а в чем нужна помощь?
            // можешь словить эту ошибку на уровне выше в контроллере и обработать ответом какой нужен
            throw new Exception('Container not found');
        }
    }
}
