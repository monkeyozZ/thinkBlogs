<?php
namespace Common\Controller;
use Think\Controller;
class BaseController extends Controller {
	public function __construct(){
		parent::__construct();
		$auth=new \Think\Auth();
		$rule_name=MODULE_NAME.'/'.CONTROLLER_NAME.'/'.ACTION_NAME;
		$result=$auth->check($rule_name,$_SESSION['userinfo']['level']);
		if(!$result){
			$this->error('您没有权限访问',U('login/login'));
		}
		//同步用户名
		$name = session("info.username");
		$this->assign("username",$name);

		// 分配菜单数据
		$nav_data=D('Nav')->getTreeData('level','order_number,id');
		//p($nav_data);die;
		$assign=array(
			'nav_data'=>$nav_data,
            'url'=>$rule_name
			);
		$this->assign($assign);
	}
}