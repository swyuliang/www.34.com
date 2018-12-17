<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>商品列表 </title>
    <link rel="stylesheet" href="/Public/datepicker/jquery-ui-1.9.2.custom.min.css" type="text/css" />
    <script type="text/javascript" language="JavaScript" src="/Public/datepicker/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="/Public/datepicker/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="/Public/datepicker/datepicker_zh-cn.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

    <script type="text/javascript" language="JavaScript" src="/Public/Admin/Js/tron.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo $_page_btn_link; ?>"><?php echo $_page_btn_name; ?></a></span>
    <span class="action-span1"><a href="__GROUP__">管理中心</a></span>
    <span id="search_id" class="action-span1"> -<?php echo $_page_title; ?> </span>
    <div style="clear:both"></div>
</h1>


<!--代表页面中的内容-->

<!-- 搜索 -->
<div class="form-div search_form_div">
    <form method="GET" name="search_form">
		<p>
			账号：
	   		<input type="text" name="username" size="30" value="<?php echo I('get.username'); ?>" />
		</p>
		<p>
			是否启用：
			<input type="radio" value="-1" name="is_use" <?php if(I('get.is_use', -1) == -1) echo 'checked="checked"'; ?> /> 全部 
			<input type="radio" value="1" name="is_use" <?php if(I('get.is_use', -1) == '1') echo 'checked="checked"'; ?> /> 启用，0 
		</p>
		<p><input type="submit" value=" 搜索 " class="button" /></p>
    </form>
</div>
<!-- 列表 -->
<div class="list-div" id="listDiv">
	<table cellpadding="3" cellspacing="1">
    	<tr>
            <th >账号</th>
            <th >密码</th>
			<th >所在角色</th>
            <th >是否启用</th>
			<th width="60">操作</th>
        </tr>
		<?php foreach ($data as $k => $v): ?>
			<tr class="tron">
				<td><?php echo $v['username']; ?></td>
				<td><?php echo $v['password']; ?></td>
				<td><?php echo $v['role_name'] ?></td>
				<td admin_id="<?php echo ($v["id"]); ?>" class="is_use"><?php echo $v['is_use'] ? '启用' : '禁用' ; ?></td>
		        <td  align="center">
		        		<a href="<?php echo U('edit?id='.$v['id'].'&p='.I('get.p')); ?>" title="编辑">编辑</a>
					<?php if($v['id'] > 1): ?>
	                	<a href="<?php echo U('delete?id='.$v['id'].'&p='.I('get.p')); ?>" onclick="return confirm('确定要删除吗？');" title="移除">移除</a>
		        	<?php endif; ?>
				</td>
	        </tr>
        <?php endforeach; ?> 
		<?php if(preg_match('/\d/', $page)): ?>  
        <tr><td align="right" nowrap="true" colspan="99" height="30"><?php echo $page; ?></td></tr> 
        <?php endif; ?> 
	</table>
</div>
<script>
	//为启用的td加一个事件
	$(".is_use").click(function () {
		//先获取点击的记录id
		var id = $(this).attr("admin_id");
		if(id == 1)
		{
			alert("超级管理员不能修改！");
			return false;
		}
		var _this = $(this);
		$.ajax({
				type : "GET",
			//默认U函数生成的地址是带.html后缀的：/index.php/Admin/Admin/ajaxUpdateIsuse.html/id/3,这样请求这个地址会报错无法请求，所以需要让U生成的地址不要带.html后缀
			//也就是说，如果在AJAX时使用了U函数并且后面还要再传参数就需要设置第三个参数为FALSE不生成。html后缀
				url : "<?php echo U('ajaxUpdateIsuse','',FALSE); ?>/id/"+id,
			success :function (data) {
				if(data == 1)
					_this.html("禁用");
				else
					_this.html("启用");
			}
		});
	});
</script>



<div id="footer">
    共执行 7 个查询，用时 0.028849 秒，Gzip 已禁用，内存占用 3.219 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>