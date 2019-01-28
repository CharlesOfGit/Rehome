@extends('Home.public.base')
@section('title',"商品列表")
@section('main')
<div class="container">
    <div class="row">
        @foreach($cols as $v1)
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                @foreach($images as $v)
                <p class="pic">
                    <a href="{{url('product/detail',['id'=>$v->productid])}}"><img src="{{asset('uploads')}}/{{$v->path}}" alt="{{$v->title}}" /></a>
                </p>
                @endforeach
                <div class="caption">
                    <h3> <a href="{{url('product/detail',['id'=>$v1->id])}}" title="{{$v1->title}}">{{$v1->title}} </a></h3>
                    <p class="price">
                        市场价：<span class="marketPrice">￥{{$v1->price}}元</span><br />
                        商品介绍：<span class="goodsPrice">{{str_limit($v1->content,10)}}</span>
                    </p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div id="pager">{{$cols->appends($_GET)->links()}}</div>
</div>
@endsection
