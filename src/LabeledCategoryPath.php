<?php
namespace SnowIO\Akeneo3DataModel;

class LabeledCategoryPath
{
    public static function fromJson(array $labelCategoryPath): self
    {
        $result = new self;
        $result->path = $labelCategoryPath;
        return $result;
    }

    public function getCategoryLabel(): string
    {
        $level = $this->getLevel();
        return $this->path[$level - 1];
    }

    public function getRootCategoryLabel(): string
    {
        return $this->path[0];
    }

    public function getParentCategoryLabel(): ?string
    {
        $level = $this->getLevel();
        if ($level == 1) {
            return null;
        }
        return $this->path[$level - 2];
    }

    public function getLevel(): int
    {
        return \count($this->path);
    }

    public function toArray(): array
    {
        return $this->path;
    }

    public function contains(string $categoryLabel): bool
    {
        foreach ($this->path as $ancestor) {
            if ($categoryLabel === $ancestor) {
                return true;
            }
        }
        return false;
    }

    public function equals($other)
    {
        return $other instanceof self && $other->path === $this->path;
    }

    private $path = [];

    private function __construct()
    {

    }
}