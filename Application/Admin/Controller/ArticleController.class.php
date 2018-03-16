<?php
namespace Admin\Controller;
use Common\Controller\BaseController;
class ArticleController extends BaseController
{
    public function index()
    {
        $article = M('article');
        $count      = $article->where('1')->count();// 查询满足要求的总记录数
        $Page       = new \Org\Nx\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show       = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $article->order('creat_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
        for ($i = 0;$i<count($list);$i++){
            $list[$i]['thumb_pic'] = json_decode($list[$i]['thumb_pic']);
            $list[$i]['creat_time'] = date("Y-m-d",$list[$i]['creat_time']);
        }
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->display(); // 输出模板
    }

    public function insert()
    {
        if (IS_POST) {
            if(!empty($_POST)){
                if ($_FILES['listimg']['error'] == 0) {
                    //p($_FILES['listimg']);die;
                    $upload = new \Think\Upload();// 实例化上传类
                    $upload->maxSize = 3145728;// 设置附件上传大小
                    $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                    $upload->rootPath = './Public/upload/Listpic/'; // 设置附件上传根目录
                    // 上传单个文件
                    $info = $upload->uploadOne($_FILES['listimg']);
                    if (!$info) {// 上传错误提示错误信息
                        $this->error($upload->getError());
                    } else {// 上传成功 获取上传文件信息
                        // 上传成功 获取上传文件信息
                        //p($info);die;
                        $img = $upload ->rootPath.$info['savepath'] . $info['savename'];//获取原图绝对路径
                        $image = new \Think\Image();
                        //p($img);die;
                        $image->open($img); // 打开原图
                        // 添加水印
                        $image ->water('./logo.png')-> save($img);
                        //缩略图
                        $thumbimg = $upload ->rootPath.$info['savepath'] .'thumb_'. $info['savename'];
                        $image ->thumb(362,194,6)->save($thumbimg);  // 设置宽高和缩略类型
                    }
                }
                $_POST['content']=preg_replace('/title=\"(?<=").*?(?=")\"/','title="'.$_POST['title'].'"',$_POST['content']);
                $_POST['content']=preg_replace('/alt=\"(?<=").*?(?=")\"/','alt="'.$_POST['title'].'"',$_POST['content']);
                $preg = '/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i';//匹配img标签的正则表达式
                preg_match_all($preg, $_POST['content'], $allImg);//这里匹配所有的img
                if(!empty($allImg)){
                    foreach($allImg[1] as $k=>$v){
                        $url = explode('/',$v);
                        unset($url[0]);
                        unset($url[1]);
                        $str = '';
                        foreach ($url as $m=>$n){
                            $str .= '/'.$n;
                        }
                        $image->open('.'.$str)->water('./logo.png')->save('.'.$str);
                    }
                }

                $arr = array(
                    'title' => I('post.title'),
                    'des' => I('post.des'),
                    'original_pic'=> json_encode($img),
                    'thumb_pic' => json_encode($thumbimg),
                    'category' => I('post.category'),
                    'tag' => I('post.tag'),
                    'content' =>json_encode(I('post.content')),
                    'creat_time' => time(),
                    'view' => 0,
                    'talk'=>0,
                    'heart'=>0
                );
                $article = M('article');
                //p($arr);die;
                $res = $article->add($arr);
                if($res){
                    $this->success('文章添加成功',U('article/index'));die;
                }else{
                    $this->error('文章添加失败');
                }
            }
        }
        $this->display();
    }

    public function updata()
    {
        $id = I('get.id');
        if(!empty($id)){
            $article = M('article');
            $res = $article->where(array('id'=>$id))->find();
            $res['thumb_pic'] = json_decode($res['thumb_pic']);
            $res['original_pic'] = json_decode($res['original_pic']);
            $res['content'] = json_decode($res['content']);
        }
        if(!empty($_POST)){
            if ($_FILES['listimg']['error'] == 0) {
                //p($_FILES);die;
                $upload = new \Think\Upload();// 实例化上传类
                $upload->maxSize = 3145728;// 设置附件上传大小
                $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
                $upload->rootPath = './Public/upload/Listpic/'; // 设置附件上传根目录
                // 上传单个文件
                $info = $upload->uploadOne($_FILES['listimg']);
                if (!$info) {// 上传错误提示错误信息
                    $this->error($upload->getError());
                } else {
                    // 上传成功 获取上传文件信息
                    $img = $upload ->rootPath.$info['savepath'] . $info['savename'];//获取修改后原图绝对路径
                    unlink($res['original_pic']); //删除修改的该记录前的原图
                    $image = new \Think\Image();
                    $image->open($img); // 打开原图
                    // 添加水印
                    $image ->water('./logo.png')-> save($img);
                    //缩略图
                    $thumbimg = $upload ->rootPath.$info['savepath'] .'thumb_'. $info['savename'];
                    $image ->thumb(362,194,6)->save($thumbimg);  // 设置宽高和缩略类型
                    unlink($res['thumb_pic']); //删除修改前该记录的缩略图
                }
            }else{
                $img = $res['original_pic'];
                $thumbimg = $res['thumb_pic'];
            }
            //p($content);die;
            $_POST['content']=preg_replace('/title=\"(?<=").*?(?=")\"/','title="'.$_POST['title'].'"',$_POST['content']);
            $_POST['content']=preg_replace('/alt=\"(?<=").*?(?=")\"/','alt="'.$_POST['title'].'"',$_POST['content']);
            $preg = '/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i';//匹配img标签的正则表达式
            preg_match_all($preg, $_POST['content'], $allImg);//这里匹配所有的img
            //p(htmlspecialchars_decode($res['content']));die;
            preg_match_all($preg,htmlspecialchars_decode($res['content']),$unimg);//这里匹配所有要删除img
            if(!empty($allImg)){
                //p($allImg);die;
                foreach($allImg[1] as $k=>$v){
                    $url = explode('/',$v);
                    unset($url[0]);
                    unset($url[1]);
                    $str = '';
                    foreach ($url as $m=>$n){
                        $str .= '/'.$n;
                    }

                    foreach ($unimg[1] as $u=>$un){
                        if(__ROOT__.$str!=$un){
                            $str1 = '';
                            $url1 = explode('/',$un);
                            unset($url1[0]);
                            unset($url1[1]);
                            foreach ($url1 as $u1=>$un1){
                                $str1 .= '/'.$un1;
                            }
                            unlink('.'.$str1);//循环判断有没有修改内容中的图片，如果修改，就删除对应的内容图片
                            $image->open('.'.$str)->water('./logo.png')->save('.'.$str);
                        }
                    }
                }
            }

            $arr = array(
                'title' => I('post.title'),
                'des' => I('post.des'),
                'original_pic'=> json_encode($img),
                'thumb_pic' => json_encode($thumbimg),
                'category' => I('post.category'),
                'tag' => I('post.tag'),
                'content' =>json_encode(I('post.content')),
                'creat_time' => time(),
                'view' => 0,
                'talk'=>0,
                'heart'=>0
            );

            $resault = $article->where(array(id=>$id))->save($arr);
            if($resault){
                $this->success('文章更新成功',U('article/index'));die;
            }else{
                $this->error('文章更新失败');
            }

        }

        $this->assign('data',$res);
      $this->display();
    }

    public function delete(){
        $id = I('get.id');
        if(!empty($id)){
            $article = M('article');
            $res1 = $article->where(array('id'=>$id))->find();
            $res1['thumb_pic'] = json_decode($res1['thumb_pic']);
            $res1['original_pic'] = json_decode($res1['original_pic']);
            $res1['content'] = json_decode($res1['content']);
            unlink($res1['original_pic']); //删除修改的该记录前的原图
            unlink($res1['thumb_pic']); //删除修改前该记录的缩略图
            $preg = '/<img.*?src=[\"|\']?(.*?)[\"|\']?\s.*?>/i';//匹配img标签的正则表达式
            preg_match_all($preg,htmlspecialchars_decode($res1['content']),$unimg);//这里匹配所有要删除img
            if($unimg){
                foreach($unimg[1] as $k=>$v){
                    $url1 = explode('/',$v);
                    unset($url1[0]);
                    unset($url1[1]);
                    $str = '';
                    foreach ($url1 as $u1=>$un1){
                        $str .= '/'.$un1;
                    }
                    unlink('.'.$str);//循环内容中的图片
                }
            }
            $res2  = $article->where(array(id=>$id))->delete();//删除数据库记录
            if($res2){
                $this->success('文章删除成功',U('article/index'));die;
            }else{
                $this->error('文章删除失败');
            }

        }
    }
}