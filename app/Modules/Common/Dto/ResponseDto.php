<?php

namespace App\Modules\Common\Dto;

use DateTimeImmutable;

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

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'container' => $this->container,
            'date'      => $this->date
        ];
    }
}
