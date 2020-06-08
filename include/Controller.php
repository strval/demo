<?php

/**
 * 控制器
 */
class Controller
{
	// 流程控制
	public function _action()
	{
		// 不能是魔术方法或流程控制(本方法)
		$action = $_GET['action'] ?? 'index';
		if (preg_match('/^__|^_action$/', $action)) {
			$this->_notFound();
			return;
		}
		// 使用反射机制确保该方法存在
		$reflectionObject = new ReflectionClass(get_class($this));
		if (!$reflectionObject->hasMethod($action)) {
			$this->_notFound();
			return;
		}
		// 使用反射机制确保该方法是公开的
		if (!$reflectionObject->getMethod($action)->isPublic()) {
			$this->_notFound();
		}
	}

	// 404
	protected function _notFound()
	{
		header('HTTP/1.1 404 Not Found');
		die('File not found.');
	}
}
