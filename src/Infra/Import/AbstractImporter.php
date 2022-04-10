<?php

declare(strict_types=1);
namespace Importer\Infra\Import;
abstract class AbstractImporter
{
    private array $rawData;

    public function __construct (
        protected string $filePath, // File path or DSN handler
        protected string $delimiter = ',',
    )
    {
    }

    abstract public function process(): void;

    final public function getFilePath(): string
    {
        return $this->filePath;
    }

    final public function getDelimiter(): string
    {
        return $this->delimiter;
    }

    final protected function setRawData(array $rawData): void
    {
        $this->rawData = $rawData;
    }

    final public function getRawData(): array
    {
        return $this->rawData;
    }
}