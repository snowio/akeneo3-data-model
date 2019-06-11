<?php
declare(strict_types=1);
namespace SnowIO\Akeneo3DataModel;

abstract class AttributeType
{
    const IDENTIFIER = 'pim_catalog_identifier';
    const SIMPLESELECT = 'pim_catalog_simpleselect';
    const BOOLEAN = 'pim_catalog_boolean';
    const NUMBER = 'pim_catalog_number';
    const PRICE_COLLECTION = 'pim_catalog_price_collection';
    const DATE = 'pim_catalog_date';
    const TEXT = 'pim_catalog_text';
    const TEXTAREA = 'pim_catalog_textarea';
    const MULTISELECT = 'pim_catalog_multiselect';
    const ASSETS_COLLECTION = 'pim_assets_collection';

    const ALL = [
        self::IDENTIFIER,
        self::SIMPLESELECT,
        self::BOOLEAN,
        self::NUMBER,
        self::PRICE_COLLECTION,
        self::DATE,
        self::TEXT,
        self::TEXTAREA,
        self::MULTISELECT,
        self::ASSETS_COLLECTION
    ];
    
    private function __construct()
    {
        
    }
}
