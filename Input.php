<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if (isset($_REQUEST[$key])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        } else {
            return null;
        }
    }

    public static function getString($key)
    {
        $test = trim(static::get($key));
        if (!isset($test)) {
            throw new Exception('Input does not exist.');
        }
        if (!is_string($test)) {
            throw new Exception('Input is not a string');
        }
        return $test;

    }

    public static function getNumber($key)
    {
        $test = trim(static::get($key));
        if (!isset($test)) {
            throw new Exception('Input does not exist.');
        }
        if (!is_numeric($test)) {
            throw new Exception('Input is not a number');
        }
        return $test;


    }

    public static function getDate($key)
    {
        // Validate the date
        $date = DateTime::createFromFormat('Y-m-d', $key);
        $valid =  $date && $date->format('Y-m-d') == $key;
        if (!$valid) {
            throw new Exception('Not a valid date');
        } 
        return static::get($key);
    }



    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
