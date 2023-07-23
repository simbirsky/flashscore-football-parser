<?php

declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\Pages\Main\Feed;

use Simbirskiy\FlashscoreParser\ResponseContent\Content;

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

        $content = new Content($this->content);

        foreach ($content->asKeyValue() as $game) {
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
}
