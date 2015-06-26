<?php 
/*	require_once('../config.php');
	$sql1="select * from resource_software";
	$result1=$pdo->query($sql1);
	if($result1){
		while($row1=$result1->fetch(PDO::FETCH_ASSOC)){
			$data1[]=$row1;
		}
	}*/	
	error_reporting(E_ALL || ~E_NOTICE);
	require_once("page.class.php");
	$page=new page(3,$_GET['nowpage'],"resource_software");//每次显示2行
	$data=$page->showInfo();
	$page->toPage();
/*	echo $page->showNowpage();
	echo $page->showPagecount();*/
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>admin</title>
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<script src="../bootstrap/js/jquery-2.1.1.js"></script>
	<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script src="../js/public.js"></script>
	<link rel="stylesheet" type="text/css" href="../style/style.css">
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" 
         data-target="#example-navbar-collapse">
         <span class="sr-only">切换导航</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">山大资源分享社区</a>
   </div>
   <div class="collapse navbar-collapse" id="example-navbar-collapse">
      <ul class="nav navbar-nav">
         <li><a href="kaoyan.php">考研</a></li>
         <li><a href="dianying.php">电影</a></li>
         <li><a href="jiaocai.php">教材</a></li>
         <li class="active"><a href="#">软件</a></li>
         <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
               Java <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
               <li><a href="#">jmeter</a></li>
               <li><a href="#">EJB</a></li>
               <li><a href="#">Jasper Report</a></li>
               <li class="divider"></li>
               <li><a href="#">分离的链接</a></li>
               <li class="divider"></li>
               <li><a href="#">另一个分离的链接</a></li>
            </ul>
         </li>
      </ul>
   </div>
</nav>

				<h2>软件资源</h2>
	<table class="table table-striped table-bordered table-condensed kaoyan">
				<thead>
					<tr>
						<th>title</th>
						<th>describe</th>
						<th>credits</th>
						<th>upload_id</th>
						<th>time</th>
						<th>operation</th>
					</tr>
				</thead>
				<tbody>
				<?php 
					foreach ($data as $key => $value) {
					
				 ?>
				<tr class="list-users">

					<td class="title"><?php echo $value['title'] ?></td>
					<td><?php echo $value['describe'] ?></td>
					<td class="credits"><?php echo $value['credits'] ?></td>
					<td class="upload_id"><?php echo $value['upload_id'] ?></td>
					<td class="time"><?php echo $value['time'] ?></td>
					<td class="id"><?php echo $value['id'] ?></td>
					<td class="operation">
					<a class="btn btn-primary btn-xs edit"href="#">修改</a>
					<a class="btn btn-primary btn-xs delete" data-toggle="modal" data-target="#myModal"href="#">删除</a>
					<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
					      </div>
					      <div class="modal-body">
					        您确定要删除这条记录吗？
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
					        <button type="button" class="btn btn-primary yes"name="software">确定</button>
					      </div>
					    </div>
					  </div>
					</div>
					<!-- <a class="btn btn-primary btn-xs delete" data-toggle="modal" data-target="#myModal"href="action/kaoyan.php?action=delete&&id=<?php echo $value['id'] ?>">删除</a> -->
					<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
 					 <div class="modal-dialog modal-sm">
   					 <div class="modal-content">
      					您确定要删除这条记录吗？
    					</div>
  						</div>
						</div>
				  

					<a class="btn btn-primary btn-xs save"href="#"name="software">保存</a>
					<a class="btn btn-primary btn-xs cancel"href="#">取消</a>
					</td>
				</tr>
				<?php 
					}
					 ?>
					 <tr>
					 	<td>共有资源 <?php $page->showTotal() ?> 个 </td>
					 	<td>第 <?php echo $page->showNowpage() ?>页------共 <?php echo $page->showPagecount() ?>页</td>
					 	<td><a href=" <?php echo $_SERVER['PHP_SELF'] ?>?nowpage=1">首页</a></td>
					 	<td><a href="<?php echo $_SERVER['PHP_SELF'] ?>?nowpage= <?php if($page->showNowpage() <$page->showPagecount())echo ($page->showNowpage()+1) ;else echo $page->showPagecount()?>">下一页</a>
					 	</td>
					 	<td><a href="<?php echo $_SERVER['PHP_SELF'] ?>
					 	?nowpage= <?php if($page->showNowpage() >1)echo ($page->showNowpage()-1) ?>">上一页</a>
					 	</td>
					 
					 	<td><a href=" <?php echo $_SERVER['PHP_SELF'] ?> ?nowpage=<?php echo $page->showPagecount() ?>">尾页</a></td>

					 </tr>
				</tbody>
	</table>

</body>
</html>