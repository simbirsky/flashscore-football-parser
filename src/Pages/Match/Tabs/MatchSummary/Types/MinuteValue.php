<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary\Types;

use DomainException;

final class MinuteValue
{
    /**
     * @param int<0, max> $value
     * @psalm-suppress DocblockTypeContradiction
     */
    public function __construct(private readonly int $value)
    {
        if ($this->value < 0) {
            throw new DomainException('Minute cannot be less than 0. Passed value is ' . $value);
        }
    }

    /**
     * @return int<0, max>
     */
    public function val(): int
    {
        return $this->value;
    }
}
