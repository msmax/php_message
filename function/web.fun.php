<?php
function webconfig($where){
	$arr=$_POST;
	if(update("dw_config",$arr,$where)){
		echo "修改成功!";
		$mes="<script>";
		$mes=$mes."alert('修改网站配置成功！');";	
		$mes=$mes."window.location.href='web_config.php';";
		$mes=$mes."</script>";
		echo $mes;
		}
	else
	{
		print_r($arr);
		echo "修改失败！，<a href='web_config.php'>返回重新修改！</a>";
		}

	}
?>