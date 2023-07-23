<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary;

enum EventInitiator: string
{
    case HOME = '1';
    case AWAY = '2';
}
