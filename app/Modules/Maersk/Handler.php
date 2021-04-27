<?php


namespace App\Modules\Maersk;


use App\Modules\Common\AbstractHandler;
use App\Modules\Common\Dto\ResponseDto;
use GuzzleHttp\Client;


class Handler extends AbstractHandler
{
    private string $publicApiBaseUrl = 'https://api.maerskline.com/track/';
    private string $responseType = 'json';

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

    public function track(string $container)
    {
        return parent::track($this->makeUrl($container));
    }

}
