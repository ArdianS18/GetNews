<?php

namespace App\Enums;

enum CategoryStatusEnum: string
{
    case ACTIVE = "active";
    case NONACTIVE = "nonactive";
    case PANDING = "panding";

    case DRAFT = '0';
    case PUBLISHED = '1';
}
