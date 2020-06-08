<?php

include 'init.inc.php';

use controller\IndexController;

$index = new IndexController();
$index->_action();
