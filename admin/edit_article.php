
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>修改文章</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script type="text/javascript" charset="utf-8" src="../baidu_editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../baidu_editor/ueditor.all.min.js"> </script>
</head>
<body>
<?php
require_once '../include.php';
error_reporting(E_ALL^E_NOTICE);
$act=$_GET['act'];
$id=$_GET['id'];
//$row=getCateById($id);
$sql="select * from dw_article where articleid=".$id.";";
$row_ar=fetchOne($sql);
//$query=mysql_query($sql);
//$row=mysql_fetch_array($query);
?>
<?php
require_once 'session.php';
?>
<ol class="breadcrumb">
  <li><a href="#">后台主页</a></li>
  <li><a href="#">文章管理</a></li>
  <li class="active">发布文章</li>
</ol>
<form method="post" action="do.php?id=<?php echo $id;?>&act=editarticle" enctype="multipart/form-data">
<table width="90%" class="table table-hover">
    <tr>
      <td width="9%" align="right">
    <h5>标题：</h5> 
      </td>
      <td width="48%">
      <input type="text" name="title" id="title" value="<?php echo $row_ar['title'];?>" class="form-control"></td>
      <td width="11%" align="right" valign="middle"><h5>文章分类：</h5></td>
      <td width="32%" align="left">
        <select name="classname" id="classname" class="form-control">
        <option value="<?php echo $row_ar['classname'];?>" selected><?php echo $row_ar['classname'];?></option>
 <?php	
 	require_once("../include.php");
    $sql="select classid,classname,classtitle,classdesc from dw_class order by classid desc";
	$rows=fetchAll($sql);
	if(!$rows){
	//echo "<option value=''> </option>";
	exit;
}
	
?>
<?php	
	foreach($rows as $row):  ?>  		
		<option value="<?php echo $row['classname'];?>"><?php echo $row['classname'];?></option>		 
<?php endforeach ?>
        </select>
        <?php //echo $ar_row['classname'];?>
      </td>
    </tr>
    <tr>
      <td align="right"><h5>关键字:</h5></td>
      <td colspan="3">     
       <input type="text" name="keywords" id="keywords" value="<?php echo $row_ar['keywords'];?>" class="form-control" >
       </td>
    </tr>
    <tr>
      <td align="right"><h5>文章摘要：</h5></td>
      <td colspan="3">
      <textarea name="ar_desc" id="textarea" class="form-control"><?php echo $row_ar['ar_desc'];?>
      </textarea></td>
    </tr>
    <tr>
      <td align="right"><h5>文章图片：</h5></td>
      <td colspan="3">
		 <input type="file" id="titlepic" name="titlepic">    
        <input type="hidden" value="<?php echo $row_ar['titlepic']?>" name="titlepic" />
         <?PHP
		 $_SESSION['titlepic']=$row_ar['titlepic'];
         if($_SESSION['titlepic']!=null){
			//$_SESSION['titlepic']=$row_ar['titlepic'];
		 	echo   "<img src="."../uploads/".$row_ar['titlepic']." withd='200' height='140' />";
		 }
		 else{
			 $_SESSION['titlepic']=null;
			}
		 ?>
	  </td>
    </tr>


    <tr>
      <td align="right"><h5>文章内容：</h5></td>
      <td colspan="3">
        <script id="editor" name="content" type="text/plain" style="width:99%;height:300px;"><?php echo $row_ar['content'];?>
        </script>
        <script>
            var ue = UE.getEditor('editor');
            </script>
            </td>
    </tr>

    <tr>
      <td colspan="4" align="center" valign="middle">
      <input type="submit"  id="submit" value="文章编辑好了" class="btn btn-danger"></td>
    </tr>
</form>
</table>
</body>
</html>
