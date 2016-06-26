<?php
/**
 * @author LiuR_Fun
 * @date 2016-02-02
 * @version 1.0
 * @email admin@lrfun.com
 */
	header('content-tpye:text/html;charset=utf8');
	include "TopSdk.php";
	$c = new TopClient;
	$c->appkey = '23391549';
	$c->secretKey = '1a3e4546940485be68b35a1618fdec5d';
	$req = new AlibabaAliqinFcTtsNumSinglecallRequest;
	// $req->setExtend("12345");
	$req->setTtsParam("{\"num\":\"朱华丽\"}");
	$req->setCalledNum("18519230624");
	$req->setCalledShowNum("051482043260");
	$req->setTtsCode("TTS_11065212");
	$resp = $c->execute($req);
	$arr = objectArray($resp);
	print_r($arr);

	//stdClass Object 转 数组
	function objectArray($array){
		if(is_object($array)){
			$array = (array)$array;
		}
		if(is_array($array)){
			foreach($array as $key=>$value){
				$array[$key] = objectArray($value);
			}
		}
		return $array;
	}
?>