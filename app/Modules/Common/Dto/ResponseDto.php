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
     * @return string
     */
    private function getContainer(): string
    {
        return $this->container;
    }

    /**
     * @return string
     */
    private function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            'container' => $this->getContainer(),
            'date'      => $this->getData()
        ];
    }
}
