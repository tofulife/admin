/*$(function(){
	$("a.edit").click(function(){
		var $par=$(this).parents('tr');
		$oldstr=$par.html();
		//获取原td的值
		var $val0=$par.children('td:eq(0)').text();
		var $val1=$par.children('td:eq(1)').text();
		var $val2=$par.children('td:eq(2)').text();
		var $val3=$par.children('td:eq(3)').text();
		var $val4=$par.children('td:eq(4)').text();
		var $str1="<td><input type='text' name='title'value=''/></td>";
		var $str2="<td><input type='text' value=''name='describe'/></td>";
		var $str3="<td><input type='text' value=''name='upload_id'/></td>";
		var $str4="<td><input type='text' value=''name='credits'/></td>";
		var $str5="<td><input type='text' value=''name='time'/></td>";
		var $str6="<td><a class='btn btn-primary btn-xs save'name='save'href='#'>保存</a><a class='btn btn-primary btn-xs cancel'href='#'name='cancel'>取消</a></td>";
		var $newStr=$str1+$str2+$str3+$str4+$str5+$str6;
		$par.html($newStr);

		// 给input里的value赋值不用用js变量，不能解析，所以动态有jquery设置他们的初值
		$par.find('input:eq(0)').val($val0);
		$par.find('input:eq(1)').val($val1);
		$par.find('input:eq(2)').val($val2);
		$par.find('input:eq(3)').val($val3);
		$par.find('input:eq(4)').val($val4);
		$(".save").click(function(){
				var $par=$(this).parents('tr');
				var $val0=$par.find('input:eq(0)').val();
				var $val1=$par.find('input:eq(1)').val();
				var $val2=$par.find('input:eq(2)').val();
				var $val3=$par.find('input:eq(3)').val();
				var $val4=$par.find('input:eq(4)').val();
				// alert($val0);
				$par.html($oldstr);
				$par.find('td:eq(0)').text($val0);
				$par.find('td:eq(1)').text($val1);
				$par.find('td:eq(2)').text($val2);
				$par.find('td:eq(3)').text($val3);
				$par.find('td:eq(4)').text($val4);
		})
	})
})*/
//上面的是重写了整个tr导致a绑定的事件不能用，下面的是重写td，一共四个按钮，把不需要的按钮隐藏起来
$(function(){
	$("a.edit").click(function(){
		var $par=$(this).parents('tr');
		$oldstr=$par.html();
		//获取原td的值,作整个函数的全局变量，下面的.cancel的事件要用
		 	$val0=$par.children('td:eq(0)').text();
		 	$val1=$par.children('td:eq(1)').text();
		 	$val2=$par.children('td:eq(2)').text();
			$val3=$par.children('td:eq(3)').text();
		 	$val4=$par.children('td:eq(4)').text();
		 	$id=$par.children('td:eq(5)').text();
		 	//重写每个tr下的td
			var $str1="<td><input type='text' name='title'value=''/></td>";
			var $str2="<td><input type='text' value=''name='describe'/></td>";
			var $str3="<td><input type='text' value=''name='credits'/></td>";
			$par.children('td:eq(0)').html($str1);
			$par.children('td:eq(1)').html($str2);
			$par.children('td:eq(2)').html($str3);

			$par.find('.edit').hide();
			$par.find('.delete').hide();
			$par.find('.save').show();
			$par.find('.cancel').show();
			// 给input里的value赋值不用用js变量，不能解析，所以动态有jquery设置他们的初值
			$par.find('input:eq(0)').val($val0);
			$par.find('input:eq(1)').val($val1);
			$par.find('input:eq(2)').val($val2);
		})

			$(".save").click(function(){
				// alert("0");
				var $type=$(this).attr('name');
				 // alert($type);
				var $par=$(this).parents('tr');
				//获取input里的值
				var $val0=$par.find('input:eq(0)').val();
				var $val1=$par.find('input:eq(1)').val();
				var $val2=$par.find('input:eq(2)').val();
				//重写td，去掉input标签
				$par.children('td:eq(0)').html("<td></td>");
				$par.children('td:eq(1)').html("<td></td>");
				$par.children('td:eq(2)').html("<td></td>");
				//把上面input里的值赋值给td
				$par.find('td:eq(0)').text($val0);
				$par.find('td:eq(1)').text($val1);
				$par.find('td:eq(2)').text($val2);
			
				$par.find('.edit').show();
				$par.find('.delete').show();
				$par.find('.save').hide();
				$par.find('.cancel').hide();
				//ajax 上传 
				// alert("1");
				$.post('resource.action.php',{
					title:$val0,
					describe:$val1,
					credits:$val2,
					id:$id,
					action:$type+".edit",
				}, function(data, textStatus, xhr) {
					/*optional salerttuff to do after success */
					alert("修改成功");
				});
		})
		$(".cancel").click(function(){
				var $par=$(this).parents('tr');
				$par.find('.edit').show();
				$par.find('.delete').show();
				$par.find('.save').hide();
				$par.find('.cancel').hide();
				$par.children('td:eq(0)').html("<td></td>");
				$par.children('td:eq(1)').html("<td></td>");
				$par.children('td:eq(2)').html("<td></td>");
				$par.children('td:eq(3)').html("<td></td>");
				// $par.children('td:eq(4)').html("<td></td>");
				//把.edit里的val获取过来重置td的值
				$par.find('td:eq(0)').text($val0);
				$par.find('td:eq(1)').text($val1);
				$par.find('td:eq(2)').text($val2);
				$par.find('td:eq(3)').text($val3);
				// $par.find('td:eq(4)').text($val4);

		})
})

$(function(){
	$(".yes").click(function(){
		// alert()
		$type=$(this).attr('name');
		$id=$(this).parents("tr").children("td.id").text();
		$(this).parents("tr").remove();
		$("#myModal").hide();
		$(".modal-backdrop ").fadeOut('400');
		$.post('resource.action.php',{
			action:$type+".delete",
			// id:$id
		},	function(){
			alert("删除成功");
		})
	})
})
$(function(){
	$.post('page.class.php', data: 'resource_software', function(data, textStatus, xhr) {
		/*optional stuff to do after success */
	});
})


