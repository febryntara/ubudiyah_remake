<?php
if (!function_exists('autoBg')) {

    function autoBg()
    {
        $current = mt_rand(0, 3);
        $values = [
            'red-500', 'green-500', 'orange-500', 'yellow-500', 'blue-500'
        ];
        return $values[$current];
    }
}
