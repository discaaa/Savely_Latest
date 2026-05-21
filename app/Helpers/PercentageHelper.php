<?php

namespace App\Helpers;

class PercentageHelper
{
    public static function calculate($current, $target)
    {
        if ($target <= 0) {
            return 0;
        }

        return round(($current / $target) * 100);
    }
}