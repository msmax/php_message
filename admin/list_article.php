<?php require_once '../include.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>文章列表</title>
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
  <li><a href="list_article.php">文章管理</a></li>
  <li class="active">文章列表</li>
</ol>
<table class="table table-hover">
  <tbody>
    <tr class="active">
      <td>文章分类</td>
      <td>文章标题</td>
      <td width="11%">发布时间</td>
      <td width="44%">操作</td>
    </tr>
     <?php	
    $sql="select * from dw_article order by articleid desc";
	$totalRows=getResultNum($sql);
	$page=$_GET['page']?(int)$_GET['page']:1;
	$pageSize=5;
	$totalPage=ceil($totalRows/$pageSize);
	if($page<1||$page==null||!is_numeric($page))$page=1;
	if($page>=$totalPage)$page=$totalPage;
	$offset=($page-1)*$pageSize;
	$sql="select * from dw_article order by articleid desc limit {$offset},{$pageSize}";
	$rows=fetchAll($sql);
	if(!$rows){
	echo "暂时还没有文章，请<a href='add_article.php'>添加</a>";
	exit;
}
	foreach($rows as $row):
	?>
    <tr>
      <td width="15%">
      [<b><?php echo $row['classname'];?>]</b>&nbsp;
      </td>
      <td width="30%"><?php echo $row["title"];?></td>
      <td><?php
echo $row['subdate'];
?></td>
      <td>
        <a href='edit_article.php?id=<?php echo $row['articleid'];?>' class="btn btn-info">修改</a>
      <a href="do.php?id=<?php echo $row['articleid'];?>&act=delarticle" onclick="{if(confirm('确定要删除吗?')){return true;}return false;}" class="btn btn-danger">删除</a>
      </td>
    </tr>
    <?php endforeach?>
    <tr>
      <td colspan="3">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
	<nav>
        <ul class='pagination'>
        <?php echo showPage('list_article.php','?',$page, $totalPage);?>
        </ul>          
        </nav>
</body>
</html>