<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>首页</title>
    <link href="{{URL::asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/menutop.css')}}" rel="stylesheet">
</head>
<body>
    @extends('Home.public.footer')
    @extends('Home.public.navleft')
    @extends('Home.public.header')
    <script src="{{URL::asset('/js/jquery3.js')}}"></script>
    <script src="{{URL::asset('/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>

</html>
