<?php

declare(strict_types=1);
namespace Importer\Domain\Entity\Enum;
enum TxType
{
    case SALE;
    case REFUND;
}