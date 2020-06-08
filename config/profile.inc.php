<?php

// 错误级别
error_reporting(-1);
// 网站时区
date_default_timezone_set('Asia/Shanghai');
// 页面编码
header('Content-Type: text/html; charset=UTF-8');

// 项目路径
define('ROOT_PATH', dirname(__DIR__));
// 上传目录
define('UPLOAD_DIR', '/uploads');
// 模板目录
define('TPL_DIR', ROOT_PATH . '/templates');

// 数据库主机
define('DB_HOST', 'localhost');
// 数据库用户名
define('DB_USERNAME', 'root');
// 数据库密码
define('DB_PASSWD', 'root');
// 数据库名称
define('DB_DBNAME', 'cms');
// 数据库端口
define('DB_PORT', 3306);
// 数据库字符集
define('DB_CHARSET', 'utf8mb4');

// 每页条数
define('PAGE_SIZE', 15);
