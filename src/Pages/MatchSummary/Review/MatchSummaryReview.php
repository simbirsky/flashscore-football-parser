<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\MatchSummary\Review;

use Simbirskiy\FlashscoreParser\Pages\Main\Feed\KeyValue;
use Simbirskiy\FlashscoreParser\Pages\MatchSummary\Review\Types\GoalsValue;
use Simbirskiy\FlashscoreParser\Pages\MatchSummary\Review\Types\MinuteValue;

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

        foreach ($this->getParsedEvents() as $event) {
            if (str_contains(array_keys($event)[0], '~III')) {
                /** @var int<0, max> $minute */
                $minute     = (int) str_replace('\'', '', $event['IB']);

                /** @var int<0, max> $team1GoalsValue */
                $team1GoalsValue = (int) ($event['INX'] ?? 0);

                /** @var int<0, max> $team2GoalsValue */
                $team2GoalsValue = (int) ($event['IOX'] ?? 0);

                $res[] = (new EventData(
                    eventId: $event['~III'],
                    eventType: EventType::tryFrom($event['IE']) ?: EventType::OTHER,
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

    /**
     * Get parsed key-value array for each event.
     *
     * @return array<array-key, array<string, string>>
     */
    private function getParsedEvents(): array
    {
        $dataList = [];

        foreach ($this->getParsedKeyValueList() as $item) {
            $key   = $item->getKey();
            $value = $item->getValue();

            if ($item->isNewSectionMatch()) {
                $dataList[] = [
                    $key => $value,
                ];
            } else {
                $lastKey = array_key_last($dataList);

                if (is_null($lastKey)) {
                    $dataList[] = [$key => $value];
                } else {
                    $dataList[$lastKey] = array_merge(
                        $dataList[$lastKey] ?? [],
                        [$key => $value]
                    );
                }
            }
        }

        return $dataList;
    }

    /**
     * Get parsed key÷value array. Flashscore gives data in key÷value format separated by ¬ in one line.
     *
     * @return array<array-key, KeyValue>
     */
    private function getParsedKeyValueList(): array
    {
        $keyValueList = [];

        foreach (explode('¬', $this->content) as $keyValueString) {
            $keyValueList[] = new KeyValue($keyValueString);
        }

        return $keyValueList;
    }
}
