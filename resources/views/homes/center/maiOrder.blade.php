@extends('homes.layout.center')
@section('title','订单管理')

@section('cssjs')
		<link href="/homes/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/homes/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/homes/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/homes/css/orstyle.css" rel="stylesheet" type="text/css">
		
		<script src="/homes/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/homes/AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script src="/homes/js/jquery-1.8.3.min.js"></script>

@endsection()

@section('content')

<div class="user-order">
	<!--标题 -->
<div class="am-cf am-padding">
    <div class="am-fl am-cf">
        <strong class="am-text-danger am-text-lg">
            出售订单管理
        </strong>
        /
        <small>
            Order
        </small>
    </div>
</div>
<hr>
<div class="am-tabs am-tabs-d2 am-margin" data-am-tabs="">
    <ul class="am-avg-sm-5 am-tabs-nav am-nav am-nav-tabs">
        <li class="am-active">
            <a href="#tab1">
                所有订单
            </a>
        </li>
        <li class="">
            <a href="#tab2">
                待付款
            </a>
        </li>
        <li class="">
            <a href="#tab3">
                待发货
            </a>
        </li>
        <li class="">
            <a href="#tab4">
                待收货
            </a>
        </li>
        <li class="">
            <a href="#tab5">
                待评价
            </a>
        </li>
    </ul>


    <div class="am-tabs-bd" style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">

    	<!-- 全部订单 -->
        <div class="am-tab-panel am-fade am-active am-in" id="tab1">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    价格
                </div>
                <div class="th th-number">
                     &nbsp;
                </div>
                <div class="th th-operation">
                     &nbsp;
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            @foreach($zong as $k=>$v)
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status5">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    {{$v->order_num}}
                                </a>
                            </div>
                            <span>
                                下单时间：{{$v->created_at}}
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        {{$v->title}}
                                                    </p>
                                                    <p class="info-little">
                                                        颜色：12#川南玛瑙
                                                        <br>
                                                        包装：裸装
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            {{$v->pay_money}} 元
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：{{$v->pay_money + $v->pay_yunfei}} 元
                                        <p>含运费：<span>{{$v->pay_yunfei}} 元</span></p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                            <p class="Mystatus">交易成功</p>
                                            <p class="order-info">
                                                <a href="orderinfo.html">
                                                    订单详情
                                                </a>
                                            </p>
                                            <p class="order-info">
                                                <a href="logistics.html">
                                                    查看物流
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="td td-change">
                                        <div class="am-btn am-btn-danger anniu">
                                            删除订单
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        

        <!-- 待付款 -->
        <div class="am-tab-panel am-fade" id="tab2">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    单价
                </div>
                <div class="th th-number">
                    数量
                </div>
                <div class="th th-operation">
                    商品操作
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status1">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    1601430
                                </a>
                            </div>
                            <span>
                                成交时间：2015-12-20
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        美康粉黛醉美唇膏 持久保湿滋润防水不掉色
                                                    </p>
                                                    <p class="info-little">
                                                        颜色：12#川南玛瑙
                                                        <br>
                                                        包装：裸装
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            333.00
                                        </div>
                                    </li>
                                    <li class="td td-number">
                                        <div class="item-number">
                                            <span>
                                                ×
                                            </span>
                                            2
                                        </div>
                                    </li>
                                    <li class="td td-operation">
                                        <div class="item-operation">
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：676.00
                                        <p>
                                            含运费：
                                            <span>
                                                10.00
                                            </span>
                                        </p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                            <p class="Mystatus">
                                                等待买家付款
                                            </p>
                                            <p class="order-info">
                                                <a href="#">
                                                    取消订单
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="td td-change">
                                        <a href="pay.html">
                                            <div class="am-btn am-btn-danger anniu">
                                                一键支付
                                            </div>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 待发货 -->
        <div class="am-tab-panel am-fade" id="tab3">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    单价
                </div>
                <div class="th th-number">
                    数量
                </div>
                <div class="th th-operation">
                    商品操作
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status2">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    1601430
                                </a>
                            </div>
                            <span>
                                成交时间：2015-12-20
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        美康粉黛醉美唇膏 持久保湿滋润防水不掉色
                                                    </p>
                                                    <p class="info-little">
                                                        颜色：12#川南玛瑙
                                                        <br>
                                                        包装：裸装
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            333.00
                                        </div>
                                    </li>
                                    <li class="td td-number">
                                        <div class="item-number">
                                            <span>
                                                ×
                                            </span>
                                            2
                                        </div>
                                    </li>
                                    <li class="td td-operation">
                                        <div class="item-operation">
                                            <a href="refund.html">
                                                退款
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：676.00
                                        <p>
                                            含运费：
                                            <span>
                                                10.00
                                            </span>
                                        </p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                            <p class="Mystatus">
                                                买家已付款
                                            </p>
                                            <p class="order-info">
                                                <a href="orderinfo.html">
                                                    订单详情
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="td td-change">
                                        <div class="am-btn am-btn-danger anniu">
                                            提醒发货
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 待收货 -->
        <div class="am-tab-panel am-fade" id="tab4">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    单价
                </div>
                <div class="th th-number">
                    数量
                </div>
                <div class="th th-operation">
                    商品操作
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            <div class="order-main">
                <div class="order-list">
                    <div class="order-status3">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    1601430
                                </a>
                            </div>
                            <span>
                                成交时间：2015-12-20
                            </span>
                            <!-- <em>店铺：小桔灯</em>-->
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        美康粉黛醉美唇膏 持久保湿滋润防水不掉色
                                                    </p>
                                                    <p class="info-little">
                                                        颜色：12#川南玛瑙
                                                        <br>
                                                        包装：裸装
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            333.00
                                        </div>
                                    </li>
                                    <li class="td td-number">
                                        <div class="item-number">
                                            <span>
                                                ×
                                            </span>
                                            2
                                        </div>
                                    </li>
                                    <li class="td td-operation">
                                        <div class="item-operation">
                                            <a href="refund.html">
                                                退款/退货
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：676.00
                                        <p>
                                            含运费：
                                            <span>
                                                10.00
                                            </span>
                                        </p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                            <p class="Mystatus">
                                                卖家已发货
                                            </p>
                                            <p class="order-info">
                                                <a href="orderinfo.html">
                                                    订单详情
                                                </a>
                                            </p>
                                            <p class="order-info">
                                                <a href="logistics.html">
                                                    查看物流
                                                </a>
                                            </p>
                                            <p class="order-info">
                                                <a href="#">
                                                    延长收货
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="td td-change">
                                        <div class="am-btn am-btn-danger anniu">
                                            确认收货
                                        </div>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 待评价 -->
        <div class="am-tab-panel am-fade" id="tab5">
            <div class="order-top">
                <div class="th th-item">
                    商品
                </div>
                <div class="th th-price">
                    单价
                </div>
                <div class="th th-number">
                    数量
                </div>
                <div class="th th-operation">
                    商品操作
                </div>
                <div class="th th-amount">
                    合计
                </div>
                <div class="th th-status">
                    交易状态
                </div>
                <div class="th th-change">
                    交易操作
                </div>
            </div>
            <div class="order-main">
                <div class="order-list">
                    <!--不同状态的订单 -->
                    <div class="order-status4">
                        <div class="order-title">
                            <div class="dd-num">
                                订单编号：
                                <a href="javascript:;">
                                    1601430
                                </a>
                            </div>
                            <span>
                                成交时间：2015-12-20
                            </span>
                        </div>
                        <div class="order-content">
                            <div class="order-left">
                                <ul class="item-list">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#" class="J_MakePoint">
                                                <img src="../images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
                                            </a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#">
                                                    <p>
                                                        美康粉黛醉美唇膏 持久保湿滋润防水不掉色
                                                    </p>
                                                    <p class="info-little">
                                                        颜色：12#川南玛瑙
                                                        <br>
                                                        包装：裸装
                                                    </p>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price">
                                            333.00
                                        </div>
                                    </li>
                                    <li class="td td-number">
                                        <div class="item-number">
                                            <span>
                                                ×
                                            </span>
                                            2
                                        </div>
                                    </li>
                                    <li class="td td-operation">
                                        <div class="item-operation">
                                            <a href="refund.html">
                                                退款/退货
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="order-right">
                                <li class="td td-amount">
                                    <div class="item-amount">
                                        合计：676.00
                                        <p>
                                            含运费：
                                            <span>
                                                10.00
                                            </span>
                                        </p>
                                    </div>
                                </li>
                                <div class="move-right">
                                    <li class="td td-status">
                                        <div class="item-status">
                                            <p class="Mystatus">
                                                交易成功
                                            </p>
                                            <p class="order-info">
                                                <a href="orderinfo.html">
                                                    订单详情
                                                </a>
                                            </p>
                                            <p class="order-info">
                                                <a href="logistics.html">
                                                    查看物流
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="td td-change">
                                        <a href="commentlist.html">
                                            <div class="am-btn am-btn-danger anniu">
                                                评价商品
                                            </div>
                                        </a>
                                    </li>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
						
</div>

@endsection()
