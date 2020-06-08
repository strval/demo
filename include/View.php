<?php

/**
 * 视图
 * 运行前确保 TPL_DIR 常量存在
 */
class View
{
	// 变量池
	private static $data;
	// 模板路径
	private static $filePath;

	// 注入变量
	public static function assign($key, $value = null)
	{
		if (is_array($key)) {
			self::$data = array_merge(self::$data, $key);
		} else {
			self::$data[$key] = $value;
		}
	}

	// 载入模板
	public static function fetch($filePath)
	{
		self::$filePath = TPL_DIR . '/' . $fileRelativePath;
		if (file_exists($self::$filePath)) {
			extract(self::$data);
			require($filePath);
		} else {
			die('Missing TPL File');
		}
	}
}
