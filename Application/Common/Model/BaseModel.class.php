<?php
namespace Common\Model;
use Think\Model;
class BaseModel extends Model{
    /**
     * Created by PhpStorm.
     * User: Administrator
     * Date: 2017/12/25
     * Time: 9:48
     */

    /**
     * 获取全部数据
     * @param  string $type tree获取树形结构 level获取层级结构
     * @param  string $order 排序方式
     * @return array         结构数据
     */
    public function getTreeData($type = 'tree', $order = '', $name = 'name', $child = 'id', $parent = 'pid')
    {
        // 判断是否需要排序
        if (empty($order)) {
            $data = $this->select();
        } else {
            $data = $this->order($order . ' is null,' . $order)->select();
        }
        // 获取树形或者结构数据
        if ($type == 'tree') {
            $data = \Org\Nx\Data::tree($data, $name, $child, $parent);
        } elseif ($type = "level") {
            $data = \Org\Nx\Data::channelLevel($data, 0, '&nbsp;', $child);
        }
        return $data;
    }
}