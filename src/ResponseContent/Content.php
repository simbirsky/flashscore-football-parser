<?php declare(strict_types=1);

namespace Simbirskiy\FlashscoreParser\ResponseContent;

final class Content
{
    public function __construct(private readonly string $content)
    {
    }

    /**
     * Get parsed key-value array.
     *
     * @return array<array-key, array<string, string>>
     */
    public function asKeyValue()
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
