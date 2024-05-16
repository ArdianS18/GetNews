<?php

namespace App\Enums;

enum AdvertisementStatusEnum: string
{
    case ACCEPTED = "accepted";
    case NONACTIVE = "reject";
    case PENDING = "pending";
}
