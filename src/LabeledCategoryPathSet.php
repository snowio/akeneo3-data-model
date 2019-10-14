<?php
declare(strict_types=1);

namespace SnowIO\Akeneo3DataModel;

use Traversable;

final class LabeledCategoryPathSet implements \IteratorAggregate
{
    public static function fromJson(array $localization): self
    {
        $result = new self([]);
        foreach ($localization as $locale => $localizationData) {
            if (isset($localizationData['category_labels'])) {
                $result->items[$locale] = LabeledCategoryPath::fromJson($localizationData["category_labels"]);
            }
        }
        return $result;
    }

    public function getIterator(): \Iterator
    {
        foreach ($this->items as $locale => $item) {
            yield $locale => $item;
        }
    }

    public function fromLocale(string $locale): ?LabeledCategoryPath
    {
        return $this->items[$locale] ?? null;
    }

    /** @var array LabeledCategoryPaths */
    private $items = [];

    private function __construct(array $labeledCategoryPaths)
    {
        $this->items = $labeledCategoryPaths;
    }
}