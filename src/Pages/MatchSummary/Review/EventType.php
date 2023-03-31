<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\MatchSummary\Review;

enum EventType: string
{
    case PENALTY = '10';
    case OTHER = '0';
}
