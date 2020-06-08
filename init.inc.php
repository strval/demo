<?php

// 载入配置
require_once __DIR__ . '/config/profile.inc.php';

// 环境检测
if (version_compare(PHP_VERSION, '7.0.0', '<')) {
	die('PHP 7.0+ is required');
}

// 自动加载类
spl_autoload_register(function ($className) {
	$className = str_replace(['\\', '_'], '/', $className);
	$directorys = [ROOT_PATH . '/', ROOT_PATH . '/include/'];
	foreach ($directorys as $directory) {
		if (file_exists($directory . $className . '.php')) {
			require_once($directory . $className . '.php');
			return;
		}
	}
});
