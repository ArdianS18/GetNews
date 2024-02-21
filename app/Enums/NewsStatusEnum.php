<?php

namespace App\Enums;

enum NewsStatusEnum: string
{
    case ACTIVE = "active";
    case NONACTIVE = "nonactive";
    case PANDING = "panding";
}
