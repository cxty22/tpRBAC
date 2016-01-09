<?php

/**
 * 发布表情替换
 * @param [type] $content [description]
 * @return [type] 		  [description]
 */
function replace_phiz ($content) {
	preg_match_all('/\[.*?\]/is', $content, $arr);

	if($arr[0]) {
		$phiz = F('phiz', '', './Application/Common/Common/');
		foreach ($arr[0] as $v) {
			foreach ($phiz as $key => $value) {
				if($v == '['.$value.']'){
					$content = str_replace($v, '<img src="'. __ROOT__.'/Public/Images/phiz/'.$key.'.gif"/>', $content);
					break;
				}
			}
		}
	}
	return $content;
}
/**
 * 递归重组节点信息为多维数组
 * @param [type] $node [要处理的节点数组]
 * @param integet $id [父id]当一个节点的a的pid = s节点的id时 说明a节点是s节点的子节点
 * @param [type] [description]
 */
function node_merge($node, $access = null, $id = 0) {
	$arr = array();
	foreach ($node as $v) {
		if(is_array($access)){
			$v['access'] = in_array($v['id'], $access) ? 1 : 0;
		}

		if($v['pid'] == $id) {
			$v['child'] = node_merge($node, $access, $v['id']);
			$arr[] = $v;
		}
	}
	return $arr;
}
/**
 * 删除节点与此节点的所有子节点
 * 并删除赋予此节点的所有权限
 */
function _deleteNode($node, $db){
	//循环找出$node['id']的所有pid节点 条件 pid = id
	foreach ($node as $v) {
		$childNode = $db->where(array('pid' => $v['id']))->select();
		if($childNode){
			_deleteNode($childNode, $db);
		}
		$db->where(array('id' => $v['id']))->delete();
		if(M('access')->where(array('node_id' => $v['id']))->select()){
			M('access')->where(array('node_id' => $v['id']))->delete();
		}
	}
	return true;
}
