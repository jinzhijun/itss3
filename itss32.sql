/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : itss3

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-05-11 17:45:18
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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

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
INSERT INTO `it_admin_menu` VALUES ('11', '直播课程', 'zb_video.php?menu=11', '2', '1', '100');
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
INSERT INTO `it_admin_menu` VALUES ('22', '友情链接', 'link.php?menu=22', '6', '0', '100');

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
  `url` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_artical
-- ----------------------------
INSERT INTO `it_artical` VALUES ('3', '1', '聆听，学习...才能领导', null, '11', '0', 'course.php?id=33', '2016-04-15 13:28:26');
INSERT INTO `it_artical` VALUES ('4', '1', '杨海成：运用新技术促进两化深度融合', null, '杨海成：运用新技术促进两化深度融合', '0', 'course.php?id=24', '2016-04-15 13:44:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_artical_category
-- ----------------------------
INSERT INTO `it_artical_category` VALUES ('1', '直播公告', '0', '0');
INSERT INTO `it_artical_category` VALUES ('2', '网页底部文章', '0', '0');
INSERT INTO `it_artical_category` VALUES ('3', '关于我们', '2', '1');
INSERT INTO `it_artical_category` VALUES ('4', '帮助中心', '2', '1');
INSERT INTO `it_artical_category` VALUES ('5', '商务合作', '2', '1');

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
  `genre` int(11) DEFAULT '0' COMMENT '0代表点播，1代表直播',
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_course
-- ----------------------------
INSERT INTO `it_course` VALUES ('12', '8', '和方骥一起学Excel（图文+视频）', '想学Excel，却因为难度大，望而却步，无法坚持的朋友们，你们有福了。', '1', '../files/day_160318/201603180833308120.jpg', '0.00', '想学Excel，却因为难度大，望而却步，无法坚持的朋友们，你们有福了。', '【微信购买用户注意】<br />目前云课堂app已经支持微信登录，请大家无论是电脑或手机app登录时都务必选择微信登录的方式进行学习。<br /><br /><br />账号或浏览技术型问题<br />请咨询网易客服0571-89853416 （工作日周一至周五10:00-12:00,14:00-18:00）<br />——————————————————————————<br />购买前请务必看完免费第一节《课程学习指南，购前必读》<br />购买后请点击网页右侧的【服务咨询】或微博私信@秋叶 老师你的订单号以及购买课程名称，加入课程学员QQ群！<br /><br /><br />秋叶大叔联手方骥老师共同出品！<br />购买或正式学习课程之前，请看免费第一节《课程学习指南，购前必读》！<br />别怕，Excel其实很简单！来这里，和方骥一起学Excel ，国内高手用科学好玩实操的课程，让你迅速从小白变成小能！<br /><br /><br />本课程由国内Excel牛人方骥老师（@EXCEL大全）和刘晓月老师（@奔跑的小月）开发，&nbsp;<br />如果你只是粗通Excel最简单的操作，想和小伙伴一起向国内Excel牛人学习，来这里，就对了！<br />课程特点：<br />实用，系统，全面，学起来完全不枯燥有没有？<br />一次购买，持续升级！只需要129元，你就可以和国内顶尖Excel牛人一起提高！<br />现在，还等什么？请一起来吧！', '0', '1', '0', '2016-03-18 08:34:00');
INSERT INTO `it_course` VALUES ('13', '8', 'C/C++黑客编程项目实战课程', '适合所有阶段（包括零基础入门）', '1', '../files/day_160318/201603180836345422.jpg', '100.00', '适合所有阶段（包括零基础入门）', '全程课程包括五大层次，19个阶段，超300个课时。由0基础起，循环渐进、稳打稳扎而学。系统学习班课程覆盖Python、C与C++、STL、Windows、Linux等内容。课程全程以项目为驱动，兴趣为主导，让你顺利毕业的同时，拥有三年项目软件开发经验。<br /><br /><br />课程内容：<br />第01章：计算机科学导论<br />第02章：Python语言入门<br />第03章：C语言入门<br />第04章：C语言项目实战<br />第05章：C过渡C++班<br />第06章：C++面对对象<br />第07章：C++面向对象实战<br />第08章：C++模板编程<br />第09章：C++STL标准库<br />第10章：C++STL标准库实战<br />第11章：Windows界面库实战<br />第12章：Windows核心编程<br />第13章：Windows网络编程<br />第14章：Windows应用<br />第15章：Linux系统入门<br />第16章：Linux应用实战<br />第17章：Linux网络模型<br />第18章：Linux网络编程实战<br />第19章：Linux大并发实战<br />第20章：C++综合考核<br /><br /><br />课程更新：<br />本课程系列连更三季，每周五，六下午15:00更新2集。<br />用生动幽默的讲课风格、手把手的教学模式让你成为c++编程工程师！<br />课程内参考上有老师的QQ号，方便与参加课程的同学及时沟通。<br />本课程属于录播课程，直播地址请联系老师免费报名学习。', '0', '1', '0', '2016-03-18 08:37:21');
INSERT INTO `it_course` VALUES ('14', '8', '和方骥一起学Excel（图文+视频）', '想学Excel，却因为难度大，望而却步，无法坚持的朋友们，你们有福了。', '1', '../files/day_160318/201603180833308120.jpg', '50.00', '想学Excel，却因为难度大，望而却步，无法坚持的朋友们，你们有福了。', '【微信购买用户注意】<br />目前云课堂app已经支持微信登录，请大家无论是电脑或手机app登录时都务必选择微信登录的方式进行学习。<br /><br /><br />账号或浏览技术型问题<br />请咨询网易客服0571-89853416 （工作日周一至周五10:00-12:00,14:00-18:00）<br />——————————————————————————<br />购买前请务必看完免费第一节《课程学习指南，购前必读》<br />购买后请点击网页右侧的【服务咨询】或微博私信@秋叶 老师你的订单号以及购买课程名称，加入课程学员QQ群！<br /><br /><br />秋叶大叔联手方骥老师共同出品！<br />购买或正式学习课程之前，请看免费第一节《课程学习指南，购前必读》！<br />别怕，Excel其实很简单！来这里，和方骥一起学Excel ，国内高手用科学好玩实操的课程，让你迅速从小白变成小能！<br /><br /><br />本课程由国内Excel牛人方骥老师（@EXCEL大全）和刘晓月老师（@奔跑的小月）开发，&nbsp;<br />如果你只是粗通Excel最简单的操作，想和小伙伴一起向国内Excel牛人学习，来这里，就对了！<br />课程特点：<br />实用，系统，全面，学起来完全不枯燥有没有？<br />一次购买，持续升级！只需要129元，你就可以和国内顶尖Excel牛人一起提高！<br />现在，还等什么？请一起来吧！', '0', '1', '0', '2016-03-22 11:02:06');
INSERT INTO `it_course` VALUES ('15', '8', 'IT服务项目经理—IT服务运营', '人员要素管理,流程要素管理', '1', '../files/day_160325/201603251333265338.png', '0.00', '人员要素管理,流程要素管理', '人员要素管理,流程要素管理', '0', '1', '0', '2016-03-25 13:33:52');
INSERT INTO `it_course` VALUES ('16', '1', 'IT服务项目经理—服务设计概述', 'IT服务项目经理—服务设计概述', '1', '../files/day_160325/201603251339008471.png', '0.00', 'IT服务项目经理—服务设计概述', 'IT服务项目经理—服务设计概述', '0', '1', '0', '2016-03-25 13:39:05');
INSERT INTO `it_course` VALUES ('17', '8', '数据中心可视化解决方案', '数据中心可视化解决方案', '1', '../files/day_160325/201603251339564454.png', '0.00', '数据中心可视化解决方案', '数据中心可视化解决方案', '0', '1', '0', '2016-03-25 13:40:04');
INSERT INTO `it_course` VALUES ('18', '8', '琳达希尔-如何管理集体创造力', '琳达希尔-如何管理集体创造力', '1', '../files/day_160325/201603251341427901.png', '0.00', '琳达希尔-如何管理集体创造力', '琳达希尔-如何管理集体创造力', '0', '1', '0', '2016-03-25 13:41:44');
INSERT INTO `it_course` VALUES ('19', '8', '扎克伯格谈facebook创业过程', '扎克伯格谈facebook创业过程', '1', '../files/day_160325/201603251410593736.png', '0.00', '扎克伯格谈facebook创业过程', '扎克伯格谈facebook创业过程', '0', '1', '0', '2016-03-25 14:11:02');
INSERT INTO `it_course` VALUES ('20', '8', '马云视频演讲：信用危机时代如何让信用升值', '马云视频演讲：信用危机时代如何让信用升值', '1', '../files/day_160325/201603251411596384.png', '0.00', '马云视频演讲：信用危机时代如何让信用升值', '马云视频演讲：信用危机时代如何让信用升值', '0', '1', '0', '2016-03-25 14:12:01');
INSERT INTO `it_course` VALUES ('21', '8', 'TED演讲集Rachel Botsman新型经济的货币是信用', 'TED演讲集Rachel Botsman新型经济的货币是信用', '1', '../files/day_160325/201603251413001500.png', '0.00', 'TED演讲集Rachel Botsman新型经济的货币是信用', 'TED演讲集Rachel Botsman新型经济的货币是信用', '0', '1', '0', '2016-03-25 14:13:01');
INSERT INTO `it_course` VALUES ('22', '8', 'ITSS与两化融合', 'ITSS与两化融合', '1', '../files/day_160325/201603251414013275.png', '0.00', 'ITSS与两化融合', 'ITSS与两化融合', '0', '1', '0', '2016-03-25 14:14:03');
INSERT INTO `it_course` VALUES ('23', '8', '智能制造是两化深度融合的主攻方向', '智能制造是两化深度融合的主攻方向', '1', '../files/day_160325/201603251414557407.png', '0.00', '智能制造是两化深度融合的主攻方向', '智能制造是两化深度融合的主攻方向', '0', '1', '0', '2016-03-25 14:14:56');
INSERT INTO `it_course` VALUES ('24', '8', '杨海成：运用新技术促进两化深度融合', '杨海成：运用新技术促进两化深度融合', '1', '../files/day_160325/201603251415485004.png', '0.00', '杨海成：运用新技术促进两化深度融合', '杨海成：运用新技术促进两化深度融合', '0', '1', '0', '2016-03-25 14:15:51');
INSERT INTO `it_course` VALUES ('25', '8', '云计算和大数据关于两化融合创新探讨', '云计算和大数据关于两化融合创新探讨', '1', '../files/day_160325/201603251416439076.png', '0.00', '云计算和大数据关于两化融合创新探讨', '云计算和大数据关于两化融合创新探讨', '0', '1', '0', '2016-03-25 14:16:44');
INSERT INTO `it_course` VALUES ('26', '8', '奔驰工业4.0生产线', '奔驰工业4.0生产线', '1', '../files/day_160325/201603251417271378.png', '0.00', '奔驰工业4.0生产线', '奔驰工业4.0生产线', '0', '1', '0', '2016-03-25 14:17:28');
INSERT INTO `it_course` VALUES ('27', '8', '改善工作的快乐之道', '改善工作的快乐之道', '1', '../files/day_160325/201603251418189375.png', '0.00', '改善工作的快乐之道', '改善工作的快乐之道', '0', '1', '0', '2016-03-25 14:18:20');
INSERT INTO `it_course` VALUES ('28', '8', '进入计算机的“真实”世界', '进入计算机的“真实”世界', '1', '../files/day_160325/201603251419047523.png', '0.00', '进入计算机的“真实”世界', '进入计算机的“真实”世界', '0', '1', '0', '2016-03-25 14:19:06');
INSERT INTO `it_course` VALUES ('29', '8', '新一代数字图书', '新一代数字图书', '1', '../files/day_160325/201603251419573734.png', '0.00', '新一代数字图书', '新一代数字图书', '0', '1', '0', '2016-03-25 14:19:59');
INSERT INTO `it_course` VALUES ('30', '8', '更具真实感，科技魔术', '更具真实感，科技魔术', '1', '../files/day_160325/201603251420394291.png', '0.00', '更具真实感，科技魔术', '更具真实感，科技魔术', '0', '1', '0', '2016-03-25 14:20:40');
INSERT INTO `it_course` VALUES ('31', '8', '怎样化杂为简', '怎样化杂为简', '1', '../files/day_160325/201603251421175771.png', '0.00', '怎样化杂为简', '怎样化杂为简', '0', '1', '0', '2016-03-25 14:21:19');
INSERT INTO `it_course` VALUES ('32', '8', '汽车的未来', '汽车的未来', '1', '../files/day_160325/201603251422049678.png', '0.00', '汽车的未来', '汽车的未来', '0', '1', '0', '2016-03-25 14:22:06');
INSERT INTO `it_course` VALUES ('33', '8', '聆听，学习...才能领导', '聆听，学习...才能领导', '1', '../files/day_160325/201603251422559807.png', '0.00', '聆听，学习...才能领导', '聆听，学习...才能领导', '0', '1', '0', '2016-03-25 14:22:57');
INSERT INTO `it_course` VALUES ('34', '8', '数据重构商业,流量改写未来', '数据重构商业,流量改写未来', '1', '../files/day_160325/201603251423422920.png', '0.00', '数据重构商业,流量改写未来', '数据重构商业,流量改写未来', '0', '1', '0', '2016-03-25 14:23:44');
INSERT INTO `it_course` VALUES ('35', '8', '共享未来城市', '共享未来城市', '1', '../files/day_160325/201603251424254875.png', '0.00', '共享未来城市', '共享未来城市', '0', '1', '0', '2016-03-25 14:24:27');
INSERT INTO `it_course` VALUES ('36', '8', '让我们收回互联网', '让我们收回互联网', '1', '../files/day_160325/201603251425073048.png', '0.00', '让我们收回互联网', '让我们收回互联网', '0', '1', '0', '2016-03-25 14:25:09');
INSERT INTO `it_course` VALUES ('37', '8', '用视频再造教育', '用视频再造教育', '1', '../files/day_160325/201603251425451260.png', '0.00', '用视频再造教育', '用视频再造教育', '0', '1', '0', '2016-03-25 14:25:50');
INSERT INTO `it_course` VALUES ('38', '8', '市与企业中的奇妙数学', '市与企业中的奇妙数学', '1', '../files/day_160325/201603251426294058.png', '0.00', '市与企业中的奇妙数学', '市与企业中的奇妙数学', '0', '1', '0', '2016-03-25 14:26:30');
INSERT INTO `it_course` VALUES ('75', '46', 'PowerPoint', '课程简述', '1', '../files/day_160510/201605101425013367.jpg', '0.00', '学生', '哇额达到', '0', '1', '1', '2016-05-10 14:25:23');
INSERT INTO `it_course` VALUES ('76', '47', '999', '999', '1', '../files/day_160510/201605101538025326.jpg', '0.00', '999', '99', '0', '1', '1', '2016-05-10 15:38:07');
INSERT INTO `it_course` VALUES ('77', '13', '测试课程', '111', '1', '../files/day_160511/201605111304557396.jpg', '0.00', '11', '课程描述', '0', '1', '1', '2016-05-11 13:05:08');

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
  `pid` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_course_category
-- ----------------------------
INSERT INTO `it_course_category` VALUES ('1', 'ITSS/ITIL', '0', '0', '0', '1,6,7,8,9,10,11,12,13');
INSERT INTO `it_course_category` VALUES ('2', '移动/前端', '0', '0', '0', '2,14,15,16,17,18,19,20,21');
INSERT INTO `it_course_category` VALUES ('3', '后端/测试', '0', '0', '0', '3,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37');
INSERT INTO `it_course_category` VALUES ('4', '网络/运维', '0', '0', '0', '4,38,39,40,41');
INSERT INTO `it_course_category` VALUES ('5', '设计/办公', '0', '0', '0', '5,42,43,44,45,46,47');
INSERT INTO `it_course_category` VALUES ('6', 'ITSS', '1', '1', '0', '6,7,8,');
INSERT INTO `it_course_category` VALUES ('7', 'IT服务项目经理', '6', '2', '0', '7');
INSERT INTO `it_course_category` VALUES ('8', 'IT服务工程师', '6', '2', '0', '8');
INSERT INTO `it_course_category` VALUES ('9', '信用管理', '1', '1', '0', '9,10');
INSERT INTO `it_course_category` VALUES ('10', '信用管理师', '9', '2', '0', '10');
INSERT INTO `it_course_category` VALUES ('11', 'ITIL', '1', '1', '0', '11,13,12');
INSERT INTO `it_course_category` VALUES ('12', 'ITIL2011', '11', '2', '0', '12');
INSERT INTO `it_course_category` VALUES ('13', 'Foundation', '11', '2', '0', '13');
INSERT INTO `it_course_category` VALUES ('14', '移动开发', '2', '1', '0', '14,15,16');
INSERT INTO `it_course_category` VALUES ('15', 'Android', '14', '2', '0', '15');
INSERT INTO `it_course_category` VALUES ('16', 'ios', '14', '2', '0', '16');
INSERT INTO `it_course_category` VALUES ('17', '前端开发', '2', '1', '0', '17,18,19');
INSERT INTO `it_course_category` VALUES ('18', 'HTML5&CSS3', '17', '2', '0', '18');
INSERT INTO `it_course_category` VALUES ('19', 'JavaScript', '17', '2', '0', '19');
INSERT INTO `it_course_category` VALUES ('20', '游戏开发', '2', '1', '0', '20,21');
INSERT INTO `it_course_category` VALUES ('21', 'Cocos2D', '20', '2', '0', '21');
INSERT INTO `it_course_category` VALUES ('22', '后端开发', '3', '1', '0', '22,23,24,25,26,27,');
INSERT INTO `it_course_category` VALUES ('23', 'JAVA', '22', '2', '0', '23');
INSERT INTO `it_course_category` VALUES ('24', 'C/C++', '22', '2', '0', '24');
INSERT INTO `it_course_category` VALUES ('25', 'PHP', '22', '2', '0', '25');
INSERT INTO `it_course_category` VALUES ('26', 'Lua', '22', '2', '0', '26');
INSERT INTO `it_course_category` VALUES ('27', '数据库', '22', '2', '0', '27');
INSERT INTO `it_course_category` VALUES ('28', '软件测试', '3', '1', '0', '28,29,30');
INSERT INTO `it_course_category` VALUES ('29', '软件测试基础', '28', '2', '0', '29');
INSERT INTO `it_course_category` VALUES ('30', '测试实操', '28', '2', '0', '30');
INSERT INTO `it_course_category` VALUES ('31', '大数据', '3', '1', '0', '31,32,33,34,35');
INSERT INTO `it_course_category` VALUES ('32', 'Docker', '32', '2', '0', '32');
INSERT INTO `it_course_category` VALUES ('33', 'Hadoop', '32', '2', '0', '33');
INSERT INTO `it_course_category` VALUES ('34', 'Spark', '32', '2', '0', '34');
INSERT INTO `it_course_category` VALUES ('35', 'Scala', '32', '2', '0', '35');
INSERT INTO `it_course_category` VALUES ('36', '开发工具', '3', '1', '0', '36,37');
INSERT INTO `it_course_category` VALUES ('37', 'SVN', '36', '2', '0', '37');
INSERT INTO `it_course_category` VALUES ('38', '红帽', '4', '1', '0', '38');
INSERT INTO `it_course_category` VALUES ('39', 'Linux', '4', '1', '0', '39');
INSERT INTO `it_course_category` VALUES ('40', '思科', '4', '1', '0', '40');
INSERT INTO `it_course_category` VALUES ('41', '华为', '4', '1', '0', '41');
INSERT INTO `it_course_category` VALUES ('42', '设计', '5', '1', '0', '42,43,44');
INSERT INTO `it_course_category` VALUES ('43', 'UI设计', '42', '2', '0', '43');
INSERT INTO `it_course_category` VALUES ('44', 'CG设计', '42', '2', '0', '44');
INSERT INTO `it_course_category` VALUES ('45', '办公', '5', '1', '0', '45,46,47');
INSERT INTO `it_course_category` VALUES ('46', 'PowerPoint', '45', '2', '0', '46');
INSERT INTO `it_course_category` VALUES ('47', 'Excel', '45', '2', '0', '47');
INSERT INTO `it_course_category` VALUES ('48', '电商/营销', '0', '0', '0', '48,49,50');
INSERT INTO `it_course_category` VALUES ('49', '网络营销', '48', '1', '0', '49');
INSERT INTO `it_course_category` VALUES ('50', '跨境电商营销', '48', '1', '0', '50');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_course_video
-- ----------------------------
INSERT INTO `it_course_video` VALUES ('1', '38', '章节1：和阿文一起学信息图表', '', '1', '2016-03-18 11:25:41');
INSERT INTO `it_course_video` VALUES ('2', '38', '课时1：课程学习说明', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '2', '2016-03-18 11:33:31');
INSERT INTO `it_course_video` VALUES ('3', '38', '课时2：阿文试睡第一夜', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '3', '2016-03-18 11:38:08');
INSERT INTO `it_course_video` VALUES ('4', '12', '章节1：和阿文一起学信息图表', '', '1', '2016-03-18 16:14:48');
INSERT INTO `it_course_video` VALUES ('5', '12', '课时1：课程学习说明', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '2', '2016-03-18 16:14:58');
INSERT INTO `it_course_video` VALUES ('6', '12', '课时2：阿文试睡第一夜', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '3', '2016-03-18 16:15:04');
INSERT INTO `it_course_video` VALUES ('7', '15', '课时1：人员要素管理', '1', '1', '2016-03-25 13:35:47');
INSERT INTO `it_course_video` VALUES ('8', '15', '课时2：流程要素管理', '2', '2', '2016-03-25 13:35:59');
INSERT INTO `it_course_video` VALUES ('9', '16', 'IT服务项目经理—服务设计概述', '1', '1', '2016-03-25 13:39:16');
INSERT INTO `it_course_video` VALUES ('10', '41', '直播测试课堂', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '1', '2016-04-12 16:42:14');
INSERT INTO `it_course_video` VALUES ('11', '42', '免费课堂', 'http://player.polyv.net/videos/f8a2242b3cc7c5cfa8118bc3c7ed705f_f.swf', '1', '2016-04-12 16:50:36');

-- ----------------------------
-- Table structure for it_course_video_time
-- ----------------------------
DROP TABLE IF EXISTS `it_course_video_time`;
CREATE TABLE `it_course_video_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `courserid` int(11) DEFAULT NULL,
  `b_time` datetime DEFAULT NULL,
  `e_time` datetime DEFAULT NULL,
  `assistantToken` int(11) DEFAULT NULL,
  `webid` varchar(32) DEFAULT NULL,
  `webnum` int(12) DEFAULT NULL,
  `studentToken` varchar(12) DEFAULT NULL,
  `studentUrl` varchar(255) DEFAULT NULL,
  `teacherToken` varchar(12) DEFAULT NULL,
  `teacherUrl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_course_video_time
-- ----------------------------
INSERT INTO `it_course_video_time` VALUES ('19', '75', '2016-05-10 14:25:40', '2016-05-10 18:25:44', '923568', 'wITcydbuxp', '18477268', '514042', 'http://itss3.gensee.com/training/site/s/18477268', '923568', 'http://itss3.gensee.com/training/site/r/18477268');
INSERT INTO `it_course_video_time` VALUES ('20', '76', '2016-05-10 15:38:17', '2016-05-11 18:38:20', '93459', 'ip4UQuj34y', '51445249', '835490', 'http://itss3.gensee.com/training/site/s/51445249', '093459', 'http://itss3.gensee.com/training/site/r/51445249');
INSERT INTO `it_course_video_time` VALUES ('21', '77', '2016-05-14 12:00:00', '2016-05-14 13:00:00', '716947', 'bFyGsSoQ7B', '4319892', '501210', 'http://itss3.gensee.com/training/site/s/04319892', '716947', 'http://itss3.gensee.com/training/site/r/04319892');

-- ----------------------------
-- Table structure for it_link
-- ----------------------------
DROP TABLE IF EXISTS `it_link`;
CREATE TABLE `it_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `num` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_link
-- ----------------------------
INSERT INTO `it_link` VALUES ('1', '中国政府网', 'linklogo/1.png', 'http://www.gov.cn/', null);
INSERT INTO `it_link` VALUES ('2', 'title', '../files/day_160503/201605031005296403.jpg', 'http://www.miit.gov.cn/', '2');
INSERT INTO `it_link` VALUES ('3', 'title', '../files/day_160503/201605031006086208.png', 'http://www.itss.cn/', '2');
INSERT INTO `it_link` VALUES ('4', null, 'linklogo/4.jpg', 'http://www.itss-training.cn/', null);
INSERT INTO `it_link` VALUES ('5', null, 'linklogo/5.png', 'http://www.cspiii.com/', null);
INSERT INTO `it_link` VALUES ('6', null, 'linklogo/6.jpg', 'http://www.jseic.gov.cn/', null);
INSERT INTO `it_link` VALUES ('7', null, 'linklogo/7.png', 'http://www.wuxi.gov.cn/', null);
INSERT INTO `it_link` VALUES ('8', null, 'linklogo/8.jpg', 'http://etc.wuxi.gov.cn/', null);
INSERT INTO `it_link` VALUES ('9', null, 'linklogo/9.png', 'http://xdj.wuxi.gov.cn/', null);
INSERT INTO `it_link` VALUES ('10', null, 'linklogo/10.png', 'http://www.wxkjj.gov.cn/', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_order
-- ----------------------------
INSERT INTO `it_order` VALUES ('16', '1', '2016040151571025', '0', '0.01', '2016-04-01 13:26:59');
INSERT INTO `it_order` VALUES ('17', '1', '2016040110057995', '0', '0.01', '2016-04-01 13:38:05');
INSERT INTO `it_order` VALUES ('18', '1', '2016040152491019', '0', '0.01', '2016-04-01 13:38:44');
INSERT INTO `it_order` VALUES ('19', '1', '2016040610254549', '0', '0.01', '2016-04-06 09:31:11');
INSERT INTO `it_order` VALUES ('20', '2', '2016041254995197', '0', '0.01', '2016-04-12 16:53:26');
INSERT INTO `it_order` VALUES ('21', '1', '2016051151529852', '0', '50.00', '2016-05-11 10:27:31');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_order_item
-- ----------------------------
INSERT INTO `it_order_item` VALUES ('19', '2016040151571025', '0', '39', '1', 'test', '0.01', '2016-04-01 13:26:59');
INSERT INTO `it_order_item` VALUES ('20', '2016040110057995', '0', '39', '1', 'test', '0.01', '2016-04-01 13:38:05');
INSERT INTO `it_order_item` VALUES ('21', '2016040152491019', '0', '39', '1', 'test', '0.01', '2016-04-01 13:38:44');
INSERT INTO `it_order_item` VALUES ('22', '2016040610254549', '0', '39', '1', 'test', '0.01', '2016-04-06 09:31:11');
INSERT INTO `it_order_item` VALUES ('23', '2016041254995197', '0', '41', '1', '直播测试', '0.01', '2016-04-12 16:53:26');
INSERT INTO `it_order_item` VALUES ('24', '2016051151529852', '0', '14', '1', '和方骥一起学Excel（图文+视频）', '50.00', '2016-05-11 10:27:31');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user
-- ----------------------------
INSERT INTO `it_user` VALUES ('1', '13912382812', 'bf9f8d1f05dc08cc3b02e8fcf2c2ba57', null, null, null, null, null, null, '1', '2016-03-17 14:11:36');
INSERT INTO `it_user` VALUES ('2', '13912382811', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, '0', '2016-04-12 08:43:45');
INSERT INTO `it_user` VALUES ('3', '13584877656', '73930c2027351109a5ed3ed0f15a16dd', null, null, null, null, null, null, '0', '2016-04-15 15:04:55');
INSERT INTO `it_user` VALUES ('4', '', 'd41d8cd98f00b204e9800998ecf8427e', null, null, null, null, null, null, '0', '2016-04-16 08:51:29');
INSERT INTO `it_user` VALUES ('5', '18862757669', 'e10adc3949ba59abbe56e057f20f883e', null, null, null, null, null, null, '0', '2016-05-09 10:38:33');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_study
-- ----------------------------
INSERT INTO `it_user_study` VALUES ('19', '1', '12', '2016-04-01 13:34:48', '0');
INSERT INTO `it_user_study` VALUES ('20', '2', '42', '2016-04-12 16:50:06', '0');
INSERT INTO `it_user_study` VALUES ('21', '3', '12', '2016-04-15 15:04:59', '0');
INSERT INTO `it_user_study` VALUES ('22', '3', '23', '2016-04-15 15:05:29', '0');
INSERT INTO `it_user_study` VALUES ('23', '3', '24', '2016-04-15 15:06:11', '0');
INSERT INTO `it_user_study` VALUES ('24', '3', '34', '2016-04-27 18:11:36', '0');

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
  `phone` varchar(255) DEFAULT NULL,
  `qq` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uid` (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_user_teacher
-- ----------------------------
INSERT INTO `it_user_teacher` VALUES ('1', '1', 'ITSS实训基地', '../files/day_160511/201605111740051446.jpg', '国家信息技术服务标准（ITSS）全权成员单位和全国授权培训机构，是工信部授权国家两化融合管理体系服务机构，是江苏省信用服务机构。同时又是美国SEI授权CMMI服务机构和英国APMG授权ITIL的培训机构。', '123', '111', '111@11.com', '2016-03-17 14:12:15');

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
  `video_time` varchar(32) DEFAULT NULL,
  `video_logic` tinyint(4) DEFAULT NULL,
  `video_price` double DEFAULT NULL,
  `video_endtime` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_zvideo_list
-- ----------------------------
INSERT INTO `it_zvideo_list` VALUES ('21', '测试讲师', '文章标题', '简介呢', '/23/aasdas/xa', '04/15/2016 02:03:56', null, '123', '04/15/2016 02:03:58');
INSERT INTO `it_zvideo_list` VALUES ('22', '测试讲师34', '文章标题34', '简介呢34', '43434', '04/10/2016 10:59:42', null, '12334', '04/10/2016 10:59:45');
INSERT INTO `it_zvideo_list` VALUES ('23', '测试讲师', '文章标题', '简介呢', '/23/aasdas/xa', '1460415939', null, '123', '1460416062');
INSERT INTO `it_zvideo_list` VALUES ('24', '测试讲师', '文章标题', '简介呢', 'picture/asf/sdaasd', '1460416414', null, '6666', '1460502817');
INSERT INTO `it_zvideo_list` VALUES ('25', '李云龙', '李云龙', '李云龙简介', '封面图片地址', '1460562139', null, '888.88', '1460648551');

-- ----------------------------
-- Table structure for it_zvideo_page
-- ----------------------------
DROP TABLE IF EXISTS `it_zvideo_page`;
CREATE TABLE `it_zvideo_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_uid` int(11) DEFAULT NULL,
  `page_title` varchar(128) DEFAULT NULL,
  `page_adress` text,
  `page_ctime` int(16) DEFAULT NULL,
  `page_etime` int(16) DEFAULT NULL,
  `video_t` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of it_zvideo_page
-- ----------------------------
INSERT INTO `it_zvideo_page` VALUES ('1', '1', 'title', '</htmt?>', '123412441', '1241243', null);
INSERT INTO `it_zvideo_page` VALUES ('2', null, '第一课', null, '1460458802', '1460462405', null);
INSERT INTO `it_zvideo_page` VALUES ('3', null, '小标题', '<form>/asdasd?<?', '1460685836', '1460469941', null);
INSERT INTO `it_zvideo_page` VALUES ('4', null, '项目介绍', '<form>/asdasd?<?', '1460470400', '1460474002', '测试讲师');
INSERT INTO `it_zvideo_page` VALUES ('5', null, '23', '<form>/asdasd?<?', '1460685836', '1460685838', '测试讲师');
INSERT INTO `it_zvideo_page` VALUES ('6', null, 'hello world ', '<form>/asdasd?<?<.asdas>', '1461117836', '1461636238', '测试讲师');
INSERT INTO `it_zvideo_page` VALUES ('7', null, '项目介绍', '<form>/asdasd?<?', '1460513036', '1461636238', '测试讲师');
INSERT INTO `it_zvideo_page` VALUES ('8', null, '第一课', '<embed height=\"415\" width=\"544\" quality=\"high\" allowfullscreen=\"true\" type=\"application/x-shockwave-flash\" src=\"http://static.hdslb.com/miniloader.swf\" flashvars=\"aid=4324417&page=1\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\"></embed>', '1460685836', '1460685838', '李云龙');
INSERT INTO `it_zvideo_page` VALUES ('9', null, '第二课', '<embed height=\"415\" width=\"544\" quality=\"high\" allowfullscreen=\"true\" type=\"application/x-shockwave-flash\" src=\"http://static.hdslb.com/miniloader.swf\" flashvars=\"aid=4340614&page=1\" pluginspage=\"http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash\"></embed>', '1460477150', '1460685838', '李云龙');
