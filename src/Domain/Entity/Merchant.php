<?php

declare(strict_types=1);
namespace Importer\Domain\Entity;
use Importer\Infra\Db\Entity;

final class Merchant extends Entity
{
    private string $id;
    private string $name;

}