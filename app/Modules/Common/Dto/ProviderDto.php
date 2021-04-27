<?php


namespace App\Modules\Common\Dto;

// зачем этот класс? что он делает?
// Это что то типа VO или DTO - я пока плохо понимаб разницу в этом
// но задача - провалидировать и унифициорвать параметры
// если прилетит что то другое в запросе - выкинуть исключение
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
// лишние строки в один формат. предлагаю 1 строка между методами
// это мой шторм автоматом расставляет такие отступы

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
