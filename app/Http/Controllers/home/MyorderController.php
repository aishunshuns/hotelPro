<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class MyOrderController extends Controller{


	//我的订单
	public function myOrder()
	{
		$card_status=Request::input('card_status');
		// print_r($card_status);die;
        if ($card_status==0) {
        	$card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where user_id = ? and card_status= ?', [28,$card_status]);
			$card_status=0;
        } else if($card_status==1){
        $card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where user_id = ? and card_status= ?', [28,$card_status]);
        	
        } else if($card_status==2){
        $card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where user_id = ? and card_status= ?', [28,$card_status]);
        	
        } else {
        $card=DB::select('SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id where user_id = ?',[28]);
        	
        }
        //print_r($card);die;
		return view('home/my_order',['card' => $card,'card_status' => $card_status]);
	}
        public function myOrderping()
        {
                $arr=Request::all();
                // print_r($arr);die;
                // echo $sql;die;
                $a=DB::insert("insert into lat_comment (user_id,hotel_id,comment_time,comment_text,hotel_score) values (".$arr['user_id'].",".$arr['hotel_id'].",'".$arr['comment_time']."','".$arr['comment_text']."',".$arr['hotel_score'].")");
                if ($a) {
                    return "<script>alert('提交成功');location.href='myOrder?card_status=".$arr['card_status']."'</script>";
                } else {
                    echo "no";
                }
                
        }
}
