<?php if (!defined('THINK_PATH')) exit();?><h2>权限配置</h2>
<h2>节点列表</h2>
<form action="<?php echo U('Admin/Rbac/setAccess');?>">
    <div id="nodelist">
        <a href="<?php echo U('Admin/Rbac/role');?>" onclick="return false;" class="add-app">返回</a>
        <?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
                <p>
                    <strong><?php echo ($app["title"]); ?></strong>
                    <input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" data-level='1' <?php if($app["access"]): ?>checked="checked"<?php endif; ?>>
                </p>
                <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
                        <dt>
                            <strong><?php echo ($action["title"]); ?></strong>
                            <input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_2" data-level='2' <?php if($action["access"]): ?>checked="checked"<?php endif; ?>>
                        </dt>
                        <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
                                <span><?php echo ($method["title"]); ?></span>
                                <input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" data-level='3' <?php if($method["access"]): ?>checked="checked"<?php endif; ?>>
                            </dd><?php endforeach; endif; ?>
                    </dl><?php endforeach; endif; ?>
            </div><?php endforeach; endif; ?>
    </div>
    <input type="hidden" value="<?php echo ($rid); ?>" name="rid">
    <input type="submit" value="保存修改" onclick="return false;" id="access">
</form>
<style>
#nodelist {
    width: 94%;
    height: auto;
    overflow: hidden;
    margin: 20px auto;
    padding: 10px 20px;
    border: 1px solid #ccc;
}

#nodelist .add-app {
    display: block;
    width: 100px;
    height: 28px;
    line-height: 28px;
    text-align: center;
    background: #670768;
    color: #fff;
    border-radius: 4px;
}

#nodelist .app {
    padding: 10px;
    margin-top: 20px;
    border: 1px solid #f6f6f6;
    border-radius: 4px;
}

#nodelis .app p {
    height: 30px;
    line-height: 30px;
}

#wrap .app p strong {
    font-size: 20px;
    color: #06b998;
}

#nodelist .app dl {
    margin: 10px 0;
    border: 1px solid #dcdcdc;
    height: auto;
    overflow: hidden;
}

#nodelist .app dl dt {
    display: 36px;
    line-height: 36px;
    background: #e6e6fe;
}

#nodelist .app dl dd {
    padding: 10px;
    float: left;
}
</style>