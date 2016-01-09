<?php

namespace Home\Controller;
use Think\Controller;
use Think\Behavior;
use Think\Hook;

class teController extends Controller {
	public function testAction() {
		echo 'I am THINK_PATH->'.THINK_PATH.'<br>';
		echo 'I am APP_PATH->'.APP_PATH.'<br>';
		echo 'I am CONF_PATH->'.CONF_PATH.'<br>';
		echo 'HTTP_HOST->'.$_SERVER['HTTP_HOST'].'<br>';
		echo 'PATH_INFO->'.$_SERVER['PATH_INFO'].'<br>';
		echo 'I am GET->'.$_GET;
		dump($_GET);
	}
	public function hookAction() {
		Hook::add('ad','Behavior\\adBehavior');//添加一个行为钩子 
		$this->display();
	}
	public function showHookAction() {
		dump(Hook::get());
	}
	public function moduleAction() {
		//in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));
		echo C('DB_DSN');
	}
}