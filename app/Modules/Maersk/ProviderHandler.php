<?php

namespace App\Modules\Maersk;

use App\Modules\Common\AbstractProviderHandler;
use Illuminate\Http\Client\Response;

class ProviderHandler extends AbstractProviderHandler
{
    private string $publicApiBaseUrl = 'https://api.maerskline.com/track/';

    private function getProviderEndpointUrl(string $container): string
    {
        return $this->publicApiBaseUrl . $container;
    }

    public function trackContainer(string $container): Response
    {
        $url = $this->getProviderEndpointUrl($container);

        return parent::makeRequest($url);
    }
}
