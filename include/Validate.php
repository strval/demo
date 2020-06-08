<?php

/**
 * 验证
 */
class Validate
{
    // 是否为整数
    public static function isInt($data)
    {
        return (is_numeric($data) && strpos($data, '.') === false) ? true : false;
    }

    // 验证电子邮箱
    public static function isEMail($data)
    {
        return preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $data) ? true : false;
    }

    // 验证手机号
    public static function isPhoneNum($data)
    {
        return preg_match('/^1[34578]{1}\d{9}$/', $data) ? true : false;
    }
}
