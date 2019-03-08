<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF token for ajax call -->
    <meta name="_token" content="{{ csrf_token()}}"/>
    <title>@yield('title')</title>
    <link href="{{URL::asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/menutop.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/sweetalert2.min.css')}}" rel="stylesheet">
</head>

<body>
    <!-- head nav -->
    <header class="navbar navbar-inverse navbar-static-top">
        <div id="navbar-menu" class="collapse navbar-collapse" style="padding:10;">
            <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}" @if(!isset($pid))  @endif >首页</a></li>
                @foreach($headerTypeCols as $v)
                <li><a @if(isset($pid) && $pid == $v->id)  @endif href="{{url('product/lister',['pid'=>$v->id])}}">{{$v->tname}}</a></li>
                @endforeach
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <form class="navbar-form navbar-left">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="搜索">
                    </div>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span>搜索</span></button>
                </form>
                @if(session()->has('centeruserid'))
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown">
                   您好，{{session()->get('username')}}<span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a  href="{{url('center/userinfo')}}">个人信息</a></li>
                        <li><a  href="{{url('center/orders')}}">我的订单</a></li>
                        <li><a  href="{{url('center/address')}}"> 收货地址</a></li>
                        <li><a  href="{{url('center/cartlist')}}">我的购物车</a></li>
                        <li><a  href="{{url('center/collect')}}">我的收藏</a></li>
                        <li><a  href="{{url('center/message')}}">我的留言</a></li>
                        <li><a style="color:#ff6600" href="{{url('UserLogout')}}">[退出]</a></li>
                    </ul>
                </li>
                @else
                <li>
                    <p class="navbar-text">您好，
                        <a href="{{url('UserLogin')}}">[请登录]</a>，新用户？
                        <a style="color:#ff6600" href="{{url('UserRegister')}}">[免费注册]</a>
                    </p>
                </li>
                @endif
                <li><a href="#">关于我们</a></li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown">
                    <span class="glyphicon glyphicon-user"></span>
                    <span class="caret"></span>
                </a>
                    <!-- 下拉菜单的内容 -->
                    <ul class="dropdown-menu">
                        <li><a href="{{url('admin/login')}}" target="_blank"><span class="glyphicon glyphicon-hand-right"></span>管理员登录</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <!-- head nav end-->
    <div class="container">
        @yield('main')
    </div>
    <!-- footer -->
    <div class="container">
        <footer class="footer col-md-12">
            <div class="row footer-top">
                <div class="col-md-6">
                    <h3>站点介绍</h3>
                    <p>提供给乡村推广销售，服务，商家平台。</p>
                    <p>网站通过动态网页与静态网页结合，文字介绍为主，图片展示为辅，突出相应景点的特色，加深人们对归乡网的印象。</p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>关于我们</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">菜单名称1</a></li>
                                <li><a href="#">菜单名称2</a></li>
                                <li><a href="#">菜单名称3</a></li>
                                <li><a href="#">菜单名称4</a></li>
                                <li><a href="#">菜单名称5</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h3>合作交流</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">菜单名称1</a></li>
                                <li><a href="#">菜单名称2</a></li>
                                <li><a href="#">菜单名称3</a></li>
                                <li><a href="#">菜单名称4</a></li>
                                <li><a href="#">菜单名称5</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h3>支付方式</h3>
                            <ul class="list-unstyled">
                                <li><a href="#">菜单名称1</a></li>
                                <li><a href="#">菜单名称2</a></li>
                                <li><a href="#">菜单名称3</a></li>
                                <li><a href="#">菜单名称4</a></li>
                                <li><a href="#">菜单名称5</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row footer-bottom">
                <ul class="list-inline text-center">
                    <li>备案号: 京ICP证XXXXXX号</li>
                    <li>技术支持: 同三维</li>
                </ul>
            </div>
        </footer>
    </div>
    <!-- footer end-->
    <script src="{{URL::asset('/js/jquery3.js')}}"></script>
    <script src="{{URL::asset('/js/sweetalert2.min.js')}}"></script>
    <script src="{{URL::asset('/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    @if(session()->has('message'))
    <script type="text/javascript">
    Swal.fire({
        type: 'error',
        title: "{{session()->get('message','')}}",
        animation: false,
        customClass: 'animated tada'
    })
    </script>
    @endif
</body>

</html>
