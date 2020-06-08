<?php

namespace model;

if (!defined('ROOT_PATH')) exit;
use Model;

// 用户模型
class UserModel extends Model
{
	// 设置表名
	protected $_table = 'cms_user';

	// 获取一条数据
	public function first()
	{
		$query = $this->query("SELECT * FROM $this->_table LIMIT 1");
		return $this->fetchOne($query);
	}
}
