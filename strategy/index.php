<?php
/**
 * SortStrategy - sort
 */
interface SortStrategy{
    public static function sort(Array $arr);
}

final class DontSort implements SortStrategy{
    public static function sort(Array $arr){
        return $arr;
    }
}

final class NativeSort implements SortStrategy{
    public static function sort(Array $arr){
        sort($arr);
        return $arr;
    }
}

/** Implement Strategy */
class StrategySorter{

    /**
     * Decide which method to use
     *
     * @param [Array] $inp
     * @return void
     */
    public static function sort(Array $inp){

        if(sizeof($inp) > 10){
            $tmp = DontSort::sort($inp);
        }else {
            $tmp = NativeSort::sort($inp);
        }

        return $tmp;

    }
}


/** RUN */
print_r([
    StrategySorter::sort([9,2,2,3,5,3,3,1,6,1,8,1,5,4]),
    StrategySorter::sort([9,2,2,3,5]),
]);
