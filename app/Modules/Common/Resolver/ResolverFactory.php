<?php


namespace App\Modules\Common\Resolver;

use Exception;


class  ResolverFactory
{

    /**
     * @param string $resolverType
     *
     * @return ResolverInterface
     * @throws \Exception
     */
    public static function createResolver(string $resolverType): ResolverInterface
    {
        return match ($resolverType) {
            'json' => new Json(),
            'xml' => new Xml(),
            default => throw new Exception("Undefined response format $resolverType")
        };
    }
}
