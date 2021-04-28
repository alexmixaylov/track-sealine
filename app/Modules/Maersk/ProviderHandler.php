<?php

namespace App\Modules\Maersk;

use App\Modules\Common\AbstractProviderHandler;
use Illuminate\Http\Client\Response;

class ProviderHandler extends AbstractProviderHandler
{
    public function trackContainer(string $container): Response
    {
        $url = config('app.sea_line_providers.maersk') . $container;

        return parent::makeRequest($url);
    }
}
