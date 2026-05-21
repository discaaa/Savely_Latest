<?php

namespace App\Helpers;

class ProgressHelper
{
    public static function status($percentage)
    {
        if ($percentage >= 100) {
            return 'Completed';
        }

        if ($percentage >= 70) {
            return 'On Track';
        }

        if ($percentage >= 40) {
            return 'In Progress';
        }

        return 'Low Progress';
    }
}