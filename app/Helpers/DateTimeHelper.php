<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Helpers;
use DateInterval;
/**
 * Description of DateTimeHelper
 *
 * @author Olalekan Johnson
 */
class DateTimeHelper {

    public static function youtubeDuration($duration) {
        $date = new DateInterval($duration);
        if ($date->h > 0) {
            return $date->format('%H:%I:%S');
        } else {
            return $date->format('%I:%S');
        }
    }

}
