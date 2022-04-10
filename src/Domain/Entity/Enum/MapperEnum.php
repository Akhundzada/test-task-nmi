<?php

declare(strict_types=1);
namespace Importer\Domain\Entity\Enum;
enum MapperEnum: string
{
    case MERCHANT_ID = 'merchantId';
    case MERCHANT_NAME = 'merchantName';
    case BATCH_DATE = 'batchDate';
    case BATCH_REF_NUM = 'batchRefNum';
    case TX_DATE = 'txDate';
    case TX_TYPE = 'txType';
    case TX_CARD_TYPE = 'txCardType';
    case TX_CARD_NUM = 'txCardNum';
    case TX_AMOUNT = 'txAmount';
}