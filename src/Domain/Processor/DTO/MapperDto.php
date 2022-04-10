<?php

declare(strict_types=1);
namespace Importer\Domain\Processor\DTO;
use Importer\Domain\Entity\Enum\MapperEnum;

/**
 * @property-read string merchantId
 * @property-read string merchantName
 * @property-read string batchRefNum
 * @property-read string batchDate
 * @property-read string txDate
 * @property-read string txType
 * @property-read string txCardType
 * @property-read string txCardNum
 * @property-read string txAmount
 */
final class MapperDto
{
    public function __construct (array $mapping)
    {
        $mappingKeys = MapperEnum::cases();
        foreach ($mapping as $key => $value) {
            if (!in_array($key, $mappingKeys)) {
                trigger_error('Invalid mapping key', E_USER_ERROR);
            }
            $this->$key = $value;
        }
    }

    public function __get ($name)
    {
        if (!property_exists($this, $name)) {
            trigger_error('Undefined property: ' . $name, E_USER_ERROR);
        }
        return $this->$name;
    }
}