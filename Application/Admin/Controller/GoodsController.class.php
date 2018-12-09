<?php
namespace Admin\Controller;
//use Think\Controller;

class GoodsController extends IndexController
{
    public function test()
    {
        /**测试用的*/
        $this->display();
    }

    public  function add()
    {
        //2.处理表单
        if(IS_POST)
        {
            //3.先生成模型
            //D和M的区别：D生成我们自己创建的模型对象，M生TP自带的模型对象
            //这里我们要生成我们自己创建的模型，因为这里要使用我们自己创建的模型中的验证规则来验证表单
            //这里用M可以添加成功但是验证表单的功能会失败，因为验证规则是在我们自己定义的模型中的，而M生成的是TP自带的模型里没有验证规则
            $model = D('Goods');
            //4.a.接收表单中所有的数据并存到模型中 b.使用I函数过滤数据 c.根据模型中定义的规则验证表单
            if($model->create(I('post.'),1))
            {
                //5.插入数据库
                if($model->add()){
                    //6.提示信息
                    $this->success('操作成功！',U('lst'));
                    //7.停止执行后面的代码
                    exit;
                }
            }
            //8.如果上面失败，获取失败的原因
            $error = $model->getError();
            //9.显示错误信息，并跳回到上一个页面
            $this->error($error);
        }

//        $this->assign('_page_title','添加商品');
//        $this->assign('_page_btn_name','商品列表');
//        $this->assign('_page_btn_link',U('lst'));
        $this->setPageBtn('添加商品','商品列表',U('lst'));
        //1.显示表单
        $this->display();
    }

    //列表
    public function lst()
    {
        $model = D('Goods');
        //获取翻页的数据
        $data = $model->search();
        $this->assign(array(
            'data' => $data['data'],
            'page' => $data['page'],
            ));


        //设置页面信息
//        $this->assign('_page_title','商品列表');
//        $this->assign('_page_btn_name','添加商品');
//        $this->assign('_page_btn_link',U('add'));
        $this->setPageBtn('商品列表','添加商品',U('add'));
        $this->display();
    }

    //******删除方法
    public function delete()
    {
        $model = D('Goods');
        $model->delete(I('get.id'));
        $this->success('操作成功',U('lst?p='.I('get.p')));
    }

    //**修改方法
    public function edit(){
        //处理表单
        if(IS_POST)
        {
            $model = D('Goods');
            if($model->create(I('post.'),2))
            {
                //save方法的返回值时影响的记录数（mysql_affected_rows）,如果修改时没有修改任何值会返回0，失败返回FALSE
                if(FALSE !== $model->save())
                {
                    $this->success('操作成功！',U('lst?p='.I('get.p')));
                    exit;
                }
            }
            //如果失败显示失败信息
            $this->error($model->getError());
        }
        //接收商品的ID
        $id = I('get.id');
        //先从数据库中取出要修改的记录的信息
        $model = M('Goods');
        $info =$model->find($id);
        $this->assign('info',$info);

        $this->setPageBtn('修改商品','商品列表',U('lst'));
        //显示修改的表单
        $this->display();
    }



}
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-15
 * Time: 23:26
 */