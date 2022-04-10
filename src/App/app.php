<?php
use Dotenv\Dotenv;
use Importer\Domain\Entity\Enum\MapperEnum;
use Importer\Domain\Processor\File\CSV\CSVProcessor;
use Importer\Infra\Import\Driver\File\CSV;
use Importer\Domain\Processor\DTO\MapperDto;

declare(strict_types=1);
require_once __DIR__ . '../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Bootstrap Application
// Set mapping
$mapping  = [
    MapperEnum::TX_DATE->value          => 'Transaction Date',
    MapperEnum::TX_TYPE->value          => 'Transaction Type',
    MapperEnum::TX_CARD_TYPE->value     => 'Transaction Card Type',
    MapperEnum::TX_CARD_NUM->value      => 'Transaction Card Number',
    MapperEnum::TX_AMOUNT->value        => 'Transaction Amount',
    MapperEnum::BATCH_DATE->value       => 'Batch Date',
    MapperEnum::BATCH_REF_NUM->value    => 'Batch Reference Number',
    MapperEnum::MERCHANT_ID->value      => 'Merchant ID',
    MapperEnum::MERCHANT_NAME->value    => 'Merchant Name',
];

$processor = new CSVProcessor(
    new CSV (
        $_ENV['CSV_FILE_PATH'],
    ),
    new MapperDto($mapping)
);




