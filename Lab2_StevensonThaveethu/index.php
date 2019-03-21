<?php
/**
 * 
 * Lab 2
 * 
 * Author: Stevenson Thaveethu
 * Date: March 6, 2019
 *
 */

require 'AppModel.php';
require 'AppView.php';
require 'AppController.php';
require 'AppSessionManager.php';

$appModel = new AppModel();
$appSessionManager = new AppSessionManager($appModel);

$app = new AppController($appModel, $appSessionManager);

$app->webActions();
