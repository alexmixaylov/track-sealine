<?php

namespace App\Modules\Common;

use App\Modules\Common\Dto\ProviderDto;
use function mb_strtoupper;

// ты уверен что этот юзадж необходим?
// автоматом шторм проставляет, есть небольшой профит в производительности от этого,
// но я сам не пишу их Ctrl + Shift + L - наше все

class HandlerFactory
{

    private ProviderDto $provider;
    private AbstractHandler $handler;

    /**
     * @throws \Exception
     */
    public function __construct(ProviderDto $provider)
    {
        $this->provider = $provider;
        $this->handler = $this->createHandler($provider->getProvider());
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(): Dto\ResponseDto
    {
        // ВСЕ САДИТСЯ БАТАРЕЯ, позже доделаю
        return $this->handler->track($this->provider->getContainer());
    }


    /**
     * @param string $providerType
     *
     * @return \App\Modules\Common\AbstractHandler
     * @throws \Exception
     */
    private function createHandler(string $providerType): AbstractHandler
    {

        // PHP 8 интересная фича
        return match ($providerType) {
            'msc' => new \App\Modules\Msc\Handler(),
            'maersk' => new \App\Modules\Maersk\Handler(),
            default => throw new \Exception('Provider ' . mb_strtoupper($providerType) . ' not found'),
        };

        // PHP 7
//        switch ($providerType) {
//            case 'msc':
//                return new \App\Modules\Msc\Handler();
//            case 'maersk':
//                return new \App\Modules\Maersk\Handler();
//            default:
//                throw new \Exception();
//        }
    }
}
