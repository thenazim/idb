<?php

/**
 * Created by PhpStorm.
 * User: Instructor
 * Date: 5/9/2019
 * Time: 3:31 PM
 */
if(!function_exists('dd')) {

    function dd($value)
    {
        echo '<pre>';
        var_dump($value);
        echo '</pre>';
        die();
    }

}