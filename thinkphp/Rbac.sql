//取得当前用户id号的权限列表
select node.id, node.name from hd_role as role ,hd_role_user as user, hd_access as access, hd_node as node
where user.user_id = 2 
and user.role_id = role.id 
and (access.role_id = role.id or (access.role_id = role.pid and role.pid != 0))
and role.status = 1 
and access.node_id = node.id 
and node.level = 1 
and node.status = 1;

//判断是否存在公共模块的权限--由多个双表关联实现RBAC四表查询
where user.user_id='{$authId}' //查到用户id
and user.role_id=role.id 	  //通过角色用户表id查找从此用户的角色
//通过角色id查找此角色的权限
and( access.role_id=role.id  or (access.role_id=role.pid and role.pid!=0 ) ) 
and role.status=1  //过滤掉角色状态不为1的
and access.node_id=node.id 	//通过权限node_id 查找 对应的此角色的节点权限
and node.level=2 			//node.level必须=2
and node.pid={$appId} 		//节点的pid必须是属于此模块
and node.status=1;			//此节点必须可用

select node.id, node.name from role as role, role_user as  user, access as access, node as node
where user.user_id = 1 and user.user_id = role.id and( access.role_id=role.id  or (access.role_id=role.pid and role.pid!=0 ) ) 
and role.status=1
and access.node_id=node.id
and node.level=2
and node.pid=1
and node.status=1;
//通过模块查方法

select node.id, node.name from role as role, role_user as  user, access as access, node as node
where user.user_id=1 
and user.role_id=role.id 
and ( access.role_id=role.id  or (access.role_id=role.pid and role.pid!=0 ) ) 
and role.status=1 
and access.node_id=node.id 
and node.level=3 
and node.pid=3 
and node.status=1;
//
where user.user_id='{$authId}' 
and user.role_id=role.id 
and ( access.role_id=role.id  or (access.role_id=role.pid and role.pid!=0 ) ) 
and role.status=1 
and access.node_id=node.id 
and node.level=3 
and node.pid={$moduleId} 
and node.status=1";