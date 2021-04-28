<?php

namespace App\Modules\Common;

use App\Modules\Common\Dto\ResponseDto;
use Illuminate\Http\Client\Response;

interface ResponseHandlerInterface
{
    public function resolveResult(Response $response): ResponseDto;
}
