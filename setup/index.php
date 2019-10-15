<?php
$lockfile = "../config/config.php"; 
if (file_exists($lockfile)) {
header("Content-type: text/html; charset=utf-8");
	echo "<div style='width:500px;margin:0 auto; padding:30px; color:red;'>你已经安装过了！要重装请删除config目录下的config.php文件</div>";
    exit();
}
?>
<!doctype html>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>DaWangBlog系统安装界面</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
<link rel="stylesheet" href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
<body>

<table width="500"  align="center">
  <tbody>
  <tr>
  <td>
  <h3>DaWangBlog安装界面</h3>
  </td>
  </tr>
    <tr>
      <td><form action="action.php" method="post">
                <div class="form-group">
                    <label>主机地址</label>
                    <input name="localhost" type="text" class="form-control span12" id="localhost">
                </div>
                <div class="form-group">
                    <label>数据库登录用户名</label>
                    <input name="rootname" type="text" class="form-control span12" id="rootname">
                </div>
                <div class="form-group">
                    <label>数据库登密码</label>
                    <input name="rootpass" type="text" class="form-control span12" id="rootpass">
                </div>
                <div class="form-group">
                    <label>数据库名称</label>
                    <input name="mysqlname" type="text" class="form-control span12" id="mysqlname">
                </div>
    <div class="form-group">
            <input type="submit" class="btn btn-primary pull-right" value="开始安装"></a>
         
                </div>
                    <div class="clearfix"></div>
            </form></td>
    </tr>
  </tbody>
</table>


  
</body>
</html>
