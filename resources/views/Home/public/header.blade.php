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
                    <li><a  href="{{url('center/dingdan')}}">我的订单</a></li>
                    <li><a  href="{{url('center/address')}}"> 收货地址</a></li>
                    <li><a  href="{{url('center/cartlist')}}">我的购物车</a></li>
                    <li><a  href="{{url('center/shoucang')}}">我的收藏</a></li>
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
