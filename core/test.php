<?php

$date = new DateInterval('PT4M55S');
if ($date->h > 0) {
    echo $date->format('H:I:S');
} else {
    echo $date->format('I:S');
}
//var_dump($date);
