<?php

declare(strict_types=1);

namespace Tests\FakeData\Pages\Match\Info;

final class InfoFakeData
{
    /**
     * @return string
     */
    public function getData(): string
    {
        return file_get_contents(__DIR__ . '/Match.html');
    }

    public function getParsedData(): string
    {
        return '{"header":{"tournament":{"link":"\/football\/australia\/npl-act\/"}}}';
    }
}
