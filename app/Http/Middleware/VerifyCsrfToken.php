<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        "faq",
        "createauthor",
        "SubKategori/*",
        'create-tag',
        'kategori',
        'coin-add',
        'register',
        'comment-delete/*',
        'comment-report/*',
        'approved-advertisement/*',
        'delete-iklan-admin/*',
    ];
}
