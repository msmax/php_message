<?php 
 error_reporting(E_ALL^E_NOTICE);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>DaWangBlog后台管理系统</title>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<base target="main" />
</head>
<body>
<?php
require_once 'session.php';
?>
<div class="page-header">
  <h1>DaWangBlog v1.0 <small>一款简单易上手的博客系统</small></h1>
</div>
    <div class="row">
    <div class="col-lg-2">
    
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        	<div class="panel panel-default">
          	<a href="index.php" target="_top"><div class="list-group-item active">后台首页</div></a>
            <div class="list-group-item">
           [<?php echo $_SESSION['username'];?>]已登录&nbsp;<a href="logout.php">退出</a>
            <h5><a href="../index.php" target="_blank">查看首页</a></h5>
            </div>
          </div>
            <!--模块-->
          <div class="panel panel-default">
         <a class="list-group list-group-item active"   role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne"> 文章管理</a>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
             
              <div class="list-group">   
              <a href="class.php" class="list-group-item">栏目管理</a>
              <a href="add_article.php" class="list-group-item">发布文章</a>
              <a href="list_article.php" class="list-group-item">文章列表</a>        
            </div>
             
            </div>
          </div>
          <!--模块-->
          <div class="panel panel-default">
          <a class="list-group list-group-item active"   role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"> 网站管理</a>
            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
            
              <div class="list-group">   
              <a href="web_config.php" class="list-group-item">网站配置</a>
              <a href="nav_config.php" class="list-group-item">导航管理</a> 
               <a href="users.php" class="list-group-item">网站管理员</a>         
            </div>
            
            </div>
          </div>
          <!--模块-->
          <!--版本信息-->
          <div class="panel panel-default">
          	<div class="list-group-item active">版本信息</div>
            <div class="list-group-item">
            DaWangBlog v1.0
            </div>
          </div>
        </div>
        </div>
    
    	<div class="col-lg-10">
			<iframe name="main" src="info.php" scrolling="yes" frameborder="0" width="100%"  height="1000" ></iframe> 
       		
        </div>
    </div>
</body>
</html>
