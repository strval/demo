<?php

namespace controller;

if (!defined('ROOT_PATH')) exit;
use Controller;
use model\UserModel;
use View;

// 控制器
class IndexController extends Controller
{
	// 默认方法
	public function index()
	{
		$user = new UserModel();
		View::assign('user', $user->first());
		view::fetch('user.php');
	}
}
