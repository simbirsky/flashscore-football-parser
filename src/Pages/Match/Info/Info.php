<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Match\Info;

use Exception;

final class Info
{
    /**
     * @param string $content
     */
    public function __construct(private readonly string $content)
    {
    }

    /**
     * @throws Exception
     */
    public function get(): array
    {
        $matches = null;

        preg_match('/window\.environment = (?<env_json>\{.*});/', $this->content, $matches);

        if (empty($matches['env_json'])) {
            throw new Exception("Doesn't exists window.environment on page");
        }

        $data = json_decode($matches['env_json'], true);

        return [
            'header' => [
                'tournament' => [
                    'link' => $data['header']['tournament']['link'] ?? throw new Exception("Doesn't exists window.environment.header.tournament.link on page"),
                ]
            ]
        ];
    }
}
