It's library for parsing football matches from flashscore.com.

Must be set header for every request below
```
'x-fsign' => 'SW9D1eZo'
```

Get matches from feed
```
https://local-ruua.flashscore.ninja/46/x/feed/f_1_-1_3_ru-kz_1
```

Get match info(review)
```
https://local-ruua.flashscore.ninja/46/x/feed/df_sui_1_tIOlBi9Q
```

Get odds in match page below
```
https://46.ds.lsapp.eu/pq_graphql?_hash=ope&eventId=xfDhHNQD&projectId=46&geoIpCode=RU&geoIpSubdivisionCode=RUMOW
```

**Examples**

Pars data from feed response
```php
use Simbirskiy\FlashscoreParser\Pages\Main\Feed\Feed;

$feedToday = new Feed($fakeData->getData());
$data = $feedToday->get();
```

Pars match data
```php
use Simbirskiy\FlashscoreParser\Pages\Match\Info\Info;

$data = (new Info($content))->get();
```

Pars match data from review tab
```php
use Simbirskiy\FlashscoreParser\Pages\Match\Tabs\MatchSummary\MatchSummaryReview;

$data = (new MatchSummaryReview($content))->get();
```
