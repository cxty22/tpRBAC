<?php if (!defined('THINK_PATH')) exit();?><h1>用户列表</h1>
<table class="table">
	<tr>
		<th>ID</th>
		<th>角色名称</th>
		<th>角色描述</th>
		<th>开启状态</th>
		<th>操作</th>
	</tr>
	<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			<td><?php echo ($v["remark"]); ?></td>
			<td>
				<?php if($v["status"]): ?>开启
				<?php else: ?>
					关闭<?php endif; ?>
			</td>
			<td>
				<a href="<?php echo U('Admin/Rbac/access', array('rid' => $v['id']));?>" onclick="return false;">配置权限</a>
			</td>
		</tr><?php endforeach; endif; ?>
</table>