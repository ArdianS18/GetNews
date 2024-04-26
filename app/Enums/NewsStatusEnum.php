<?php

namespace App\Enums;

enum NewsStatusEnum: string
{
    case ACTIVE = "active";
    case NONACTIVE = "nonactive";
    case PANDING = "panding";
    case NEWSDRAFT = "draft";

    case DRAFT = '0';
    case PUBLISHED = '1';
}
