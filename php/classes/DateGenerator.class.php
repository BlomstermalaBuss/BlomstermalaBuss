<?php

/**
 * Description of DateGenerator
 *
 * @author Daniel
 * 
 * Class which handles operations on dates
 */
class DateGenerator {
    
    function calculateDates($day, $numberOfDates) {
        $arr = array();
        for($i = 0; $i < $numberOfDates; $i++) {
            if ($i == 0) {
                array_push($arr, $date = date('Y-m-d', strtotime('next ' . $day)));
            } else {
                array_push($arr, $date = date('Y-m-d', strtotime($date . " +1 week")));
            }
        }
        return $arr;
    }
    
}
