<?php
//$fileinfo=$_FILES['titlepic'];
function uploadfile($fileinfo,$path='uploads',$allowext=array('jpeg','jpg','png','gif','bmp'),$maxsize=2097152,$flag=true){
	//if($fileinfo['error']>0){
	//switch($fileinfo['error']){
//		case 1:
//			$mes="上传文件超过了php配置文件中upload_max_filesize配置的值";
//			break;
//		case 2:
//			$mes= "超过了表单max_file_size的值 ";
//			break;
//		case 3:
//			$mes= "文件部分被上传";
//			break;
		//case 4:
			//$mes= "没有选择上传文件";
			//print_r($fileinfo['name']);
			//break;
		//case 6:
//			$mes= "6";
//			break;
//		case 7:
//		case 8:
//		$mes="系统错误!";
//			break;
//		}
//		exit($mes);
	//}
	if($fileinfo['name']!=null){
	$ext=pathinfo($fileinfo['name'],PATHINFO_EXTENSION);
	if(!is_array($allowext)){
		exit('系统错误');
		}
	if(!in_array($ext,$allowext)){
		exit('非法文件类型！');
		}
	
	if($fileinfo['size']>$maxsize){
		exit('上传文件过大！');		
		}
		//检测是不是真正的图片类型
	if($flag){
		if(!getimagesize($fileinfo['tmp_name'])){
			exit('不是真正的图片类型');
			}
	}
	if(!is_uploaded_file($fileinfo['tmp_name'])){
		exit('不是通过post上传的文件');
		}
	
	if(!file_exists($path)){
		mkdir($path,0777,true);
		chmod($path,0777);
		}
	$uniname=md5(uniqid(microtime(true),true)).'.'.$ext;
	$destination=$path.'/'.$uniname;
	if(!@move_uploaded_file($fileinfo['tmp_name'],$destination))
		{
		exit("移动失败");
		}
		
//		return array(
//			'newname'=>$destination,
//			'size'=>$fileinfo['size']		
//		);
		
		return $uniname;
		}
}
	?>