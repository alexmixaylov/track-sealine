<?php


namespace App\Modules\Common;


abstract class AbstractProvider
{

    private $publicApiBaseUrl;
    private $containerParam;
    private $reponseType;

    abstract public function createProvider();

    public function getApiUrl()
    {
        // return full url
    }

}
