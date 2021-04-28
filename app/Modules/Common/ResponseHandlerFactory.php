<?php

namespace App\Modules\Common;

use App\Modules\Resolver\Json;
use App\Modules\Resolver\Xml;
use Exception;

class  ResponseHandlerFactory
{
    /**
     * @param string $contentType
     *
     * @return \App\Modules\Common\ResponseHandlerInterface
     * @throws \Exception
     */
    public static function createResolver(string $contentType): ResponseHandlerInterface
    {
        return match ($contentType) {
            'json' => new Json(),
            'xml' => new Xml(),
            default => throw new Exception("Undefined response format $contentType")
        };
    }
}
