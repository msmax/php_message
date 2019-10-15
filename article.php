<?php require_once 'include.php'; 
$sql="select * from dw_article where articleid=".inject_check($_GET['id']);
$rows=fetchOne($sql);
$web_sql="select * from dw_config";
$web_config=fetchOne($web_sql);
//print_r($web_config);
//echo $key."=>".$value; [$web_config][$webtitle];
//foreach($web_configs as $web_config):
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $rows['title'];?></title></title>
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
     <a class="navbar-brand" href="index.php">首页</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php	
    $class_sql="select * from dw_nav";
	$class=fetchAll($class_sql);
	if(!$class){
	echo "暂时还没有导航";
	//exit;
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
    	<div class="panel panel-default">
          <div class="panel-heading"><h4><?php echo $rows['title'];?></h4>
          <small>发布时间<?php echo $rows['subdate'];?></small></div>
          <div class="panel-body">
         <?php
		  //echo $row['titlepic'];
          if($rows['titlepic']!=null){
			  echo "<p><img src='uploads/".$rows['titlepic']."' class='img-responsive' /></p>";
			  }
		  ?>         
        
         <?php echo $rows['content'];?>
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
  <a href="list_class.php?classid=<?php echo $cla['classid'];?>" class="list-group-item"><?php echo $cla['classname'];?></a>
  <?php endforeach?>
</div>
    </div>
</div>
<footer class="jumbotron"><?php echo $web_config['webfoot'];?></footer>
</div>
</body>
</html>
