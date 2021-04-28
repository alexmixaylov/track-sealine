<?php

namespace App\Modules\Common;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

abstract class AbstractProviderHandler
{
    abstract public function trackContainer(string $container);

    public function makeRequest(string $url): Response
    {
        return Http::get($url);
    }
}
