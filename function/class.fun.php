<?php
//添加分类操作
function addclass(){
	$arr=$_POST;
	if(insert("dw_class",$arr)){
		echo "添加成功，你可以<a href='add_class.html'>继续添加</a>|<a href='class.php'>查看分类</a";
		}
		else{
		echo "添加失败<a href='class.php'>查看分类</a";
		}
		//return $mes;
	}
	
//得到一条记录
function getCateById($id){
	$sql="select classid,classname from dw_class where id={$id}";
	return fetchOne($sql);
}	

//编辑分类
function editclass($where){
	$arr=$_POST;
	if(update("dw_class",$arr,$where)){
		echo "修改成功，<a href='class.php'>查看分类</a>";
		//print_r($arr);
		}
	else
	{
		echo "修改失败！";
		}
	}

//删除分类
	
	function delclass($id){
		$res=checkArticleExist($id);		
		if(!$res){
			$where="classid=".$id;
			if(delete("dw_class",$where)){
				echo $sql;
				echo "删除成功！请<a href='class.php'>返回分类</a>";				
				}
			else{
				echo "删除失败！请<a href='class.php'>返回重新操作</a>";	
				}
			}
		else{
			echo "此分类下还有文章，请<a href='class.php'>返回</a>重新操作！";
			}
		}
?>


