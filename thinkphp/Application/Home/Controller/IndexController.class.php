<?php
namespace Home\Controller;
use Think\Controller;
use Home\Common\test;
//use Common\loginVerify;
class IndexController extends Controller {
    public function indexAction(){
        C('TOKEN_ON',false);
        $data = M('wish')->select();
        $this->assign('wish', $data);
    	$this->display();
    }
    public function tajaxAction() {
        if(!IS_AJAX){
            redirect(U('reject'));
        }
        $data = array(
                'username' => I('username'),
                'content' => I('content'),
                'time' => time()
            );
        
        //$phizz = file('./Application/Common/Common/phiz.php');
        $id = M('wish')->data($data)->add();
        $data['id'] = $id;
        $data['content'] = replace_phiz(I('content'));
        if($id){
            echo json_encode($data);//php  ajax返回
            die();
            $this->ajaxReturn($data, 'json');//这个方法出现无法获得的语法错误=>$json_option
        }else{
            $this->ajaxReturn(array('status' => 0), 'json');
        }
    }
    public function rejectAction() {
        $this->display();
    }
    public function saveAction() {
        $phiz = array(
                    zhuakuang => 抓狂,
                    baobao => 抱抱,
                    haixiu => 害羞,
                    ku => 酷,
                    xixi => 嘻嘻,
                    taikaixin => 太开心,
                    touxiao => 偷笑,
                    qian => 钱,
                    huaxin => 花心,
                    jiyan => 挤眼
            );
        /*$str = '<?php return '.var_export($phiz, true).';?>';
        file_put_contents('./Application/Common/Common/phiz.php', $str);
        dump($phiz);*/
        F('phiz', $phiz, './Application/Common/Common/');
    }
    public function testAction() {
        echo C('VAR_PATHINFO')."<BR>";
        echo C('VAR_ADDON')."<BR>";
        echo C('VAR_MODULE');
    }
}