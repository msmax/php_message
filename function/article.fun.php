<?php
function checkArticleExist($id){
	$sql="select * from dw_artcle where articleid=".$id.";";
	$rows=fetchAll($sql);
	return $rows;
	}
	
function addarticle($table,$arr){
	if(insert("dw_article",$arr)){
		echo "添加文章成功，你可以<a href='add_article.php'>继续添加</a>|<a href='list_article.php'>查看文章列表</a";
		}
	else{
		echo "添加失败<a href='list_article.php'>查看文章列表</a";
		}
	}

function delarticle($id){		
		if(!$res){
			$where="articleid=".$id;
			if(delete("dw_article",$where)){
				echo $sql;
				echo "删除文章成功！请<a href='list_article.php'>返回文章列表</a>";				
				}
			else{
				echo "删除文章失败！请<a href='list_article.php'>返回重新操作</a>";	
				}
			}
}

function editarticle($where){
	$arr=$_POST;
	if(update("dw_article",$arr,$where)){
		echo "修改成功，<a href='list_article.php'>查看文章列表</a>";
		//print_r($arr);
		}
	else
	{
		echo "修改失败！";
		}
	}


?>