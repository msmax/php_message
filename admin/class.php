<?php require_once '../include.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>栏目管理</title>
<!-- 新 Bootstrap 核心 CSS 文件 -->
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
  <li class="active"><a href="add_class.php" class="btn btn-primary">添加文章分类</a></li>
</ol>
<div class="table-responsive">
<table class="table">
  <tbody>
    <tr class="active">
      <td>栏目分类</td>
      <td>操作</td>
    </tr>
    <?php	
    $sql="select classid,classname,classtitle,classdesc from dw_class order by classid desc";
	$rows=fetchAll($sql);
	if(!$rows){
	echo "暂时还没有文章，请<a href='add_class.php'>添加分类</a>";
	exit;
}
	foreach($rows as $row):
	?>
    <tr>
      <td><h5><?php echo $row['classname']; ?></h5></td>
      <td>
      <a href='edit_class.php?id=<?php echo $row['classid'];?>&act=edit' class="btn btn-info">修改</a>
      <a href="do.php?id=<?php echo $row['classid'];?>&act=delclass" onclick="{if(confirm('确定要删除吗?')){return true;}return false;}" class="btn btn-danger">删除</a>
      </td>
    </tr>
    <?php endforeach ?>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</div>
</body>
</html>
