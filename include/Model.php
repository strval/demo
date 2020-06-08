<?php

/**
 * 模型
 */
class Model
{
	// 数据库连接实例
	protected $_conn;
	// 当前模型对应的表名
	protected $_table;

	// 连接数据库
	public function __construct()
	{
		$this->_conn = Db::getInstance();
	}

	// 转义处理
	public function __set($key, $value)
	{
		$this->$key = $this->_conn->real_escape_string($value);
	}

	/**
	 * 一次取出一行
	 * @param  [type] $handle 查询对象
	 * @return [type]         [description]
	 */
	protected function fetchOne($handle)
	{
		return $handle->fetch_assoc();
	}

	/**
	 * 一次取出所有行
	 * @param  [type] $handle 查询对象
	 * @return [type]         [description]
	 */
	protected function fetchAll($handle)
	{
		$result = [];
		while ($row = $handle->fetch_assoc()) {
			$result[] = $row;
		}
		return $result;
	}

	/**
	 * 执行SQL
	 * @param  [type] $query SQL语句
	 * @return [type]        [description]
	 */
	protected function query($query)
	{
		return $this->_conn->query($query);
	}

	/**
	 * 批量执行SQL
	 * @param  [type] $query SQL语句
	 * @return [type]        [description]
	 */
	protected function multiQuery($query)
	{
		return $this->_conn->multi_query($query);
	}

	/**
	 * 获取自增ID
	 * @return [type] [description]
	 */
	protected function nextId()
	{
		$result = $this->fetchOne($this->query("SHOW TABLE STATUS LIKE '$this->_table'"));
		return $result['Auto_increment'];
	}
}
