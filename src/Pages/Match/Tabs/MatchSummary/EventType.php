<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary;

enum EventType: string
{
    case OTHER = '0';
    case YELLOW_CARD = '1';
    case PENALTY = '10';
}
