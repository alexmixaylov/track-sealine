<?php


namespace App\Modules\Common\Resolver;

use Exception;
use function class_exists;
use function explode;
use function mb_strtolower;
use function ucfirst;

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
        $normalizedType = explode('/', $resolverType)[1];

        $className = __NAMESPACE__ . "\\" . ucfirst(mb_strtolower($normalizedType));

        if ( ! class_exists($className)) {
            throw new Exception("Undefined response format $resolverType");
        }

        return new $className();
    }
}
