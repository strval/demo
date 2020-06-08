<?php

/**
 * 自动加载
 * @param  [type] $className [description]
 * @return [type]            [description]
 */
function autoload($className)
{
	$className = str_replace(['\\', '_'], '/', $className);
	$directory = [ROOT_PATH . '/', ROOT_PATH . '/include/'];
	foreach ($directory as $dir) {
		if (file_exists($dir . $className . '.php')) {
			require_once($dir . $className . '.php');
			return;
		}
	}
}
