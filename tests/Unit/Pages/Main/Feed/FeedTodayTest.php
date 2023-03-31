<?php

declare(strict_types=1);

use Simbirskiy\FlashscoreParser\Pages\Main\Feed\Feed;
use Tests\FakeData\Pages\Main\Feed\FeedTodayFakeData;

test('successful parsed feed data', function () {
    $fakeData = new FeedTodayFakeData();

    $feedToday = new Feed($fakeData->getData());
    $data = json_encode($feedToday->get());

    expect($data)->toBeJson();
    expect($data)->toEqual($fakeData->getParsedData());
});
