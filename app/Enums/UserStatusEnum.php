<?php

namespace App\Enums;

enum UserStatusEnum: string
{
    case APPROVED = "approved";
    case REJECT = "reject";
}