<?php

/**
 * 工具
 */
class Tool
{
    // 弹窗关闭
    public static function alertClose($_info)
    {
        exit("<script type='text/javascript'>alert('$_info');close();</script>");
    }

    // 弹窗返回
    public static function alertBack($_info)
    {
        exit("<script type='text/javascript'>alert('$_info');history.back();</script>");
    }

    // 弹窗跳转
    public static function alertLocation($_info, $_url)
    {
        if (!empty($_info)) {
            exit("<script type='text/javascript'>alert('$_info');location.href='$_url';</script>");
        } else {
            header("Location: $_url");
            die;
        }
    }

    // 字符串截取
    public static function subStr($_value, $_length,$_encoding)
    {
        if (mb_strlen($_value, $_encoding) > $_length) {
            return mb_substr($_value, 0, $_length, $_encoding) . '...';
        } else {
            return mb_substr($_value, 0, $_length, $_encoding);
        }
    }
}
