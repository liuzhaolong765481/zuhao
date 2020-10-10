/*
Navicat MySQL Data Transfer

Source Server         : 本机
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : zuhao

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-10-09 22:39:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xf_user
-- ----------------------------
DROP TABLE IF EXISTS `xf_user`;
CREATE TABLE `xf_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_phone` varchar(11) NOT NULL COMMENT '手机号',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `nick_name` varchar(50) DEFAULT NULL COMMENT '昵称',
  `email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `trade_password` varchar(255) DEFAULT NULL,
  `register_time` datetime NOT NULL,
  `last_login_time` datetime DEFAULT NULL,
  `is_auth` int(2) DEFAULT '0' COMMENT '是否实名认证 0：未实名 1：已实名',
  `ali_number` varchar(50) DEFAULT NULL COMMENT '支付宝账号',
  `balance` decimal(10,2) DEFAULT NULL COMMENT '账户总余额',
  `withable_balance` decimal(10,2) DEFAULT NULL,
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '押金',
  `uuid` varchar(20) DEFAULT NULL COMMENT '用作以后扩展分销模块唯一标识（扩展字段）',
  `real_name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `idcard` varchar(50) DEFAULT NULL COMMENT '身份证号',
  `status` int(2) DEFAULT '1' COMMENT '1:正常（扩展字段）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for xf_user_balance_log
-- ----------------------------
DROP TABLE IF EXISTS `xf_user_balance_log`;
CREATE TABLE `xf_user_balance_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `cate` int(2) DEFAULT '1' COMMENT '1：充值  2：提现',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '操作后余额',
  `descript` text COMMENT '操作描述',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户资金记录表';

-- ----------------------------
-- Table structure for xf_user_behavior
-- ----------------------------
DROP TABLE IF EXISTS `xf_user_behavior`;
CREATE TABLE `xf_user_behavior` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT '0' COMMENT '1:登录账号  2:退出登录 3:充值  4:发布账号 5:租号 6:浏览账号详情  7:关注商品 0:其他',
  `descript` text COMMENT '操作描述',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户行为记录表';

-- ----------------------------
-- Table structure for xf_user_follow
-- ----------------------------
DROP TABLE IF EXISTS `xf_user_follow`;
CREATE TABLE `xf_user_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `obj_id` int(11) DEFAULT NULL COMMENT '相关关联id',
  `obj_title` varchar(255) DEFAULT NULL COMMENT '关注属性标题冗余',
  `type` int(2) DEFAULT '1' COMMENT '目前只涉及商品',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户关注表';
