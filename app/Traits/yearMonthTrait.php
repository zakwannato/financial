<?php
namespace App\Traits;

trait yearMonthTrait
{
    public function getYearMonth($date)
    {
        $formattedDate = date('Y-M', strtotime($date));
        return $formattedDate;
    }
}

?>