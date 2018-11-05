/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50640
Source Host           : 10.0.10.198:3306
Source Database       : nissan

Target Server Type    : MYSQL
Target Server Version : 50640
File Encoding         : 65001

Date: 2018-11-02 17:31:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `wangxun_activity`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_activity`;
CREATE TABLE `wangxun_activity` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `theme` varchar(32) NOT NULL DEFAULT '' COMMENT '活动主题',
  `brand` varchar(32) NOT NULL DEFAULT '' COMMENT '活动产品的品牌',
  `bg_img_url` varchar(128) NOT NULL DEFAULT '' COMMENT '活动背景图',
  `desc` varchar(1024) NOT NULL DEFAULT '' COMMENT '活动描述',
  `seller_id` int(11) NOT NULL DEFAULT '0' COMMENT '经销商ID',
  `check_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态  0未审核  1审核通过  2审核未通过',
  `check_remark` varchar(64) DEFAULT '' COMMENT '审核备注',
  `created_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间，时间戳',
  `updated_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间，时间戳',
  `deleted_at` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '删除时间，时间戳',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='活动信息表，可以关联多个子活动，如：砍价、答题';

-- ----------------------------
-- Records of wangxun_activity
-- ----------------------------
INSERT INTO `wangxun_activity` VALUES ('1', '天籁大优惠', '天籁', 'upload/img/1.img', '', '4665', '0', '未审核', '0', '0', '0');
INSERT INTO `wangxun_activity` VALUES ('2', '4444444', '4444', '1', '444', '4665', '0', '', '1541147758', '1541147758', '0');
INSERT INTO `wangxun_activity` VALUES ('3', '4444444', '4444', '1', '444', '4665', '0', '', '1541147779', '1541147779', '0');
INSERT INTO `wangxun_activity` VALUES ('4', '4444444', '4444', '1', '444', '4665', '0', '', '1541147905', '1541147905', '0');
INSERT INTO `wangxun_activity` VALUES ('5', '4444444', '4444', '1', '444', '4665', '0', '', '1541148273', '1541148273', '0');
INSERT INTO `wangxun_activity` VALUES ('6', '4545', '454545', '1', '45454545454', '4665', '0', '', '1541148294', '1541148294', '0');
INSERT INTO `wangxun_activity` VALUES ('7', '4', '4', '1', '5', '4665', '0', '', '1541148364', '1541148364', '0');
INSERT INTO `wangxun_activity` VALUES ('8', '4', '4', '1', '5', '4665', '0', '', '1541148407', '1541148407', '0');
INSERT INTO `wangxun_activity` VALUES ('9', '897678', '9638', '1', '5', '4665', '0', '', '1541148716', '1541148716', '0');
INSERT INTO `wangxun_activity` VALUES ('10', '1', '1', 'pXYEoSPVPY8pWmxppbnJnpxGxWWLXEsPTCBoFUsW.jpeg', '1', '4665', '0', '', '1541149008', '1541149008', '0');

-- ----------------------------
-- Table structure for `wangxun_activity_goods`
-- ----------------------------
DROP TABLE IF EXISTS `wangxun_activity_goods`;
CREATE TABLE `wangxun_activity_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `wangxun_activity_id` int(11) NOT NULL COMMENT '活动ID',
  `goods_id` varchar(255) NOT NULL COMMENT '商品ID',
  `need_cut_num` int(11) NOT NULL COMMENT '某个活动中一个商品需砍的次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of wangxun_activity_goods
-- ----------------------------

-- ----------------------------
-- Table structure for wangxun_goods
-- ----------------------------
DROP TABLE IF EXISTS wangxun_goods;
CREATE TABLE wangxun_goods (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `seller_id` int(11) NOT NULL COMMENT '经销商ID',
  `goods_name` int(11) NOT NULL COMMENT '车系ID',
  `goods_price` int(11) NOT NULL,
  `goods_img` varchar(255) NOT NULL,
  `coupon_id` int(32) NOT NULL COMMENT '车系名称',
  `coupon_price` int(32) NOT NULL COMMENT '车ID',
  `created_at` int(11) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  `deleted_at` int(11) NOT NULL DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`,`coupon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COMMENT='经销商的车系';

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO wangxun_goods VALUES ('1', '1', '1', '1', '1', '1', '1', '0', '0', '0');
INSERT INTO wangxun_goods VALUES ('2', '4665', '545', '4554', 'QMkgV6A4851OoMCZzCRchIX2YlzWM6YCA315ukh7.jpeg', '455454', '0', '1541150662', '1541150662', '0');
INSERT INTO wangxun_goods VALUES ('3', '4665', '876578', '67867', 'VlyL7Q6UflnVoc56TdMxaYdzd2uMktLqoOI73Tg7.jpeg', '67867', '0', '1541150706', '1541150706', '0');
INSERT INTO wangxun_goods VALUES ('4', '4665', '85878', '785678', 'XkDlJM8eNIOJEl5gC75RVeuLN2LpigphHVq3WWgj.jpeg', '5785', '0', '1541150730', '1541150730', '0');
INSERT INTO wangxun_goods VALUES ('5', '4665', '5452', '75875', 'hfovT1hSmBUJ1lmm7DX1ZycnSeYWDCW8zWhkfkWk.jpeg', '5785', '0', '1541150756', '1541150756', '0');
