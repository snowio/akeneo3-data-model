<?php
declare(strict_types=1);

namespace SnowIO\Akeneo3DataModel;

final class AssociationSet implements \IteratorAggregate
{
    public static function fromJson(array $json): AssociationSet
    {
        $items = [];
        foreach ($json as $code => $item) {
            $items[$code] = AssociationData::fromJson([$code => $item]);
        }

        return new self($items);
    }

    public function getAssociation(string $code): ?AssociationData
    {
        return $this->items[$code] ?? null;
    }

    public function getIterator(): \Iterator
    {
        foreach ($this->items as $code => $value) {
            yield $code => $value;
        }
    }

    private $items;

    private function __construct(array $items)
    {
        $this->items = $items;
    }

    public function equals($other)
    {
        if (!($other instanceof self)) {
            return false;
        }

        foreach ($other as $code => $value) {
            $association = $this->getAssociation($code);
            if (!$association) {
                return false;
            }

            if (!$association->equals($value)) {
                return false;
            }
        }

        return true;
    }
}
