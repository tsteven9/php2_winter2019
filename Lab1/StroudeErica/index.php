<?php
/**
 * Created by PhpStorm.
 * User: E_STROUD
 * Date: 2019-02-06
 * Time: 7:08 PM
 */

require 'IndexController.php'; // need autoloading

// need routing

$app = new IndexController();

$app->indexAction();

