<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Main\Feed;

/**
 * Parsing feed data.
 */
class Feed
{
    /**
     * @param string $content
     */
    public function __construct(private readonly string $content)
    {
    }

    /**
     * Get games with parsed.
     *
     * @return array<array-key, GameData>
     */
    public function get(): array
    {
        $res = [];

        foreach ($this->getParsedGames() as $game) {
            if (str_contains(array_keys($game)[0], 'AA')) {
                $matchId = $game['~AA'];

                $res[] = (new GameData(
                    date: date('d.m.Y h:i', (int) $game['AD']),
                    team1: $game['AE'],
                    team2: $game['AF'],
                    score: ($game['AG'] ?? '-') . ':' . ($game['AH'] ?? '-'),
                    matchId: $matchId,
                    link: 'https://www.flashscorekz.com/match/' . $matchId . '/#/match-summary/match-summary',
                ));
            }
        }

        return $res;
    }

    /**
     * Get parsed key-value array for each game.
     *
     * @return array<array-key, array<string, string>>
     */
    private function getParsedGames(): array
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
