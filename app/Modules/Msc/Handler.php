<?php


namespace App\Modules\Msc;

use App\Modules\Common\AbstractHandler;
use GuzzleHttp\Client;

class Handler extends AbstractHandler
{
    private string $publicApiBaseUrl = 'http://wcf.mscgva.ch/publicasmx/Tracking.asmx/GetRSSTrackingByContainerNumber?ContainerNumber=';
    private string $responseType = 'xml';

    public function __construct()
    {
        parent::__construct(new Client());
    }

    /**
     * @return string
     */
    public function getResponseType(): string
    {
        return $this->responseType;
    }

    public function makeUrl(string $container): string
    {
        return $this->publicApiBaseUrl . $container;
    }
}
