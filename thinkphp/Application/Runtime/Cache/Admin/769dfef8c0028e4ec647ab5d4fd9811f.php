<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('Admin/Rbac/addUserHandle');?>">
	<table class="table">
		<tr>
			<th colspan="2">添加用户</th>
		</tr>
		<tr>
			<td align="">用户账户：</td>
			<td>
				<input type="text" name="username">
			</td>
		</tr>
		<tr>
			<td>密码：</td>
			<td>
				<input type="password" name="password">
			</td>
		</tr>
		<tr>
			<td>所属角色</td>
			<td>
				<select name="role_id[]">
					<option value="请选择角色">请选择角色</option>
					<?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v["name"]); ?>(<?php echo ($v["remark"]); ?>)</option><?php endforeach; endif; ?>
				</select>
				<span class="add-role">添加角色</span>
			</td>
		</tr>
		<tr id="last">
			<td colspan="2">
				<input type="submit" value="保存添加" onclick="return false;" id="addUser">
			</td>
		</tr>
	</table>
</form>
<style>
	.add-role {
		display: inline-block;
		width:100px;
		height: 26px;
		text-align: center;
		border:1px solid blue;
		border-radius: 4px;
		margin-left:20px;
		cursor:pointer;
	}
</style>