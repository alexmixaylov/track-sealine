<?php


namespace App\Modules\Maersk;


use App\Modules\Common\AbstractProvider;

class Provider extends AbstractProvider
{
    private $publicApiBaseUrl = 'https://api.maerskline.com/track/';
    private $containerParam = '';
    private $reponseType = 'text/json';

}
