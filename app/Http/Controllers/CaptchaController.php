<?php
namespace App\Http\Controllers;

use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController
{
    public function show()
    {
        //使用 gregwar/captcha
        $builder = new CaptchaBuilder;
        $builder->build();
        //没有把图片上的内容放到session中
        session()->put('captcha', $builder->getPhrase());
        //输入图片
        header('Content-type: image/png');
        $builder->output();
    }
}
