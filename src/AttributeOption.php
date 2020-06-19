<?php
declare(strict_types=1);
namespace SnowIO\Akeneo3DataModel;

class AttributeOption
{
    public static function of(AttributeOptionIdentifier $identifier): self
    {
        $option = new self;
        $option->identifier = $identifier;
        $option->labels = InternationalizedString::create();
        return $option;
    }

    public function getAttributeCode(): string
    {
        return $this->identifier->getAttributeCode();
    }

    public function getOptionCode(): string
    {
        return $this->identifier->getOptionCode();
    }

    public function getIdentifier(): AttributeOptionIdentifier
    {
        return $this->identifier;
    }

    public function getLabels(): InternationalizedString
    {
        return $this->labels;
    }

    public function getLabel(string $locale): ?string
    {
        return $this->labels->getValue($locale);
    }

    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    public function withLabels(InternationalizedString $labels): self
    {
        $result = clone $this;
        $result->labels = $labels;
        return $result;
    }

    public function withLabel(LocalizedString $label): self
    {
        $result = clone $this;
        $result->labels = $this->labels->with($label);
        return $result;
    }

    public function withSortOrder(string $sortOrder): self
    {
        $result = clone $this;
        $result->sortOrder = $sortOrder;
        return $result;
    }

    public static function fromJson(array $json): self
    {
        $identifier = AttributeOptionIdentifier::of($json['attribute'], (string)$json['code']);
        $labels = InternationalizedString::fromJson($json['labels']);
        $sortOrder = $json['sort_order'];
        return self::of($identifier)
            ->withLabels($labels)
            ->withSortOrder($sortOrder);
    }

    /** @var AttributeOptionIdentifier */
    private $identifier;
    /** @var InternationalizedString */
    private $labels;
    /** @var string */
    private $sortOrder;

    private function __construct()
    {

    }
}
