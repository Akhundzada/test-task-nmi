<?php

declare(strict_types=1);
namespace Importer\Infra\Import\Driver\File;
use Importer\Domain\Entity\Enum\MapperEnum;
use Importer\Infra\Import\AbstractImporter;

final class CSV extends AbstractImporter implements FileImporter
{
    public function processWithDatabase()
    {
        $sql = "LOAD DATA INFILE `detection.csv`
              INTO TABLE `tmp_chunks`
              FIELDS TERMINATED BY '%s'
              ESCAPED BY `%s`.
              LINES TERMINATED BY `,,,\\r\\n`
              IGNORE 1 LINES ` 
             (%s)";

        $sql = sprintf(
            $sql,
            $this->getDelimiter(),
            '\\',
            implode(',', MapperEnum::cases())
        );
    }

    public function processWithChunkedFiles()
    {
        if (!is_file ($this->getFilePath())) trigger_error('File not found', E_USER_ERROR);

        $temporaryDirectory = $_ENV['tmpDir'] . '/' . time();
        if (!is_dir ($temporaryDirectory)) mkdir($temporaryDirectory, 0755, true);

        exec(
            sprintf('split -C 24M %s %s', $this->getFilePath(), $temporaryDirectory . '/chunk_'),
        );

        // Call process and write everything in memory
    }

    public function processOptimized()
    {
        if (!is_file ($this->getFilePath())) trigger_error('File not found', E_USER_ERROR);
        if (($handler = fopen($this->getFilePath(), 'r')) === false) trigger_error('File not found', E_USER_ERROR);

        while (!feof($handler))
        {
            yield fgetcsv($handler, 1024, $this->getDelimiter());
        }

        fclose ($handler);

        // Call somewhere setRawData
    }

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