<?php

declare(strict_types=1);
namespace Importer\Domain\Processor\File\CSV;
use Importer\Domain\Processor\AbstractProcessor;

final class CSVProcessor extends AbstractProcessor
{
    public function process(): void
    {
        foreach ($this->getImporter()->getRawData() as $line => $row) {
            if ($line === 0) continue; // Skipping headers
            $preparedRow = $this->getMapper()->map($row);





        }





    }
}