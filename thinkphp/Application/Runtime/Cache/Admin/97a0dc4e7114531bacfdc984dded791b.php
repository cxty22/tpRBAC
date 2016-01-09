<?php if (!defined('THINK_PATH')) exit();?><h3>修改节点方法</h3>
<style>
.ret {
    font-size: 20px;
}
</style>
<a href="<?php echo U('Admin/Rbac/Node');?>" onclick="return false;" class="ret">返回上一级</a>
<form action="<?php echo U('Admin/Rbac/alterHandle');?>">
    <table class="table">
        <tr>
        	<td><?php echo ($level); ?>:</td>
        	<td><input type="text" value="<?php echo ($node["name"]); ?>" title="name"></td>
        </tr>
        <tr>
        	<td><?php echo ($level); ?>描述:</td>
        	<td><input type="text" value="<?php echo ($node["title"]); ?>" name="title"></td>
        </tr>
        <tr>
        	<td colspan="2">
        		<input type="hidden" value="<?php echo ($node["id"]); ?>" name="id">
        		<input type="submit" value="保存修改" onclick="return false;" id="alter">
        	</td>
        </tr>
    </table>
</form>