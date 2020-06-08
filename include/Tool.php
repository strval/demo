<?php

/**
 * 工具
 */
class Tool
{
    // 弹窗关闭
    public static function alertClose($info)
    {
        exit("<script type='text/javascript'>alert('$info');close();</script>");
    }

    // 弹窗返回
    public static function alertBack($info)
    {
        exit("<script type='text/javascript'>alert('$info');history.back();</script>");
    }

    // 弹窗跳转
    public static function alertLocation($info, $url)
    {
        if (!empty($_info)) {
            exit("<script type='text/javascript'>alert('$info');location.href='$url';</script>");
        } else {
            header("Location: $url");
            die;
        }
    }

    // 字符串截取
    public static function subStr($value, $length, $encoding)
    {
        if (mb_strlen($value, $encoding) > $length) {
            return mb_substr($value, 0, $length, $encoding) . '...';
        } else {
            return $value;
        }
    }
}
