<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-12-4
 * Time: 22:43
 */
class LoginController extends Controller
{
    public function login(){

        if(IS_POST)
        {
            $model=D('Admin');
            //指定使用验证规则_login_validate
            //使用validate方法来指定使用模型中的哪个数组作为验证规则，默认是使用$_validate
            //我这里吧登录的规则和添加修改管理员的规则分钟了两部分，所以这里需要指定使用哪个
            if($model->validate($model->_login_validate)->create()){
                if(TRUE === $model->login())
                    redirect(U('Admin/Index/index'));//直接跳转
            }
            $this->error($model->getError());
        }
        $this->display();
    }

    // 生成验证码的图片
    public function chkcode(){
        $Verify = new \Think\Verify(array(
           'length' =>4,
            'useNoise' => FAlSE,
        ));
        $Verify->entry();
    }
}
