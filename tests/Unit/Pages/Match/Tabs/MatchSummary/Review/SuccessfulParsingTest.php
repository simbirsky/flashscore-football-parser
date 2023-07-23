<?php declare(strict_types=1);

use Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary\MatchSummaryReview;
use Tests\FakeData\Pages\Match\Tabs\MatchSummary\MatchSummaryFakeData;

test('successful parsed match data', function () {
    $fakeData = new MatchSummaryFakeData();

    $content = $fakeData->getData();

    $data = json_encode((new MatchSummaryReview($content))->get());

    expect($data)->toBeJson();
    expect($data)->toEqual($fakeData->getParsedData());
});
