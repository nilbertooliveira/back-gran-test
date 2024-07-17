<?php

namespace App\Application\Enums;

enum StatusEnum: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Scheduled = 'scheduled';
}
