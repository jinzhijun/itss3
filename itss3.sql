/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : itss3

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-04-07 13:55:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for it_admin
-- ----------------------------
DROP TABLE IF EXISTS `it_admin`;
CREATE TABLE `it_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_admin
-- ----------------------------
INSERT INTO `it_admin` VALUES ('1', 'admin', 'bf9f8d1f05dc08cc3b02e8fcf2c2ba57', null, '刘军', null, '2016-03-17 08:59:04');

-- ----------------------------
-- Table structure for it_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `it_admin_menu`;
CREATE TABLE `it_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(255) DEFAULT NULL COMMENT '菜单名',
  `url` varchar(255) DEFAULT '#' COMMENT '菜单链接',
  `parentid` int(11) DEFAULT '0' COMMENT '父菜单ID',
  `depth` int(11) DEFAULT '0' COMMENT '层级',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_admin_menu
-- ----------------------------
INSERT INTO `it_admin_menu` VALUES ('1', '文章', '#', '0', '0', '1');
INSERT INTO `it_admin_menu` VALUES ('2', '课程', '#', '0', '0', '2');
INSERT INTO `it_admin_menu` VALUES ('3', '会员', '#', '0', '0', '4');
INSERT INTO `it_admin_menu` VALUES ('4', '订单', '#', '0', '0', '5');
INSERT INTO `it_admin_menu` VALUES ('5', '结算', '#', '0', '0', '6');
INSERT INTO `it_admin_menu` VALUES ('6', '系统', '#', '0', '0', '7');
INSERT INTO `it_admin_menu` VALUES ('7', '文章分类', 'artical_cate.php?menu=7', '1', '1', '100');
INSERT INTO `it_admin_menu` VALUES ('8', '文章管理', 'artical.php?menu=8', '1', '1', '100');
INSERT INTO `it_admin_menu` VALUES ('9', '课程分类', 'course_cate.php?menu=9', '2', '1', '100');
INSERT INTO `it_admin_menu` VALUES ('10', '点播课程', 'video.php?menu=10', '2', '1', '100');
INSERT INTO `it_admin_menu` VALUES ('11', '直播课程', 'zvideo.php?menu=11', '2', '1', '100');
INSERT INTO `it_admin_menu` VALUES ('12', '学员管理', '#', '3', '1', '100');
INSERT INTO `it_admin_menu` VALUES ('13', '讲师管理', 'teacher.php?menu=13', '3', '1', '100');
INSERT INTO `it_admin_menu` VALUES ('14', '题库', '#', '0', '0', '3');
INSERT INTO `it_admin_menu` VALUES ('15', '试题管理', '#', '14', '0', '100');
INSERT INTO `it_admin_menu` VALUES ('16', '待付款订单', '#', '4', '0', '100');
INSERT INTO `it_admin_menu` VALUES ('17', '已付款订单', '#', '4', '0', '100');
INSERT INTO `it_admin_menu` VALUES ('18', '待退款订单', '#', '4', '0', '100');
INSERT INTO `it_admin_menu` VALUES ('19', '财务流水', '#', '5', '0', '100');
INSERT INTO `it_admin_menu` VALUES ('20', '提现申请', '#', '5', '0', '100');
INSERT INTO `it_admin_menu` VALUES ('21', '管理员设置', '#', '6', '0', '100');

-- ----------------------------
-- Table structure for it_artical
-- ----------------------------
DROP TABLE IF EXISTS `it_artical`;
CREATE TABLE `it_artical` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `content` text,
  `isShow` int(11) DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_artical
-- ----------------------------

-- ----------------------------
-- Table structure for it_artical_category
-- ----------------------------
DROP TABLE IF EXISTS `it_artical_category`;
CREATE TABLE `it_artical_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parentid` int(11) DEFAULT NULL,
  `depth` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_artical_category
-- ----------------------------

-- ----------------------------
-- Table structure for it_course
-- ----------------------------
DROP TABLE IF EXISTS `it_course`;
CREATE TABLE `it_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cateid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `teacher_id` int(11) DEFAULT '0',
  `img` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `service` varchar(1000) DEFAULT NULL,
  `content` text,
  `hits` int(11) DEFAULT '0',
  `isShow` int(11) DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_course
-- ----------------------------
INSERT INTO `it_course` VALUES ('12', '8', '和方骥一起学Excel（图文+视频）', '想学Excel，却因为难度大，望而却步，无法坚持的朋友们，你们有福了。', '1', '../files/day_160318/201603180833308120.jpg', '0.00', '想学Excel，却因为难度大，望而却步，无法坚持的朋友们，你们有福了。', '【微信购买用户注意】<br />目前云课堂app已经支持微信登录，请大家无论是电脑或手机app登录时都务必选择微信登录的方式进行学习。<br /><br /><br />账号或浏览技术型问题<br />请咨询网易客服0571-89853416 （工作日周一至周五10:00-12:00,14:00-18:00）<br />——————————————————————————<br />购买前请务必看完免费第一节《课程学习指南，购前必读》<br />购买后请点击网页右侧的【服务咨询】或微博私信@秋叶 老师你的订单号以及购买课程名称，加入课程学员QQ群！<br /><br /><br />秋叶大叔联手方骥老师共同出品！<br />购买或正式学习课程之前，请看免费第一节《课程学习指南，购前必读》！<br />别怕，Excel其实很简单！来这里，和方骥一起学Excel ，国内高手用科学好玩实操的课程，让你迅速从小白变成小能！<br /><br /><br />本课程由国内Excel牛人方骥老师（@EXCEL大全）和刘晓月老师（@奔跑的小月）开发，&nbsp;<br />如果你只是粗通Excel最简单的操作，想和小伙伴一起向国内Excel牛人学习，来这里，就对了！<br />课程特点：<br />实用，系统，全面，学起来完全不枯燥有没有？<br />一次购买，持续升级！只需要129元，你就可以和国内顶尖Excel牛人一起提高！<br />现在，还等什么？请一起来吧！', '0', '1', '2016-03-18 08:34:00');
INSERT INTO `it_course` VALUES ('13', '8', 'C/C++黑客编程项目实战课程', '适合所有阶段（包括零基础入门）', '1', '../files/day_160318/201603180836345422.jpg', '100.00', '适合所有阶段（包括零基础入门）', '全程课程包括五大层次，19个阶段，超300个课时。由0基础起，循环渐进、稳打稳扎而学。系统学习班课程覆盖Python、C与C++、STL、Windows、Linux等内容。课程全程以项目为驱动，兴趣为主导，让你顺利毕业的同时，拥有三年项目软件开发经验。<br /><br /><br />课程内容：<br />第01章：计算机科学导论<br />第02章：Python语言入门<br />第03章：C语言入门<br />第04章：C语言项目实战<br />第05章：C过渡C++班<br />第06章：C++面对对象<br />第07章：C++面向对象实战<br />第08章：C++模板编程<br />第09章：C++STL标准库<br />第10章：C++STL标准库实战<br />第11章：Windows界面库实战<br />第12章：Windows核心编程<br />第13章：Windows网络编程<br />第14章：Windows应用<br />第15章：Linux系统入门<br />第16章：Linux应用实战<br />第17章：Linux网络模型<br />第18章：Linux网络编程实战<br />第19章：Linux大并发实战<br />第20章：C++综合考核<br /><br /><br />课程更新：<br />本课程系列连更三季，每周五，六下午15:00更新2集。<br />用生动幽默的讲课风格、手把手的教学模式让你成为c++编程工程师！<br />课程内参考上有老师的QQ号，方便与参加课程的同学及时沟通。<br />本课程属于录播课程，直播地址请联系老师免费报名学习。', '0', '1', '2016-03-18 08:37:21');
INSERT INTO `it_course` VALUES ('14', '8', '和方骥一起学Excel（图文+视频）', '想学Excel，却因为难度大，望而却步，无法坚持的朋友们，你们有福了。', '1', '../files/day_160318/201603180833308120.jpg', '50.00', '想学Excel，却因为难度大，望而却步，无法坚持的朋友们，你们有福了。', '【微信购买用户注意】<br />目前云课堂app已经支持微信登录，请大家无论是电脑或手机app登录时都务必选择微信登录的方式进行学习。<br /><br /><br />账号或浏览技术型问题<br />请咨询网易客服0571-89853416 （工作日周一至周五10:00-12:00,14:00-18:00）<br />——————————————————————————<br />购买前请务必看完免费第一节《课程学习指南，购前必读》<br />购买后请点击网页右侧的【服务咨询】或微博私信@秋叶 老师你的订单号以及购买课程名称，加入课程学员QQ群！<br /><br /><br />秋叶大叔联手方骥老师共同出品！<br />购买或正式学习课程之前，请看免费第一节《课程学习指南，购前必读》！<br />别怕，Excel其实很简单！来这里，和方骥一起学Excel ，国内高手用科学好玩实操的课程，让你迅速从小白变成小能！<br /><br /><br />本课程由国内Excel牛人方骥老师（@EXCEL大全）和刘晓月老师（@奔跑的小月）开发，&nbsp;<br />如果你只是粗通Excel最简单的操作，想和小伙伴一起向国内Excel牛人学习，来这里，就对了！<br />课程特点：<br />实用，系统，全面，学起来完全不枯燥有没有？<br />一次购买，持续升级！只需要129元，你就可以和国内顶尖Excel牛人一起提高！<br />现在，还等什么？请一起来吧！', '0', '1', '2016-03-22 11:02:06');
INSERT INTO `it_course` VALUES ('15', '8', 'IT服务项目经理—IT服务运营', '人员要素管理,流程要素管理', '1', '../files/day_160325/201603251333265338.png', '0.00', '人员要素管理,流程要素管理', '人员要素管理,流程要素管理', '0', '1', '2016-03-25 13:33:52');
INSERT INTO `it_course` VALUES ('16', '1', 'IT服务项目经理—服务设计概述', 'IT服务项目经理—服务设计概述', '1', '../files/day_160325/201603251339008471.png', '0.00', 'IT服务项目经理—服务设计概述', 'IT服务项目经理—服务设计概述', '0', '1', '2016-03-25 13:39:05');
INSERT INTO `it_course` VALUES ('17', '8', '数据中心可视化解决方案', '数据中心可视化解决方案', '1', '../files/day_160325/201603251339564454.png', '0.00', '数据中心可视化解决方案', '数据中心可视化解决方案', '0', '1', '2016-03-25 13:40:04');
INSERT INTO `it_course` VALUES ('18', '8', '琳达希尔-如何管理集体创造力', '琳达希尔-如何管理集体创造力', '1', '../files/day_160325/201603251341427901.png', '0.00', '琳达希尔-如何管理集体创造力', '琳达希尔-如何管理集体创造力', '0', '1', '2016-03-25 13:41:44');
INSERT INTO `it_course` VALUES ('19', '8', '扎克伯格谈facebook创业过程', '扎克伯格谈facebook创业过程', '1', '../files/day_160325/201603251410593736.png', '0.00', '扎克伯格谈facebook创业过程', '扎克伯格谈facebook创业过程', '0', '1', '2016-03-25 14:11:02');
INSERT INTO `it_course` VALUES ('20', '8', '马云视频演讲：信用危机时代如何让信用升值', '马云视频演讲：信用危机时代如何让信用升值', '1', '../files/day_160325/201603251411596384.png', '0.00', '马云视频演讲：信用危机时代如何让信用升值', '马云视频演讲：信用危机时代如何让信用升值', '0', '1', '2016-03-25 14:12:01');
INSERT INTO `it_course` VALUES ('21', '8', 'TED演讲集Rachel Botsman新型经济的货币是信用', 'TED演讲集Rachel Botsman新型经济的货币是信用', '1', '../files/day_160325/201603251413001500.png', '0.00', 'TED演讲集Rachel Botsman新型经济的货币是信用', 'TED演讲集Rachel Botsman新型经济的货币是信用', '0', '1', '2016-03-25 14:13:01');
INSERT INTO `it_course` VALUES ('22', '8', 'ITSS与两化融合', 'ITSS与两化融合', '1', '../files/day_160325/201603251414013275.png', '0.00', 'ITSS与两化融合', 'ITSS与两化融合', '0', '1', '2016-03-25 14:14:03');
INSERT INTO `it_course` VALUES ('23', '8', '智能制造是两化深度融合的主攻方向', '智能制造是两化深度融合的主攻方向', '1', '../files/day_160325/201603251414557407.png', '0.00', '智能制造是两化深度融合的主攻方向', '智能制造是两化深度融合的主攻方向', '0', '1', '2016-03-25 14:14:56');
INSERT INTO `it_course` VALUES ('24', '8', '杨海成：运用新技术促进两化深度融合', '杨海成：运用新技术促进两化深度融合', '1', '../files/day_160325/201603251415485004.png', '0.00', '杨海成：运用新技术促进两化深度融合', '杨海成：运用新技术促进两化深度融合', '0', '1', '2016-03-25 14:15:51');
INSERT INTO `it_course` VALUES ('25', '8', '云计算和大数据关于两化融合创新探讨', '云计算和大数据关于两化融合创新探讨', '1', '../files/day_160325/201603251416439076.png', '0.00', '云计算和大数据关于两化融合创新探讨', '云计算和大数据关于两化融合创新探讨', '0', '1', '2016-03-25 14:16:44');
INSERT INTO `it_course` VALUES ('26', '8', '奔驰工业4.0生产线', '奔驰工业4.0生产线', '1', '../files/day_160325/201603251417271378.png', '0.00', '奔驰工业4.0生产线', '奔驰工业4.0生产线', '0', '1', '2016-03-25 14:17:28');
INSERT INTO `it_course` VALUES ('27', '8', '改善工作的快乐之道', '改善工作的快乐之道', '1', '../files/day_160325/201603251418189375.png', '0.00', '改善工作的快乐之道', '改善工作的快乐之道', '0', '1', '2016-03-25 14:18:20');
INSERT INTO `it_course` VALUES ('28', '8', '进入计算机的“真实”世界', '进入计算机的“真实”世界', '1', '../files/day_160325/201603251419047523.png', '0.00', '进入计算机的“真实”世界', '进入计算机的“真实”世界', '0', '1', '2016-03-25 14:19:06');
INSERT INTO `it_course` VALUES ('29', '8', '新一代数字图书', '新一代数字图书', '1', '../files/day_160325/201603251419573734.png', '0.00', '新一代数字图书', '新一代数字图书', '0', '1', '2016-03-25 14:19:59');
INSERT INTO `it_course` VALUES ('30', '8', '更具真实感，科技魔术', '更具真实感，科技魔术', '1', '../files/day_160325/201603251420394291.png', '0.00', '更具真实感，科技魔术', '更具真实感，科技魔术', '0', '1', '2016-03-25 14:20:40');
INSERT INTO `it_course` VALUES ('31', '8', '怎样化杂为简', '怎样化杂为简', '1', '../files/day_160325/201603251421175771.png', '0.00', '怎样化杂为简', '怎样化杂为简', '0', '1', '2016-03-25 14:21:19');
INSERT INTO `it_course` VALUES ('32', '8', '汽车的未来', '汽车的未来', '1', '../files/day_160325/201603251422049678.png', '0.00', '汽车的未来', '汽车的未来', '0', '1', '2016-03-25 14:22:06');
INSERT INTO `it_course` VALUES ('33', '8', '聆听，学习...才能领导', '聆听，学习...才能领导', '1', '../files/day_160325/201603251422559807.png', '0.00', '聆听，学习...才能领导', '聆听，学习...才能领导', '0', '1', '2016-03-25 14:22:57');
INSERT INTO `it_course` VALUES ('34', '8', '数据重构商业,流量改写未来', '数据重构商业,流量改写未来', '1', '../files/day_160325/201603251423422920.png', '0.00', '数据重构商业,流量改写未来', '数据重构商业,流量改写未来', '0', '1', '2016-03-25 14:23:44');
INSERT INTO `it_course` VALUES ('35', '8', '共享未来城市', '共享未来城市', '1', '../files/day_160325/201603251424254875.png', '0.00', '共享未来城市', '共享未来城市', '0', '1', '2016-03-25 14:24:27');
INSERT INTO `it_course` VALUES ('36', '8', '让我们收回互联网', '让我们收回互联网', '1', '../files/day_160325/201603251425073048.png', '0.00', '让我们收回互联网', '让我们收回互联网', '0', '1', '2016-03-25 14:25:09');
INSERT INTO `it_course` VALUES ('37', '8', '用视频再造教育', '用视频再造教育', '1', '../files/day_160325/201603251425451260.png', '0.00', '用视频再造教育', '用视频再造教育', '0', '1', '2016-03-25 14:25:50');
INSERT INTO `it_course` VALUES ('38', '8', '市与企业中的奇妙数学', '市与企业中的奇妙数学', '1', '../files/day_160325/201603251426294058.png', '0.00', '市与企业中的奇妙数学', '市与企业中的奇妙数学', '0', '1', '2016-03-25 14:26:30');
INSERT INTO `it_course` VALUES ('39', '18', 'test', '1', '1', '../files/day_160330/201603301534105473.jpg', '0.01', 'test', 'test', '0', '1', '2016-03-30 15:34:24');

-- ----------------------------
-- Table structure for it_course_category
-- ----------------------------
DROP TABLE IF EXISTS `it_course_category`;
CREATE TABLE `it_course_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '课程分类',
  `parentid` int(11) DEFAULT '0' COMMENT '父分类id',
  `depth` int(11) DEFAULT '0' COMMENT '层次',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_course_category
-- ----------------------------
INSERT INTO `it_course_category` VALUES ('1', 'ITSS', '0', '0', '0');
INSERT INTO `it_course_category` VALUES ('2', '标准类', '1', '1', '0');
INSERT INTO `it_course_category` VALUES ('3', '信用类', '1', '1', '0');
INSERT INTO `it_course_category` VALUES ('4', '两化融合', '1', '1', '0');
INSERT INTO `it_course_category` VALUES ('5', '管理类', '1', '1', '0');
INSERT INTO `it_course_category` VALUES ('6', '技术类', '1', '1', '0');
INSERT INTO `it_course_category` VALUES ('7', '应用类', '1', '1', '0');
INSERT INTO `it_course_category` VALUES ('8', '其他', '1', '1', '0');
INSERT INTO `it_course_category` VALUES ('9', 'ITSS系列', '0', '0', '0');
INSERT INTO `it_course_category` VALUES ('10', 'IT服务工程师', '9', '1', '0');
INSERT INTO `it_course_category` VALUES ('11', 'IT服务项目经理', '9', '1', '0');
INSERT INTO `it_course_category` VALUES ('12', 'ITIL系列', '0', '0', '0');
INSERT INTO `it_course_category` VALUES ('13', 'ITIL® 2011 Foundation认证', '12', '1', '0');
INSERT INTO `it_course_category` VALUES ('14', '服务提供与协议（SOA）', '12', '1', '0');
INSERT INTO `it_course_category` VALUES ('15', '发布、控制与验证(RCV)', '12', '1', '0');
INSERT INTO `it_course_category` VALUES ('16', '运营支持与分析（OSA）', '12', '1', '0');
INSERT INTO `it_course_category` VALUES ('17', '计划、保护与优化（PPO）', '12', '1', '0');
INSERT INTO `it_course_category` VALUES ('18', '跨生命周期顶点课程（MALC）', '12', '1', '0');

-- ----------------------------
-- Table structure for it_course_video
-- ----------------------------
DROP TABLE IF EXISTS `it_course_video`;
CREATE TABLE `it_course_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_course_video
-- ----------------------------
INSERT INTO `it_course_video` VALUES ('1', '13', '章节1：和阿文一起学信息图表', '', '1', '2016-03-18 11:25:41');
INSERT INTO `it_course_video` VALUES ('2', '13', '课时1：课程学习说明', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '2', '2016-03-18 11:33:31');
INSERT INTO `it_course_video` VALUES ('3', '13', '课时2：阿文试睡第一夜', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '3', '2016-03-18 11:38:08');
INSERT INTO `it_course_video` VALUES ('4', '12', '章节1：和阿文一起学信息图表', '', '1', '2016-03-18 16:14:48');
INSERT INTO `it_course_video` VALUES ('5', '12', '课时1：课程学习说明', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '2', '2016-03-18 16:14:58');
INSERT INTO `it_course_video` VALUES ('6', '12', '课时2：阿文试睡第一夜', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '3', '2016-03-18 16:15:04');
INSERT INTO `it_course_video` VALUES ('7', '15', '课时1：人员要素管理', '1', '1', '2016-03-25 13:35:47');
INSERT INTO `it_course_video` VALUES ('8', '15', '课时2：流程要素管理', '2', '2', '2016-03-25 13:35:59');
INSERT INTO `it_course_video` VALUES ('9', '16', 'IT服务项目经理—服务设计概述', '1', '1', '2016-03-25 13:39:16');

-- ----------------------------
-- Table structure for it_order
-- ----------------------------
DROP TABLE IF EXISTS `it_order`;
CREATE TABLE `it_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `orderid` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `price` decimal(10,2) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_order
-- ----------------------------
INSERT INTO `it_order` VALUES ('16', '1', '2016040151571025', '0', '0.01', '2016-04-01 13:26:59');
INSERT INTO `it_order` VALUES ('17', '1', '2016040110057995', '0', '0.01', '2016-04-01 13:38:05');
INSERT INTO `it_order` VALUES ('18', '1', '2016040152491019', '0', '0.01', '2016-04-01 13:38:44');
INSERT INTO `it_order` VALUES ('19', '1', '2016040610254549', '0', '0.01', '2016-04-06 09:31:11');

-- ----------------------------
-- Table structure for it_order_item
-- ----------------------------
DROP TABLE IF EXISTS `it_order_item`;
CREATE TABLE `it_order_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_order_item
-- ----------------------------
INSERT INTO `it_order_item` VALUES ('19', '2016040151571025', '0', '39', '1', 'test', '0.01', '2016-04-01 13:26:59');
INSERT INTO `it_order_item` VALUES ('20', '2016040110057995', '0', '39', '1', 'test', '0.01', '2016-04-01 13:38:05');
INSERT INTO `it_order_item` VALUES ('21', '2016040152491019', '0', '39', '1', 'test', '0.01', '2016-04-01 13:38:44');
INSERT INTO `it_order_item` VALUES ('22', '2016040610254549', '0', '39', '1', 'test', '0.01', '2016-04-06 09:31:11');

-- ----------------------------
-- Table structure for it_order_pay_log
-- ----------------------------
DROP TABLE IF EXISTS `it_order_pay_log`;
CREATE TABLE `it_order_pay_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `orderid` varchar(255) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `money` decimal(10,2) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_order_pay_log
-- ----------------------------

-- ----------------------------
-- Table structure for it_user
-- ----------------------------
DROP TABLE IF EXISTS `it_user`;
CREATE TABLE `it_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL COMMENT '用户名（手机号码）',
  `password` varchar(255) DEFAULT NULL COMMENT '密码',
  `nickname` varchar(255) DEFAULT NULL COMMENT '昵称（微信用户自动绑定）',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `province` varchar(255) DEFAULT NULL COMMENT '省份',
  `city` varchar(255) DEFAULT NULL COMMENT '城市',
  `headimgurl` varchar(255) DEFAULT NULL COMMENT '头像（微信用户自动绑定）',
  `openid` varchar(255) DEFAULT NULL COMMENT '微信openid',
  `classify` int(11) DEFAULT '0' COMMENT '用户分类：0代表学员，1代表讲师',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user
-- ----------------------------
INSERT INTO `it_user` VALUES ('1', '13912382811', 'bf9f8d1f05dc08cc3b02e8fcf2c2ba57', null, null, null, null, null, null, '1', '2016-03-17 14:11:36');

-- ----------------------------
-- Table structure for it_user_alipay
-- ----------------------------
DROP TABLE IF EXISTS `it_user_alipay`;
CREATE TABLE `it_user_alipay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '会员ID',
  `name` varchar(255) DEFAULT NULL COMMENT '会员真实姓名',
  `alipay` varchar(255) DEFAULT NULL COMMENT '支付宝账号',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_alipay
-- ----------------------------

-- ----------------------------
-- Table structure for it_user_cash_apply
-- ----------------------------
DROP TABLE IF EXISTS `it_user_cash_apply`;
CREATE TABLE `it_user_cash_apply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '会员ID',
  `money` decimal(10,0) DEFAULT NULL COMMENT '提现金额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `status` int(11) DEFAULT '0' COMMENT '状态，0代表未处理，1代表已处理，2代表取消',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_cash_apply
-- ----------------------------

-- ----------------------------
-- Table structure for it_user_money
-- ----------------------------
DROP TABLE IF EXISTS `it_user_money`;
CREATE TABLE `it_user_money` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '会员ID',
  `money` decimal(10,0) DEFAULT NULL COMMENT '账户余额',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_money
-- ----------------------------

-- ----------------------------
-- Table structure for it_user_money_log
-- ----------------------------
DROP TABLE IF EXISTS `it_user_money_log`;
CREATE TABLE `it_user_money_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '会员ID',
  `money` decimal(10,0) DEFAULT NULL COMMENT '交易金额',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_money_log
-- ----------------------------

-- ----------------------------
-- Table structure for it_user_plan
-- ----------------------------
DROP TABLE IF EXISTS `it_user_plan`;
CREATE TABLE `it_user_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `percent` int(11) DEFAULT '0',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_plan
-- ----------------------------
INSERT INTO `it_user_plan` VALUES ('1', '1', '12', '30', '2016-04-05 14:34:51');

-- ----------------------------
-- Table structure for it_user_study
-- ----------------------------
DROP TABLE IF EXISTS `it_user_study`;
CREATE TABLE `it_user_study` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `courseid` int(11) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `percent` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_study
-- ----------------------------
INSERT INTO `it_user_study` VALUES ('19', '1', '12', '2016-04-01 13:34:48', '0');

-- ----------------------------
-- Table structure for it_user_teacher
-- ----------------------------
DROP TABLE IF EXISTS `it_user_teacher`;
CREATE TABLE `it_user_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '会员ID',
  `name` varchar(255) DEFAULT NULL COMMENT '讲师姓名',
  `headimg` varchar(255) DEFAULT NULL,
  `introduction` text COMMENT '讲师介绍',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_teacher
-- ----------------------------
INSERT INTO `it_user_teacher` VALUES ('1', '1', '来源网络', 'images/head.jpg', null, '2016-03-17 14:12:15');

-- ----------------------------
-- Table structure for it_zvideo_list
-- ----------------------------
DROP TABLE IF EXISTS `it_zvideo_list`;
CREATE TABLE `it_zvideo_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_teacher` varchar(64) DEFAULT NULL,
  `video_title` text,
  `video_abstract` text,
  `video_picture` varchar(128) DEFAULT NULL,
  `video_time` int(16) DEFAULT NULL,
  `video_logic` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_zvideo_list
-- ----------------------------
