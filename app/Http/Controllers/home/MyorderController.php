<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class MyOrderController extends Controller{


    //我的订单
    public function myOrder()
    {
        $id=Session::get('user_id');
        $card_status=Request::input('card_status');
        //echo $id;die;
        if ($card_status==0) {
            $card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where user_id = ? and card_status= ?', [$id,$card_status]);
            $card_status=0;
        } else if($card_status==1){
        $card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where user_id = ? and card_status= ?', [$id,$card_status]);
            
        } else if($card_status==2){
        $card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where user_id = ? and card_status= ?', [$id,$card_status]);
            
        } else {
        $card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where user_id = ?',[$id]);
            
        }
        //print_r($card);die;
        return view('home/my_order',['card' => $card,'card_status' => $card_status]);
    }
    public function Ping()
        {
            $id=Session::get('user_id');
            $card_number=Request::input('card_number');
        $card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where card_number = ?',[$card_number]);

          return view('home/Ping',['card' => $card]);
             
        }
        public function myOrderping()
        {
                $arr=Request::all();
                $card=DB::select('SELECT * FROM lat_comment where user_id = ? and hotel_id', [$arr['user_id']],[$arr['hotel_id']]);
                if ($card) {
                        return "<script>alert('您已提交过评论，请勿重复提交。');location.href='myOrder?card_status=".$arr['card_status']."'</script>";
                } else {
                    $a=DB::insert("insert into lat_comment (user_id,hotel_id,comment_time,comment_text,hotel_score) values (".$arr['user_id'].",".$arr['hotel_id'].",'".$arr['comment_time']."','".$arr['comment_text']."',".$arr['hotel_score'].")");
                    if ($a) {


                        return "<script>alert('提交成功');location.href='myOrder?card_status=".$arr['card_status']."'</script>";
                    } else {
                        return "<script>alert('提交失败');location.href='myOrder?card_status=".$arr['card_status']."'</script>";
                    }
                }
                
                // echo $sql;die;
               
                
        }
}
