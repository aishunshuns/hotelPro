<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;

use DB;

use Request;

class CartController extends Controller{

	//订单列表
	public function cart_list(){
		header("content-type:text/html;charset=utf-8");
		$users = DB::table('card')
            ->join('hotel', 'card.hotel_id', '=', 'hotel.hotel_id')
            ->join('house', 'card.house_id', '=', 'house.house_id')
            ->join('users', 'card.user_id', '=', 'users.user_id')
            ->select('card.*', 'hotel.hotel_name', 'house.house_name','users.user_name')
            ->simplePaginate(3);
         //print_r( $users);die;
            
        $hotel =  DB::table('hotel')->get();
        $house =  DB::table('house')->get();
           // print_r($hotel);die;

		return view('admin/cart_list',['users' => $users,'hotel' => $hotel,'house' => $house]);
	}
	//订单搜索
	public function cart_sou(){
		 $where = Request::input('where');
        //$sql="SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id LEFT JOIN lat_house b ON b.house_id = d.house_id LEFT JOIN lat_users c ON c.user_id = d.user_id WHERE ".$where;
        $users=DB::select("SELECT * FROM lat_card d LEFT JOIN lat_hotel a ON a.hotel_id = d.hotel_id LEFT JOIN lat_house b ON b.house_id = d.house_id LEFT JOIN lat_users c ON c.user_id = d.user_id WHERE ".$where);
        $hotel =  DB::table('hotel')->get();
        $house =  DB::table('house')->get();
        //echo $sql;die;
        echo "<table id='sample-table-1' class='table table-striped table-bordered table-hover'> 
            <thead> 
             <tr> 
              <th class='center'> <label> <input type='checkbox' class='ace' /> <span class='lbl'></span> </label> </th> 
              <th>用户名</th> 
              <th>酒店名称</th> 
              <th>房间类型</th> 
              <th>酒店介绍</th> 
              <th>入住时间</th> 
              <th>离开时间</th> 
              <th>数量</th> 
              <th>总价</th> 
              <th>订单号</th> 
              <th>联系电话</th> 
              <th>订单状态</th> 
              <th>操作</th> 
             </tr> 
            </thead> 
            <tbody>"; 
            foreach ($users as $key => $v) {
    echo "  <tr> 
              <td class='center'> <label> <input type='checkbox' class='ace' /> <span class='lbl'></span> </label> </td> 
              <td>".$v['user_name']."</td> 
              <td>".$v['hotel_name']."</td> 
              <td>".$v['house_name']."</td> 
              <td>".$v['card_desc']."</td> 
              <td>".$v['start_time']."</td> 
              <td>".$v['end_time']."</td> 
              <td>".$v['card_num']."</td> 
              <td>".$v['card_price']."</td> 
              <td>".$v['card_number']."</td> 
              <td>".$v['card_phone']."</td> 
              <td>";
                if ($v['card_status']==0) {
                  echo "未付款";
                } else if ($v['card_status']==1){
                  echo "已付款";
                } else if ($v['card_status']==2){
                  echo  "未消费<a href='cart_xiu?id'></a>";
                }else{
                  echo "已消费";
                }
                
              echo "</td> 
              <td> 
               <div class='visible-md visible-lg hidden-sm hidden-xs btn-group'> 
               ";
                  if ($v['card_status']==1) {
                   echo "<a href='cart_xiu?id=".$v['card_id']."'><button class='btn btn-xs btn-info'> <i class='icon-edit bigger-120'></i> </button> </a>";
                  } else {
                   echo "<a href='javascript:void(0)'><button class='btn btn-xs btn-info'> <i class='icon-edit bigger-120'></i> </button> </a>";
                  }
                  
                echo "<a href='cart_del?id=".$v['card_id']."'><button class='btn btn-xs btn-danger'> <i class='icon-trash bigger-120'></i> </button> </a>
                 
               </div> 
               <div class='visible-xs visible-sm hidden-md hidden-lg'> 
                <div class='inline position-relative'> 
                 <button class='btn btn-minier btn-primary dropdown-toggle' data-toggle='dropdown'> <i class='icon-cog icon-only bigger-110'></i> </button> 
                 <ul class='dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close'> 
                  //<li> <a href='#' class='tooltip-info' data-rel='tooltip' title='View'> <span class='blue'> <i class='icon-zoom-in bigger-120'></i> </span> </a> </li> 
                  <li> <a href='#' class='tooltip-success' data-rel='tooltip' title='Edit'> <span class='green'> <i class='icon-edit bigger-120'></i> </span> </a> </li> 
                  <li> <a href='#' class='tooltip-error' data-rel='tooltip' title='Delete'> <span class='red'> <i class='icon-trash bigger-120'></i> </span> </a> </li> 
                 </ul> 
                </div> 
               </div> </td> 
             </tr>";
       }
       echo " </tbody> 
           </table> ";
	}
	//订单删除
   public function cart_del()
    {
        $id = Request::input('id');
        //echo $id;die;
        $a= DB::delete("delete from lat_card where card_id=?",[$id]);
        if ($a) {
            return redirect('admin/cart_list');
        } else {
            echo "no";
        }
    }
    //订单状态修改
   public function cart_xiu()
    {
        $id = Request::input('id');
        //echo $id;die;
        $a = DB::update('update lat_card set card_status = 2 where card_id = ?', [$id]);
        if ($a) {
            return redirect('admin/cart_list');
        } else {
            echo "no";
        }
    }
}