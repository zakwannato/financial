<?php
namespace App\Http\Controllers;

use App\Models\credit_card;
use DateTime;

if (!function_exists('convertDateToYearMonth')) {
    function convertDateToYearMonth($date)
    {
        // Convert the given date to the format Y-M without using Carbon
        return date('Y-m', strtotime($date));
    }
}

if (!function_exists('cutOffMonthYear')) {
    function cutOffMonthYear($date) {
        $cutOffDay = 25;
        $dateObj = new DateTime($date);
        
        // Check if the day is before or on the cutoff day
        if ($dateObj->format('d') <= $cutOffDay) {
            // If before or on cutoff, use the current month and year
            $resultDate = $dateObj->format('Y-m');
        } else {
            // If after cutoff, use the next month and year
            $dateObj->modify('+1 month');
            $resultDate = $dateObj->format('Y-m');
        }

        return $resultDate;
    }
}

if (!function_exists('cutOffMonthYearCC')) {
    function cutOffMonthYearCC($date,$userid,$CC_id) {
        $cutOffDay = credit_card::where('id',$CC_id)
                    ->where('user_id',$userid)
                    ->value('cutoff_day');

        $dateObj = new DateTime($date);
        
        // Check if the day is before or on the cutoff day
        if ($dateObj->format('d') <= $cutOffDay) {
            // If before or on cutoff, use the current month and year
            $resultDate = $dateObj->format('Y-m');
        } else {
            // If after cutoff, use the next month and year
            $dateObj->modify('+1 month');
            $resultDate = $dateObj->format('Y-m');
        }

        return $resultDate;
    }
}

if (!function_exists('comMonthYear')) {
    function comMonthYear($date) {
        $cutOffDay = 26;
        $dateObj = new DateTime($date);
        
        // Check if the day is before or on the cutoff day
        if ($dateObj->format('d') <= $cutOffDay) {
            // If before or on cutoff, use the current month and year
            $resultDate = $dateObj->format('Y-m');
        } else {
            // If after cutoff, use the next month and year
            $dateObj->modify('+1 month');
            $resultDate = $dateObj->format('Y-m');
        }

        return $resultDate;
    }
}

?>