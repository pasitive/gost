<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../../framework/framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/GostWebTestCase.php');

Yii::createWebApplication($config);
