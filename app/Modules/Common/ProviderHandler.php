<?php


namespace App\Modules\Common;

use App\Modules\Common\Dto\ProviderDto;
use function ucfirst;


class ProviderHandler
{

    private ProviderDto $provider;

    public function __construct(ProviderDto $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle(): string
    {
        $providerHandler = $this->createHandler($this->provider->getProvider());

        return $providerHandler->track($this->provider->getContainer());
    }

    private function createHandler(string $providerType)
    {
        $className = '\\App\\Modules\\' . ucfirst($providerType) . '\\Handler';

        return new $className();
    }


}
