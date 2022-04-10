<?php

declare(strict_types=1);
namespace Importer\Infra\Import\Driver\File;
use Importer\Infra\Import\AbstractImporter;

final class CSV extends AbstractImporter implements FileImporter
{
    public function process(): void
    {
        if (!is_file ($this->getFilePath())) trigger_error('File not found', E_USER_ERROR);
        if (($handler = fopen($this->getFilePath(), 'r')) === false) trigger_error('File not found', E_USER_ERROR);

        $header = null;
        $rawData = [];

        while (($row = fgetcsv($handler, 1024, $this->getDelimiter())) !== false) {
            if (!$header) {
                $header = $row;
            } else {
                $rawData[] = array_combine($header, $row);
            }
        }

        fclose ($handler);
        $this->setRawData($rawData);
    }
}