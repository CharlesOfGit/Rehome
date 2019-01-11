<?php
namespace App\Http\Controllers;

//首页
class IndexController extends BaseController
{
    public function index()
    {
        return view('index');
    }

}
