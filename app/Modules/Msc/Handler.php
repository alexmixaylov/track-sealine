<?php


namespace App\Modules\Msc;

use App\Modules\Common\AbstractHandler;
use App\Modules\Common\Dto\ResponseDto;
use GuzzleHttp\Client;

class Handler extends AbstractHandler
{
    private string $publicApiBaseUrl = 'http://wcf.mscgva.ch/publicasmx/Tracking.asmx/GetRSSTrackingByContainerNumber?ContainerNumber=';
    private string $responseType = 'xml';

    public function __construct()
    {
        parent::__construct(new Client());
    }

    public function makeUrl(string $container): string
    {
        return $this->publicApiBaseUrl . $container;
    }

    public function track(string $container): ResponseDto
    {
        return parent::track($this->makeUrl($container));
    }

}
