<?php
declare(strict_types=1);
namespace SnowIO\Akeneo3DataModel;

class AttributeData
{
    public function getCode(): string
    {
        return $this->code;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getLabels(): InternationalizedString
    {
        return $this->labels;
    }

    public function getLabel(string $locale): ?string
    {
        return $this->labels->getValue($locale);
    }

    public function isLocalizable(): bool
    {
        return $this->localizable;
    }

    public function isScopable(): bool
    {
        return $this->scopable;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function getGroup(): string
    {
        return $this->group;
    }
    public function isDecimalsAllowed(): bool
    {
        return $this->decimalsAllowed;
    }

    public static function fromJson(array $json): self
    {
        $attribute = new self();
        $attribute->code = strtolower($json['code']);
        $attribute->type = $json['type'];
        $attribute->localizable = (bool)$json['localizable'];
        $attribute->scopable = (bool)$json['scopable'];
        $attribute->sortOrder = (int)$json['sort_order'];
        $attribute->labels = InternationalizedString::fromJson($json['labels']);
        $attribute->group = $json['group'];
        $attribute->decimalsAllowed = (bool)($json['decimals_allowed'] ?? false);
        return $attribute;
    }

    private $code;
    private $type;
    /** @var InternationalizedString */
    private $labels;
    private $localizable;
    private $scopable;
    private $sortOrder;
    private $group;
    private $decimalsAllowed;

    private function __construct()
    {

    }
}
