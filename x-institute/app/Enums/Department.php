<?php

namespace App\Enums;

enum Department: string
{
    case ENGINEERING = 'Engineering';
    case BUSINESS_MANAGEMENT = 'Business Management';
    case ENGLISH = 'English';
    case HOSPITALITY = 'Hospitality';
    case HEALTH = 'Health';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
