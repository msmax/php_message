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
  <li><a href="class.php">栏目管理</a></li>
  <li class="active">添加文章分类</li>
</ol>
<form action="do.php?act=addclass" method="post">
<table width="90%"  class="table">
  <tbody>
    <tr>
      <td width="15%"><span class="form-group">
        <label>分类名称：</label>
      </span></td>
      <td width="85%"><span class="form-group">
        <input type="text" class="form-control" name="classname">
      </span></td>
    </tr>
    <tr>
      <td><span class="form-group">
        <label>分类标题：</label>
      </span></td>
      <td><span class="form-group">
        <input type="text" class="form-control" name="classtitle">
      </span></td>
    </tr>
    <tr>
      <td><span class="form-group">
        <label>分类简介：</label>
      </span></td>
      <td><textarea name="classdesc" id="textarea" class="form-control"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><button type="submit" class="btn btn-danger">添加文章分类</button></td>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>
