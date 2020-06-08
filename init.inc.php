<?php

// PHP版本检测
if (version_compare(PHP_VERSION, '7.0.0', '<')) die('PHP 7.0+ is required');

// 载入配置
require_once __DIR__ . '/config/profile.inc.php';

// 载入函数库
require_once ROOT_PATH . '/functions.php';

// 自动加载类
spl_autoload_register('autoload');
