<?php if (!defined('THINK_PATH')) exit();?><h2>节点列表</h2>
<div id="nodelist">
	<a href="<?php echo U('Admin/Rbac/AddNode');?>" onclick="return false;" class="add-app">添加应用</a>
	<?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
			<p>
				<strong><?php echo ($app["title"]); ?></strong>
				[<a href="<?php echo U('Admin/Rbac/addNode', array('pid' => $app['id'], 'level' => 2));?>" onclick="return false;">添加控制器</a>]
				[<a href="<?php echo U('Admin/Rbac/alter', array('id' => $app['id']));?>" onclick="return false;">修改</a>]
				[<a href="<?php echo U('Admin/Rbac/deleteNode', array('id' => $app['id']));?>" onclick="return false;" data-value="delete">删除</a>]
			</p>

			<?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
					<dt>
						<strong><?php echo ($action["title"]); ?></strong>
						[<a href="<?php echo U('Admin/Rbac/addNode', array('pid' => $action['id'], 'level' => 3));?>" onclick="return false;">添加方法</a>]
						[<a href="<?php echo U('Admin/Rbac/alter', array('id' => $action['id']));?>" onclick="return false;">修改</a>]
						[<a href="<?php echo U('Admin/Rbac/deleteNode', array('id' => $action['id']));?>" onclick="return false;" data-value="delete">删除</a>]
					</dt>
					<?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
							<span><?php echo ($method["title"]); ?></span>
							[<a href="<?php echo U('Admin/Rbac/alter', array('id' => $method['id']));?>" onclick="return false;">修改</a>]
							[<a href="<?php echo U('Admin/Rbac/deleteNode', array('id' => $method['id']));?>" onclick="return false;" data-value="delete">删除</a>]
						</dd><?php endforeach; endif; ?>
				</dl><?php endforeach; endif; ?>
		</div><?php endforeach; endif; ?>
</div>
<style>
	#nodelist{
		width: 94%;
		height: auto;
		overflow: hidden;
		margin: 20px auto;
		padding: 10px 20px;
		border: 1px solid #ccc;
	}
	#nodelist .add-app{
		display: block;
		width: 100px;
		height: 28px;
		line-height: 28px;
		text-align: center;
		background: #670768;
		color: #fff;
		border-radius: 4px;
	}
	#nodelist .app{
		padding:10px;
		margin-top: 20px;
		border:1px solid #f6f6f6;
		border-radius: 4px;
	}
	#nodelis .app p {
		height: 30px;
		line-height: 30px;
	}
	#wrap .app p strong{
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