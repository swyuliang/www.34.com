<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <title>商品列表 </title>
    <link rel="stylesheet" href="/Public/datepicker/jquery-ui-1.9.2.custom.min.css" type="text/css" />
    <script type="text/javascript" language="JavaScript" src="/Public/datepicker/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="/Public/datepicker/jquery-ui-1.9.2.custom.min.js"></script>
    <script type="text/javascript" language="JavaScript" src="/Public/datepicker/datepicker_zh-cn.js"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="/Public/Admin/Styles/general.css" rel="stylesheet" type="text/css" />
    <link href="/Public/Admin/Styles/main.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

    <script type="text/javascript" language="JavaScript" src="/Public/Admin/Js/tron.js"></script>
</head>
<body>
<h1>
    <span class="action-span"><a href="<?php echo $_page_btn_link; ?>"><?php echo $_page_btn_name; ?></a></span>
    <span class="action-span1"><a href="__GROUP__">管理中心</a></span>
    <span id="search_id" class="action-span1"> -<?php echo $_page_title; ?> </span>
    <div style="clear:both"></div>
</h1>


<!--代表页面中的内容-->

<!--<!DOCTYPE html>-->
<!--<html lang="en">-->
<!--<head>-->
    <!--<meta http-equiv="content-type" content="text/html" charset="UTF-8">-->
    <!--<script type="text/javascript" language="JavaScript" src="/Public/datepicker/jquery-1.7.2.min.js"></script>-->
    <!--<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.config.js"></script>-->
    <!--<script type="text/javascript" charset="utf-8" src="/Public/ueditor/ueditor.all.min.js"></script>-->
    <!--<script type="text/javascript" charset="utf-8" src="/Public/ueditor/lang/zh-cn/zh-cn.js"></script>-->
    <!--<title>add</title>-->
<!--</head>-->
<body>
    <form name="main_form" method="POST" action="/index.php/Admin/Goods/add.html" enctype="multipart/form-data">
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
<!--</html>-->
<script>
    UE.getEditor('goods_desc',{
        "initialFrameWidth" : "60%",  //宽
        "initialFrameHeight" : 200,  //高
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


<div id="footer">
    共执行 7 个查询，用时 0.028849 秒，Gzip 已禁用，内存占用 3.219 MB<br />
    版权所有 &copy; 2005-2012 上海商派网络科技有限公司，并保留所有权利。</div>
</body>
</html>