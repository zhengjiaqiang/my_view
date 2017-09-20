/*
Navicat MySQL Data Transfer

Source Server         : 1504phpc
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : my_view

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-09-20 11:58:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `adm_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `adm_name` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `code` varchar(30) NOT NULL COMMENT '验证码',
  `create_time` int(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'admin', '456', 'vv7', '0');
INSERT INTO `admin` VALUES ('2', 'jia', 'jia1030', 'kls', '1504317087');

-- ----------------------------
-- Table structure for admin_log
-- ----------------------------
DROP TABLE IF EXISTS `admin_log`;
CREATE TABLE `admin_log` (
  `log_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_info` varchar(60) NOT NULL COMMENT '留言人email',
  `log_time` int(10) NOT NULL,
  `ip` varchar(16) NOT NULL COMMENT '当前ip地址',
  `adm_id` int(10) NOT NULL COMMENT '管理员id',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin_log
-- ----------------------------

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(60) NOT NULL,
  `pid` int(10) NOT NULL DEFAULT '0',
  `sort` int(10) NOT NULL DEFAULT '100',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for collect
-- ----------------------------
DROP TABLE IF EXISTS `collect`;
CREATE TABLE `collect` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `jok_id` int(10) NOT NULL,
  `collect_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of collect
-- ----------------------------
INSERT INTO `collect` VALUES ('2', '2', '1', '1505877027');
INSERT INTO `collect` VALUES ('5', '2', '2', '1505877390');
INSERT INTO `collect` VALUES ('6', '2', '3', '1505877434');
INSERT INTO `collect` VALUES ('7', '2', '4', '1505878112');
INSERT INTO `collect` VALUES ('8', '2', '0', '1505879509');

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `jok_id` int(10) NOT NULL COMMENT '被评笑话ID',
  `comment_text` text NOT NULL,
  `comment_time` int(11) NOT NULL,
  `user_id` int(10) NOT NULL COMMENT '评论人ID',
  `title` varchar(30) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES ('1', '2', '智障', '1505811792', '1', '');
INSERT INTO `comment` VALUES ('2', '2', '呵呵', '1505811815', '1', '');
INSERT INTO `comment` VALUES ('3', '2', '我就默默的不说话', '1505811877', '1', '');
INSERT INTO `comment` VALUES ('4', '2', '呆萌', '1505820568', '2', '');
INSERT INTO `comment` VALUES ('5', '2', 'daimeng', '1505820586', '2', '');
INSERT INTO `comment` VALUES ('6', '3', '我的老天爷啊', '1505820919', '2', '');
INSERT INTO `comment` VALUES ('7', '1', '我是怎么啦', '1505823453', '1', '');
INSERT INTO `comment` VALUES ('8', '1', '我是谁啊', '1505823588', '1', '');

-- ----------------------------
-- Table structure for jokes
-- ----------------------------
DROP TABLE IF EXISTS `jokes`;
CREATE TABLE `jokes` (
  `jok_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `add_man` varchar(30) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `is_delete` tinyint(1) NOT NULL COMMENT '是否删除:0不展示,1展示',
  `add_time` int(11) NOT NULL,
  `top` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `flag` int(11) NOT NULL COMMENT '是否置顶:1:置顶,0:不置顶',
  `zan` int(10) NOT NULL COMMENT '点击次数',
  `content` text NOT NULL,
  `down` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'status: 0 收藏 1  取消收藏',
  `user_id` int(10) NOT NULL,
  `read_num` int(10) NOT NULL,
  PRIMARY KEY (`jok_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of jokes
-- ----------------------------
INSERT INTO `jokes` VALUES ('1', '做好自己', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb28684aa4.jpg', '0', '0', '1504490118', '2017-09-20 11:35:14', '0', '8', '我们不是至尊宝，也不是孙悟空。最后的最后，我们不过是城墙下的那群人，看着别人的爱情，回忆着自己的青春', '2', '0', '1', '207');
INSERT INTO `jokes` VALUES ('2', '女朋友', 'guang', '/Public/Uploads/2017-09-04/59acb2c4e487b.gif', '0', '0', '1504490180', '2017-09-20 11:17:05', '0', '2', '我想找一个衣服上总会粘着牙膏印的女孩来做女朋友，这样的姑娘迷糊，可爱，天真，呆萌，马虎，大大咧咧，不', '1', '1', '2', '206');
INSERT INTO `jokes` VALUES ('3', '原来是是绿豆蝇?', '无名', '/Public/Uploads/2017-09-04/59acb3215a2a8.jpg', '0', '0', '1504490273', '2017-09-20 11:26:53', '0', '2', '小的时候喜欢逮蜜蜂，每当逮着一个就在蜜蜂肚子上扎个洞，就使劲吸，还真好吃！ 等以后慢慢长大上了小学后，老师告诉我那是绿豆蝇 .....', '1', '0', '3', '33');
INSERT INTO `jokes` VALUES ('4', '这可如何是好', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb37b056c5.jpg', '0', '0', '1504490363', '2017-09-20 11:34:54', '0', '0', '老婆给女儿喂奶，女儿可能呛到了咳嗽了一下把老婆给啃了。现在俩人都在哭，我现在都不知道先安慰哪个？', '0', '0', '1', '5');
INSERT INTO `jokes` VALUES ('5', '做好自己', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb28684aa4.jpg', '0', '0', '1504490118', '2017-09-19 11:30:09', '0', '0', '我们不是至尊宝，也不是孙悟空。最后的最后，我们不过是城墙下的那群人，看着别人的爱情，回忆着自己的青春', '2', '0', '1', '0');
INSERT INTO `jokes` VALUES ('6', '女朋友', 'guang', '/Public/Uploads/2017-09-04/59acb2c4e487b.gif', '0', '0', '1504490180', '2017-09-19 11:52:19', '0', '0', '我想找一个衣服上总会粘着牙膏印的女孩来做女朋友，这样的姑娘迷糊，可爱，天真，呆萌，马虎，大大咧咧，不', '0', '0', '1', '1');
INSERT INTO `jokes` VALUES ('7', '古代那些大侠到底是做什么工作的', '闷骚的想哥', '/Public/Uploads/2017-09-05/59ae06148b9a2.jpg', '0', '0', '1504577044', '2017-09-19 11:49:00', '0', '1', '我就不明白了电视里古代那些大侠一出去就是两斤酱牛肉一壶好酒 每天最少三顿…… 放眼前 二斤酱牛肉90块钱 一壶酒就算十块钱 一月小一万 我真想问他们都是做什么工作的…', '0', '0', '0', '1');
INSERT INTO `jokes` VALUES ('8', '这可如何是好', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb37b056c5.jpg', '0', '0', '1504490363', '0000-00-00 00:00:00', '0', '0', '老婆给女儿喂奶，女儿可能呛到了咳嗽了一下把老婆给啃了。现在俩人都在哭，我现在都不知道先安慰哪个？', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('9', '做好自己', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb28684aa4.jpg', '0', '0', '1504490118', '0000-00-00 00:00:00', '0', '0', '我们不是至尊宝，也不是孙悟空。最后的最后，我们不过是城墙下的那群人，看着别人的爱情，回忆着自己的青春', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('10', '女朋友', 'guang', '/Public/Uploads/2017-09-04/59acb2c4e487b.gif', '0', '0', '1504490180', '0000-00-00 00:00:00', '0', '0', '我想找一个衣服上总会粘着牙膏印的女孩来做女朋友，这样的姑娘迷糊，可爱，天真，呆萌，马虎，大大咧咧，不', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('11', '原来是是绿豆蝇?', '无名', '/Public/Uploads/2017-09-04/59acb3215a2a8.jpg', '0', '0', '1504490273', '0000-00-00 00:00:00', '0', '0', '小的时候喜欢逮蜜蜂，每当逮着一个就在蜜蜂肚子上扎个洞，就使劲吸，还真好吃！ 等以后慢慢长大上了小学后，老师告诉我那是绿豆蝇 .....', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('12', '这可如何是好', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb37b056c5.jpg', '0', '0', '1504490363', '0000-00-00 00:00:00', '0', '0', '老婆给女儿喂奶，女儿可能呛到了咳嗽了一下把老婆给啃了。现在俩人都在哭，我现在都不知道先安慰哪个？', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('13', '做好自己', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb28684aa4.jpg', '0', '0', '1504490118', '0000-00-00 00:00:00', '0', '0', '我们不是至尊宝，也不是孙悟空。最后的最后，我们不过是城墙下的那群人，看着别人的爱情，回忆着自己的青春', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('14', '女朋友', 'guang', '/Public/Uploads/2017-09-04/59acb2c4e487b.gif', '0', '0', '1504490180', '0000-00-00 00:00:00', '0', '0', '我想找一个衣服上总会粘着牙膏印的女孩来做女朋友，这样的姑娘迷糊，可爱，天真，呆萌，马虎，大大咧咧，不', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('15', '原来是是绿豆蝇?', '无名', '/Public/Uploads/2017-09-04/59acb3215a2a8.jpg', '0', '0', '1504490273', '0000-00-00 00:00:00', '0', '0', '小的时候喜欢逮蜜蜂，每当逮着一个就在蜜蜂肚子上扎个洞，就使劲吸，还真好吃！ 等以后慢慢长大上了小学后，老师告诉我那是绿豆蝇 .....', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('16', '这可如何是好', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb37b056c5.jpg', '0', '0', '1504490363', '0000-00-00 00:00:00', '0', '0', '老婆给女儿喂奶，女儿可能呛到了咳嗽了一下把老婆给啃了。现在俩人都在哭，我现在都不知道先安慰哪个？', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('17', '做好自己', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb28684aa4.jpg', '0', '0', '1504490118', '0000-00-00 00:00:00', '0', '0', '我们不是至尊宝，也不是孙悟空。最后的最后，我们不过是城墙下的那群人，看着别人的爱情，回忆着自己的青春', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('18', '女朋友', 'guang', '/Public/Uploads/2017-09-04/59acb2c4e487b.gif', '0', '0', '1504490180', '0000-00-00 00:00:00', '0', '0', '我想找一个衣服上总会粘着牙膏印的女孩来做女朋友，这样的姑娘迷糊，可爱，天真，呆萌，马虎，大大咧咧，不', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('19', '原来是是绿豆蝇', '无名', '/Public/Uploads/2017-09-04/59acb3215a2a8.jpg', '0', '0', '1504490273', '2017-09-19 20:22:10', '1', '1', '小的时候喜欢逮蜜蜂，每当逮着一个就在蜜蜂肚子上扎个洞，就使劲吸，还真好吃！ 等以后慢慢长大上了小学后，老师告诉我那是绿豆蝇 .....', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('20', '这可如何是好', '闷骚的想哥', '/Public/Uploads/2017-09-04/59acb37b056c5.jpg', '0', '0', '1504490363', '2017-09-19 20:22:16', '1', '1', '老婆给女儿喂奶，女儿可能呛到了咳嗽了一下把老婆给啃了。现在俩人都在哭，我现在都不知道先安慰哪个？', '0', '0', '0', '0');
INSERT INTO `jokes` VALUES ('21', '古代那些大侠到底是做什么工作的', '闷骚的想哥', '/Public/Uploads/2017-09-05/59ae06148b9a2.jpg', '0', '0', '1504577044', '0000-00-00 00:00:00', '0', '0', '我就不明白了电视里古代那些大侠一出去就是两斤酱牛肉一壶好酒 每天最少三顿…… 放眼前 二斤酱牛肉90块钱 一壶酒就算十块钱 一月小一万 我真想问他们都是做什么工作的…', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) NOT NULL,
  `upwd` varchar(30) NOT NULL,
  `create_time` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'jia', '123', '1505705752');
INSERT INTO `login` VALUES ('2', 'hong', '456', '0');

-- ----------------------------
-- Table structure for node
-- ----------------------------
DROP TABLE IF EXISTS `node`;
CREATE TABLE `node` (
  `node_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) NOT NULL,
  `controller` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  PRIMARY KEY (`node_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of node
-- ----------------------------
INSERT INTO `node` VALUES ('1', '段子添加', 'Joke', 'wenzhang_xinwen_fabu');
INSERT INTO `node` VALUES ('2', '段子删除', 'Joke', 'dell');
INSERT INTO `node` VALUES ('3', '标题修改', 'Joke', 'update');
INSERT INTO `node` VALUES ('4', '段子置顶', 'Joke', 'top');

-- ----------------------------
-- Table structure for privilege
-- ----------------------------
DROP TABLE IF EXISTS `privilege`;
CREATE TABLE `privilege` (
  `adm_id` int(10) unsigned NOT NULL,
  `node_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of privilege
-- ----------------------------
INSERT INTO `privilege` VALUES ('1', '1');
INSERT INTO `privilege` VALUES ('1', '2');
INSERT INTO `privilege` VALUES ('1', '3');
INSERT INTO `privilege` VALUES ('1', '4');

-- ----------------------------
-- Table structure for reply
-- ----------------------------
DROP TABLE IF EXISTS `reply`;
CREATE TABLE `reply` (
  `reply_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comm_id` int(10) NOT NULL COMMENT '回复评论的ID',
  `reply_text` text NOT NULL COMMENT '回复内容',
  `reply_time` int(10) NOT NULL COMMENT '回复时间',
  `user_id` int(10) NOT NULL COMMENT '回复人id',
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reply
-- ----------------------------
INSERT INTO `reply` VALUES ('1', '1', '关爱智障儿童', '1505814691', '0');
INSERT INTO `reply` VALUES ('2', '1', '恩恩', '1505814737', '0');
INSERT INTO `reply` VALUES ('3', '1', '傻逼', '1505819146', '0');
INSERT INTO `reply` VALUES ('4', '1', '傻逼', '1505819146', '0');
INSERT INTO `reply` VALUES ('5', '1', '傻逼', '1505819146', '0');
INSERT INTO `reply` VALUES ('6', '1', '傻逼', '1505819146', '0');
INSERT INTO `reply` VALUES ('7', '5', '快快快', '1505820799', '0');
INSERT INTO `reply` VALUES ('8', '5', '急急急', '1505820821', '0');
INSERT INTO `reply` VALUES ('9', '5', '防非法', '1505820851', '0');
INSERT INTO `reply` VALUES ('10', '6', '哈哈哈', '1505821020', '0');
INSERT INTO `reply` VALUES ('11', '6', '急急急', '1505821081', '0');
INSERT INTO `reply` VALUES ('12', '6', '看看', '1505821103', '0');
INSERT INTO `reply` VALUES ('13', '7', '自言自语', '1505823499', '0');
INSERT INTO `reply` VALUES ('14', '7', '我去', '1505823564', '0');
INSERT INTO `reply` VALUES ('15', '8', '发发发', '1505823603', '0');

-- ----------------------------
-- Table structure for t_jokes
-- ----------------------------
DROP TABLE IF EXISTS `t_jokes`;
CREATE TABLE `t_jokes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jok_id` int(10) unsigned NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of t_jokes
-- ----------------------------
INSERT INTO `t_jokes` VALUES ('1', '1', null, null);
INSERT INTO `t_jokes` VALUES ('2', '2', null, null);
INSERT INTO `t_jokes` VALUES ('3', '21', null, null);
