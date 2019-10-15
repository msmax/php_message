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
  <li class="active">导航管理</li>
</ol>
<table class="table">
  <tbody>
    <tr class="active">
      <td width="23%">导航名称</td>
      <td width="23%">导航链接</td>
      <td width="54%">操作</td>
    </tr>
    
    <form action="do.php?act=addnav" method="post">
    <tr>
	 <td>
      <input type="text" name="navname" class="form-control" >
	</td>     
	<td>
      <input type="text" name="navurl" class="form-control">
      </td>
      <td>
        <input type="submit" class="btn btn-success" value="添加导航">
      </td>
      </form>
    </tr>
    <?php	
    $sql="select * from dw_nav";
	$rows=fetchAll($sql);
	if(!$rows){
	echo "暂时还没有文章，请<a href='add_class.php'>添加分类</a>";
	exit;
}
	foreach($rows as $row):	?>
    
    <form method="post" action="do.php?act=editnav&id=<?php echo $row['navid'];?>">
         <tr>
      <td>
      <input type="text" name="navname" class="form-control" value="<?php echo $row['navname'];?>"></td>
      <td>
      <input type="text" name="navurl" class="form-control" value="<?php echo $row['navurl'];?>">
      </td>
      <td>
        <input type="submit" class="btn btn-success" value="修改">
              <a href="do.php?id=<?php echo $row['navid'];?>&act=delnav" onclick="{if(confirm('确定要删除吗?')){return true;}return false;}" class="btn btn-danger">删除</a>
      </td>
    </tr>  
  </form>
  <?php endforeach?>
  

  </tbody>
</table>
</body>
</html>
