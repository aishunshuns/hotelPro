<?php
namespace App\Http\Controllers\home;
use App\Http\Controllers\Controller;
use DB,Session,Redirect, Input,Request;
class HelpController extends Controller{

	//关于我们
	public function Help()
	{	
		$res=DB::table('article')->get();
		return view('home.help')->with('res',$res);
	}

	//联系我们
	public function helpContact()
	{
		return view('home.contact');
	}

	//帮助中心
	public function helpCenter()
	{	
		$res=DB::table('problem')->where('parent_id',0)->get();
		foreach ($res as $k => $v) {
			$res[$k]['cont']=DB::table('problem')->where('parent_id',$v['pro_id'])->get();
		}
		//print_r($res);die;
		return view('home.helpcenter')->with('res',$res);
	}

	//留言反馈
	public function helpFeedback()
	{
		return view('home.Feedback');
	}

	//添加留言反馈
	public function feedbackAdd()
	{
		$arr=Request::all();
		unset($arr['_token']);
		$res=DB::table('proposal')->insert($arr);
		if ($res) {
			return "<script>alert('谢谢您提出的问题与建议,我们会及时的改进,感谢您的参与');location.href='helpFeedback'</script>";
		}
	}
}