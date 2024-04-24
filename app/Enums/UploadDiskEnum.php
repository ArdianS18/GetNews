<?php

namespace App\Enums;

enum UploadDiskEnum: string
{
    case NEWS = 'news';
    case NEWS_PHOTO = 'news_photo';
    case AUTHOR_CV = 'author_cv';
    case USER_PHOTO = 'user_photo';
    case ADVERTISEMENT = 'advertisement';
    case ADVERTISEMENT_PHOTO = 'advertisement_photo';
}
