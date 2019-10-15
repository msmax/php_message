<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>添加文章</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
 <script type="text/javascript" charset="utf-8" src="../baidu_editor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../baidu_editor/ueditor.all.min.js"> </script>
</head>
<body>
<?php
require_once 'session.php';
?>
<ol class="breadcrumb">
  <li><a href="#">后台主页</a></li>
  <li><a href="#">文章管理</a></li>
  <li class="active">发布文章</li>
</ol>
<form method="post" action="do.php?act=addarticle" enctype="multipart/form-data">
<table width="90%" class="table table-hover">
    <tr>
      <td width="9%" align="right">
    <h5>标题：</h5> 
      </td>
      <td width="48%">
      <input type="text" name="title" id="title" class="form-control"></td>
      <td width="11%" align="right" valign="middle"><h5>文章分类：</h5></td>
      <td width="32%" align="left">
        <select name="classname" id="classname" class="form-control">
 <?php	
 	require_once("../include.php");
    $sql="select classid,classname,classtitle,classdesc from dw_class order by classid desc";
	$rows=fetchAll($sql);
	if(!$rows){
	echo "<option value=''> </option>";
	exit;
}
	foreach($rows as $row):
	?>
     <option value=<?php  echo $row['classname'] ?>><?php  echo $row['classname'] ?></option>
<?php endforeach ?>
        </select>
      </td>
    </tr>
    <tr>
      <td align="right"><h5>关键字:</h5></td>
      <td colspan="3">     
       <input type="text" name="keywords" id="keywords" class="form-control" >
       </td>
    </tr>
    <tr>
      <td align="right"><h5>文章摘要：</h5></td>
      <td colspan="3">
      <textarea name="ar_desc" id="textarea" class="form-control"></textarea></td>
    </tr>
    <tr>
      <td align="right"><h5>文章图片：</h5></td>
      <td colspan="3">
		 <input type="file" id="titlepic" name="titlepic">
	  </td>
    </tr>


    <tr>
      <td align="right"><h5>文章内容：</h5></td>
      <td colspan="3">
        <script id="editor" name="content" type="text/plain" style="width:99%;height:300px;"></script>
        <script>
            var ue = UE.getEditor('editor');
            </script></td>
    </tr>

    <tr>
      <td colspan="4" align="center" valign="middle">
      <input type="submit" name="submit" id="submit" value="文章已写好 马上发布" class="btn btn-danger"></td>
    </tr>
</form>
</table>
</body>
</html>
