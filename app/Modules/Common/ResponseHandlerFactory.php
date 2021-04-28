<?php

namespace App\Modules\Common;

use App\Modules\Resolver\JsonResolver;
use App\Modules\Resolver\XmlResolver;
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
            'json' => new JsonResolver(),
            'xml' => new XmlResolver(),
            default => throw new Exception("Undefined response format $contentType")
        };
    }
}
