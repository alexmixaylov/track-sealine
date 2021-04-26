<?php


namespace App\Modules\Common\Resolver;


use App\Modules\Common\Dto\ResponseDto;

interface ResolverInterface
{
    public function resolveResult( $data): ResponseDto;
}
