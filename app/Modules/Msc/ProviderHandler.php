<?php

namespace App\Modules\Msc;

use App\Modules\Common\AbstractProviderHandler;
use Illuminate\Http\Client\Response;

class ProviderHandler extends AbstractProviderHandler
{
    public function trackContainer(string $container): Response
    {
        $url = config('app.sea_line_providers.msc') . $container;

        return parent::makeRequest($url);
    }
}
