<?php declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\MatchSummary\Tabs\Review\Types;

use DomainException;

final class GoalsValue
{
    /**
     * @param int<0, max> $value
     * @psalm-suppress DocblockTypeContradiction
     */
    public function __construct(
        private readonly int $value,
    ) {
        if ($value < 0) {
            throw new DomainException('The number of goals cannot be less than 0. Passed value is ' . $value);
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
