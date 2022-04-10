<?php

declare(strict_types=1);
namespace Importer\Domain\Entity\Enum;
enum CardType
{
    case VI;
    case MC;
    case AX;
    case DC;
    case UNKNOWN;
}