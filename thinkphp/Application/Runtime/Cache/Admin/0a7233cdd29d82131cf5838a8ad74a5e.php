<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('Admin/Rbac/addRoleHandle');?>" method="post">
    <table class="table">
        <tr>
            <th colspan="2">添加角色</th>
        </tr>
        <tr>
            <td>角色名称:</td>
            <td>
                <input type="text" name="name">
            </td>
        </tr>
        <tr>
            <td>角色描述:</td>
            <td>
                <input type="text" name="remark">
            </td>
        </tr>
        <tr>
            <td>是否开启:</td>
            <td>
                <input type="radio" name="status" value="1" checked="checked"> &nbsp;开启&nbsp;
                <input type="radio" name="status" value="0">&nbsp;关闭
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="提交" style="width:100px;" onclick="return false;" id="addRole">
            </td>
        </tr>
    </table>
</form>