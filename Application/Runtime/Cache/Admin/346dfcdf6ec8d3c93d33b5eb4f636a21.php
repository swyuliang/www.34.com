<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <form method="POST" action="/www.34.com/Admin/Goods/add">
        商品名称：<input type="text" name="goods_name" /><br/>
        商品价格：<input type="text" name="price" /><br/>
        商品描述：<input type="text" name="goods_desc" /><br/>
        是否上架：
        <input type="radio" name="is_on_sale" value="1" checked="checked" />上架
        <input type="radio" name="is_on_sale" value="0" />下架
        <br/>
        <input type="submit" value="提交" />
    </form>
</body>
</html>