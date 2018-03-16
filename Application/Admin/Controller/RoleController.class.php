<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
/**
 * 后台首页控制器
 */
class RoleController extends BaseController{
    /**
     * 角色组列表
     */
    public function index()
    {
        $data=D('AuthGroup')->select();
        $assign=array(
            'role_list'=>$data
        );
        $this->assign($assign);
        $this->display();

    }

    /**
     * 添加角色并分配权限
     */
    public function insert(){
        if(IS_POST){
            $data=I('post.');
            $data['rules']=implode(',', $data['rule_ids']);
            $result=D('AuthGroup')->addData($data);
            //p($result);die;
            if($result){
                $this->success('角色添加成功',U('Role/index'));die;
            }else{
                $this->error('角色添加失败');
            }
        }else{
            // 获取规则数据
            $rule_data=D('AuthRule')->getTreeData('level','id','title');
            $assign=array(
                'rule_data'=>$rule_data
            );
            $this->assign($assign);
            $this->display();
        }

    }
    /**
     * 修改角色
     */

    public function update(){
        if(IS_POST){
            $data=I('post.');
            $id = I('get.id');
            $map=array(
                'id'=>I('get.id')
            );
            $data['rules']=implode(',', $data['rule_ids']);
            $result=D('AuthGroup')->editData($map,$data);
            //p($result);die;
            if ($result) {
                $this->success('角色修改成功',U('Role/index'));
            }else if($result == 0){
                $this->error('未作任何修改',U('Role/index'));
            }
        }else{
            $id=I('get.id');
            // 获取用户组数据
            $group_data=M('Auth_group')->where(array('id'=>$id))->find();
            $group_data['rules']=explode(',', $group_data['rules']);
            // 获取规则数据
            $rule_data=D('AuthRule')->getTreeData('level','id','title');
            $assign=array(
                'group_data'=>$group_data,
                'rule_data'=>$rule_data
            );
            //p($group_data);die;
            $this->assign($assign);
            $this->display();
        }

    }

    /**
     * 删除角色
     *
     */
    public function delete(){
        $id=I('get.id');
        $map=array(
            'id'=>$id
        );
        $result=D('AuthGroup')->deleteData($map);
        if ($result) {
            $this->success('删除成功',U('Role/index'));
        }else{
            $this->error('删除失败');
        }
    }
}

