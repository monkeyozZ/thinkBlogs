<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
/**
 * 后台首页控制器
 */
class UserController extends BaseController{


    /**
     * 管理员列表
     */
    public function index(){
        $data=D('AuthGroupAccess')->getAllData();
        $assign=array(
            'list'=>$data
        );
        $this->assign($assign);
        $this->display();
    }
    /**
     * 添加管理员
     */
    public function insert()
    {
        $user = M('users');
        if(IS_AJAX){
            if(IS_POST){
                $username = I('post.username');
                $res = $user->where(array('username'=>$username))->select();
                if($res != null){
                    $this->ajaxReturn(false);
                }else{
                    $this->ajaxReturn(true);
                }
            }
        }else{
            if(IS_POST){
                $data = I('post.');
                $data['password'] = md5($data['password']);
                $data['register_time'] = time();
                $res = D('Users')->addData($data);
                if($res){
                    if (!empty($data['group_id'])) {
                        foreach ($data['group_id'] as $k => $v) {
                            $group=array(
                                'uid'=>$res,
                                'group_id'=>$v
                            );
                            D('AuthGroupAccess')->addData($group);
                        }
                    }
                    // 操作成功
                    $this->success('用户添加成功',U('User/index'));die;
                }else{
                    $error_word=D('Users')->getError();
                    // 操作失败
                    $this->error($error_word);
                }
            }else{
                $group_arr=D('AuthGroup')->select();
                $assign=array(
                    'role_list'=>$group_arr
                );
            }
        }
        $this->assign($assign);
        $this->display();
    }

    /**
     * 修改管理员
     */
    public function update(){
        if(IS_POST){
            //验证用户名是否重复
            if(IS_AJAX){
                $user = M('users');
                $username = I('post.username');
                $id =I('post.id');
                $user_info=M('Users')->find($id);
                //p($user_info);die;
                //$res = $user->where(array('username'=>$username))->select();
                if($user_info['username'] == $username){
                    $this->ajaxReturn(true);
                }else{
                    $res = $user->where(array('username'=>$username))->select();
                    if($res!= null){
                        $this->ajaxReturn(false);
                    }else{
                        $this->ajaxReturn(true);
                    }
                }
            }


            $data=I('post.');
            unset($data['password1']);
            // 组合where数组条件
            $uid=I('get.id');
            //p($uid);die;
            $map=array(
                'id'=>$uid
            );
            // 修改权限
            $role_del = D('AuthGroupAccess')->deleteData(array('uid'=>$uid));
            foreach ($data['group_id'] as $k => $v) {
                $group=array(
                    'uid'=>$uid,
                    'group_id'=>$v
                );
                $role_add = D('AuthGroupAccess')->addData($group);
            }
            //$data=array_filter($data);
            //p($data);die;
            // 如果修改密码则md5
            if (!empty($data['password'])) {
                $data['password']=md5($data['password']);
            }else{
                unset($data['password']);
            }
            //p($data);die;
            $result=D('Users')->editData($map,$data);
            if($result){
                // 操作成功
                $this->success('修改用户成功',U('User/index'));die;
            }else{
                $error_word=D('Users')->getError();
                if (empty($error_word)) {
                    $this->success('修改用户成功',U('User/index'));die;
                }else{
                    // 操作失败
                    $this->error($error_word);
                }

            }

        }else{
            $id=I('get.id');
            // 获取用户数据
            $user_data=M('Users')->find($id);
            //p($user_data);die;
            // 获取已加入用户组
            $group_data=M('AuthGroupAccess')
                ->where(array('uid'=>$id))
                ->getField('group_id',true);
            //p($group_data);die;
            // 全部用户组
            $data=D('AuthGroup')->select();
            $assign=array(
                'data'=>$data,
                'user_data'=>$user_data,
                'group_data'=>$group_data
            );
            $this->assign($assign);
            $this->display();
        }
    }

    /**
     * 删除管理员
     */

    public function delete()
    {
        $id = I('get.id');
        $res = D('AuthGroupAccess')->deleteData(array('uid'=>$id));
        $res_2 = D('Users')->deleteData(array('id'=>$id));
        if($res&&$res_2){
            $this->success('用户删除成功',U('User/index'));die;
        }else{
            $this->error('用户删除失败');
        }

    }




}
