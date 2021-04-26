<?php


namespace App\Modules\Maersk;


use App\Modules\Common\AbstractHandler;
use App\Modules\Common\Dto\ResponseDto;
use GuzzleHttp\Client;


class Handler extends AbstractHandler
{
    private $publicApiBaseUrl = 'https://api.maerskline.com/track/';

    public function __construct()
    {
        parent::__construct(new Client());
    }

    public function getUrl(string $container): string
    {
        return $this->publicApiBaseUrl . $container;
    }

    public function track(string $container): ResponseDto
    {
        return parent::track($this->getUrl($container));
    }

}
