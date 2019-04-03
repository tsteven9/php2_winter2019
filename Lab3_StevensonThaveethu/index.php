<?php
/**
 *
 * Lab 3
 * 
 * Author: Stevenson Thaveethu
 * Date: March 25, 2019
 * 
 */


// Start output buffering.
ob_start();

// Autoloading
include 'vendor/autoload.php';

// Routing
$app = new Application\Router();

ob_end_flush();