<?php require_once '../include.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>添加文章分类</title>
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<base target="main" />
</head>
<body>
<?php
require_once 'session.php';
?>
<ol class="breadcrumb">
  <li><a href="#">后台主页</a></li>
  <li class="active">网站配置</li>
</ol>
<?php
$sql="select * from dw_config";
$rows=fetchAll($sql);
foreach($rows as $row):
?>
<?php
 $act=$_GET['act'];
 $id=$_GET['id'];
 if($act=="edit"){	
	 webconfig("webid=".$row['webid']);
	 }
?>
<form method="post" action="?act=edit&id=<?php echo $row['webid'];?>">
<table width="90%"  class="table">
  <tbody>
    <tr>
      <td width="15%" align="right"><span class="form-group">
        <label>网站标题：</label>
      </span></td>
      <td width="85%"><span class="form-group">
        <input type="text" class="form-control" name="webtitle" value="<?php echo $row['webtitle'];?>">
      </span></td>
    </tr>
    <tr>
      <td align="right"><span class="form-group">
        <label>网站关键字：</label>
      </span></td>
      <td><span class="form-group">
        <input type="text" class="form-control" name="webkeywords" value="<?php echo $row['webkeywords'];?>">
      </span></td>
    </tr>
    <tr>
      <td align="right"><span class="form-group">
        <label>网站简介：</label>
      </span></td>
      <td><textarea name="webdesc" id="textarea" class="form-control" ><?php echo $row['webdesc'];?></textarea></td>
    </tr>
    <tr>
      <td align="right"><span class="form-group">
        <label>网站底部版权信息：</label>
      </span></td>
      <td><textarea name="webfoot" id="textarea" class="form-control" ><?php echo $row['webfoot'];?></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button type="submit" class="btn btn-danger">修改网站配置</button></td>
    </tr>
  </tbody>
</table>
</form>
<?php endforeach?>

</body>
</html>
