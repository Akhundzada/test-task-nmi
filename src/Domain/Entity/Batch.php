<?php

declare(strict_types=1);
namespace Importer\Domain\Entity;
use Importer\Infra\Db\Entity;

final class Batch extends Entity
{
    private string $id;
    private string $merchantId;
    private string $ref;
    private string $date;


}