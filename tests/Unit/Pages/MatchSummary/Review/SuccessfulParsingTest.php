<?php

declare(strict_types=1);

use Simbirskiy\FlashscoreParser\Pages\MatchSummary\Review\MatchSummaryReview;
use Tests\FakeData\Pages\MatchSummary\MatchSummaryFakeData;

test('successful parsed match data', function () {
    $fakeData = new MatchSummaryFakeData();

    $content = $fakeData->getData();

    $data = json_encode((new MatchSummaryReview($content))->get());

    expect($data)->toBeJson();
    expect($data)->toEqual($fakeData->getParsedData());
});
