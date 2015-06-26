<?php 
		require_once('../config.php');
		$arr=array("kaoyan"=>"resource_aimgraduate","movie"=>"resource_movie","study"=>"resource_study","software"=>"resource_software");
		//$_POST['action']传上来 类型和操作，第一个是资源的类型，第二个是管理员的操作类型
		$str=explode('.', $_POST['action']);
		$type=$arr[$str['0']];
		

		if($str['1']=="delete"){
			$id=$_POST['id'];
			$sql1= "delete from $type  where id=$id";
			$result1=$pdo->exec($sql1);
			if($result1)
			{
				echo "<script>alert('delete success');window.location.href='../index.php'</script>";
			}
			else{
				echo "<script>alert('sorry,try again')</script>";
			}
		}
		echo $_POST['id'];
		if($str['1']=="edit"){
			$id=$_POST['id'];
			$describe=$_POST['describe'];
			$title=$_POST['title'];
			$credits=$_POST['credits'];
			$sql2="update $type set title='$title' , credits='$credits',`describe`='$describe' where id=$id";
			$result2=$pdo->exec($sql2);
			if($result2)
			{
				echo "<script>alert('edit success');window.location.href='../index.php'</script>";
			}
			else{
				echo "<script>alert('sorry,try again edit')</script>";
			}
		}



 ?>