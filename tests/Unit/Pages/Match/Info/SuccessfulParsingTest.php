<?php

declare(strict_types=1);

use Simbirskiy\FlashscoreParser\Pages\Match\Info\Info;
use Tests\FakeData\Pages\Match\Info\InfoFakeData;

test('successful parsed match data', function () {
    $fakeData = new InfoFakeData();

    $content = $fakeData->getData();

    $data = json_encode((new Info($content))->get());

    expect($data)->toBeJson();
    expect($data)->toEqual($fakeData->getParsedData());
});
