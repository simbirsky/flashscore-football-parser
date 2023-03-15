<?php

declare(strict_types=1);

namespace Tests\FakeData;

interface FakeData
{
    /**
     * @return string
     */
    public function getData(): string;

    /**
     * @return string
     */
    public function getParsedData(): string;
}
