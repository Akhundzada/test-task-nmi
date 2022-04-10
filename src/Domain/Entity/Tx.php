<?php

declare(strict_types=1);
namespace Importer\Domain\Entity;
use Importer\Domain\Entity\Enum\CardType;
use Importer\Domain\Entity\Enum\TxType;
use Importer\Infra\Db\Entity;
use DateTimeImmutable;

final class Tx extends Entity
{
    private string $id; // For all type of IDs ValueObject must be created
    private string $batchId;
    private DateTimeImmutable $date;
    private float $amount; // Amount is better to store in Money object
    private TxType $type;
    private CardType $cardType;
    private string $cardNumber; // Here we also need a ValueObject to store PAN
    private DateTimeImmutable $createdAt;
}