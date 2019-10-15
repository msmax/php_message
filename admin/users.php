<?php
require_once '../include.php';
$act=$_GET['act'];
//$row=getCateById($id);
$sql="select * from dw_user limit 1";
$row=fetchOne($sql);
//$query=mysql_query($sql);
//$row=mysql_fetch_array($query);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>网站管理员</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require_once 'session.php';
?>
<?php
	//编辑管理员	
	if($act=="edituser"){
		$id=$_GET['userid'];
		$where="userid={$id}";
		$arr=array(
		"username"=>$_POST['username'],
		"userpass"=>md5($_POST['userpass'])
		);
		if(update("dw_user",$arr,$where)){
		echo "<script>window.location.href='users.php';</script>";
		//print_r($arr);
		}
		else
		{
		echo "修改失败！";
		}		
	}
?>
<form action="?act=edituser&userid=<?php echo $row['userid'];?>" method="post">
<table width="47%"  class="table">
  <tbody>
    <tr>
      <td width="13%" ><span class="form-group">
        <label>管理员名称：</label>
      </span></td>
      <td width="87%" ><span class="form-group">
        <input type="text" class="form-control" name="username" value='<?php echo $row['username'];?>'>
      </span></td>
    </tr>
    <tr>
      <td><span class="form-group">
        <label>管理员密码：</label>
      </span></td>
      <td><span class="form-group">
        <input type="password" class="form-control" name="userpass" value='<?php echo $row['userpass'];?>'>
      </span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button type="submit" class="btn btn-danger">修改管理员</button></td>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>