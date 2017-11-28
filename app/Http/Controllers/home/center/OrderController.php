<?php

namespace App\Http\Controllers\home\center;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Model\Good;
use App\Http\Model\Order;
use App\Http\Model\Message;

use \DB;
class OrderController extends Controller
{
    public function index () 
    {
    	
    		//联查商品
            $res = DB::table('orders')->join('goods','goods.id','=','orders.goods_id')
                                      ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                      ->join('users','users.id','=','orders.sale_uid')
                                      ->where('orders.buy_uid',session('uid'))
                                      ->where('orders.buy_order_status','<=','5')
                                      ->orderBy('orders.buy_order_status')
                                     ->select('orders.*','users.username','goods.title','goods.newprice','goodsdetail.pic','goodsdetail.content')
                                      ->get();
                                 

          //转换json子串                            
            foreach ($res as $key => $value) {
                     
                     $pic[$key] =  json_decode($value->pic); 

                     $res[$key]->pic = $pic[$key]->img1;    
                 }                          
    
  
    	return  view('homes.center.order',['res'=>$res]);
    }
 
  

    public function list1 (Request $Request)
    {       
            $status=$Request->all()['status'];


            $res = DB::table('orders')->join('goods','goods.id','=','orders.goods_id')
                                      ->join('goodsdetail','goodsdetail.goods_id','=','goods.id')
                                      ->join('users','users.id','=','orders.sale_uid')
                                      ->where('orders.buy_uid',session('uid'))
                                      ->where('orders.buy_order_status',$status)
                                      ->orderBy('orders.buy_order_status')
                                     ->select('orders.*','users.username','goods.title','goods.newprice','goodsdetail.pic','goodsdetail.content')
                                      ->get();

          //转换json子串                            
            foreach ($res as $key => $value) {
                     
                     $pic[$key] =  json_decode($value->pic); 

                     $res[$key]->pic = $pic[$key]->img1;    
             }                            

            echo json_encode($res);
    }


    public function pay (Request $Request)
    {

        //传过来的订单id
        $id=$Request->all()['id'];
      
 
        $res=DB::table('orders')->where('id',$id)->first();

        $money = $res->pay_money+$res->pay_yunfei;

        $arr=DB::table('users')->join('orders',function($query){

            $query->on('orders.buy_uid','=','users.id');
            
        })->where('orders.id',$id)->first();

        //判断用户钱是否够
        if($money > $arr->money){

            
            echo 0;die;
        }

         $a = $arr->money - $money; 

         $b = DB::table('orders_money')->value('shouru') + $money; 

         //开启事务
         DB::beginTransaction();

         $A = DB::table('orders_money')->update(['shouru'=>$a]);

         $B =DB::table('users')->where('id',$res->buy_uid)->update(['money'=>$b]); 

         $C =DB::table('orders')->where('id',$id)->update(['buy_order_status'=>'2','sale_order_status'=>'2']);


          //添加支付消息  
         $mes['order_id'] = $id;
         $mes['msg_content'] ="买家已付款,请及时发货";
         $mes['send_uid'] =session('uid');
         $mes['receive_uid'] = $res->sale_uid;  
                 
         $D = Message::create($mes);
 ;         

        if($A && $B &&$C && $D ){
            DB::commit();
            
            echo 1;
            
        }else{
            DB::rollback();
          
            echo 2;
        }
    }

    public function sure(Request $Request)
    {
        //订单id
        $id = $Request->all()['id'];

        $res =DB::table('orders')->where('id',$id)->first();  
        
        DB::beginTransaction();

        $time = date('Y-m-d h:i:s',time());

       // dd($time);

        $A=DB::table('orders')->where('id',$id)->update(['buy_order_status'=>'4','sale_order_status'=>'4','Order_otime'=>$time]);
    
        //添加确认收货消息
        $arr['order_id'] = $id;
        $arr['msg_content'] = "买家已收货,该订单完成";
        $arr['send_uid']=session('uid');
        $arr['receive_uid'] = $res->sale_uid;

        $B = Message::create($arr);
    


        if($A && $B ){
              
              DB::commit();
            echo 1;
        }else{
              DB::rollback();
            echo 0;
        }

     
    }
  
}
