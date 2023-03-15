<?php

declare(strict_types=1);

use Tests\FakeData\Pages\Main\Feed\FeedTodayFakeData;
use Simbirskiy\FlashscoreParser\Pages\Main\Feed\Feed;

test('successful parsed feed data', function () {
    $fakeData = new FeedTodayFakeData();

    $feedToday = new Feed($fakeData->getData());
    $data = json_encode($feedToday->get());

    expect($data)->toBeJson();
    expect($data)->toEqual($fakeData->getParsedData());
});
