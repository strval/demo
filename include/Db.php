<?php

/**
 * 数据库连接
 * 运行前确保 DB_HOST,DB_USERNAME,DB_PASSWD,DB_DBNAME,DB_PORT,DB_CHARSET 常量存在
 */
class Db
{
	// 当前类实例
	private static $instance;
	// 数据库连接实例
	private $conn;

	// 数据库连接
	private function __construct()
	{
		if (!class_exists('mysqli', false)) {
			die('mysqli extension is missing');
		}
		$this->conn = @new mysqli(DB_HOST, DB_USERNAME, DB_PASSWD, DB_DBNAME, DB_PORT);
		if ($this->conn->connect_errno) {
			die('Connect Error: ' . $this->conn->connect_error);
		}
		$this->conn->set_charset(DB_CHARSET);
	}

	// 获取数据库连接实例
	public static function getInstance()
	{
		if (!self::$instance instanceof self) {
			self::$instance = new self();
		}
		return self::$instance->conn;
	}
}
