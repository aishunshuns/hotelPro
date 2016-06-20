<?php

namespace App\Http\Controllers\admin;
header('content-type:text/html;charset=utf8');
use App\Http\Controllers\Controller;
use DB,Request,Session;
class AddressController extends Controller{

	//地区列表
	public function address_list(){
        @$qu=isset($_GET['qu'])?$_GET['qu']:'';

		if ($qu) {
		@$city_id=$_GET['sheng'].','.$_GET['shi'].','.$_GET['qu'];
     
		
			//计算表数据
		$sum = DB::table('hotel')->count();
		$num=2;
        $page=ceil($sum/$num);

        @$p=isset($_GET['p'])?$_GET['p']:1;
      
        //偏移量
        $offset=($p-1)*$num;

        //下一页
        $next=$p>=$page?$page:$p+1;

        //上一页
        $last=$p<=1?1:$p-1;
        
		$res = DB::table('hotel')->skip($offset)->take($num)->where('city_id','like',"$city_id")->get();
       
       
        $arr=array();
        $arr1=array();
	    foreach ($res as $k => $v) {
	      $arr[]=explode(',', $v['city_id']);
	      
	    }

	    foreach ($arr as $k => $v) {
	    	 $arr1[] = DB::table('region')->whereIn('region_id',$v)->lists('region_name');
	    }

	    foreach ($arr1 as $k => $v) {
	    	$res[$k]['city_id']=implode(',',$v);
	    }

	    $array = array();
	    $array['info'] = $res;
	    //上下页
	    $str='';
        $str.='<a href="javascript:void(0)" onclick="change_page(1)">首页</a>';
        $str.='<a href="javascript:void(0)" onclick="change_page('.$last.')">上一页</a>';
        $str.='<a href="javascript:void(0)" onclick="change_page('.$next.')">下一页</a>';
        $str.='<a href="javascript:void(0)" onclick="change_page('.$page.')">尾页</a>';
        $array['str']=$str;

	   // print_r($res);die;
	  
	    

	
		 return view('admin/address_list')->with('arr',$array);
		}
		else{
		
		//计算表数据
		$sum = DB::table('hotel')->count();
		$num=2;
        $page=ceil($sum/$num);

        @$p=isset($_GET['p'])?$_GET['p']:1;
      
        //偏移量
        $offset=($p-1)*$num;

        //下一页
        $next=$p>=$page?$page:$p+1;

        //上一页
        $last=$p<=1?1:$p-1;
        
         

		$res = DB::table('hotel')->skip($offset)->take($num)->get();
		

		

       
       
        $arr=array();
        $arr1=array();
	    foreach ($res as $k => $v) {
	      $arr[]=explode(',', $v['city_id']);
	      
	    }

	    foreach ($arr as $k => $v) {
	    	 $arr1[] = DB::table('region')->whereIn('region_id',$v)->lists('region_name');
	    }

	    foreach ($arr1 as $k => $v) {
	    	$res[$k]['city_id']=implode(',',$v);
	    }
	    $array = array();
	    $array['info'] = $res;
	    //上下页
	    $str='';
        $str.='<a href="javascript:void(0)" onclick="change_page(1)">首页</a>';
        $str.='<a href="javascript:void(0)" onclick="change_page('.$last.')">上一页</a>';
        $str.='<a href="javascript:void(0)" onclick="change_page('.$next.')">下一页</a>';
        $str.='<a href="javascript:void(0)" onclick="change_page('.$page.')">尾页</a>';
        $array['str']=$str;

	   // print_r($res);die;
	    
	  
		 return view('admin/address_list')->with('arr',$array);
		}
		
	}

	//地区添加表单页面
	// public function address_add(){
	// 	// $hotel_id=$_GET['hotel_id'];
	// 	$city_id=isset($_GET['city_id'])?$_GET['city_id']:'';
	// 	$res = DB::table('hotel')->where('city_id','like','%$city_id%')->get();
	
	// 	return view('admin/address_add')->with('arr',$res);
	// }
    
    //添加酒店地址数据
	// public function address_jia(){
	//   $hotel_id = Request::input('hotel_id');
 //      $data['hotel_name'] = Request::input('hotel_name');
 //      $hotel_address = implode(',',$_POST['hotel_address']);
    
 //      DB::table('hotel')
 //            ->where('hotel_id',$hotel_id)
 //            ->update(['city_id' => $hotel_address]);

 //      	}

      //删除
      
     // public function address_del(){
     // 	$hotel_id=$_GET['hotel_id'];

     // 	$res=DB::delete('delete from hotel where hotel_id=:hotel_id',['hotel_id'=>$hotel_id]);
		   //  if($res)
	    // { 
	    // 	return redirect('address_list');
	    // }
	    // else
	    // {
	    // 	return redirect('address_list');
	    // }
     // } 	
    
    //生成JSON地区文件
	public function address_josn(){
    
		$province=DB::table('region')->where('region_type','=',1)->get();
        $city=DB::table('region')->where('region_type','=',2)->get();
        $county=DB::table('region')->where('region_type','=',3)->get();
        foreach ($province as  $v) {
            $data[$v['region_id']]=$v['region_name'];                    
         }
         
           foreach ($city as $v) {
                   $data1[$v['parent_id']][$v['region_id']]=$v['region_name'];
                   $res[$v['region_id']]=$v['region_name'];
        }
        //return print_r($data1);
            foreach ($county as $v) {
                   $data2[$v['parent_id']][$v['region_id']]=$v['region_name'];
                      
        }
        //return print_r($data2);
        $bool['province']=$data;
        $bool['city']=$data1;
        $bool['county']=$data2;
        $bool=json_encode($bool);
        $str="var data = " . $bool;
       // return print_r($str);
        file_put_contents('./js/json.js', $str);
        return redirect('admin/address_list');
	}


}