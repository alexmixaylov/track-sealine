<?php

namespace App\Clients\Msc;

use App\Modules\Infrastructure\AbstractProviderHandler;
use Illuminate\Http\Client\Response;

class MscClient extends AbstractProviderHandler
{
    public function trackContainer(string $container): Response
    {
        $url = config('app.sea_line_providers.msc') . $container;

        return parent::makeRequest($url);
    }
}
