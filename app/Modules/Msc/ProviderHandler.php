<?php

namespace App\Modules\Msc;

use App\Modules\Common\AbstractProviderHandler;
use Illuminate\Http\Client\Response;

class ProviderHandler extends AbstractProviderHandler
{
    private string $publicApiBaseUrl = 'http://wcf.mscgva.ch/publicasmx/Tracking.asmx/GetRSSTrackingByContainerNumber?ContainerNumber=';

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
