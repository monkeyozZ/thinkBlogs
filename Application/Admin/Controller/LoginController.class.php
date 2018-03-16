<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function login(){
    	// 登录检测
    	$islogin = check_login();
		if($islogin) {
		$this->success('欢迎回来',U('index/index'));die;
		}

		$user_info_str = cookie('userinfo');
		$user_info_arr = json_decode($user_info_str,true);
		//p($user_info_arr);die;

    	if(IS_AJAX){
    		if(IS_POST){
    			$username = I('post.username');
    			$password = I('post.password');
    			$remember = I('post.remember');
    			//p($_POST);die;
    			$user = M('users');
    			$msgarr = [];
    			$data = $user->where(array('username'=>$username))->find();
    			if($data){
    				if($data['password'] == md5($password)){
    					$info = array(
    						'username'=>$data['username'],
    						'password'=>$password,
    						'level'=>$data['id'],
                            'is_remember'=>$remember
    						);
                        $user->where(array('username'=>$username))->save(array('last_login_time'=>time()));
    					if($remember == 1){
    					    cookie('userinfo',json_encode($info),3600*12);
                        }else{
                            cookie('userinfo',null);
                        }
                        session('userinfo',$info);
                        //p($_SESSION);die;
    					$this->success('登录成功',U('index/index'));
    				}else{
    					$msgarr['type'] = '1';
    					$msgarr['msg'] = '您输入的密码有误';
    					$this->ajaxReturn($msgarr);
    				}
    			}else{
    				$msgarr['type'] = '2';
    				$msgarr['msg'] = '用户名不存在';
    				$this->ajaxReturn($msgarr);
    			}
    		}
    	}
    	$this->assign('userinfo',$user_info_arr);
      $this->display();
    }


	public function loginout(){
		session("userinfo",null);
		//$this->redirect("login/login",null,2,"退出登录成功");
		$this->success("退出登录成功",U("login/login"));
	}
}