<?php
function addnav(){
	$arr=$_POST;
	if(insert("dw_nav",$arr)){
		echo "添加成功，你可以<a href='nav_config.php'>马上查看</a>";
		}
		else{
		echo "添加失败<a href='='nav_config.php'>查看分类</a";
		}
	}
	
function editnav($where){
	$arr=$_POST;
	if(update("dw_nav",$arr,$where)){
		echo "修改成功，<a href='nav_config.php'>马上查看</a>";
		//print_r($arr);
		}
	else
	{
		echo "修改失败！";
		}
	}
	
	function delnav($id){		
		if(!$res){
		$where="navid=".$id;
		if(delete("dw_nav",$where)){
				//echo $sql;
		echo "删除导航成功！请<a href='nav_config.php'>马上查看</a>";				
		}
		else{
		echo "删除导航失败！请<a href='nav_config.php'>返回重新操作</a>";	
		}
		}
}
?>