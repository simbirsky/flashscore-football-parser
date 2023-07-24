<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary;

use Exception;
use Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary\Types\GoalsValue;
use Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary\Types\MinuteValue;
use Simbirskiy\FlashscoreParser\ResponseContent\Content;

final class MatchSummaryReview
{
    /**
     * @param string $content
     */
    public function __construct(private readonly string $content)
    {
    }

    /**
     * @return array<array-key, EventData>
     */
    public function get(): array
    {
        $res = [];

        $content = new Content($this->content);

        foreach ($content->asKeyValue() as $event) {
            if (str_contains(array_keys($event)[0], '~III')) {
                /** @var int<0, max> $minute */
                $minute = (int) str_replace('\'', '', $event['IB'] ?? $event['IBX'] ?? throw new Exception("Wrong minutes parsing"));

                /** @var int<0, max> $team1GoalsValue */
                $team1GoalsValue = (int) ($event['INX'] ?? 0);

                /** @var int<0, max> $team2GoalsValue */
                $team2GoalsValue = (int) ($event['IOX'] ?? 0);

                $res[] = (new EventData(
                    eventId: $event['~III'] ?? $event['~IIIX'] ?? throw new Exception('Wrong event id'),
                    eventType: EventType::tryFrom($event['IE']) ?? EventType::OTHER,
                    eventInitiator: EventInitiator::tryFrom($event['IA']) ?? throw new \DomainException('Not specified which team the event belongs to'),
                    minute: new MinuteValue($minute),
                    team1Goals: new GoalsValue($team1GoalsValue),
                    team2Goals: new GoalsValue($team2GoalsValue),
                    desc: $event['ICT'],
                ));
            }
        }

        return $res;
    }
}
