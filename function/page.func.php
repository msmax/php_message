<?php 
function showPage($url,$flag,$page,$totalPage,$where=null,$sep=""){
	$where=($where==null)?null:"&".$where;
	//$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
	$index = ($page == 1) ? " <li><a>首页</a></li>" : "<li><a href='{$url}{$flag}page=1{$where}'>首页</a></li>";
	$last = ($page == $totalPage) ? "<li><a>尾页</a></li>" : "<li><a href='{$url}{$flag}page={$totalPage}{$where}'>尾页</a</li>";
	$prevPage=($page>=1)?$page-1:1;
	$nextPage=($Page>=$totalPage)?$totalPage:$page+1;
	$prev = ($page == 1) ? "<li><a>上一页</a></li>" : "<li><a href='{$url}{$flag}page={$prevPage}{$where}'>上一页</a></li>";
	$next = ($page == $totalPage) ? "<li><a>下一页</a></li>" : "<li><a href='{$url}{$flag}page={$nextPage}{$where}'>下一页</a></li>";
	$str = "<li><a>总共&nbsp;<b>{$totalPage}</b>&nbsp;页当前是第&nbsp;<b>{$page}</b>&nbsp;页</a></li>";
	for($i = 1; $i <= $totalPage; $i ++) {
		//当前页无连接
		if ($page == $i) {
			$p .= "<li><a>{$i}</a></li>";
		} else {
			$p .= "<li><a href='{$url}{$flag}page={$i}{$where}'>{$i}</a></li>";
		}
	}
 	$pageStr=$p.$sep;
	//$pageStr=$str.$sep . $index .$sep. $prev.$sep . $p.$sep . $next.$sep . $last;
 	return $pageStr;
}
