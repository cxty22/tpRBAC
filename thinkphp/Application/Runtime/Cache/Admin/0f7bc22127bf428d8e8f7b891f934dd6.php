<?php if (!defined('THINK_PATH')) exit();?><h2>添加节点</h2>
<form action="<?php echo U('Admin/Rbac/addNodeHandle');?>" method="post">
	<table class="table">
		<tr>
			<th colspan="2">添加节点</th>
		</tr>
		<tr>
			<td><?php echo ($type); ?>:</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td><?php echo ($type); ?>描述:</td>
			<td>
				<input type="text" name="title">
			</td>
		</tr>
		<tr>
			<td>是否开启:</td>
			<td>
				<input type="radio" name="status" value="1" checked="checked">&nbsp;开启&nbsp;
				<input type="radio" name="status" value="0">&nbsp;关闭
			</td>
		</tr>
		<tr>
			<td>排序</td>
			<td>
				<input type="text" name="sort" value="1">
			</td>
		</tr>
		<tr>
			<td colspan="2" >
				<input type="hidden" name="pid" value="<?php echo ($pid); ?>">
				<input type="hidden" name="level" value="<?php echo ($level); ?>">
				<input type="submit" value="保存添加" style="width:100px;" id="addNode" onclick="return false;">
			</td>
		</tr>
	</table>
</form>