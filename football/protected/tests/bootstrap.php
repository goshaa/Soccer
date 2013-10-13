<?php

// change the following paths if necessary
$yiit = dirname(__FILE__).'/../../../framework/yiit.php';
$config = dirname(__FILE__).'/../config/test.php';

require_once $yiit;
require_once dirname(__FILE__).'/WebTestCase.php';

$PHPUnitFilter = new PHPUnit_Util_filter();
$PHPUnitFilter->addDirectoryToFilter(dirname(__FILE__) . '/../../../framework');
$PHPUnitFilter->addDirectoryToFilter(dirname(__FILE__) . '/../../../PHPUnit');

Yii::createWebApplication($config);
