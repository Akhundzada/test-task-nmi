<?php

declare(strict_types=1);
namespace Importer\Domain\Processor;
use Importer\Domain\Entity\Enum\MapperEnum;
use Importer\Domain\Processor\DTO\MapperDto;
use Importer\Infra\Import\AbstractImporter;
use JetBrains\PhpStorm\Pure;

abstract class AbstractProcessor
{
    private array $positionsOffsets = [];

    public function __construct(
        private AbstractImporter $importer,
        private MapperDto $mapperDto,
    )
    {
        $this->setPositionsOffset();
    }

    public function getImporter(): AbstractImporter
    {
        return $this->importer;
    }

    public function getMapper(): MapperDto
    {
        return $this->mapperDto;
    }

    final public function getPositionsOffset(): array
    {
        return $this->positionsOffsets;
    }

    private function setPositionsOffset(): void
    {
        $data = $this->getImporter()->getRawData();
        $header = current ($data);

        if (!is_array ($header)) trigger_error('Unknown headers in CSV', E_USER_ERROR);

        foreach ($header as $offset => $value) {
            foreach (MapperEnum::cases() as $case)
            {
                if ($value === $case->value) {
                    $this->positionsOffsets[$case->value] = $offset;
                }
            }
        }
    }
}