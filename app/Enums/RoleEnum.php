<?php

namespace App\Enums;

enum RoleEnum: string
{
    case SUPERADMIN = "super admin";
    case ADMIN = "admin";
    case AUTHOR = "author";
    case USER = "user";
}
