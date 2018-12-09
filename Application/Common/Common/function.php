<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-28
 * Time: 19:47
 */

function removeXSS($val){
    // 实现了一个单例模式，这个函数调用多次时只有第一次调用时生成了一个对象之后再调用使用的时第一次生成的对象（只生成了一个对象），使性能更好
    static $obj =null;
    if($obj === null)
    {
        require('./HTMLPurifier/HTMLPurifier.includes.php');
        $config = HTMLPurifier_Config::createDefault();
        //保留a标签上的target属性
        $config->set('HTML.TargetBlank',TRUE);
        $obj = new HTMLPurifier($config);
    }
    return $obj->purify($val);
}

/**
 * 上传图片并生产缩略图
 * 用法
 * $ret = uploadOne('logo','Goods',array(
                    array(600,600);
                    array(300,300);
                    array(100,100);
 *                  ));
 *          返回值：
 *      if（$ret['ok'] == 1）{
 *              $ret['image'][0];   //原图地址
 *              $ret['image'][1];   //第一个缩略图地址
 *              $ret['image'][2];   //第二个缩略图地址
 *              $ret['image'][3];   //第三个缩略图地址
 *          }
 *          else{
 *              $this->error = $ret['error'];
 *              return FALSE;
 *         }
 */
function uploadOne($imgName,$dirName,$thumb = array()){
   //上传LOGO
    if(isset($_FILES[$imgName]) && $_FILES[$imgName]['error'] == 0)
    {
        $rootPath = C('IMG_rootPath');
        $upload = new \Think\Upload(array(
            'rootPath' => $rootPath,
        ));//实例化上传类
        $upload->maxSize = ('IMG_maxSize') * 1024 * 1024;//设置附件上传大小
        $upload->exts = C('IMG_exts');//设置附件上传类型
        ///$upload->rootPath = $rootPath;//设置附件上传根目录
        $upload->savePath =  $dirName . '/'; //图片二级目录的名称
        //上传文件
        $info = $upload->upload();
        if(!$info)
        {
            return array(
                'ok' => 0,
                'error' =>$upload->getError(),
            );
//            //先把上传失败的错误信息存到模型中，由控制器最终再获取这个错误信息并显示
//            $this->error = $upload->getError();
//            return FALSE; // 返回控制器
        }
        else
        {

            $ret['ok'] = 1;
            $ret['images'][0] =$info[$imgName]['savepath'].$info[$imgName]['savename'];

//            $logoName = $info[$imgName]['savepath'].$info[$imgName]['savename'];

            //判断是否生产缩略图
            if($thumb){
                //拼出每个缩略图的文件名
                foreach ($thumb as $k => $v){
                    $ret['images'][$k+1] = $info[$imgName]['savepath'].'thumb_'.$k.'_'.$info[$imgName]['savename'];

                    $image = new \Think\Image();
                    //打开要处理的图片
                    $image->open($rootPath.$ret['images'][0]);
                    $image->thumb($v[0],$v[1])->save($rootPath.$ret['images'][$k+1]);
                }

            }
            return $ret;
//            //拼出缩略图的文件名
//            $smLogoName = $info[$imgName]['savepath'].'thumb_'.$info[$imgName]['savename'];
            //生成缩略图
//            $image = new \Think\Image();
//            //打开要处理的图片
//            $image->open($rootPath.$logoName);
//            $image->thumb(150,150)->save($rootPath.$smLogoName);
            //把图片的表单放到表单中
//            $data[$imgName] = $logoName;
//            $data['sm_logo'] =$smLogoName;
        }
    }
}


function showImage($url,$width ='',$height=''){

    $url = '/Public/Uploads/'.$url;
    if($width)
        $width ="width = '$width'";
    if($height)
        $height = "height = '$height";
    echo "<img src='$url' $width  $height />";
}


//删除图片:参数：一维数组：所有要删除图片的路径
function deleteImage($image){
    $rp = C('IMG_rootPath');
    foreach ($image as  $v){
        @unlink($rp.$v);
    }

}


