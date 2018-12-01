<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <script type="text/javascript" language="JavaScript" src="/www.34.com/Public/datepicker/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/www.34.com/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/www.34.com/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/www.34.com/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <title>add</title>
</head>
<body>
    <form name="main_form" method="POST" action="/www.34.com/Admin/Goods/add" enctype="multipart/form-data">
        商品名称：<input type="text" name="goods_name" /><br/>
        商品价格：<input type="text" name="price" /><br/>
        商品logo：<input type="file" name="logo" /><br />
        <!--商品描述：<input type="text" name="goods_desc" /><br/>-->
        商品描述：<textarea name="goods_desc" id="goods_desc"></textarea><br/>
        是否上架：
        <input type="radio" name="is_on_sale" value="1" checked="checked" />上架
        <input type="radio" name="is_on_sale" value="0" />下架
        <br/>
        <input type="submit" value="提交" />
    </form>
</body>
</html>
<script>
    UE.getEditor('goods_desc',{
        "initialFrameWidth" : "100%",  //宽
        "initialFrameHeight" : 350,  //高
        "maximumWords" : 50000  // 最躲可以输入的字符数
    });
// 为表单绑定AJAX事件
//$('form[name=main_form]').submit(function () {
//            //使用AJAX来提交表单
//
//            //阻止表单提交
//           // return false;
//        });

</script>