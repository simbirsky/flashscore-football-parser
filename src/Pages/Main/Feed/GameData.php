<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Main\Feed;

final class GameData
{
    public function __construct(
        public readonly string $date,
        public readonly string $team1,
        public readonly string $team2,
        public readonly string $score,
        public readonly string $matchId,
        public readonly string $link,
    ) {
    }
}
