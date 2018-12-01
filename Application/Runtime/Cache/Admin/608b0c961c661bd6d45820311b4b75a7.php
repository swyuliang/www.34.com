<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <script type="text/javascript" charset="utf-8" src="/www.34.com/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/www.34.com/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/www.34.com/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
    <title>edit</title>
</head>
<body>
    <form method="POST" action="/www.34.com/index.php/Admin/Goods/edit/id/16/p/1.html" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $info['id']; ?>" />
        商品名称：<input type="text" name="goods_name" value="<?php echo $info['goods_name']; ?>" /><br/>
        商品价格：<input type="text" name="price" value="<?php echo $info['price']; ?>" /><br/>
        <img src="<?php echo '/www.34.com/Public/Uploads/'.$info['sm_logo']; ?>" /><br/>
        商品logo：<input type="file" name="logo"  /><br />
        <!--商品描述：<input type="text" name="goods_desc" /><br/>-->
        商品描述：<textarea name="goods_desc" id="goods_desc" ><?php echo $info['goods_desc']; ?></textarea><br/>
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
</script>