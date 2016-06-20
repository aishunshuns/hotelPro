<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use DB,Session,Redirect,Input,Request,Validator;
class HelpController extends Controller{

	//活动添加展示
	public function Index()
	{	
		$res=DB::table('hotel')->get();
		return view('admin.helpform')->with('res',$res);
	}

	//活动添加
	public function helpAdd()
	{
		$arr=Request::all();
		unset($arr['_token']);
		//验证
		$validator = Validator::make(
		   $arr,
		    [
		        'help_desc' => 'required',
		        'hotel_id' => 'required'
		    ]
		);
		if ($validator->fails()){			
			    $messages = $validator->messages();
			    return $messages;
			}
		// 提交到服务器端.
		$file = Input::file('help_img');
		//ECHO $file;die;
		if (!isset($file)) {
			return "<script>alert('没有上传文件');location.href='help'</script>" ;
		}
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
		    $path = $file -> move('storage/uploads/help',$newName);
		    $path = stripslashes($path);
			$path = str_replace($newName,'/'.$newName, $path);
			$arr['help_img']= $path;
		}
		
		$res=DB::table('help')->insert($arr);
		if ($res) {
			return "<script>alert('添加成功');location.href='helpShow'</script>" ;
		}else{
			return "<script>alert('添加失败');location.href='help'</script>" ;
		}
	    
    }

    //活动列表
    public function helpShow()
    {	
    	
    	$arr['arr']=DB::table('help')
				    	->join('hotel', 'help.hotel_id', '=', 'hotel.hotel_id')
				    	->paginate(2);
    	$arr['search']='';	
    	$hotel_name='';
    	return view('admin.helpshow')->with('arr',$arr)->with('hotel_name',$hotel_name);
    }

    //活动删除
    public function helpDel()
    {
    	$id=$_GET['id'];
    	$res=DB::table('help')->where('help_id','=',$id)->delete();
    	if ($res) {
			return "<script>alert('删除成功');location.href='helpShow'</script>" ;
		}else{
			return "<script>alert('删除失败');location.href='helpShow'</script>" ;
		}
    }

    //活动修改展示页面
    public function helpUpdate()
    {
    	$id=$_GET['id'];
    	$arr=DB::table('hotel')->get();
    	$res=DB::table('help')->where('help_id','=',$id)->first();
    	//print_r($res);die;
    	return view('admin.helpupdate')->with('v',$res)->with('res',$arr);
    }

    //活动修改
    public function helpUp()
    {	
    	$arr=Request::all();
    	//print_r($arr);die;
    	unset($arr['_token']);
    	unset($arr['help_img']);
		// 提交到服务器端.
		$file = Input::file('help_img');
		if (!isset($file)) {
			return "<script>alert('没有上传文件');location.href='help'</script>" ;
		}
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

		    $path = $file -> move('storage/uploads/help',$newName);
		    $path = stripslashes($path);
			$path = str_replace($newName,'/'.$newName, $path);
			$arr['help_img']= $path;
		}	
		
		$res=DB::table('help')
            ->where('help_id',$arr['help_id'])
            ->update($arr);
         if ($res) {
			return "<script>alert('修改成功');location.href='helpShow'</script>" ;
		}else{
			return "<script>alert('修改失败');location.href='helpShow'</script>" ;
		}
    }

    //即点即改
    public function helpJson()
    {
    	$arr=Request::all();
    	$res=DB::table('help')->where('help_id',$arr['help_id'])->update($arr);
    }

    //活动搜索
    public function helpSearch()
    {
    	$search=isset($_GET['search'])?$_GET['search']:'';
    	$hotel_name=isset($_GET['hotel_name'])?$_GET['hotel_name']:'';
    	//echo $search;die;
    	if (!empty($search)&&empty($hotel_name)) {
    		$arr['arr']=DB::table('help')
    						->join('hotel', 'help.hotel_id', '=', 'hotel.hotel_id')
				    		->where('help_desc','like',"%$search%")
				    		->paginate(2);
    	}elseif(empty($search) && !empty($hotel_name)) {
    		$arr['arr']=DB::table('help')
    						->join('hotel', 'help.hotel_id', '=', 'hotel.hotel_id')
				    		->where('hotel_name','like',"%$hotel_name%")
				    		->paginate(2);
    	}elseif(!empty($search)&&!empty($hotel_name)) {
    		$arr['arr']=DB::table('help')
    						->join('hotel', 'help.hotel_id', '=', 'hotel.hotel_id')
				    		->where('hotel_name','like',"%$hotel_name%")
				    		->where('help_desc','like',"%$search%")
				    		->paginate(2);
    	}else{
    		return redirect('helpShow');
    	}
    	$arr['search']=$search; 
    	$arr['hotel_name']=$hotel_name; 
		//print_r($arr);die;   	
    	return view('admin.helpshow')->with('arr',$arr)->with('hotel_name',$hotel_name);
    }
}