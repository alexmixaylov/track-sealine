<?php


namespace App\Modules\Common\Dto;

class ProviderDto
{
    private string $provider;
    private string $containerNumber;

    /**
     * CarrierDto constructor.
     *
     * @param string $provider
     * @param string $containerNumber
     */
    public function __construct(string $provider, string $containerNumber)
    {
        $this->provider        = $provider;
        $this->containerNumber = $containerNumber;
    }


    /**
     * @return string
     */
    public function getContainer(): string
    {
        return $this->containerNumber;
    }


    /**
     * @return string
     */
    public function getProvider(): string
    {
        return $this->provider;
    }
}
