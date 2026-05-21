<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    public static function daysLeft($deadline)
    {
        return Carbon::now()->diffInDays(Carbon::parse($deadline), false);
    }

    public static function format($date)
    {
        return Carbon::parse($date)->format('d F Y');
    }
}