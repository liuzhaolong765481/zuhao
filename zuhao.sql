/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : zuhao

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-10-19 10:51:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for xf_account
-- ----------------------------
DROP TABLE IF EXISTS `xf_account`;
CREATE TABLE `xf_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '账号标题',
  `descript` text COMMENT '账号描述',
  `explain` varchar(255) DEFAULT NULL COMMENT '租号说明',
  `uid` int(11) DEFAULT NULL,
  `shop_id` int(11) DEFAULT '0' COMMENT '0:归属平台 ',
  `game_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL COMMENT '游戏大区id',
  `region_name` varchar(255) DEFAULT NULL COMMENT '大区名称',
  `service_id` int(11) DEFAULT NULL COMMENT '所属服务器id',
  `service_name` varchar(255) DEFAULT NULL COMMENT '所属服务器名称',
  `images` text COMMENT '图片组',
  `browse_times` int(11) DEFAULT '0' COMMENT '浏览次数',
  `lease_times` int(11) DEFAULT '0' COMMENT '出租次数',
  `lease_hour` int(11) DEFAULT '0' COMMENT '累计出租时长',
  `follow_times` int(11) DEFAULT '0' COMMENT '关注数量',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '账号押金，为0则表示不需要押金',
  `tags` text COMMENT '账号标签',
  `is_upper` int(2) DEFAULT '1' COMMENT '是否上架 1：是 0：否',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='平台账号表';

-- ----------------------------
-- Records of xf_account
-- ----------------------------

-- ----------------------------
-- Table structure for xf_account_sku_relation
-- ----------------------------
DROP TABLE IF EXISTS `xf_account_sku_relation`;
CREATE TABLE `xf_account_sku_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '游戏sku id',
  `sku_id` int(11) DEFAULT NULL,
  `val` varchar(255) DEFAULT NULL COMMENT 'sku对应值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='账号sku对应关系表';

-- ----------------------------
-- Records of xf_account_sku_relation
-- ----------------------------

-- ----------------------------
-- Table structure for xf_account_spces_relation
-- ----------------------------
DROP TABLE IF EXISTS `xf_account_spces_relation`;
CREATE TABLE `xf_account_spces_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) DEFAULT NULL COMMENT '账号id',
  `specs_id` int(11) DEFAULT NULL COMMENT '规格id',
  `price` decimal(10,2) DEFAULT NULL COMMENT '对应规格价钱',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='账号价钱规格对应表';

-- ----------------------------
-- Records of xf_account_spces_relation
-- ----------------------------

-- ----------------------------
-- Table structure for xf_account_specs
-- ----------------------------
DROP TABLE IF EXISTS `xf_account_specs`;
CREATE TABLE `xf_account_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `specs_name` varchar(255) DEFAULT NULL COMMENT '账号出租规格名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='账号出租规格表';

-- ----------------------------
-- Records of xf_account_specs
-- ----------------------------
INSERT INTO `xf_account_specs` VALUES ('1', '每小时');
INSERT INTO `xf_account_specs` VALUES ('2', '包天');
INSERT INTO `xf_account_specs` VALUES ('3', '包夜');
INSERT INTO `xf_account_specs` VALUES ('4', '包星期');

-- ----------------------------
-- Table structure for xf_ad
-- ----------------------------
DROP TABLE IF EXISTS `xf_ad`;
CREATE TABLE `xf_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL COMMENT '图片地址',
  `href` varchar(255) DEFAULT NULL COMMENT '跳转链接',
  `type` int(2) DEFAULT '1' COMMENT '分类  1：首页banner  2:首页推荐合作伙伴  3：导航页面广告 。。。',
  `is_show` int(2) DEFAULT '1' COMMENT '是否展示 1：展示  0：不展示',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='广告表';

-- ----------------------------
-- Records of xf_ad
-- ----------------------------
INSERT INTO `xf_ad` VALUES ('1', '/uploads/20201016/10xr52dXoNTPmS7yu3UVWZif89MhyW55.jpg', 'http://www.baidu.coms', '1', '1', '2020-10-16 17:55:12');

-- ----------------------------
-- Table structure for xf_admin
-- ----------------------------
DROP TABLE IF EXISTS `xf_admin`;
CREATE TABLE `xf_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xf_admin
-- ----------------------------
INSERT INTO `xf_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- ----------------------------
-- Table structure for xf_article
-- ----------------------------
DROP TABLE IF EXISTS `xf_article`;
CREATE TABLE `xf_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `auth` varchar(255) DEFAULT NULL COMMENT '来源',
  `cate_id` int(11) DEFAULT NULL COMMENT '分类id',
  `seo_title` varchar(255) DEFAULT NULL COMMENT 'seo标题',
  `seo_keywords` varchar(255) DEFAULT NULL COMMENT 'seo关键字',
  `seo_content` text COMMENT 'seo描述',
  `image` varchar(255) DEFAULT NULL COMMENT '封面图片',
  `content` text COMMENT '文章内容',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of xf_article
-- ----------------------------

-- ----------------------------
-- Table structure for xf_article_cate
-- ----------------------------
DROP TABLE IF EXISTS `xf_article_cate`;
CREATE TABLE `xf_article_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `pid` int(11) DEFAULT '0' COMMENT '上级id为0则是一级',
  `cate_descript` varchar(255) DEFAULT NULL COMMENT '分了描述',
  `image` varchar(255) DEFAULT NULL COMMENT '分类图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='文章分类';

-- ----------------------------
-- Records of xf_article_cate
-- ----------------------------

-- ----------------------------
-- Table structure for xf_card
-- ----------------------------
DROP TABLE IF EXISTS `xf_card`;
CREATE TABLE `xf_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_name` varchar(255) NOT NULL COMMENT '卡券名称',
  `card_image` varchar(255) DEFAULT NULL COMMENT '卡券图片',
  `type` int(2) NOT NULL DEFAULT '1' COMMENT '卡券类型 1：指定金额卡券 2：指定小时卡券',
  `hour` int(11) DEFAULT NULL COMMENT '抵扣小时',
  `amount` decimal(10,2) DEFAULT NULL COMMENT '抵扣金额',
  `number` int(11) NOT NULL DEFAULT '0' COMMENT '卡券数量 为0则为不限制数量',
  `expire_time` int(12) DEFAULT '0' COMMENT '领取后失效时间，为0则用不失效',
  `use_number` int(11) DEFAULT NULL COMMENT '已领取数量',
  `channel` int(2) DEFAULT NULL COMMENT '领取渠道 1：注册领取 2：充值任意金额领取 3：后台管理员发放 4：限制限量活动',
  `status` int(2) DEFAULT '1' COMMENT '1：生效中 2：已下架',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='卡券表';

-- ----------------------------
-- Records of xf_card
-- ----------------------------

-- ----------------------------
-- Table structure for xf_game
-- ----------------------------
DROP TABLE IF EXISTS `xf_game`;
CREATE TABLE `xf_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL COMMENT '游戏分类id',
  `name` varchar(255) DEFAULT NULL COMMENT '游戏名称',
  `poster` varchar(255) DEFAULT NULL COMMENT '游戏封面图',
  `tag` text COMMENT '游戏标签，json格式',
  `description` text COMMENT '游戏描述',
  `status` int(2) DEFAULT '1' COMMENT '1：上架  0：下架',
  `sort` int(11) DEFAULT '0' COMMENT '排序',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL,
  `delete_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='游戏表';

-- ----------------------------
-- Records of xf_game
-- ----------------------------
INSERT INTO `xf_game` VALUES ('1', '2', '王者荣耀', '/uploads/20201014/X7vagnDJezVaR3veZNsi8fA9cGiyrvsu.png', '[\"123\"]', '腾讯的一款5v5策略动作游戏', '1', '2', '2020-10-14 21:04:08', '2020-10-16 09:27:49', null);
INSERT INTO `xf_game` VALUES ('2', '1', '英雄联盟', '/uploads/20201014/fPR7pATSA0GbKHvNtyOdzPNpc3uW455f.jpg', '[]', '英雄联盟', '1', '0', '2020-10-14 21:22:49', '2020-10-14 21:22:49', null);
INSERT INTO `xf_game` VALUES ('3', '4', '英雄联盟2', '/uploads/20201014/fPR7pATSA0GbKHvNtyOdzPNpc3uW455f.jpg', '[\"lol\",\"\\u5fb7\\u739b\\u897f\\u4e9a\",\"\\u6bd4\\u5c14\\u5409\\u6c83\\u7279\"]', '英雄联盟', '1', '3', '2020-10-14 21:55:41', '2020-10-15 22:03:51', null);

-- ----------------------------
-- Table structure for xf_game_cate
-- ----------------------------
DROP TABLE IF EXISTS `xf_game_cate`;
CREATE TABLE `xf_game_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) DEFAULT NULL COMMENT '分类名称',
  `image` varchar(255) DEFAULT NULL COMMENT '分类图片',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='游戏分类表';

-- ----------------------------
-- Records of xf_game_cate
-- ----------------------------
INSERT INTO `xf_game_cate` VALUES ('1', '端游', '/uploads/20201014/4ZyYmXkypEuMTHIjRzKgsgc59iClrVRk.jpg');
INSERT INTO `xf_game_cate` VALUES ('2', '手游', '/uploads/20201014/lewmcT2nzT2fq5nGyXcAE7DweAgUma1b.png');
INSERT INTO `xf_game_cate` VALUES ('3', 'steam', '/uploads/20201014/BV7mPeWfz4b5jfL7GlKNaUgBwWJlUMNn.jpg');
INSERT INTO `xf_game_cate` VALUES ('4', '其他', '/uploads/20201014/VGkrGM9pKZAGGpVixms65YqaWeJqx9u5.jpg');
INSERT INTO `xf_game_cate` VALUES ('5', '暴雪端游', '/uploads/20201014/5Xq4yGbFz5mcwdSqIauNh3wB3YdLV33h.jpg');
INSERT INTO `xf_game_cate` VALUES ('6', '测试分类', '/uploads/20201014/E5ChUgiPCQtL13Y9XehkyHXK1nUFQY4g.jpg');

-- ----------------------------
-- Table structure for xf_game_region
-- ----------------------------
DROP TABLE IF EXISTS `xf_game_region`;
CREATE TABLE `xf_game_region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL COMMENT '游戏id',
  `region_name` varchar(255) DEFAULT NULL COMMENT '大区名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='游戏大区表';

-- ----------------------------
-- Records of xf_game_region
-- ----------------------------
INSERT INTO `xf_game_region` VALUES ('3', '1', '安卓区');
INSERT INTO `xf_game_region` VALUES ('4', '1', 'ios区');

-- ----------------------------
-- Table structure for xf_game_service
-- ----------------------------
DROP TABLE IF EXISTS `xf_game_service`;
CREATE TABLE `xf_game_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `region_id` int(11) DEFAULT NULL COMMENT '游戏大区id',
  `service_name` varchar(255) DEFAULT NULL COMMENT '游戏服务器名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='游戏服务器表';

-- ----------------------------
-- Records of xf_game_service
-- ----------------------------
INSERT INTO `xf_game_service` VALUES ('9', '3', '烈焰玫瑰');

-- ----------------------------
-- Table structure for xf_game_sku
-- ----------------------------
DROP TABLE IF EXISTS `xf_game_sku`;
CREATE TABLE `xf_game_sku` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `sku_name` varchar(255) DEFAULT NULL COMMENT '规格名称',
  `sku_icon` varchar(255) DEFAULT NULL COMMENT '规格icon',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of xf_game_sku
-- ----------------------------

-- ----------------------------
-- Table structure for xf_message
-- ----------------------------
DROP TABLE IF EXISTS `xf_message`;
CREATE TABLE `xf_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_id` int(11) DEFAULT NULL COMMENT '站内信分类id',
  `content` text COMMENT '消息内容',
  `is_read` int(2) DEFAULT '0' COMMENT '0：未读  1：已读',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='站内信';

-- ----------------------------
-- Records of xf_message
-- ----------------------------

-- ----------------------------
-- Table structure for xf_message_cate
-- ----------------------------
DROP TABLE IF EXISTS `xf_message_cate`;
CREATE TABLE `xf_message_cate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cate_name` varchar(255) DEFAULT NULL COMMENT '站内信分类名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='站内信分类表';

-- ----------------------------
-- Records of xf_message_cate
-- ----------------------------

-- ----------------------------
-- Table structure for xf_notice
-- ----------------------------
DROP TABLE IF EXISTS `xf_notice`;
CREATE TABLE `xf_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '公告标题',
  `content` text COMMENT '公告内容',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='网站公告';

-- ----------------------------
-- Records of xf_notice
-- ----------------------------

-- ----------------------------
-- Table structure for xf_order
-- ----------------------------
DROP TABLE IF EXISTS `xf_order`;
CREATE TABLE `xf_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '租号用户id',
  `account_uid` int(11) DEFAULT NULL COMMENT '号主uid',
  `account_name` varchar(255) DEFAULT NULL COMMENT '号主用户昵称，（用来记录后台创建账号的名称）',
  `account_id` int(11) DEFAULT NULL COMMENT '账号id',
  `account_title` varchar(255) DEFAULT NULL COMMENT '账号标题',
  `account_image` text COMMENT '账号图片组',
  `card_id` int(11) DEFAULT '0' COMMENT '卡券id 为0则为未使用卡券',
  `specs_relation_id` int(11) DEFAULT NULL COMMENT '账号价格规格关系表id',
  `specs_relation_price` decimal(10,2) DEFAULT NULL COMMENT '账号对应规格关系表价钱',
  `spces_name` varchar(255) DEFAULT NULL COMMENT '账号规格名称',
  `count` int(11) DEFAULT NULL COMMENT '购买数量（对应规格）',
  `order_sn` varchar(50) DEFAULT NULL COMMENT '订单号',
  `status` int(2) DEFAULT NULL COMMENT '订单状态 0：未支付 1：已支付，进行中 2：已支付，预约中 3：已完成 4：申诉中 5：已申诉 9：已退款',
  `total_amount` decimal(10,2) DEFAULT NULL COMMENT '订单总价',
  `real_amount` decimal(10,2) DEFAULT NULL COMMENT '订单实付款',
  `deposit` decimal(10,2) DEFAULT NULL COMMENT '订单押金',
  `pay_time` datetime DEFAULT NULL COMMENT '订单付款时间',
  `pay_channel` int(2) DEFAULT NULL COMMENT '订单支付渠道  1：支付宝  2：微信 ',
  `start_time` datetime DEFAULT NULL COMMENT '订单开始时间',
  `end_time` datetime DEFAULT NULL COMMENT '订单结束时间',
  `appeal_remark` varchar(500) DEFAULT NULL COMMENT '订单申诉理由',
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `expansion` text COMMENT '订单扩展字段',
  `remarks` varchar(255) DEFAULT NULL COMMENT '订单remarks',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单表';

-- ----------------------------
-- Records of xf_order
-- ----------------------------

-- ----------------------------
-- Table structure for xf_setting
-- ----------------------------
DROP TABLE IF EXISTS `xf_setting`;
CREATE TABLE `xf_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '设置名称',
  `pid` int(11) DEFAULT '0' COMMENT '为0则为一级',
  `key` varchar(50) DEFAULT NULL COMMENT '规则键名',
  `value` text COMMENT '规则值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='平台设置表';

-- ----------------------------
-- Records of xf_setting
-- ----------------------------
INSERT INTO `xf_setting` VALUES ('1', 'seo设置', '0', null, null);
INSERT INTO `xf_setting` VALUES ('2', '全局默认seo_title', '1', 'seo_title', null);
INSERT INTO `xf_setting` VALUES ('3', '全局默认seo_keywords', '1', 'seo_keywords', null);
INSERT INTO `xf_setting` VALUES ('4', '全局默认seo_descript', '1', 'seo_descript', null);
INSERT INTO `xf_setting` VALUES ('5', '网站基本设置', '0', null, null);
INSERT INTO `xf_setting` VALUES ('6', '客服QQ', '5', 'kefu_qq', null);
INSERT INTO `xf_setting` VALUES ('7', '网站开启关闭', '5', 'site_status', null);
INSERT INTO `xf_setting` VALUES ('8', '平台参数设置', '0', null, null);
INSERT INTO `xf_setting` VALUES ('9', '提现扣去金额比例', '8', 'withdraw_percent', null);
INSERT INTO `xf_setting` VALUES ('10', '单账户发布账号上限', '8', 'account_upper', null);
INSERT INTO `xf_setting` VALUES ('11', '最小充值金额', '8', 'min_recharge', null);
INSERT INTO `xf_setting` VALUES ('12', '最小提现金额', '8', 'min_withdraw', null);

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
  `balance` decimal(10,2) DEFAULT '0.00' COMMENT '账户总余额',
  `withable_balance` decimal(10,2) DEFAULT '0.00' COMMENT '可提现金额',
  `deposit` decimal(10,2) DEFAULT '0.00' COMMENT '押金',
  `uuid` varchar(20) DEFAULT NULL COMMENT '用作以后扩展分销模块唯一标识（扩展字段）',
  `real_name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `idcard` varchar(50) DEFAULT NULL COMMENT '身份证号',
  `status` int(2) DEFAULT '1' COMMENT '1:正常（扩展字段）',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of xf_user
-- ----------------------------
INSERT INTO `xf_user` VALUES ('1', '18301395979', 'e10adc3949ba59abbe56e057f20f883e', '小刘', '1552519081@qq.com', null, '2020-10-13 11:10:19', null, '0', null, '0.00', '0.00', '0.00', null, null, null, '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户资金记录表';

-- ----------------------------
-- Records of xf_user_balance_log
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户行为记录表';

-- ----------------------------
-- Records of xf_user_behavior
-- ----------------------------

-- ----------------------------
-- Table structure for xf_user_card
-- ----------------------------
DROP TABLE IF EXISTS `xf_user_card`;
CREATE TABLE `xf_user_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_id` int(11) DEFAULT NULL COMMENT '卡券id',
  `uid` int(11) DEFAULT NULL,
  `status` int(2) DEFAULT '0' COMMENT '使用状态  0：未使用  1：已使用',
  `create_time` datetime DEFAULT NULL COMMENT '领取时间',
  `invalid_time` varchar(11) DEFAULT NULL COMMENT '失效时间，为0则为用不失效',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户卡券表';

-- ----------------------------
-- Records of xf_user_card
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户关注表';

-- ----------------------------
-- Records of xf_user_follow
-- ----------------------------
