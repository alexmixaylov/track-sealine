<?php


namespace App\Modules\Common\Dto;


use DateTimeImmutable;
use function json_encode;

class ResponseDto
{
    private string $container;
    private string $date;

    /**
     * @param string $container
     * @param DateTimeImmutable $date
     */
    public function __construct(string $container, DateTimeImmutable $date)
    {
        $this->container = $container;
        $this->date      = $date->format('d M Y');
    }

    public function getData(): array
    {
        return [
            'container' => $this->container,
            'date'      => $this->date
        ];
    }
}
