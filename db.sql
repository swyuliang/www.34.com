USE php34;
SET NAMES utf8;

# tinyint : 0~255
# smallint : 0~ 65535
# mediumint : 0~1千6百多万
# int : 0~40多亿
# char 、varchar 、 text容量？
# char    :0~255个字符
# varchar : 0~65535 字节 看表编码，如果是utf8存2万多汉字 gbk存3万多汉字
# text    : 0~65535 字符
CREATE TABLE IF NOT EXISTS php34_goods
(
	id mediumint unsigned not null auto_increment,
	goods_name varchar(45) not null comment '商品名称',
	logo varchar(150) not null default '' comment '商品logo',
	sm_logo varchar(150) not null default '' comment '商品缩略图logo',
	price decimal(10,2) not null default '0.00' comment '商品价格',
	goods_desc longtext comment '商品描述',
	is_on_sale tinyint unsigned not null default '1' comment '是否上架：1：上架，0：下架',
	is_delete tinyint unsigned not null default '0' comment '是否已经删除，1：已经删除 0：未删除',
	addtime int unsigned not null comment '添加时间',
	primary key (id),
	key price(price),
	key is_on_sale(is_on_sale),
	key is_delete(is_delete),
	key addtime(addtime)
)engine=MyISAM default charset=utf8;
#说明：当要使用LIKE 查询并以%开头时，不能使用普通索引，只以使用全文索引，如果使用了全文索引：
#SELECT * FROM php34_goods WHERE MATCH goods_name AGAINST 'xxxx';
# 但MYSQL自带的全文索引不支持中文，所以不能使用MYSQL自带的全文索引功能，所以如果要优化只能使用第三方的全文索引## 引擎，如：sphinx,lucence等。

-- 创建后台登录账号表格
DROP TABLE IF EXISTS php34_admin;
 CREATE TABLE php34_admin
 (
      id tinyint unsigned not null auto_increment,
      username varchar(30) not null comment '账号',
      password char(32) not null comment '密码',
      is_use tinyint unsigned not null default '1' comment '是否启用 1：启用 0：禁用',
      primary key (id)
 )engine=MyISAM default charset=utf8;

INSERT INTO php34_admin VALUES(1,'root','08bc0180c2fcf73b3903871f18fd7040',1);


DROP TABLE IF EXISTS php34_category;
CREATE TABLE php34_category
(
    id smallint unsigned not null auto_increment,
    cat_name varchar(30) not null comment '分类名称',
    parent_id smallint unsigned not null default '0' comment '上级分类的ID，0：代表顶级',
    primary key (id)
)engine=MyISAM default charset=utf8 comment '商品分类表';


