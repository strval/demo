<?php

/**
 * 验证
 */
class Validate
{
    // 是否为数字
    public static function isInt($_data)
    {
        if (is_numeric($_data) && strpos($_data, '.') === false) {
            return true;
        } else {
            return false;
        }
    }

    // 验证电子邮箱
    public static function isEMail($_data)
    {
        if (preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $_data)) {
            return true;
        } else {
            return false;
        }
    }

    // 验证手机号
    public static function isPhoneNum($data)
    {
        if (preg_match('/^1[34578]{1}\d{9}$/', $data)) {
            return true;
        } else {
            return false;
        }
    }
}
