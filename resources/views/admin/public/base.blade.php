<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>@yield('title')</title>
    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <script type="text/javascript">
    $(function() {
        var divId = localStorage.getItem("id");
        $("#" + divId + "").addClass('in');
        var liId = localStorage.getItem("liId");
        $("#" + liId + "").addClass('active');

        $(".panel-body ul li a").click(function() {
            var all_lis = $(this).parents("div").find(".in");
            var id = all_lis[0].id;
            var parent = $(this).parent(); // 父节点
            var liId = parent[0].id;
            localStorage.setItem("liId", liId);
            localStorage.setItem("id", id);
        })
    })
    </script>
</head>

<body>
    <div class="container">
        <!-- topNav -->
        <nav class="navbar navbar-inverse" style="margin:0;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">后台管理</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">控制面板</a></li>
                        <li><a href="#">Help</a></li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown">
              <span class="glyphicon glyphicon-user"></span>
              <span class="caret"></span>
            </a>
                            <!-- 下拉菜单的内容 -->
                            <ul class="dropdown-menu">
                                <li><a href="#"></a></li>
                                <li><a href="{{url('admin/logout')}}">退出</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- topNavEnd -->
        <!-- left -->
        <div class="col-md-3 bg-success">
            <div class="panel-group" id="group">
                <div class="panel panel-default ">
                    <div class="panel-heading">
                        <a href="#typelist" data-toggle="collapse" data-parent="#group"><h4 class="panel-title">分类管理</h4> </a>
                    </div>
                    <div class="panel-collapse collapse" id="typelist">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{url('type/oper')}}">分类列表</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{url('type/add')}}">添加分类</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#user" data-toggle="collapse" data-parent="#group"><h4 class="panel-title">用户管理</h4></a>
                    </div>
                    <div class="panel-collapse collapse" id="user">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{url('user/oper')}}">用户列表</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">添加管理员</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#product" data-toggle="collapse" data-parent="#group"><h4 class="panel-title">商品管理</h4></a>
                    </div>
                    <div class="panel-collapse collapse " id="product">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="{{url('product/add')}}">商品添加</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="{{url('product/oper')}}">商品列表</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#vendor" data-toggle="collapse" data-parent="#group"><h4 class="panel-title">商户管理</h4></a>
                    </div>
                    <div class="panel-collapse collapse" id="vendor">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">商户信息</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">修改信息</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#orderlist" data-toggle="collapse" data-parent="#group"><h4 class="panel-title">订单管理</h4></a>
                    </div>
                    <div class="panel-collapse collapse" id="orderlist">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">订单列表</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">订单修改</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="#homestay" data-toggle="collapse" data-parent="#group"><h4 class="panel-title">民宿管理</h4></a>
                    </div>
                    <div class="collapse" id="homestay">
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <a href="#">订单列表</a>
                                </li>
                                <li class="list-group-item">
                                    <a href="#">订单修改</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- leftEnd -->
        <!-- right -->
        <div class="col-md-9 bg-success">
            <!-- 内容部分 -->
            <h3>@yield('title')</h3>
            <div class="main">
                @if(session()->has('message'))
                <div class="message">{{session()->get('message')}}<a href="javascript:$('.message').hide(500)">关闭</a></div>
                @endif
                <!-- 非公共部分 -->
                @yield('main')
            </div>
        </div>
        <!-- rightEnd -->
    </div>
    <script src="{{URL::asset('/js/jquery3.js')}}"></script>
    <script src="{{URL::asset('/bootstrap/dist/js/bootstrap.min.js')}}"></script>
</body>

</html>