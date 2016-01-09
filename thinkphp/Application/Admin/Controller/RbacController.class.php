<?php

namespace Admin\Controller;
use Think\Controller;
use Think\Model\User;

Class RbacController extends CommonController {
	//用户列表
	Public function userAction() {
		
		//echo D('User')->relation(true)->select();
		$result = D('User')->field('password', true)->relation(true)->select();
		$this->assign('user', $result);
		$this->display();
	}
	//添加用户
	public function addUserAction() {
		$role = M('role')->select();
		$this->assign('role', $role);
		$this->display();
	}

	//添加用户表单表单处理
	public function addUserHandleAction() {
		$user = array(
				'username' => I('username'),
				'password' => I('password'),
				'logintime' => time(),
				'loginip' => get_client_ip()
			);
		if($uid = M('user')->add($user)){
			foreach ($_POST['role_id'] as $v) {
				$role[] = array(
						'role_id' => $v,
						'user_id' => $uid
					);
			}
			M('role_user')->addAll($role);
			$this->ajaxReturn(array('msg' => true));
		} else {
			$this->ajaxReturn(array('msg' => null));
		}
	}
	//角色列表
	Public function roleAction () {
		$role = M('role')->select();
		$this->assign('role', $role);
		$this->display();
	}
	//添加角色
	Public function addRoleAction () {
		$this->display();
	}
	//角色表单处理
	Public function addRoleHandleAction() {
		if(empty(I('post.name')) && empty(I('post.remark'))){
			$this->ajaxReturn(array('msg' => null), 'json');
			return;
		}
		if(M('role')->add($_POST)) {
			$this->ajaxReturn(array('msg' => true), 'json', 1);
		}
	}
	//节点列表
	Public function nodeAction () {
		//读取需要的字段
		$field = array('id', 'name', 'title', 'pid');
		$node = M('node')->field($field)->order('sort')->select();
		$this->assign('node', node_merge($node));
		$this->display();
	}
	//添加节点
	Public function addNodeAction() {
		if(!IS_AJAX){
			//直接访问这个页面？？
		}
		$pid = I('pid', 0, 'intval');
		$level = I('level', 1, 'intval');
		switch ($level) {
			case 1:
				$this->assign('type', '应用');
				break;
			
			case 2:
				$this->assign('type', '控制器');
				break;
			case 3:
				$this->assign('type', '方法');
				break;
			default:
				$this->assign('type', '应用');
				break;
		}
		$this->assign('pid', $pid);
		$this->assign('level', $level);
		$this->display();
	}
	Public function addNodeHandleAction() {
		if(empty(I('post.name')) && empty(I('post.title'))){
			$this->ajaxReturn(array('msg' => null), 'json');
			return;
		}
		if(M('node')->add($_POST)) {
			$this->ajaxReturn(array('msg' => true), 'json', 1);
		}else {
			$this->ajaxReturn(array('msg' => null), 'json');
		}
	}
	/**
	 * 修改节点方法
	 */
	Public function alterAction() {
		if(!IS_AJAX){
			return;
		}
		$id = I('id', '','intval');
		$field = array('id', 'name', 'title', 'level');
		$node = M('node')->where(array('id' => $id))->field($field)->select();
		$node = $node[0];
		switch (intval($node['level'])) {
			case 1:
				$level = '模块名';
				$this->assign('level', $level);
				break;
			case 2:
				$level = '控制器名';
				$this->assign('level', $level);
				break;
			case 3:
				$level = '方法名';
				$this->assign('level', $level);
				break;
			default:
				$level = '模块名';
				$this->assign('level', $level);
				break;
		}
		$this->assign('node', $node);
		$this->display();
	}
	Public function deleteNodeAction() {
		if(!IS_AJAX){
			return;
		}
		$id = I('id', '', 'intval');
		$db = M('node');
		//$true = M('node')->where(array('id' => $id))->delete();
		//取出返回的node->id;若删除此节点则删除此节点下的所有子节点==>递归。。。
		$node = $db->where(array('id' => $id))->select();
		$true =  _deleteNode($node, $db);
		//echo $true;die;
		if($true){
			redirect(U('Admin/Rbac/Node'));
			die;
		}else{
			$this->error();
		}
	}
	/**
	 * 配置权限
	 */
	Public function accessAction() {
		if(!IS_AJAX){
			//非ajax
		}
		$rid = I('rid', 0, 'intval');
		$field = array('id', 'name', 'title', 'pid');
		$node = M('node')->order('sort')->field($field)->select();
		//;
		//读取原有权限
		$access = M('access')->where(array('role_id' => $rid))->getField('node_id', true);
		$node = node_merge($node, $access);
		$this->assign('rid', $rid);
		$this->assign('node', $node);
		$this->display();
	}
	/**
	 * 保存权限
	 */
	Public function setAccessAction() {
		if(!IS_AJAX){

		}
		$rid = I('rid', 0, 'intval');
		$db = M('access');
		$db->where(array('role_id' => $rid))->delete();
		//F('access', $_POST, './Application/temp/');
		foreach ($_POST['access'] as $v) {
			$tmp = explode('_', $v);
			$data[] = array(
					'role_id' => $rid,
					'node_id' => $tmp[0],
					'level' => $tmp[1]
				);
		}

		if($db->addAll($data)){
			$this->ajaxReturn(array('msg' => true), 'json', 1);
		}else{
			$this->ajaxReturn(array('msg' => null), 'json', 1);
		}
	}
}