<?php


namespace App\Modules\Common;

use Illuminate\Http\Client\Response;

interface ResponseHandlerInterface
{
    public function resolveResult(Response $response);
}
