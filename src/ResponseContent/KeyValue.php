<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\ResponseContent;

final class KeyValue
{
    public function __construct(private readonly string $keyValue)
    {
    }

    public function getKey(): string
    {
        return explode('÷', $this->keyValue)[0];
    }

    public function getValue(): string
    {
        $r = explode('÷', $this->keyValue);

        return end($r);
    }

    public function isNewSectionMatch(): bool
    {
        return str_contains($this->keyValue, '~');
    }
}
