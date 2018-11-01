<?php
/**
 * Set the error reporting.
 */
error_reporting(-1);
ini_set("display_errors", 1);

/**
 * Default exception handler.
 */
set_exception_handler(function ($e) {
    echo "Uncaught exception: <p>"
        . $e->getMessage()
        . "</p><p>Code: "
        . $e->getCode()
        . "</p><pre>"
        . $e->getTraceAsString()
        . "</pre>";
});
