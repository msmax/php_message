<?php require_once 'include.php'; 
$web_sql="select * from dw_config";
$web_config=fetchOne($web_sql);
$sql="select * from dw_article where classname='".inject_check($_GET['classname'])."' order by articleid desc";
//$rows=fetchAll($sql);
$totalRows=getResultNum($sql);
$page=inject_check($_GET['page'])?(int)inject_check($_GET['page']):1;
$pageSize=6;
$totalPage=ceil($totalRows/$pageSize);
if($page<1||$page==null||!is_numeric($page))$page=1;
if($page>=$totalPage)$page=$totalPage;
$offset=($page-1)*$pageSize;
$sql="select * from dw_article where classname='".inject_check($_GET['classname'])."' order by articleid desc limit {$offset},{$pageSize}";
$rows=fetchAll($sql);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $web_config['webtitle'];?></title>
<meta name="keywords" content="<?php echo $web_config['webkeywords'];?>">
<meta name="description" content="<?php echo $web_config['webdesc'];?>">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
<!-- 这个是页头-->
<?php require_once "head.php";?>
<!--这个是导航-->
<!--这个是导航-->
<nav class="navbar navbar-default" style="margin:3px 0px; padding:0px;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">菜单</span>
        <span class="icon-bar"></span>
 	  <span class="icon-bar"></span>
   	 <span class="icon-bar"></span>
        </button>
     <a href="index.php" class="navbar-brand">首页</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php	
    $class_sql="select * from dw_nav";
	$class=fetchAll($class_sql);
	if(!$class){
	echo "暂时还没有文章";
	exit;
}
	foreach($class as $cla):
	?>
    <li><a href="<?php echo $cla['navurl'];?>"><?php echo $cla['navname'];?></a></li>  

         <?php endforeach?> 
      </ul>        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav> 
<!--这个是巨幕-->
<?php require_once "ad.php";?>
<!--这个是内容-->
<div class="row">
	<div class="col-lg-9">
    <!--这个是面板-->
     <?php	
	if(!$rows){
	echo "暂时还没有文章，请<a href='add_article.php'>添加</a>";
	exit;
}
	foreach($rows as $row):
	?>
 	<div class="col-xs-6 col-lg-4">
    <div class="panel panel-default">
	<div class="panel-body">
	 <a href="article.php?id=<?php echo $row['articleid'];?>">
	<?php
	//echo $row['titlepic'];
    if($row['titlepic']!=null){
		 echo "<p><img src='uploads/".$row['titlepic']."' class='img-responsive' style='width:200px;height:150px;'/></p>";
		 }
	 ?>  
     </a>
 	</div>
  <div class="panel-footer">
  <a href="article.php?id=<?php echo $row['articleid'];?>">
<?php echo $row['title'];?></a>
  </div>
</div>
</div>
        
     <?php endforeach?>   

          <!--这个是分页-->
        <div class="row">
  		<div class="col-xs-12 col-lg-12"> 
       <nav>
         <ul class='pagination'>
        <?php echo showPage("list_class.php?classname=".inject_check($_GET['classname']),"&",$page, $totalPage);?>
        </ul>          
        </nav>
    </div>
    </div>
    </div>
  

    <!--这个分类-->
    <div class="col-lg-3">
    	<div class="list-group">
  <a href="#" class="list-group-item active">
    我的分类
  </a>
   <?php	
    $cla_sql="select * from dw_class";
	$cal_rows=fetchAll($cla_sql);
	if(!$cal_rows){
	echo "暂时还没有文章，请<a href='add_article.php'>添加</a>";
	exit;
}
	foreach($cal_rows as $cla):
	?>
  <a href="list_class.php?classname=<?php echo $cla['classname'];?>" class="list-group-item"><?php echo $cla['classname'];?></a>
  <?php endforeach?>

</div>

    </div>

</div>
<footer style="height:80px; line-height:80px; background-color:#E7E7E7; text-align:center;"><?php echo $web_config['webfoot'];?></footer>
</div>
<?php //endforeach?>
</body>
</html>
