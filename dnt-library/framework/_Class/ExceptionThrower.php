<?php

namespace DntLibrary\Base;

class ExceptionThrower
{

    static $IGNORE_DEPRECATED = true;
	
    /**
     * Start redirecting PHP errors
     * @param int $level PHP Error level to catch (Default = E_ALL & ~E_DEPRECATED)
     */
    static function Start($level = null)
    {

        if ($level == null) {
            if (defined("E_DEPRECATED")) {
                $level = E_ALL & ~E_DEPRECATED;
            } else {
                // php 5.2 and earlier don't support E_DEPRECATED
                $level = E_ALL;
                self::$IGNORE_DEPRECATED = true;
            }
        }
        set_error_handler(array("ExceptionThrower", "HandleError"), $level);
    }

    /**
     * Stop redirecting PHP errors
     */
    static function Stop()
    {
        restore_error_handler();
    }

    /**
     * Fired by the PHP error handler function.  Calling this function will
     * always throw an exception unless error_reporting == 0.  If the
     * PHP command is called with @ preceeding it, then it will be ignored
     * here as well.
     *
     * @param string $code
     * @param string $string
     * @param string $file
     * @param string $line
     * @param string $context
     */
    static function HandleError($code, $string, $file, $line, $context)
    {
        // ignore supressed errors
        if (error_reporting() == 0)
            return;
        if (self::$IGNORE_DEPRECATED && strpos($string, "deprecated") === true)
            return true;

        throw new Exception($string, $code);
    }

}
