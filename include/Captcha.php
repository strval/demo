<?php

/**
 * 验证码
 * 运行前确保 ROOT_PATH 常量存在,及字体存在
 */
class Captcha
{
    private $charset = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ23456789';    // 随机因子
    private $code;                                                                  // 验证码
    private $codeLen;                                                               // 验证码长度
    private $width;                                                                 // 宽
    private $height;                                                                // 高
    private $img;                                                                   // 图像句柄
    private $font;                                                                  // 字体路径
    private $fontSize;                                                              // 字体大小
    private $fontColor;                                                             // 字体颜色

    // 初始化
    public function __construct()
    {
        $this->font = ROOT_PATH . '/fonts/elephant.ttf';
    }

    // 生成背景
    private function createBg()
    {
        $this->img = imagecreatetruecolor($this->width, $this->height);
        $color = imagecolorallocate($this->img, mt_rand(157, 255), mt_rand(157, 255), mt_rand(157, 255));
        imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $color);
    }

    // 生成随机码
    private function createCode()
    {
        $_len = strlen($this->charset) - 1;
        for ($i = 0; $i < $this->codeLen; $i++) {
            $this->code .= $this->charset[mt_rand(0, $_len)];
        }
        return $this->code;
    }

    // 生成线条,雪花
    private function createLine()
    {
        for ($i = 0; $i < 6; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 156));
            imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
        }
        for ($i = 0; $i < 100; $i++) {
            $color = imagecolorallocate($this->img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
            imagestring($this->img, mt_rand(1, 5), mt_rand(0, $this->width), mt_rand(0, $this->height), '*', $color);
        }
    }

    // 生成文字
    private function createFont()
    {
        $_x = $this->width / $this->codeLen;
        for ($i = 0; $i < $this->codeLen; $i++) {
            $this->fontColor = imagecolorallocate($this->img, mt_rand(0, 156), mt_rand(0, 156), mt_rand(0, 136));
            imagettftext($this->img, $this->fontSize, mt_rand(-30, 30), (($_x * $i) + mt_rand(1, 5)), ($this->height / 1.4), $this->fontColor, $this->font, $this->code[$i]);
        }
    }

    // 输出
    private function outPut()
    {
        header('Content-type: image/png');
        imagepng($this->img);
        imagedestroy($this->img);
    }

    // 对外输出
    public function doImg($width = 130, $height = 50, $codeLen = 4, $fontSize = 20)
    {
        // 初始化
        $this->width = $width;
        $this->height = $height;
        $this->codeLen = $codeLen;
        $this->fontSize = $fontSize;
        // 生成背景,验证码,线条,文字,输出验证码
        $this->createBg();
        $this->createCode();
        $this->createLine();
        $this->createFont();
        $this->outPut();
    }

    // 获取验证码
    public function getCode()
    {
        return strtolower($this->code);
    }
}
