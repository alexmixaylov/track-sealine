<?php

namespace App\Modules\Maersk;

use App\Modules\Infrastructure\AbstractProviderHandler;
use Illuminate\Http\Client\Response;
// это должен быть MaerskClient. он должен принимать контейнер айди и отдавать сформированный ответ где контейнер
// ты зря вынес эту логику в резолвер и я написал почему в XmlResolver
class Maersk extends AbstractProviderHandler
{
    public function trackContainer(string $container): Response
    {
        $url = config('app.sea_line_providers.maersk') . $container;

        return parent::makeRequest($url);
    }
}
