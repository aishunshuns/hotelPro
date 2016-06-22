<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class CitylistController extends Controller{

	//酒店列表
	public function HotelList()
	{
		$info = Request::all();
		// dd($info);
		$user_id = 21;
		Session::put('start_time',$info['checkInDate']);
		Session::put('end_time',$info['checkOutDate']);
		$arr = DB::table('region')->where('region_id',$info['cityID'])->pluck('parent_id');
		$city_id = $arr.','.$info['cityID'];
		$res = DB::table('hotel')
		            ->where('hotel.city_id','like',"$city_id%")
		            ->get();
		// dd($res);
		 if(!empty($user_id)){
            // 收藏
            $arr = DB::table('collection')->where('user_id',$user_id)->lists('hotel_id');
            // print_R($res);die;
            if($res){
                foreach($res as $k => $v){
                    foreach($arr as $kk => $vv){
                        if($v['hotel_id'] == $vv){
                            $res[$k]['collect'] = 1;
                        }
                    }
                }
            }
        }
        // dd($res);
		return view('home.HotelList')->with('res',$res);
	}

	//酒店房型
	public function Hotel()
	{
		$hotel_id = Request::Input('hotel_id');
		$start_time = Session::get('start_time');
		$end_time = Session::get('end_time');
		$arr = DB::table('hotel')
					->join('hotel_house','hotel.hotel_id','=','hotel_house.hotel_id')
					->join('house','hotel_house.house_id','=','house.house_id')
					->where('hotel.hotel_id',$hotel_id)
					->get();
		 // dd($arr);
		return view('home.Hotel')->with('arr',$arr)->with('start_time',$start_time)->with('end_time',$end_time);
	}

	// 预订酒店时间修改
	public function updateTime()
	{
		$info = Request::all();
		
		 // print_r($info['hotel_id']);die;
		Session::put('start_time',$info['CheckInDate']);
		Session::put('end_time',$info['CheckOutDate']);

		return "<script>alert('修改成功');location.href='Hotel?hotel_id=".$info['hotel_id']."'</script>";
		// return redirect("Hotel?hotel_id=$info['hotel_id']");
	}

	// 酒店预订订单生成
	public function HotelOrder()
	{
		$info = Request::all();
		$info['user_id'] = 21;
		$info['card_number'] = "H".time().rand(10000,99999);
		$user_num = DB::table('users')->where('user_id',$info['user_id'])->pluck('user_num');
		 // dd($user_num);
		$info['card_phone'] = DB::table('users')->where('user_id',$info['user_id'])->pluck('user_phone');
		if($user_num>1000){
			$info['card_price'] = DB::table('hotel')
										->join('hotel_house','hotel.hotel_id','=','hotel_house.hotel_id')
										->where('hotel.hotel_id',$info['hotel_id'])
										->where('hotel_house.house_id',$info['house_id'])
										->pluck('hotel_house.member_price');
		}elseif($user_num>2000){
			$info['card_price'] = DB::table('hotel')
										->join('hotel_house','hotel.hotel_id','=','hotel_house.hotel_id')
										->where('hotel.hotel_id',$info['hotel_id'])
										->where('hotel_house.house_id',$info['house_id'])
										->pluck('hotel_house.silver_price');
		}elseif($user_num>4000){
			$info['card_price'] = DB::table('hotel')
										->join('hotel_house','hotel.hotel_id','=','hotel_house.hotel_id')
										->where('hotel.hotel_id',$info['hotel_id'])
										->where('hotel_house.house_id',$info['house_id'])
										->pluck('hotel_house.gold_price');
		}elseif($user_num>8000){
			$info['card_price'] = DB::table('hotel')
										->join('hotel_house','hotel.hotel_id','=','hotel_house.hotel_id')
										->where('hotel.hotel_id',$info['hotel_id'])
										->where('hotel_house.house_id',$info['house_id'])
										->pluck('hotel_house.diamond_price');
		}else{
			$info['card_price'] = DB::table('hotel')
										->join('hotel_house','hotel.hotel_id','=','hotel_house.hotel_id')
										->where('hotel.hotel_id',$info['hotel_id'])
										->where('hotel_house.house_id',$info['house_id'])
										->pluck('hotel_house.house_price');
		}
		$info['card_num'] = 1;
		$info['card_status'] = 0;
		// dd($info);
		$res = DB::table('card')->insert($info);
		$data = DB::table('hotel_house')
					->where('hotel_id',$info['hotel_id'])
					->where('house_id',$info['house_id'])
					->decrement('house_num');
		if($res&&$data){
			return "<script>alert('预订成功');location.href='Hotel?hotel_id=".$info['hotel_id']."'</script>";
		}else{
			return "<script>alert('预订失败');location.href='Hotel?hotel_id=".$info['hotel_id']."'</script>";
		}
	}

	//酒店简介
	public function HotelInfo()
	{
		$hotel_id = Request::Input('hotel_id');
		$arr = Db::table('hotel')->where('hotel_id',$hotel_id)->first();
		//dd($arr);
		return view('home.HotelInfo')->with('arr',$arr);
	}

	//酒店地图
	public function HotelMap()
	{
		$hotel_id = Request::input('hotel_id');
		$arr = DB::table('hotel')->where('hotel_id',$hotel_id)->first();
		return view('home.HotelRess')->with('arr',$arr);
	}

	//酒店评论
	public function HotelReview()
	{
		$hotel_id = Request::input('hotel_id');
		return view('home.HotelReview');
	}


	//酒店实景图

	public function HotelShow()
	{
		$hotel_id = Request::input('hotel_id');
		$arr = DB::table('hotel')->where('hotel_id',$hotel_id)->first();
		return view('home.HotelMap')->with('arr',$arr);
	}

	//酒店导航
	public function HotelNav()
	{
		$hotel_id = Request::input('hotel_id');
		$arr = DB::table('hotel')->where('hotel_id',$hotel_id)->first();
		return view('home.HotelNav')->with('arr',$arr);
	}

	// 酒店收藏
	public function Collection()
	{
		$arr['user_id'] = 21;
		if(!empty($arr['user_id'])){
			/*$s_time = Session::get('start_time');
			$e_time = Session::get('end_time');*/
			$arr['hotel_id'] = Request::input('hotel_id');
			/*$city_id = Request::input('cityID');
			$city_id =explode(',',$city_id); */
			$arr['add_time'] = date('Y-m-d H:i:s',time());
			$res = DB::table('collection')->insert($arr);
			if($res){
				return "<a href='javascript:cancel(".$arr['hotel_id'].")'><img src='cancel.jpg' alt='取消收藏' width='25' /></a>";
				// return "<script>location.href='HotelList?cityID=".$city_id[1]."&checkInDate=".$s_time."&checkOutDate=".$e_time."&hotel_id=".$arr['hotel_id']."'</script>";
			}
		}else{
			return "<script>alert('请先登录');location.href='Login'</script>";	
		}
	}

	// 取消收藏
	public function Cancel()
	{
		$user_id = 21 
		;
		/*$s_time = Session::get('start_time');
		$e_time = Session::get('end_time');*/
		$hotel_id = Request::input('hotel_id');
		/*$city_id = Request::input('cityID');
		$city_id =explode(',',$city_id); */
		$res = DB::table('collection')->where('user_id',$user_id)->where('hotel_id',$hotel_id)->delete();
		if($res){
			return "<a href='javascript:collection(".$hotel_id.")'><img src='collection.jpg' alt='收藏本店' width='25' /></a>";
		}
	}
}