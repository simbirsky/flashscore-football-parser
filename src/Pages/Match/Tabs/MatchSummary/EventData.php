<?php declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary;

use Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary\Types\GoalsValue;
use Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary\Types\MinuteValue;

final class EventData
{
    /**
     * @param string $eventId
     * @param EventType $eventType
     * @param EventInitiator $eventInitiator
     * @param MinuteValue $minute
     * @param GoalsValue $team1Goals
     * @param GoalsValue $team2Goals
     * @param string $desc
     */
    public function __construct(
        public readonly string $eventId,
        public readonly EventType $eventType,
        public readonly EventInitiator $eventInitiator,
        public readonly MinuteValue $minute,
        public readonly GoalsValue $team1Goals,
        public readonly GoalsValue $team2Goals,
        public readonly string $desc,
    ) {
    }
}
