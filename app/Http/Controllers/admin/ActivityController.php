<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use DB,Session,Redirect,Input,Request,Validator;
class ActivityController extends Controller{

	//活动添加展示
	public function Index()
	{
		return view('admin.activityform');
	}

	//活动添加
	public function activityAdd()
	{
		$arr=Request::all();
		unset($arr['_token']);
		//验证
		$validator = Validator::make(
		   $arr,
		    [
		        'act_name' => 'required',
		        'act_desc' => 'required',
		        'act_num' => 'required',
		        'act_start_time' => 'required',
		        'act_end_time' => 'required'
		    ]
		);
		if ($validator->fails()){			
			    $messages = $validator->messages();
			    return $messages;
			}
		// 提交到服务器端.
		$file = Input::file('act_img');
		//ECHO $file;die;
		if($file -> isValid()){
		    //检验一下上传的文件是否有效.
		    $clientName = $file -> getClientOriginalName();

		    $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.
		    $realPath = $file -> getRealPath(); 
		    // echo $realPath;die;
		    $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
		    //echo $entension;die;
		     // echo app_path();die;
		    $newName=time().rand(0,9999).'.'.$entension;
		    $mimeTye = $file -> getMimeType();
		    $path = $file -> move('storage/uploads/activity',$newName);
		    $path=stripslashes($path);
		    $path=str_replace($newName,'/'.$newName, $path);
		}
		      //echo $path;
		
		$arr['act_start_time']=strtotime($arr['act_start_time']);
		$arr['act_img']= $path;
		$arr['act_end_time']=strtotime($arr['act_end_time']);
		//print_r($arr);die;
		$res=DB::table('activity')->insert($arr);
		if ($res) {
			return "<script>alert('添加成功');location.href='activityShow'</script>" ;
		}else{
			return "<script>alert('添加失败');ocation.href='activity'</script>" ;
		}
	    
    }

    //活动列表
    public function activityShow()
    {	
    	
    	$arr['arr']=DB::table('activity')->paginate(2);
    	$arr['search']='';
		$arr['act_start_time']='';
		$arr['act_end_time']='';   
		//dd($arr);die; 	
    	return view('admin.activityshow')->with('arr',$arr);
    }

    //活动删除
    public function activityDel()
    {
    	$id=$_GET['id'];
    	$res=DB::table('activity')->where('act_id','=',$id)->delete();
    	if ($res) {
			return "<script>alert('删除成功');location.href='activityShow'</script>" ;
		}else{
			return "<script>alert('删除失败');location.href='activityShow'</script>" ;
		}
    }

    //活动修改展示页面
    public function activityUpdate()
    {
    	$id=$_GET['id'];
    	$res=DB::table('activity')->where('act_id','=',$id)->first();
    	//print_r($res);
    	return view('admin.activityupdate')->with('v',$res);
    }

    //活动修改
    public function activityUp()
    {	
    	$arr=Request::all();
    	//print_r($arr);die;
    	unset($arr['_token']);
    	unset($arr['act_img']);
		// 提交到服务器端.
		$file = Input::file('act_img');
		if($file -> isValid()){
		    //检验一下上传的文件是否有效.
		    $clientName = $file -> getClientOriginalName();

		    $tmpName = $file ->getFileName(); // 缓存在tmp文件夹中的文件名 例如 php8933.tmp 这种类型的.
		    $realPath = $file -> getRealPath(); 
		    // echo $realPath;die;
		    $entension = $file -> getClientOriginalExtension(); //上传文件的后缀.
		    //echo $entension;die;
		     // echo app_path();die;
		    $newName=time().rand(0,9999).'.'.$entension;
		    $mimeTye = $file -> getMimeType();

		    $path = $file -> move('storage/uploads/activity',$newName);
		     $path=stripslashes($path);
		    $path=str_replace($newName,'/'.$newName, $path);
		}
		//echo $arr['act_id'];die;
		//print_r($arr);die;
		$arr['act_start_time']=strtotime($arr['act_start_time']);
		$arr['act_img']= $path;
		$arr['act_end_time']=strtotime($arr['act_end_time']);
		$res=DB::table('activity')
            ->where('act_id',$arr['act_id'])
            ->update($arr);
         if ($res) {
			return "<script>alert('修改成功');location.href='activityShow'</script>" ;
		}else{
			return "<script>alert('修改失败');location.href='activityShow'</script>" ;
		}
    }

    //即点即改
    public function activityJson()
    {
    	$arr=Request::all();
    	$res=DB::table('activity')->where('act_id',$arr['act_id'])->update($arr);
    }

    //活动搜索
    public function activitySearch()
    {
    	$search=isset($_GET['search'])?$_GET['search']:'';
    	//echo $search;die;
    	$act_start_time=isset($_GET['act_start_time'])?$_GET['act_start_time']:'';
    	$act_end_time=isset($_GET['act_end_time'])?$_GET['act_end_time']:'';
    	$act_start_time=strtotime($act_start_time);
    	$act_end_time=strtotime($act_end_time);
    	if (!empty($search)&&empty($act_end_time)&&empty($act_start_time)) {
    		$arr['arr']=DB::table('activity')->where('act_name','like',"%$search%")->paginate(2);
    	}elseif(empty($search)&&!empty($act_end_time)&&!empty($act_start_time)){
    		$arr['arr']=DB::table('activity')
    					->where('act_start_time','<=',$act_start_time)
    					->where('act_end_time','>=',$act_end_time)
    					->paginate(2);
    	}elseif(!empty($search)&&!empty($act_end_time)&&!empty($act_start_time)){
    		$arr['arr']=DB::table('activity')
    					->where('act_name','like',"%$search%")
    					->where('act_start_time','<=',$act_start_time)
    					->where('act_end_time','>=',$act_end_time)
    					->paginate(2);
    	}else{
    		return redirect('activityShow');
    	}
    	$arr['search']=$search;
		$arr['act_start_time']=$act_start_time;
		$arr['act_end_time']=$act_end_time; 
		//print_r($arr);die;   	
    	return view('admin.activityshow')->with('arr',$arr);
    }

    //帮助
    public function activityHelp()
    {
    	return view('');
    }

}