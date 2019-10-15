
<?php
	header("content-type:text/html;charset=utf-8");
	error_reporting(E_ALL^E_NOTICE);
	echo '<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">';

	require_once("../include.php");
	$act=$_GET['act'];	
	if($act=="login"){
		$username=inject_check($_POST['username']);
		$userpass=md5(inject_check(($_POST['userpass'])));
		$sql="select * from dw_user where username='{$username}' and userpass='{$userpass}'";
		$row=fetchOne($sql);
		if($row){
			session_start();
			$_SESSION['username']=$row['username'];
			echo '<div class="alert alert-success" role="alert">登录成功！<a href="index.php">进入后台</a>!</div>';
			}
		else
		{
			echo '<div class="alert alert-danger" role="alert">登录失败！<a href="login.php">重新登录</a>!</div>';
			}
		}
	
	//添加分类
	if($act=="addclass"){
		addclass();		
		}
		
	//添加文章	
	if($act=="addarticle"){
	$fileinfo=$_FILES['titlepic'];
	$allowext=$allowext=array('jpeg','jpg','png','gif','bmp');
	$newname=uploadfile($fileinfo,'../uploads',$allowext);
	
	if($newname==null){
		$newname=null;
	}
	else{
		$newname=$newname;
	}

	$arr=array(
	"title"=>$_POST['title'],
	"classname"=>$_POST['classname'],
	"keywords"=>$_POST['keywords'],
	"ar_desc"=>$_POST['ar_desc'],
	"titlepic"=>$newname,
	"subdate"=>date("Y/m/d"),
	"content"=>$_POST['content']
	);
	//print_r($arr);
	addarticle("dw_article",$arr);		
	}
	
//编辑文章
if($act=="editarticle"){
	$id=$_GET['id'];
	$allowext=$allowext=array('jpeg','jpg','png','gif','bmp');
	$fileinfo=$_FILES['titlepic'];
	$sesfile=$_SESSION['titlepic'];	
	//echo "session的值是外围".$newname."<br/>"
//	if($fileinfo!=null)
//	{
//		$newname=uploadfile($fileinfo,'../uploads',$allowext);
//		}
	if($fileinfo['name']==null){
		$arr=array(
		"title"=>$_POST['title'],
		"classname"=>$_POST['classname'],
		"keywords"=>$_POST['keywords'],
		"ar_desc"=>$_POST['ar_desc'],
		"titlepic"=>$_POST['titlepic'],
		"subdate"=>date("Y/m/d"),
		"content"=>$_POST['content']
		);
		}
	else{
		$newname=uploadfile($fileinfo,'../uploads',$allowext);
		$arr=array(
		"title"=>$_POST['title'],
		"classname"=>$_POST['classname'],
		"keywords"=>$_POST['keywords'],
		"ar_desc"=>$_POST['ar_desc'],
		"titlepic"=>$newname,
		"subdate"=>date("Y/m/d"),
		"content"=>$_POST['content']
		);
		}		
	
	if(update("dw_article",$arr,"articleid=".$id)){
		echo '<div class="alert alert-success" role="alert">修改成功，<a href="list_article.php">查看文章列表</a></div>';
		}
	else
	{
		echo "修改失败！";
		}
	
	//editarticle("dw_article",$arr,"articleid=".$id);		
	
}
	
	//编辑分类
	if($act=="editclass"){
		$id=$_GET['id'];
		$where="classid={$id}";
		editclass($where);		
		}
		//删除分类。
	if($act=="delclass"){
		$id=$_GET['id'];
		delclass($id);
		}
	//删除文章
	if($act=="delarticle"){
		$id=$_GET['id'];
		delarticle($id);
		}
	//添加导航
	if($act=="addnav")
	{
		addnav();
		}
		
	//修改导航
	if($act=="editnav"){
		$id=$_GET['id'];
		$where="navid={$id}";
		editnav($where);		
		}
	//删除导航
	if($act=="delnav"){
		$id=$_GET['id'];
		delnav($id);
		}

	?>