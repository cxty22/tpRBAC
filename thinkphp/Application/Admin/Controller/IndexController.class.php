<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Page;
class IndexController extends CommonController {
    public function indexAction(){
    	$this->display();
    }
    public function msgAction(){
    	if(!IS_AJAX){
    		$this->ajaxReturn(array('status' => 0));
    	}
    	$count = M('wish')->count();
    	$page = new CPage($count, 10);
    	$limit = $page->firstRow. ','. $page->listRows;

    	$wish = M('wish')->order('time')->limit($limit)->select();
    	$this->page = $page->show();
    	$this->assign('wish',$wish);
    	$this->display();
    }
}